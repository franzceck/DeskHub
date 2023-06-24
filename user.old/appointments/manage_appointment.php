<?php
require_once('../../config.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT a.*,p.* FROM `appointments` a inner join `clients` p on a.client_id = p.id where id = {$_GET['id']}");
    $client = $qry->fetch_assoc();
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
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
            <?php
            echo "<input type='hidden' name='client_id' value='{$_SESSION['userdata']['id']}'>";
            foreach (['name', 'email', 'contact', 'address'] as $key => $value) {
                if ($_SESSION['userdata'][$value] === null)
                    break;
                echo "<input type='hidden' name='$value' value='{$_SESSION['userdata'][$value]}'>";
            }
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
                <div class="form-group">
                    <label for="date_sched" class="control-label">Booking Schedule</label>
                    <input type="datetime-local" class="form-control" name="date_sched" value="<?php echo isset($date_sched) ? date("Y-m-d\TH:i", strtotime($date_sched)) : "" ?>" required>
                </div>
                <input type="hidden" name="status" value="0">
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
            var _this = $(this);
            $('.err-msg').remove();

            // Check if the date has already passed before submitting the form
            var appointmentDate = new Date($('input[name="date_sched"]').val());
            var currentDate = new Date();
            currentDate.setHours(0, 0, 0, 0); // Set current date to midnight

            if (appointmentDate < currentDate) {
                var errorMsg = $('<div>').addClass("alert alert-danger err-msg").text("Cannot book an appointment for a past date.");
                _this.prepend(errorMsg);
                errorMsg.show('slow');
                $("html, body").animate({ scrollTop: $('#uni_modal').offset().top }, "fast");
                return false; // Prevent form submission
            }

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
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        location.reload();
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        var el = $('<div>')
                        el.addClass("alert alert-danger err-msg").text(resp.msg);
                        _this.prepend(el);
                        el.show('slow');
                        $("html, body").animate({ scrollTop: $('#uni_modal').offset().top }, "fast");
                    } else {
                        alert_toast("An error occurred", 'error');
                        console.log(resp);
                    }
                    console.log(resp);
                    end_loader();
                }
            });
        });

        $('#uni_modal').on('hidden.bs.modal', function(e) {
            if ($('#appointment_form').length <= 0)
                location.reload();
        });
    });
</script>