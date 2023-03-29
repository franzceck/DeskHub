<?php
require_once('../config.php');
class Master extends DBConnection
{
	private $settings;
	public function __construct()
	{
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct()
	{
		parent::__destruct();
	}
	function capture_err()
	{
		if (!$this->conn->error)
			return false;
		else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			if (isset($sql))
				$resp['sql'] = $sql;
			return json_encode($resp);
			exit;
		}
	}
	function save_appointment()
	{
		extract($_POST);
		$sched_set_qry = $this->conn->query("SELECT * FROM `schedule_settings`");
		$sched_set = array_column($sched_set_qry->fetch_all(MYSQLI_ASSOC), 'meta_value', 'meta_field');
		$morning_start = date("Y-m-d ") . explode(',', $sched_set['morning_schedule'])[0];
		$morning_end = date("Y-m-d ") . explode(',', $sched_set['morning_schedule'])[1];
		$afternoon_start = date("Y-m-d ") . explode(',', $sched_set['afternoon_schedule'])[0];
		$afternoon_end = date("Y-m-d ") . explode(',', $sched_set['afternoon_schedule'])[1];
		$max_bookings_per_day = $sched_set['max_bookings_per_day'];
		$sched_time = date("Y-m-d ") . date("H:i", strtotime($date_sched));
		if (!in_array(strtolower(date("l", strtotime($date_sched))), explode(',', strtolower($sched_set['day_schedule'])))) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Selected Schedule Day of Week can not be booked.";
			return json_encode($resp);
			exit;
		}
		if (!((strtotime($sched_time) >= strtotime($morning_start) && strtotime($sched_time) <= strtotime($morning_end)) || (strtotime($sched_time) >= strtotime($afternoon_start) && strtotime($sched_time) <= strtotime($afternoon_end)))) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Bookings are closed on the selected Schedule Time.";
			return json_encode($resp);
			exit;
		}
		$date_sched_changed = false;
		if (!empty($id)) {
			$result = $this->conn->query("SELECT date_sched FROM appointments WHERE id = $id");
			$old_date_sched = $result->fetch_row()[0];
			$date_sched_changed = $date_sched != $old_date_sched;
		}
		$stmt = "SELECT count(*) FROM `appointments` where DATE('$date_sched') = DATE(date_sched) and status != 2";
		$appointments = $this->conn->query($stmt)->fetch_assoc()['count(*)'];
		$this->capture_err();
		if (!empty($id) && $date_sched_changed)
			$appointments -= 1;
		if ($appointments >= $max_bookings_per_day) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Selected Schedule Date is fully booked.";
			$resp['sql'] = $stmt;
			return json_encode($resp);
			exit;
		}
		if (empty($id))
			$sql = "INSERT INTO `appointments` set date_sched = '{$date_sched}',client_id = '{$client_id}',`status` = '{$status}' ";
		else
			$sql = "UPDATE `appointments` set date_sched = '{$date_sched}',client_id = '{$client_id}',`status` = '{$status}' where id = '{$id}' ";

		$resp['debug'] = $sql;
		$save_sched = $this->conn->query($sql);
		$this->capture_err();
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('lid', 'date_sched', 'status', 'ailment'))) {
				if (!empty($data)) $data .= ", ";
				$data .= " ({$client_id},'{$k}','{$v}')";
			}
		}
		if ($save_sched) {
			$resp['status'] = 'success';
			$resp['sql'] = 'sql';
			$this->settings->set_flashdata('success', ' Appointment successfully saved');
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "There's an error while submitting the data.";
		}
		return json_encode($resp);
	}
	function multiple_action()
	{
		extract($_POST);
		if ($_action != 'delete') {
			$stat_arr = array("pending" => 0, "confirmed" => 1, "cancelled" => 2);
			$status = $stat_arr[$_action];
			$sql = "UPDATE `appointments` set status = '{$status}' where id in (" . (implode(",", $ids)) . ") ";
			$process = $this->conn->query($sql);
			$this->capture_err();
		} else {
			$sql = "DELETE from `appointments` where id in (" . (implode(",", $ids)) . ") ";
			$process = $this->conn->query($sql);
			$this->capture_err();
		}
		if ($process) {
			$resp['status'] = 'success';
			$resp['sql'] = $sql;
			$act = $_action == 'delete' ? "Deleted" : "Updated";
			$this->settings->set_flashdata("success", "Appointment/s successfully " . $act);
		} else {
			$resp['status'] = 'failed';
			$resp['error_sql'] = $sql;
		}
		return json_encode($resp);
	}
	function save_sched_settings()
	{
		$data = "";
		foreach ($_POST as $k => $v) {
			if (is_array($_POST[$k]))
				$v = implode(',', $_POST[$k]);
			if (!empty($data)) $data .= ",";
			$data .= " ('{$k}','{$v}') ";
		}
		$sql = "INSERT INTO `schedule_settings` (`meta_field`,`meta_value`) VALUES {$data}";
		if (!empty($data)) {
			$this->conn->query("DELETE FROM `schedule_settings`");
			$this->capture_err();
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', ' Schedule settings successfully updated');
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
			$resp['msg'] = "An Error occure while excuting the query.";
		}
		return json_encode($resp);
	}

	function delete_appointment()
	{
		extract($_POST);
		$stmt = "DELETE FROM appointments where id = {$id}";
		$result = $this->conn->query($stmt);
		if ($result) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', 'Appointment successfully deleted');
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "An error occurred while executing the query.";
		}
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_appointment':
		echo $Master->save_appointment();
		break;
	case 'multiple_action':
		echo $Master->multiple_action();
		break;
	case 'save_sched_settings':
		echo $Master->save_sched_settings();
		break;
	case 'delete_appointment':
		echo $Master->delete_appointment();
		break;
	default:
		// echo $sysset->index();
		break;
}
