@extends('admin.master')
@section('content')
 {!! Html::style(url('/public/assets/pages/css/profile.min.css')); !!}           
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>

                                <span>User</span>
                            </li>
                            <li>
                            <i class="fa fa-circle"></i>
                                <span>{{$details->name}}</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> {{$details->name}}
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                     <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="1349">1349</span>
                                    </div>
                                    <div class="desc"> Contributions </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="12,5">12,5</span>M$ </div>
                                    <div class="desc"> Quick cash</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="549">549</span>
                                    </div>
                                    <div class="desc"> Loans </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> +
                                        <span data-counter="counterup" data-value="89">89</span>% </div>
                                    <div class="desc"> Projects </div>
                                </div>
                            </a>
                        </div>
                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Wallets</span>
                                                    <span class="caption-helper">(45) </span>
                                                </div>
                                                <div class="inputs">
                                                    <div class="portlet-input input-inline input-small ">
                                                        <div class="input-icon right">
                                                            <i class="icon-magnifier"></i>
                                                            <input type="text" class="form-control form-control-solid" placeholder="search..."> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                    <div class="general-item-list">
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic" src="{{url('public/assets/pages/media/users/avatar4.jpg')}}">
                                                                    <a href="" class="item-name primary-link">Nick Larson</a>
                                                                    <span class="item-label">3 hrs ago</span>
                                                                </div>
                                                                <span class="item-status">
                                                                    <span class="badge badge-empty badge-success"></span> Open</span>
                                                            </div>
                                                            <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic" src="{{url('public/assets/pages/media/users/avatar3.jpg')}}">
                                                                    <a href="" class="item-name primary-link">Mark</a>
                                                                    <span class="item-label">5 hrs ago</span>
                                                                </div>
                                                                <span class="item-status">
                                                                    <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                            </div>
                                                            <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet. </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic" src="{{url('public/assets/pages/media/users/avatar6.jpg')}}">
                                                                    <a href="" class="item-name primary-link">Nick Larson</a>
                                                                    <span class="item-label">8 hrs ago</span>
                                                                </div>
                                                                <span class="item-status">
                                                                    <span class="badge badge-empty badge-primary"></span> Closed</span>
                                                            </div>
                                                            <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh. </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic" src="{{url('public/assets/pages/media/users/avatar7.jpg')}}">
                                                                    <a href="" class="item-name primary-link">Nick Larson</a>
                                                                    <span class="item-label">12 hrs ago</span>
                                                                </div>
                                                                <span class="item-status">
                                                                    <span class="badge badge-empty badge-danger"></span> Pending</span>
                                                            </div>
                                                            <div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic" src="{{url('public/assets/pages/media/users/avatar9.jpg')}}">
                                                                    <a href="" class="item-name primary-link">Richard Stone</a>
                                                                    <span class="item-label">2 days ago</span>
                                                                </div>
                                                                <span class="item-status">
                                                                    <span class="badge badge-empty badge-danger"></span> Open</span>
                                                            </div>
                                                            <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat. </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic" src="{{url('public/assets/pages/media/users/avatar8.jpg')}}">
                                                                    <a href="" class="item-name primary-link">Dan</a>
                                                                    <span class="item-label">3 days ago</span>
                                                                </div>
                                                                <span class="item-status">
                                                                    <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                            </div>
                                                            <div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                    <img class="item-pic" src="{{url('public/assets/pages/media/users/avatar2.jpg')}}">
                                                                    <a href="" class="item-name primary-link">Larry</a>
                                                                    <span class="item-label">4 hrs ago</span>
                                                                </div>
                                                                <span class="item-status">
                                                                    <span class="badge badge-empty badge-success"></span> Open</span>
                                                            </div>
                                                            <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PORTLET -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light  tasks-widget">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Tasks</span>
                                                    <span class="caption-helper">16 pending</span>
                                                </div>
                                                <div class="inputs">
                                                    <div class="portlet-input input-small input-inline">
                                                        <div class="input-icon right">
                                                            <i class="icon-magnifier"></i>
                                                            <input type="text" class="form-control form-control-solid" placeholder="search..."> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="task-content">
                                                    <div class="scroller" style="height: 282px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                        <!-- START TASK LIST -->
                                                        <ul class="task-list">
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="hidden" value="1" name="test" />
                                                                    <input type="checkbox" class="liChild" value="2" name="test" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> Present 2013 Year IPO Statistics at Board Meeting </span>
                                                                    <span class="label label-sm label-success">Company</span>
                                                                    <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> Hold An Interview for Marketing Manager Position </span>
                                                                    <span class="label label-sm label-danger">Marketing</span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> AirAsia Intranet System Project Internal Meeting </span>
                                                                    <span class="label label-sm label-success">AirAsia</span>
                                                                    <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> Technical Management Meeting </span>
                                                                    <span class="label label-sm label-warning">Company</span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> Kick-off Company CRM Mobile App Development </span>
                                                                    <span class="label label-sm label-info">Internal Products</span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> Prepare Commercial Offer For SmartVision Website Rewamp </span>
                                                                    <span class="label label-sm label-danger">SmartVision</span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> Sign-Off The Comercial Agreement With AutoSmart </span>
                                                                    <span class="label label-sm label-default">AutoSmart</span>
                                                                    <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> Company Staff Meeting </span>
                                                                    <span class="label label-sm label-success">Cruise</span>
                                                                    <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="last-line">
                                                                <div class="task-checkbox">
                                                                    <input type="checkbox" class="liChild" value="" /> </div>
                                                                <div class="task-title">
                                                                    <span class="task-title-sp"> KeenThemes Investment Discussion </span>
                                                                    <span class="label label-sm label-warning">KeenThemes </span>
                                                                </div>
                                                                <div class="task-config">
                                                                    <div class="task-config-btn btn-group">
                                                                        <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                            <i class="fa fa-cog"></i>
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu pull-right">
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-check"></i> Complete </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <!-- END START TASK LIST -->
                                                    </div>
                                                </div>
                                                <div class="task-footer">
                                                    <div class="btn-arrow-link pull-right">
                                                        <a href="javascript:;">See All Tasks</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PORTLET -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-microphone font-green"></i>
                                                    <span class="caption-subject bold font-green uppercase"> Timeline</span>
                                                    <span class="caption-helper">user timeline</span>
                                                </div>
                                                <div class="actions">
                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="timeline">
                                                    <!-- TIMELINE ITEM -->
                                                    <div class="timeline-item">
                                                        <div class="timeline-badge">
                                                            <img class="timeline-badge-userpic" src="{{url('public/assets/pages/media/users/avatar80_2.jpg')}}"> </div>
                                                        <div class="timeline-body">
                                                            <div class="timeline-body-arrow"> </div>
                                                            <div class="timeline-body-head">
                                                                <div class="timeline-body-head-caption">
                                                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">Lisa Strong</a>
                                                                    <span class="timeline-body-time font-grey-cascade">Replied at 17:45 PM</span>
                                                                </div>
                                                                <div class="timeline-body-head-actions">
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-circle green btn-outline btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">Action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Another action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Something else here </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">Separated link </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-body-content">
                                                                <span class="font-grey-cascade"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut consectetuer adipiscing elit laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                                                    ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END TIMELINE ITEM -->
                                                    <!-- TIMELINE ITEM WITH GOOGLE MAP -->
                                                    <div class="timeline-item">
                                                        <div class="timeline-badge">
                                                            <img class="timeline-badge-userpic" src="{{url('public/assets/pages/media/users/avatar80_7.jpg')}}"> </div>
                                                        <div class="timeline-body">
                                                            <div class="timeline-body-arrow"> </div>
                                                            <div class="timeline-body-head">
                                                                <div class="timeline-body-head-caption">
                                                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">Paul Kiton</a>
                                                                    <span class="timeline-body-time font-grey-cascade">Added office location at 2:50 PM</span>
                                                                </div>
                                                                <div class="timeline-body-head-actions">
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-circle red btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">Action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Another action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Something else here </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">Separated link </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-body-content">
                                                                <div id="gmap_polygons" class="gmaps"> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END TIMELINE ITEM WITH GOOGLE MAP -->
                                                    <!-- TIMELINE ITEM -->
                                                    <div class="timeline-item">
                                                        <div class="timeline-badge">
                                                            <div class="timeline-icon">
                                                                <i class="icon-user-following font-green-haze"></i>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <div class="timeline-body-arrow"> </div>
                                                            <div class="timeline-body-head">
                                                                <div class="timeline-body-head-caption">
                                                                    <span class="timeline-body-alerttitle font-red-intense">You have new follower</span>
                                                                    <span class="timeline-body-time font-grey-cascade">at 11:00 PM</span>
                                                                </div>
                                                                <div class="timeline-body-head-actions">
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-circle green btn-outline

                                        btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">Action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Another action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Something else here </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">Separated link </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-body-content">
                                                                <span class="font-grey-cascade"> You have new follower
                                                                    <a href="javascript:;">Ivan Rakitic</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END TIMELINE ITEM -->
                                                    <!-- TIMELINE ITEM -->
                                                    <div class="timeline-item">
                                                        <div class="timeline-badge">
                                                            <div class="timeline-icon">
                                                                <i class="icon-docs font-red-intense"></i>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <div class="timeline-body-arrow"> </div>
                                                            <div class="timeline-body-head">
                                                                <div class="timeline-body-head-caption">
                                                                    <span class="timeline-body-alerttitle font-green-haze">Server Report</span>
                                                                    <span class="timeline-body-time font-grey-cascade">Yesterday at 11:00 PM</span>
                                                                </div>
                                                                <div class="timeline-body-head-actions">
                                                                    <div class="btn-group dropup">
                                                                        <button class="btn btn-circle red btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                                            <li>
                                                                                <a href="javascript:;">Action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Another action </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">Something else here </a>
                                                                            </li>
                                                                            <li class="divider"> </li>
                                                                            <li>
                                                                                <a href="javascript:;">Separated link </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-body-content">
                                                                <span class="font-grey-cascade"> Lorem ipsum dolore sit amet
                                                                    <a href="javascript:;">Ispect</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END TIMELINE ITEM -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
 @endsection

{!! HTML::script(url('/public/assets/pages/scripts/profile.min.js')); !!}
{!! HTML::script(url('/public/assets/pages/scripts/timeline.min.js')); !!}
