
<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Procoop User</title>
         <meta name="csrf-token" content="<?php echo csrf_token() ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"> 
       <?php echo Html::style(url('/public/assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?>

        <?php echo Html::style(url('/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>

        <?php echo Html::style(url('/public/assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>

        <?php echo Html::style(url('/public/assets/global/plugins/uniform/css/uniform.default.css')); ?>

        <?php echo Html::style(url('/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>

          <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
         
        <!-- END GLOBAL MANDATORY STYLES -->
       <?php echo Html::style(url('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')); ?>

       <?php echo Html::style(url('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')); ?>   
      <?php echo Html::style(url('/public/assets/global/plugins/datatables/datatables.min.css')); ?>


        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo Html::style(url('/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')); ?>

        <?php echo Html::style(url('/public/assets/global/plugins/morris/morris.css')); ?>

        <?php echo Html::style(url('/public/assets/global/plugins/fullcalendar/fullcalendar.min.css')); ?>

        <?php echo Html::style(url('/public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')); ?>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <?php echo Html::style(url('/public/assets/global/css/components.min.css')); ?>

        <?php echo Html::style(url('/public/assets/global/css/plugins.min.css')); ?>

        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <?php echo Html::style(url('/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?>

        <?php echo Html::style(url('/public/assets/pages/css/profile.min.css')); ?>

        <?php echo Html::style(url('/public/assets/layouts/layout/css/layout.min.css')); ?>

        <?php echo Html::style(url('/public/assets/layouts/layout/css/themes/darkblue.min.css')); ?>

        <?php echo Html::style(url('/public/assets/layouts/layout/css/custom.min.css')); ?>

        <!-- END THEME LAYOUT STYLES -->
       
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="<?php echo e(url('public/assets/layouts/layout/img/logo.png')); ?>" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
             
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
               
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                           <?php if(isset($user->img)): ?>
                            <img src="<?php echo e(url('public/upload/'.App\Common\Common::getFile(['id'=>$user->img]))); ?>" alt=""  class="img-circle" /> 
                            <?php else: ?> 
                            <img src="<?php echo e(url('/public/images/avtar.png')); ?>" alt="" class="img-circle" /> 
                            <?php endif; ?>
                                <span class="username username-hide-on-mobile"> <?php echo e($user->name); ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo e(url('profile')); ?>">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('logout')); ?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                       
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
<!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                   
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                
                     
                        <li class="nav-item start active open">
                            <a href="<?php echo e(url('dashboard')); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                          
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Wallets</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('wallet_summary')); ?>/1" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Contributions</span>
                                <span class="arrow"></span>
                            </a>
                            <!-- <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="ui_colors.html" class="nav-link ">
                                        <span class="title">Color Library</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_general.html" class="nav-link ">
                                        <span class="title">General Components</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_buttons.html" class="nav-link ">
                                        <span class="title">Buttons</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_confirmations.html" class="nav-link ">
                                        <span class="title">Popover Confirmations</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_icons.html" class="nav-link ">
                                        <span class="title">Font Icons</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_socicons.html" class="nav-link ">
                                        <span class="title">Social Icons</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_typography.html" class="nav-link ">
                                        <span class="title">Typography</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_tabs_accordions_navs.html" class="nav-link ">
                                        <span class="title">Tabs, Accordions & Navs</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_timeline.html" class="nav-link ">
                                        <span class="title">Timeline</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_tree.html" class="nav-link ">
                                        <span class="title">Tree View</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Page Progress Bar</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="ui_page_progress_style_1.html" class="nav-link "> Flash </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="ui_page_progress_style_2.html" class="nav-link "> Big Counter </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_blockui.html" class="nav-link ">
                                        <span class="title">Block UI</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_bootstrap_growl.html" class="nav-link ">
                                        <span class="title">Bootstrap Growl Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_notific8.html" class="nav-link ">
                                        <span class="title">Notific8 Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_toastr.html" class="nav-link ">
                                        <span class="title">Toastr Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_bootbox.html" class="nav-link ">
                                        <span class="title">Bootbox Dialogs</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_alerts_api.html" class="nav-link ">
                                        <span class="title">Metronic Alerts API</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_session_timeout.html" class="nav-link ">
                                        <span class="title">Session Timeout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_idle_timeout.html" class="nav-link ">
                                        <span class="title">User Idle Timeout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_modals.html" class="nav-link ">
                                        <span class="title">Modals</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_extended_modals.html" class="nav-link ">
                                        <span class="title">Extended Modals</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_tiles.html" class="nav-link ">
                                        <span class="title">Tiles</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_datepaginator.html" class="nav-link ">
                                        <span class="title">Date Paginator<
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('loans')); ?>" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Loans</span>
                                <span class="arrow"></span>
                            </a>
                            <!-- <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="form_controls.html" class="nav-link ">
                                        <span class="title">Bootstrap Form
                                            <br>Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_controls_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation.html" class="nav-link ">
                                        <span class="title">Form Validation</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation_states_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Validation States</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Validation</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_layouts.html" class="nav-link ">
                                        <span class="title">Form Layouts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_input_mask.html" class="nav-link ">
                                        <span class="title">Form Input Mask</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_editable.html" class="nav-link ">
                                        <span class="title">Form X-editable</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_wizard.html" class="nav-link ">
                                        <span class="title">Form Wizard</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_icheck.html" class="nav-link ">
                                        <span class="title">iCheck Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_image_crop.html" class="nav-link ">
                                        <span class="title">Image Cropping</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_fileupload.html" class="nav-link ">
                                        <span class="title">Multiple File Upload</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_dropzone.html" class="nav-link ">
                                        <span class="title">Dropzone File Upload</span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('wallet_summary')); ?>/2" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Loans</span>
                                <span class="arrow"></span>
                            </a>
                         
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('wallet_summary')); ?>/3" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Quick Cash</span>
                                <span class="arrow"></span>
                            </a>
                         
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('wallet_summary')); ?>/4" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Projects</span>
                                <span class="arrow"></span>
                            </a>
                         
                        </li>
                       
                      
                        
                        <li class="heading">
                            <h3 class="uppercase">MY APPLICATIONS</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('newapplication')); ?>" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">New Electronic Applications</span>
                                <span class="arrow"></span>
                            </a>
                           <!--  <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="layout_blank_page.html" class="nav-link ">
                                        <span class="title">Blank Page</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_classic_page_head.html" class="nav-link ">
                                        <span class="title">Classic Page Head</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_light_page_head.html" class="nav-link ">
                                        <span class="title">Light Page Head</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_content_grey.html" class="nav-link ">
                                        <span class="title">Grey Bg Content</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_search_on_header_1.html" class="nav-link ">
                                        <span class="title">Search Box On Header 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_search_on_header_2.html" class="nav-link ">
                                        <span class="title">Search Box On Header 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_language_bar.html" class="nav-link ">
                                        <span class="title">Header Language Bar</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_footer_fixed.html" class="nav-link ">
                                        <span class="title">Fixed Footer</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_boxed_page.html" class="nav-link ">
                                        <span class="title">Boxed Page</span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item  ">
                            
                            <!-- <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_menu_light.html" class="nav-link ">
                                        <span class="title">Light Sidebar Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_menu_hover.html" class="nav-link ">
                                        <span class="title">Hover Sidebar Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_search_1.html" class="nav-link ">
                                        <span class="title">Sidebar Search Option 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_search_2.html" class="nav-link ">
                                        <span class="title">Sidebar Search Option 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_toggler_on_sidebar.html" class="nav-link ">
                                        <span class="title">Sidebar Toggler On Sidebar</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_reversed.html" class="nav-link ">
                                        <span class="title">Reversed Sidebar Page</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_fixed.html" class="nav-link ">
                                        <span class="title">Fixed Sidebar Layout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_closed.html" class="nav-link ">
                                        <span class="title">Closed Sidebar Layout</span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('application/loans')); ?>" class="nav-link nav-toggle">
                                <i class="icon-paper-plane"></i>
                                <span class="title">Loans</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                          <li class="nav-item  ">
                          <a href="<?php echo e(url('application/facility')); ?>" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Facility</span>
                                <span class="arrow"></span>
                            </a>
                          </li>  
                        <li class="nav-item  ">
                            <a href="<?php echo e(url('application/projects')); ?>" class="nav-link nav-toggle">
                                <i class=" icon-wrench"></i>
                                <span class="title">Projects</span>
                                <span class="arrow"></span>
                            </a>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
    
       <?php echo $__env->yieldContent('content'); ?>;
        </div>
    
        <div class="page-footer">
            <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->

        
         <?php echo HTML::script(url('/public/assets/global/plugins/jquery.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap/js/bootstrap.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/js.cookie.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery.blockui.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/uniform/jquery.uniform.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'));; ?>

          <?php echo HTML::script(url('/public/assets/custom.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/moment.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'));; ?>

<?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/scripts/app.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/pages/scripts/form-wizard.min.js'));; ?>



        <?php echo HTML::script(url('/public/assets/global/scripts/datatable.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/datatables/datatables.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/pages/scripts/table-datatables-responsive.min.js'));; ?>

  
        <?php echo HTML::script(url('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'));; ?>

        
        <?php echo HTML::script(url('/public/assets/global/plugins/morris/morris.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/morris/raphael-min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/counterup/jquery.waypoints.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/counterup/jquery.counterup.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/amcharts.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/serial.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/pie.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/radar.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/themes/light.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/themes/patterns.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/themes/chalk.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/ammap/ammap.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/amcharts/amstockcharts/amstock.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/fullcalendar/fullcalendar.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/flot/jquery.flot.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/flot/jquery.flot.resize.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/flot/jquery.flot.categories.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery.sparkline.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js'));; ?>/a
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         <?php echo HTML::script(url('/public/assets/pages/scripts/dashboard.min.js'));; ?>

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
         <?php echo HTML::script(url('/public/assets/layouts/layout/scripts/layout.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/layouts/layout/scripts/demo.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/layouts/global/scripts/quick-sidebar.min.js'));; ?>

               <?php echo HTML::script(url('/public/assets/pages/scripts/form-validation.min.js'));; ?>

        <!-- END THEME LAYOUT SCRIPTS -->

        <?php echo HTML::script(url('/public/assets/pages/scripts/profile.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'));; ?>





           <?php echo HTML::script(url('/public/assets/global/plugins/select2/js/select2.full.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery-validation/js/additional-methods.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/ckeditor/ckeditor.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/lib/markdown.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js'));; ?>


         <?php echo HTML::script(url('/public/assets/global/plugins/bootbox/bootbox.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/pages/scripts/ui-bootbox.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/pages/scripts/components-bootstrap-switch.min.js'));; ?>

     
        <?php echo HTML::script(url('/public/assets/table-datatables-ajax.js'));; ?>


      
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    </body>
<style type="text/css">
    
    .page-sidebar .page-sidebar-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a {
    color: #fdfdfd;
}
.page-sidebar .page-sidebar-menu>li.heading>h3, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.heading>h3 {
    color: #d7de76;
}

.help-block {
    display: block;
    margin-top: 5px !important;
    margin-bottom: 10px !important;
    color: #f36a5a;
}
</style>

</html>

 <style type="text/css">
.smetext {
    color: black;
    margin-left: auto;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-color: black;
    margin-bottom: 10px;
        text-align: center;

}
 </style>                                                       <!-- end  -->
