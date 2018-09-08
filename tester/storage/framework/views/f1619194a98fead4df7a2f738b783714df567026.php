<?php 

  if(!($user->role==1 ||$user->role==2 )){
    return redirect('logout');
  }

   if(!$user->password_match){
    if((Request::segment(2) !== 'profile')){ ?>
    <script type="text/javascript">window.location="<?php echo e(url('admin/profile#tab_1_3')); ?>";</script>
    <?php  }
}
?>

<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Procoop Admin</title>
        <meta name="csrf-token" content="<?php echo csrf_token() ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
         <script type="text/javascript"> var tbl_ajax_url=''; </script>

        
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
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                       
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                

                                <?php if(isset($user->img)): ?>

                            <img src="<?php echo e(url('public/images/'.$user->img)); ?>"   class="img-circle" alt="" />

                            <?php else: ?> 

                             <img alt="" class="img-circle" src="<?php echo e(url('/public/images/avtar.png')); ?>" />
                            <?php endif; ?>
                                <span class="username username-hide-on-mobile"> <?php echo e($user->name); ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo url('admin/profile'); ?>">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                               
                                <li>
                                    <a href="<?php echo e(url('admin/logout')); ?>">
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
                
                      

         <?php if($user->role==1): ?>
                        <li class="nav-item  <?php echo e(Request::segment(2) === 'dashboard' ? 'start active open ' : null); ?>"  >
                            <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>


                        <li class="nav-item 

                        <?php echo e(Request::segment(2) === 'users' ? 'start active open ' : null); ?>

                         <?php echo e(Request::segment(2) === 'user' ? 'start active open ' : null); ?>

                         <?php echo e(Request::segment(2) === 'import_user' ? 'start active open ' : null); ?> 
                        <?php echo e(Request::segment(2) === 'add_single_user' ? 'start active open ' : null); ?> 
                         "  >
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Users</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item <?php echo e(Request::segment(2) === 'users' ? 'active' : null); ?> ">
                                    <a href="<?php echo e(url('/admin/users')); ?>" class="nav-link ">
                                        <span class="title">All Users</span>
                                    </a>
                                </li>
                               <li class="nav-item <?php echo e(Request::segment(2) === 'import_user' ? 'active' : null); ?>">
                                    <a href="<?php echo e(url('/admin/import_user')); ?>" class="nav-link ">
                                        <span class="title">Import Users</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::segment(2) === 'add_single_user' ? 'active' : null); ?>">
                                    <a href="<?php echo e(url('/admin/add_single_user')); ?>" class="nav-link ">
                                        <span class="title">Add Single/multiple Users</span>
                                    </a>
                                </li>

                                
                              </ul>
                        </li>

                     <li class="nav-item 
                            <?php echo e(Request::segment(2) === 'wallets' ? 'start active open ' : null); ?>

                      ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Wallets</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                             <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/wallets')); ?>" class="nav-link ">
                                        <span class="title">All Wallets</span>
                                    </a>
                                </li>

                            <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/update_wallet_ind')); ?>" class="nav-link ">
                                        <span class="title">Update wallet – Individual</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/update_wallet_group')); ?>" class="nav-link ">
                                        <span class="title">Update Wallet - Group</span>
                                    </a>
                                </li>
                                
                                


                                <li class="nav-item  <?php echo e(Request::segment(3) === 'new' ? 'active' : null); ?> ">
                                    <a href="<?php echo e(url('/admin/wallets/new')); ?>" class="nav-link ">
                                        <span class="title">Create New</span>
                                    </a>
                                </li> 
                                 <li class="nav-item  <?php echo e(Request::segment(3) === 'import' ? 'active' : null); ?> ">
                                    <a href="<?php echo e(url('/admin/wallets/import')); ?>" class="nav-link ">
                                        <span class="title">Import XLS</span>
                                    </a>
                                </li>

                               </ul>
                        </li>
                         <li class="nav-item  <?php echo e(Request::segment(2) === 'approvers' ? 'start active open ' : null); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Approvers/Admins</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/approvers')); ?>" class="nav-link ">
                                        <span class="title">All Approvers /Admins</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/approvers/new')); ?>" class="nav-link ">
                                        <span class="title">New Approvers/Admins</span>
                                    </a>
                                </li>

                               </ul>
                        </li> 


                         <li class="nav-item  <?php echo e(Request::segment(2) === 'payment_schedule_monthly' ? 'start active open ' : null); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Payment Schedule</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/payment_schedule_monthly')); ?>" class="nav-link ">
                                        <span class="title">Monthly Schedule</span>
                                    </a>
                                </li>
                                 

                               </ul>
                        </li> 


                         <li class="nav-item  <?php echo e(Request::segment(2) === 'facility' ? 'start active open ' : null); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Facility</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/facility')); ?>" class="nav-link ">
                                        <span class="title">All Facility</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/facility/new')); ?>" class="nav-link ">
                                        <span class="title">New Facility</span>
                                    </a>
                                </li>

                             

                               </ul>
                        </li>
                      <li class="nav-item 

                       <?php echo e(Request::segment(2) === 'app_loans' ? 'start active open ' : null); ?>

                        <?php echo e(Request::segment(2) === 'app_facility' ? 'start active open ' : null); ?>

                        <?php echo e(Request::segment(2) === 'app_projects' ? 'start active open ' : null); ?>



                       ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Loan Applications</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                              
                                
                             <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/app_loans')); ?>" class="nav-link ">
                                        <span class="title">Loans</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/app_facility')); ?>" class="nav-link ">
                                        <span class="title"> Facility</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/app_projects')); ?>" class="nav-link ">
                                        <span class="title"> Project</span>
                                    </a>
                                </li>
                               </ul>
                        </li>


                        <li class="nav-item <?php echo e(Request::segment(2) === 'company_domain_name' ? 'start active open ' : null); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">System</span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/company_domain_name')); ?>" class="nav-link ">
                                        <span class="title">Company Domain Name</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
     <?php endif; ?>


     <?php if($user->role==2): ?>
                        <li class="nav-item <?php echo e((Request::is('/admin/dashboard') ? 'start active open' : '')); ?> "  >
                            <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>

                       
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Approvals</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
 
                                
                             <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/app_users')); ?>" class="nav-link ">
                                        <span class="title">Users</span>
                                    </a>
                                </li>

                                
                             <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/app_loans')); ?>" class="nav-link ">
                                        <span class="title">Loans</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/app_facility')); ?>" class="nav-link ">
                                        <span class="title"> Facility</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="<?php echo e(url('/admin/app_projects')); ?>" class="nav-link ">
                                        <span class="title"> Project</span>
                                    </a>
                                </li>
                               </ul>
                        </li>
                       


     <?php endif; ?>


                </ul>
                
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
         <?php echo $__env->yieldContent('content'); ?>;
        </div>
    
        <div class="page-footer">
            <div class="page-footer-inner"> <?php echo date('Y'); ?> &copy; Procoop Nigeria
               
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

       
         <?php echo HTML::script(url('/public/assets/global/plugins/moment.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'));; ?>


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
        <?php if(Request::segment(2) === 'dashboard'): ?>

         <?php echo HTML::script(url('/public/assets/pages/scripts/dashboard.js'));; ?>

        <?php endif; ?>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->

          <?php echo HTML::script(url('/public/assets/global/plugins/select2/js/select2.full.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery-validation/js/jquery.validate.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/jquery-validation/js/additional-methods.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/scripts/app.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/pages/scripts/form-wizard.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/layouts/layout/scripts/layout.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/layouts/layout/scripts/demo.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/layouts/global/scripts/quick-sidebar.min.js'));; ?>




               <?php echo HTML::script(url('/public/assets/pages/scripts/form-validation.js'));; ?>

        <!-- END THEME LAYOUT SCRIPTS -->

        <?php echo HTML::script(url('/public/assets/pages/scripts/profile.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'));; ?>



          
         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/ckeditor/ckeditor.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/lib/markdown.js'));; ?>

         <?php echo HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js'));; ?>


         <?php echo HTML::script(url('/public/assets/global/plugins/bootbox/bootbox.min.js'));; ?>

         <?php echo HTML::script(url('/public/assets/pages/scripts/ui-bootbox.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/pages/scripts/components-bootstrap-switch.min.js'));; ?>

        <?php echo HTML::script(url('/public/assets/custom.js'));; ?>

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

span.toggle-handle.btn.btn-default {
    display: none;
}
.toggle.btn {
    width: 80px !important;
}
.toggle-group {

    top: 5px !important;
}

label.btn.btn-success.toggle-on {
    left: 16px;
}
label.btn.btn-danger.active.toggle-off {
    right: 10px;
}

.btn-success.active, .btn-success:active, .btn-success:hover, .open>.btn-success.dropdown-toggle {
    color: #fff;
    background-color: #36c6d3;
    border-color: #208992;
}

.btn-danger {
    color: #fff;
    background-color: #e73d4a;
    border-color: #ea5460;
}


</style>

</html>

