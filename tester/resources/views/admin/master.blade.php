<?php 

  if(!($user->role==1 ||$user->role==2 )){
    return redirect('logout');
  }

   if(!$user->password_match){
    if((Request::segment(2) !== 'profile')){ ?>
    <script type="text/javascript">window.location="{{url('admin/profile#tab_1_3')}}";</script>
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

        
        {!! Html::style(url('/public/assets/global/plugins/font-awesome/css/font-awesome.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/bootstrap/css/bootstrap.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/uniform/css/uniform.default.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')) !!}
          <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
         
        <!-- END GLOBAL MANDATORY STYLES -->
       {!! Html::style(url('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')) !!}
       {!! Html::style(url('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')) !!}   
       {!! Html::style(url('/public/assets/global/plugins/datatables/datatables.min.css')) !!}

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::style(url('/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/morris/morris.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/fullcalendar/fullcalendar.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')) !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! Html::style(url('/public/assets/global/css/components.min.css')) !!}
        {!! Html::style(url('/public/assets/global/css/plugins.min.css')) !!}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        {!! Html::style(url('/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')) !!}
        {!! Html::style(url('/public/assets/pages/css/profile.min.css')) !!}
        {!! Html::style(url('/public/assets/layouts/layout/css/layout.min.css')) !!}
        {!! Html::style(url('/public/assets/layouts/layout/css/themes/darkblue.min.css')) !!}
        {!! Html::style(url('/public/assets/layouts/layout/css/custom.min.css')) !!}
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
                        <img src="{{url('public/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
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
                                

                                @if(isset($user->img))

                            <img src="{{url('public/images/'.$user->img)}}"   class="img-circle" alt="" />

                            @else 

                             <img alt="" class="img-circle" src="{{url('/public/images/avtar.png')}}" />
                            @endif
                                <span class="username username-hide-on-mobile"> {{$user->name}} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{!!url('admin/profile')!!}">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                               
                                <li>
                                    <a href="{{url('admin/logout')}}">
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
                
                      

         @if($user->role==1)
                        <li class="nav-item  {{ Request::segment(2) === 'dashboard' ? 'start active open ' : null }}"  >
                            <a href="{{url('admin/dashboard')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>


                        <li class="nav-item 

                        {{ Request::segment(2) === 'users' ? 'start active open ' : null }}
                         {{ Request::segment(2) === 'user' ? 'start active open ' : null }}
                         {{ Request::segment(2) === 'import_user' ? 'start active open ' : null }} 
                        {{ Request::segment(2) === 'add_single_user' ? 'start active open ' : null }} 
                         "  >
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Users</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item {{ Request::segment(2) === 'users' ? 'active' : null }} ">
                                    <a href="{{url('/admin/users')}}" class="nav-link ">
                                        <span class="title">All Users</span>
                                    </a>
                                </li>
                               <li class="nav-item {{ Request::segment(2) === 'import_user' ? 'active' : null }}">
                                    <a href="{{url('/admin/import_user')}}" class="nav-link ">
                                        <span class="title">Import Users</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::segment(2) === 'add_single_user' ? 'active' : null }}">
                                    <a href="{{url('/admin/add_single_user')}}" class="nav-link ">
                                        <span class="title">Add Single/multiple Users</span>
                                    </a>
                                </li>

                                
                              </ul>
                        </li>

                     <li class="nav-item 
                            {{ Request::segment(2) === 'wallets' ? 'start active open ' : null }}
                      ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Wallets</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                             <li class="nav-item  ">
                                    <a href="{{url('/admin/wallets')}}" class="nav-link ">
                                        <span class="title">All Wallets</span>
                                    </a>
                                </li>

                            <li class="nav-item  ">
                                    <a href="{{url('/admin/update_wallet_ind')}}" class="nav-link ">
                                        <span class="title">Update wallet – Individual</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('/admin/update_wallet_group')}}" class="nav-link ">
                                        <span class="title">Update Wallet - Group</span>
                                    </a>
                                </li>
                                
                                


                                <li class="nav-item  {{ Request::segment(3) === 'new' ? 'active' : null }} ">
                                    <a href="{{url('/admin/wallets/new')}}" class="nav-link ">
                                        <span class="title">Create New</span>
                                    </a>
                                </li> 
                                 <li class="nav-item  {{ Request::segment(3) === 'import' ? 'active' : null }} ">
                                    <a href="{{url('/admin/wallets/import')}}" class="nav-link ">
                                        <span class="title">Import XLS</span>
                                    </a>
                                </li>

                               </ul>
                        </li>
                         <li class="nav-item  {{ Request::segment(2) === 'approvers' ? 'start active open ' : null }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Approvers/Admins</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item  ">
                                    <a href="{{url('/admin/approvers')}}" class="nav-link ">
                                        <span class="title">All Approvers /Admins</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="{{url('/admin/approvers/new')}}" class="nav-link ">
                                        <span class="title">New Approvers/Admins</span>
                                    </a>
                                </li>

                               </ul>
                        </li> 


                         <li class="nav-item  {{ Request::segment(2) === 'payment_schedule_monthly' ? 'start active open ' : null }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Payment Schedule</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item  ">
                                    <a href="{{url('/admin/payment_schedule_monthly')}}" class="nav-link ">
                                        <span class="title">Monthly Schedule</span>
                                    </a>
                                </li>
                                 

                               </ul>
                        </li> 


                         <li class="nav-item  {{ Request::segment(2) === 'facility' ? 'start active open ' : null }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Facility</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                               <li class="nav-item  ">
                                    <a href="{{url('/admin/facility')}}" class="nav-link ">
                                        <span class="title">All Facility</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="{{url('/admin/facility/new')}}" class="nav-link ">
                                        <span class="title">New Facility</span>
                                    </a>
                                </li>

                             

                               </ul>
                        </li>
                      <li class="nav-item 

                       {{ Request::segment(2) === 'app_loans' ? 'start active open ' : null }}
                        {{ Request::segment(2) === 'app_facility' ? 'start active open ' : null }}
                        {{ Request::segment(2) === 'app_projects' ? 'start active open ' : null }}


                       ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Loan Applications</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                              
                                
                             <li class="nav-item  ">
                                    <a href="{{url('/admin/app_loans')}}" class="nav-link ">
                                        <span class="title">Loans</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="{{url('/admin/app_facility')}}" class="nav-link ">
                                        <span class="title"> Facility</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('/admin/app_projects')}}" class="nav-link ">
                                        <span class="title"> Project</span>
                                    </a>
                                </li>
                               </ul>
                        </li>


                        <li class="nav-item {{ Request::segment(2) === 'company_domain_name' ? 'start active open ' : null }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">System</span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{url('/admin/company_domain_name')}}" class="nav-link ">
                                        <span class="title">Company Domain Name</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
     @endif


     @if($user->role==2)
                        <li class="nav-item {{ (Request::is('/admin/dashboard') ? 'start active open' : '') }} "  >
                            <a href="{{url('admin/dashboard')}}" class="nav-link nav-toggle">
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
                                    <a href="{{url('/admin/app_users')}}" class="nav-link ">
                                        <span class="title">Users</span>
                                    </a>
                                </li>

                                
                             <li class="nav-item  ">
                                    <a href="{{url('/admin/app_loans')}}" class="nav-link ">
                                        <span class="title">Loans</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="{{url('/admin/app_facility')}}" class="nav-link ">
                                        <span class="title"> Facility</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('/admin/app_projects')}}" class="nav-link ">
                                        <span class="title"> Project</span>
                                    </a>
                                </li>
                               </ul>
                        </li>
                       


     @endif


                </ul>
                
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
         @yield('content');
        </div>
    
        <div class="page-footer">
            <div class="page-footer-inner"> <?php echo date('Y'); ?> &copy; Procoop Nigeria
               
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->

         {!! HTML::script(url('/public/assets/global/plugins/jquery.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap/js/bootstrap.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/js.cookie.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jquery.blockui.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/uniform/jquery.uniform.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); !!}
       
         {!! HTML::script(url('/public/assets/global/plugins/moment.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')); !!}

        {!! HTML::script(url('/public/assets/global/scripts/datatable.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/datatables/datatables.min.js')); !!}
        {!! HTML::script(url('/public/assets/pages/scripts/table-datatables-responsive.min.js')); !!}
  
        {!! HTML::script(url('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); !!}



         {!! HTML::script(url('/public/assets/global/plugins/morris/morris.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/morris/raphael-min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/counterup/jquery.waypoints.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/counterup/jquery.counterup.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/amcharts.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/serial.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/pie.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/radar.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/themes/light.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/themes/patterns.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amcharts/themes/chalk.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/ammap/ammap.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/amcharts/amstockcharts/amstock.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/fullcalendar/fullcalendar.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/flot/jquery.flot.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/flot/jquery.flot.resize.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/flot/jquery.flot.categories.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jquery.sparkline.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')); !!}/a
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
         
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @if(Request::segment(2) === 'dashboard')

         {!! HTML::script(url('/public/assets/pages/scripts/dashboard.js')); !!}
        @endif
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->

          {!! HTML::script(url('/public/assets/global/plugins/select2/js/select2.full.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jquery-validation/js/jquery.validate.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jquery-validation/js/additional-methods.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/scripts/app.min.js')); !!}
         {!! HTML::script(url('/public/assets/pages/scripts/form-wizard.min.js')); !!}
         {!! HTML::script(url('/public/assets/layouts/layout/scripts/layout.min.js')); !!}
         {!! HTML::script(url('/public/assets/layouts/layout/scripts/demo.min.js')); !!}
         {!! HTML::script(url('/public/assets/layouts/global/scripts/quick-sidebar.min.js')); !!}



               {!! HTML::script(url('/public/assets/pages/scripts/form-validation.js')); !!}
        <!-- END THEME LAYOUT SCRIPTS -->

        {!! HTML::script(url('/public/assets/pages/scripts/profile.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')); !!}


          
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/ckeditor/ckeditor.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/lib/markdown.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootbox/bootbox.min.js')); !!}
         {!! HTML::script(url('/public/assets/pages/scripts/ui-bootbox.min.js')); !!}
        {!! HTML::script(url('/public/assets/pages/scripts/components-bootstrap-switch.min.js')); !!}
        {!! HTML::script(url('/public/assets/custom.js')); !!}
        {!! HTML::script(url('/public/assets/table-datatables-ajax.js')); !!}

 



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

