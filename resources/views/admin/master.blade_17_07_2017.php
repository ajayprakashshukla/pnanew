

<!DOCTYPE html>



<html lang="en">

    <!--<![endif]-->

    <!-- BEGIN HEAD -->



    <head>

        <meta charset="utf-8" />

        <title>Popcake Admin</title>

        <meta name="csrf-token" content="<?php echo csrf_token() ?>" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="" name="description" />

        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->


        {!! Html::style(url('/public/assets/global/plugins/font-awesome/css/font-awesome.min.css')) !!}

        {!! Html::style(url('/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')) !!}

        {!! Html::style(url('/public/assets/global/plugins/bootstrap/css/bootstrap.min.css')) !!}

        {!! Html::style(url('/public/assets/global/plugins/uniform/css/uniform.default.css')) !!}

        {!! Html::style(url('/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')) !!}

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

        {!! Html::style(url('/public/assets/layouts/layout/css/layout.min.css')) !!}

        {!! Html::style(url('/public/assets/layouts/layout/css/themes/darkblue.min.css')) !!}

        {!! Html::style(url('/public/assets/layouts/layout/css/custom.min.css')) !!}
        
        {!! Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')) !!}
        {!! Html::style(url('public/assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}


        
        
        
        
        
        
        
        
        
        
        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <script> var ajax_datatable_url=''; </script>
    <!-- END HEAD -->



    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

        <!-- BEGIN HEADER -->

        <div class="page-header navbar navbar-fixed-top">

            <!-- BEGIN HEADER INNER -->

            <div class="page-header-inner ">

                <!-- BEGIN LOGO -->

                <div class="page-logo">
				  <?php /*<a href="index.html">*/ ?>
                    <a href="<?php echo url('/')."/dashboard"; ?>">

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


                                <span class="username username-hide-on-mobile"> {{$user->name}} </span>

                                <i class="fa fa-angle-down"></i>

                            </a>

                            <ul class="dropdown-menu dropdown-menu-default">

                                <li>

                                    <?php /*
									<a href="page_user_profile_1.html">
									*/ ?>
									
                                    <a href="{{url('profile/MQ==')}}">

                                        <i class="icon-user"></i> My Profile </a>

                                </li>

                               

                                <li>

                                    <a href="{{url('logout')}}">

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

                

                     

                        <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'start active open ' : null }}">

                            <a href="{{url('dashboard')}}" class="nav-link nav-toggle">

                                <i class="icon-home"></i>

                                <span class="title">Dashboard</span>

                                <span class="selected"></span>


                            </a>

                          

                        </li>

                         <li class="nav-item {{ Request::segment(1) === 'customer' ? 'start active open ' : null }}  ">

                            <a href="{{url('customer')}}" class="nav-link nav-toggle">

                                <i class="icon-user"></i>

                                <span class="title"> Customer</span>


                            </a>
                             
                         </li>   
                         <li class="nav-item 
                             {{ Request::segment(1) === 'machines' ? 'start active open ' : null }} 
                             {{ Request::segment(1) === 'new_machine' ? 'start active open ' : null }} 
                         ">

                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title"> Machine</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                                 <li class="nav-item  ">
                                    <a href="{{url('machines')}}" class="nav-link ">
                                        <span class="title">All Machine</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('new_machine')}}" class="nav-link ">
                                        <span class="title">Add Machine</span>
                                    </a>
                                </li>
                             </ul>
                         </li>   
                         
                          
                         <li class="nav-item {{ Request::segment(1) === 'components' ? 'start active open ' : null }}   ">

                            <a href="{{url('components')}}" class="nav-link nav-toggle">

                                <i class="icon-wrench"></i>

                                <span class="title">  Parts </span>

                              

                            </a>
                             
                         </li>    

                      
                     <li class="nav-item 
                        {{ Request::segment(1) === 'machine_query' ? 'start active open ' : null }} 
                        {{ Request::segment(1) === 'customer_query' ? 'start active open ' : null }}  
                        {{ Request::segment(1) === 'machine_location_query' ? 'start active open ' : null }} 
                        {{ Request::segment(1) === 'transaction_type_query' ? 'start active open ' : null }}  
                        {{ Request::segment(1) === 'part_query' ? 'start active open ' : null }} 
                        {{ Request::segment(1) === 'part_failure_query' ? 'start active open ' : null }}  
                        
                        {{ Request::segment(1) === 'machine_location_query' ? 'start active open ' : null }}  
                        {{ Request::segment(1) === 'return_not_received' ? 'start active open ' : null }}  
                    ">

                            <a href="javascript:;" class="nav-link nav-toggle">

                                <i class="icon-diamond"></i>

                                <span class="title">Queries/Reports</span>
                                 <span class="arrow"></span>

                            </a>

                             <ul class="sub-menu">

                               <li class="nav-item  ">

                                    <a href="{{url('/machine_query')}}" class="nav-link ">

                                        <span class="title">Machine Query</span>

                                    </a>

                                </li>

                                 <li class="nav-item  ">
                                    <a href="{{url('/customer_query')}}" class="nav-link ">
                                        <span class="title">Customer Query</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="{{url('/machine_location_query')}}" class="nav-link ">
                                        <span class="title">Current Machine Location Query</span>
                                    </a>
                                </li>

                                 <li class="nav-item  ">
                                    <a href="{{url('/transaction_type_query')}}" class="nav-link ">
                                        <span class="title">Transaction Type Query </span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="{{url('/return_not_received')}}" class="nav-link ">
                                        <span class="title">Returned Not Received </span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="{{url('/part_query')}}" class="nav-link ">
                                        <span class="title">Part Query </span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="{{url('/part_failure_query')}}" class="nav-link ">
                                        <span class="title">Part Failure Query  </span>
                                    </a>
                                </li>

                               </ul>

                        </li>


                        <li class="nav-item 
                          {{ Request::segment(1) === 'location' ? 'start active open ' : null }} 
                          {{ Request::segment(1) === 'new_location' ? 'start active open ' : null }} 
                         ">

                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title"> Location</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                                 <li class="nav-item  ">
                                    <a href="{{url('location')}}" class="nav-link ">
                                        <span class="title">All Location</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('new_location')}}" class="nav-link ">
                                        <span class="title">New Location</span>
                                    </a>
                                </li>
                             </ul>
                         </li> 


                   @if($user->id==1)

                        <li class="nav-item 
                          {{ Request::segment(1) === 'users' ? 'start active open ' : null }} 
                          {{ Request::segment(1) === 'new_user' ? 'start active open ' : null }} 
                         ">

                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title"> Users</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                                 <li class="nav-item  ">
                                    <a href="{{url('users')}}" class="nav-link ">
                                        <span class="title">All Users</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('new_user')}}" class="nav-link ">
                                        <span class="title">New User</span>
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


<script>
var MachineJson    =<?php  echo json_encode(isset($Machine) ? $Machine:array()); ?>; 
var ProductJson    =<?php echo json_encode(isset($Product)?$Product :array()); ?> ;
var CustomerJson   =<?php echo json_encode(isset($Customer)?$Customer:array() ); ?> ;
var LocationJson   =<?php echo json_encode(isset($Location)?$Location:array() ); ?> ;
</script>    
            
           


                                 

         @yield('content');

        </div>

    

        <div class="page-footer" style="text-align: center">

            <div style="float:none" class="page-footer-inner">{{date('Y')}} &copy; Popcake-NA.com.


            </div>

            <div class="scroll-to-top">

                <i class="icon-arrow-up"></i>

            </div>

        </div>
             <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                               {{Form::open(['url'=>'#','id'=>'form_sample_2','class'=>'form-horizontal form_sample transactions_form','files'=>true   ]) }}
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title" id="transaction_name">transaction Nem </h4>
                                    </div>
                                       <div class="modal-body">
                                        <input type="hidden" name="transactions_types" id="transactions_types">
                                        <div id="form_body">
                                                
                                         </div>
                                          
                                      </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn green">Submit</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                  {{ Form::close()}} 
                                </div>
            </div>    
        <!-- END FOOTER --> 

        
        
        
        
        
        
        
        
        
        
        

         {!! HTML::script(url('/public/assets/global/plugins/jquery.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap/js/bootstrap.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/js.cookie.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootbox/bootbox.min.js')); !!}
         {!! HTML::script(url('/public/assets/pages/scripts/ui-bootbox.min.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/jquery.blockui.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/uniform/jquery.uniform.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); !!}

       

         {!! HTML::script(url('/public/assets/global/plugins/moment.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')); !!}



        {!! HTML::script(url('/public/assets/global/scripts/datatable.js')); !!}

        {!! HTML::script(url('/public/assets/global/plugins/datatables/datatables.min.js')); !!}

        {!! HTML::script(url('/public/assets/pages/scripts/table-datatables-responsive.min.js')); !!}

  

        {!! HTML::script(url('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); !!}

        {!! HTML::script(url('/public/assets/custom.js')); !!}





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

         {!! HTML::script(url('/public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')); !!}

        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->

         {!! HTML::script(url('/public/assets/global/scripts/app.min.js')); !!}

        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->

         {!! HTML::script(url('/public/assets/pages/scripts/dashboard.min.js')); !!}

        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->

         {!! HTML::script(url('/public/assets/layouts/layout/scripts/layout.min.js')); !!}

         {!! HTML::script(url('/public/assets/layouts/layout/scripts/demo.min.js')); !!}

         {!! HTML::script(url('/public/assets/layouts/global/scripts/quick-sidebar.min.js')); !!}

               {!! HTML::script(url('/public/assets/form-validation.js')); !!}

        <!-- END THEME LAYOUT SCRIPTS -->







     

         {!! HTML::script(url('/public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/jquery-validation/js/additional-methods.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/ckeditor/ckeditor.js')); !!}

         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/lib/markdown.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')); !!}
         {!! HTML::script(url('/public/assets/pages/scripts/table-datatables-ajax.js')); !!}
         {!! HTML::script(url('/public/assets/global/plugins/select2/js/select2.full.min.js')); !!}


    </body>

<style type="text/css">
    .select2-container--default .select2-selection--single .select2-selection__rendered {    
    line-height: 20px!important;
}
    

    .page-sidebar .page-sidebar-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a {

    color: #fdfdfd;

}

.page-sidebar .page-sidebar-menu>li.heading>h3, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.heading>h3 {

    color: #d7de76;

}



/*.select2-container--open .select2-dropdown {
    left: 0;
    overflow: scroll;
    height: 217px;
    max-height: 217px;
}*/
span.select2-selection.select2-selection--single {
    border: 1px solid #c2cad8;
}


.select2-selection {
    padding-top: 3px !important;
}

.select2-container{
    width: 100% !important;
}


.help-block {

    color: #e43a45 !important;
}


</style>







</html>