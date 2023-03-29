<?php
require_once('../../config.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $stmt = <<<END
    SELECT a.id as appointment_id
        ,a.date_sched
        ,a.status
        ,u.id as user_id
        ,u.firstname
        ,u.lastname
        ,u.role_id
    FROM `appointments` a inner join `users` u on a.client_id = u.id
    where a.id = {$_GET['id']}
    END;
    $qry = $conn->query($stmt);
    $user = $qry->fetch_assoc();
}
?>
<style>
    #uni_modal .modal-content>.modal-footer {
        display: none;
    }

    #uni_modal .modal-body {
        padding-top: 0 !important;
    }
</style>
<div class="container-fluid">
    <form id="appointment_form" class="">
        <div class="row" id="appointment">

            <input type="hidden" name="id" value="<?php echo isset($user) ? $user['appointment_id'] : '' ?>">
            <?php
            // foreach (['firstname', 'lastname', 'email', 'contact', 'address'] as $key => $value) {
            //     if ($user[$value] === null)
            //         break;
            //     echo "<input type='hidden' name='$value' value='{user[$value]}'>";
            // }
            ?>
            <!-- <div class="col-6" id="frm-field">
                <div class="form-group">
                    <label for="name" class="control-label">Fullname</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($client['name']) ? $client['name'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($client['email']) ? $client['email'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="contact" class="control-label">Contact</label>
                    <input type="text" class="form-control" name="contact" value="<?php echo isset($client['contact']) ? $client['contact'] : '' ?>" required>
                </div>
            </div> -->
            <div>
                <?php if ($_SESSION['userdata']['role_id'] == 2) { ?>
                    <div class="form-group">
                        <label for="client_id">User</label>
                        <select name="client_id" id="client_id" class="custom custom-select">
                            <?php
                            $query = $conn->query('SELECT * FROM users');
                            $users = $query->fetch_all(MYSQLI_ASSOC);
                            foreach ($users as $v) {
                            ?>
                                <option value="<?php echo $v['id']; ?>" <?php echo isset($user) && $v['id'] == $user['user_id'] ? 'selected' : '' ?>><?php echo "{$v['name']} ({$v['email']})" ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } else { ?>
                    <input type="hidden" name="client_id" value="<?php echo isset($user) ? $user['user_id'] : $_SESSION['userdata']['id'] ?>">
                <?php } ?>
                <div class="form-group">
                    <label for="date_sched" class="control-label">Booking Schedule</label>
                    <input type="datetime-local" class="form-control" name="date_sched" value="<?php echo isset($user['date_sched']) ? date("Y-m-d\TH:i", strtotime($user['date_sched'])) : "" ?>" required>
                </div>
                <?php if ($_settings->userdata('role_id') == 2) : ?>
                    <div class="form-group">
                        <label for="status" class="control-label">Status</label>
                        <select name="status" id="status" class="custom custom-select">
                            <option value="0" <?php echo isset($status) && $status == "0" ? "selected" : "" ?>>Pending</option>
                            <option value="1" <?php echo isset($status) && $status == "1" ? "selected" : "" ?>>Confirmed</option>
                            <option value="2" <?php echo isset($status) && $status == "2" ? "selected" : "" ?>>Cancelled</option>
                        </select>
                    </div>
                <?php else : ?>
                    <input type="hidden" name="status" value="0">
                <?php endif; ?>
            </div>
            <div class="form-group d-flex justify-content-end w-100 form-group">
                <button class="btn-primary btn">Submit Book</button>
                <button class="btn-light btn ml-2" type="button" data-dismiss="modal">Cancel</button>
            </div>
    </form>
</div>
</div>
<script>
    $(function() {
        $('#appointment_form').submit(function(e) {
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_appointment",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: err => {
                    console.log(err)
                    alert_toast("An error occured", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        location.reload()
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        var el = $('<div>')
                        el.addClass("alert alert-danger err-msg").text(resp.msg)
                        _this.prepend(el)
                        el.show('slow')
                        $("html, body").animate({
                            scrollTop: $('#uni_modal').offset().top
                        }, "fast");
                    } else {
                        alert_toast("An error occured", 'error');
                        console.log(resp)
                    }
                    console.log(resp)
                    end_loader();
                }
            })
        })
        $('#uni_modal').on('hidden.bs.modal', function(e) {
            if ($('#appointment_form').length <= 0)
                location.reload()
        })
    })
</script>
