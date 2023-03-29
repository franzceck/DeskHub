<?php
require_once '../config.php';
class Login extends DBConnection
{
	private $settings;
	public function __construct()
	{
		global $_settings;
		$this->settings = $_settings;

		parent::__construct();
		ini_set('display_error', 1);
	}
	public function __destruct()
	{
		parent::__destruct();
	}
	public function index()
	{
		echo "<h1>Access Denied</h1> <a href='" . base_url . "'>Go Back.</a>";
	}
	public function login()
	{
		extract($_POST);

		$stmt = "SELECT u.*,r.role_desc from users u inner join roles r on u.role_id = r.id where email = '$email' and password = md5('$password')";
		$qry = $this->conn->query($stmt);
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $k => $v) {
				if ($k != 'password') {
					$this->settings->set_userdata($k, $v);
				}
			}
			return json_encode(array('status' => 'success'));
		} else {
			return json_encode(array('status' => 'incorrect', 'last_qry' => $stmt));
		}
	}
	public function logout()
	{
		if ($this->settings->sess_des()) {
			redirect('user/login.php');
		}
	}
	public function logout_user()
	{
		if ($this->settings->sess_des()) {
			redirect('user/login.php');
		}
	}
	function login_user()
	{
		extract($_POST);
		$qry = $this->conn->query("SELECT * from users where email = '$email' and password = md5('$password') ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $k => $v) {
				$this->settings->set_userdata($k, $v);
			}
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'incorrect';
		}
		if ($this->conn->error) {
			$resp['status'] = 'failed';
			$resp['_error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function register_user()
	{
		extract($_POST);
		$stmt = $this->conn->prepare("INSERT INTO users (firstname, lastname, email, contact, address, password, role_id) VALUES (?, ?, ?, ?, ?, md5(?), 1)");
		if ($firstname == '' || $lastname == '' || $email == '' || $contact == '' || $address == '' || $password == '') {
			$resp['status'] = 'incomplete';
			$resp['_error'] = 'Please fill in the blank fields.';
		} else {
			$stmt->bind_param("ssssss", $firstname, $lastname, $email, $contact, $address, $password);
			$stmt->execute();
		}
		if ($this->conn->error) {
			if (strpos($this->conn->error, 'Duplicate entry') === 0) {
				$resp['status'] = 'duplicate';
				$resp['_error'] = 'Email already exists';
			} else {
				$resp['status'] = 'failed';
				$resp['_error'] = $this->conn->error;
			}
		} else if (!isset($resp)){
			$resp['status'] = 'success';
		}
		return json_encode($resp);
	}
}
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action) {
	case 'login':
		echo $auth->login();
		break;
	case 'login_user':
		echo $auth->login_user();
		break;
	case 'register_user':
		echo $auth->register_user();
		break;
	case 'logout':
		echo $auth->logout();
		break;
	case 'logout_user':
		echo $auth->logout_user();
		break;
	default:
		echo $auth->index();
		break;
}
