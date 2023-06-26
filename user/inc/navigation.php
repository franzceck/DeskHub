<?php
$role_id = $_SESSION['userdata']['role_id'];
?>

</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-primary elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>user" style="background-color: white; height: 68px;" class="brand-link text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image  elevation-3" style="opacity: .8;width: 3rem;height: 3.5rem;max-height: unset">
        <span class="brand-text font-weight-bolder"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden ">
          <div class="os-resize-observer-host observed ">
            <div class="os-resize-observer " style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix "></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4 ">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child " data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home"  >
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p style="font-size: 20px; font-weight:600;color: black;">
                            Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="./?page=appointments" class="nav-link nav-appointments">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p style="font-size: 20px; font-weight:600;color: black;">
                          Add Bookings
                        </p>
                      </a>
                    </li>
                    <?php
                    if ($role_id == 2 || $role_id == 3) {
                    ?>
                        <li class="nav-item dropdown">
                          <a href="./?page=schedule_settings" class="nav-link nav-schedule_settings">
                            <i class="nav-icon fas fa-calendar-day"></i>
                            <p style="font-size: 20px;  font-weight:600;color: black;">
                              Booking Settings
                            </p>
                          </a>
                        </li>

                        <?php } ?>                        
                        
                    
                    <?php
                    if ($role_id == 2) {
                    ?>
                        <li class="nav-item dropdown">
                          <a href="./?page=user/list" class="nav-link nav-user_list">
                            <i class="nav-icon fas fa-users"></i>
                            <p style="font-size: 20px; font-weight:600;color: black;">
                              Manage Users
                            </p>
                          </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                          <a href="./?page=system_info" class="nav-link nav-system_info">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p style="font-size: 20px;  font-weight:600;color: black;">
                              System Settings
                            </p>
                          </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                      <a href="./?page=user/FloorPlan" class="nav-link nav-user_FloorPlan">
                        <i class="nav-icon fas fa-map"></i>
                        <p style="font-size: 20px; font-weight:600;color: black;">
                          Floor Plan
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="./?page=user/Support" class="nav-link nav-user_support">
                        <i class="nav-icon fas fa-info"></i>
                        <p style="font-size: 20px; font-weight:600;color: black;">
                          FAQ's
                        </p>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.replace(/\//g,'_');

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
     
    })
  </script>
