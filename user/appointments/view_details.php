<?php
require_once('../../config.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT a.*,u.* FROM `appointments` a inner join `users` u on a.client_id = u.id where a.id = {$_GET['id']}");
    $user = $qry->fetch_assoc();
}
?>
<style>
#uni_modal .modal-content>.modal-footer{
    display:none;
}
#uni_modal .modal-body{
    padding-bottom:0 !important;
}
</style>
<div class="container-fluid">
    <p><b>Booking Schedule:</b> <?php echo date("F d, Y",strtotime($user['date_sched']))  ?></p>
    <p><b>Name:</b> <?php echo $user['name'] ?></p>
    <!-- <p><b>Gender:</b> <?php echo ucwords($user['gender']) ?></p> -->
    <!-- <p><b>Date of Birth:</b> <?php echo date("F d, Y",strtotime($user['dob'])) ?></p> -->
    <p><b>Contact #:</b> <?php echo $user['contact'] ?></p>
    <p><b>Email:</b> <?php echo $user['email'] ?></p>
    <p><b>Address:</b> <?php echo $user['address'] ?></p>
    <!-- <p><b>Ailment:</b> <?php echo $ailment ?></p> -->
    <p><b>Status:</b>
        <?php
        switch($user['status']){
            case(0):
                echo '<span class="badge badge-primary">Pending</span>';
            break;
            case(1):
            echo '<span class="badge badge-success">Confirmed</span>';
            break;
            case(2):
                echo '<span class="badge badge-danger">Cancelled</span>';
            break;
            default:
                echo '<span class="badge badge-secondary">NA</span>';
        }
        ?>
    </p>
</div>
<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
