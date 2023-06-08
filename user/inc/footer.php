<script>
  $(document).ready(function() {
    window.viewer_modal = function($src = '') {
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if (t == 'mp4') {
        var view = $("<video src='" + $src + "' controls autoplay></video>")
      } else {
        var view = $("<img src='" + $src + "' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
        show: true,
        backdrop: 'static',
        keyboard: false,
        focus: true
      })
      end_loader()

    }
    window.uni_modal = function($title = '', $url = '', $size = "") {
      start_loader()
      $.ajax({
        url: $url,
        error: err => {
          console.log()
          alert("An error occured")
        },
        success: function(resp) {
          if (resp) {
            $('#uni_modal .modal-title').html($title)
            $('#uni_modal .modal-body').html(resp)
            if ($size != '') {
              $('#uni_modal .modal-dialog').addClass($size + '  modal-dialog-centered')
            } else {
              $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
            }
            $('#uni_modal').modal({
              show: true,
              backdrop: 'static',
              keyboard: false,
              focus: true
            })
            end_loader()
          }
        }
      })
    }
    window._conf = function($msg = '', $func = '', $params = []) {
      $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
      $('#confirm_modal .modal-body').html($msg)
      $('#confirm_modal').modal('show')
    }
  })
</script>

<style>
  .Footnew {
    display: flex;
    flex-direction: row;
  }

  .follow {
    display: flex;
    flex-direction: row;
    cursor: pointer;
  }

  .follow ul li:hover {
    text-decoration: underline;
    color: #FDC474;
  }

  .follow ul {
    margin: 0 70px 0 70px;
    list-style: none;
  }

  .follow ul .Override {
    border: none;
    background: none;
    cursor: pointer;
    margin: 0;
    padding: 0;
    color: white;
  }

  .follow ul .Override:hover {
    text-decoration: underline;
    color: #FDC474;
  }
.FootOver{
  display: flex;
  flex-direction: column;
}
</style>
<footer class="main-footer text-sm bg-dark">
  <div class=" Footnew">
    <div class="FootOver">
    <div class="float-right d-none d-sm-inline-block">
      <b><?php echo $_settings->info('short_name') ?> (by: <a href="ma.nicafranzceckronsuarez@student.laverdad.edu.ph" target="blank">Group 1</a>)</b>
    </div>
    <div>
    <strong>Copyright © <?php echo date('Y') ?>.
      <!-- <a href=""></a> -->
    </strong>
    All rights reserved.
    </div>
    </div>


    <div class="follow">
      <ul>
        <li class="last"> Follow Us</li>
        <li>
          <a href="https://www.facebook.com/" target="_blank">
            <img src=".//socials/facebook.png" alt="" />Facebook</a>
        </li>
        <li>
          <a href="https://www.instagram.com/" target="_blank">
            <img src=".//socials/instagram.png" alt="" />Instagram</a>
        </li>
        <li>
          <a href="https://twitter.com/" target="_blank">
            <img src=".//socials/twitter.png" alt="" />Twitter</a>
        </li>
        <li>
          <a href="https://www.youtube.com/" target="_blank">
            <img src=".//socials/youtube.png" alt="" />Youtube</a>
        </li>
      </ul>

      <ul>
        <li>About Us</li>
        <li>Address</li>
        <li>Email</li>

      </ul>

      <ul>

        <li>Contact Us</li>
        <li><!-- Button trigger modal -->
          <button type="button" class="Override" data-toggle="modal" data-target="#example">
            Privacy Disclaimer
          </button>
          <div class="modal " id="example" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <section>
                    <?php include('../about.html') ?>
                  </section>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>FAQ</li>
      </ul>

    </div>
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url ?>plugins/sparklines/sparkline.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-select/js/select.bootstrap4.min.js"></script>
<!-- overlayScrollbars -->
<!-- <script src="<?php echo base_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url ?>dist/js/adminlte.js"></script>
<div class="daterangepicker ltr show-ranges opensright">
  <div class="ranges">
    <ul>
      <li data-range-key="Today">Today</li>
      <li data-range-key="Yesterday">Yesterday</li>
      <li data-range-key="Last 7 Days">Last 7 Days</li>
      <li data-range-key="Last 30 Days">Last 30 Days</li>
      <li data-range-key="This Month">This Month</li>
      <li data-range-key="Last Month">Last Month</li>
      <li data-range-key="Custom Range">Custom Range</li>
    </ul>
  </div>
  <div class="drp-calendar left">
    <div class="calendar-table"></div>
    <div class="calendar-time" style="display: none;"></div>
  </div>
  <div class="drp-calendar right">
    <div class="calendar-table"></div>
    <div class="calendar-time" style="display: none;"></div>
  </div>
  <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
</div>
<div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>