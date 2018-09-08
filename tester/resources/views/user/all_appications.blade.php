@extends('user.master')
@section('content')

<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="{{url('home')}}">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Users</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Applications</span>
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
                
                   
                    
                    <div class="row">
                      @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>All Wallets </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>


                                            
                                            <th class="all">Facility Name</th>
                                                <th class="all">Amount Requested</th>
                                                <th class="all">Tenors</th>
                                                <th class="all">Payment Schedule</th>
                                                <th class="all">Status</th>
                                                <th class="all">Approval Status</th>
                                                <th class="all">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($app_datas as $app_data)
                                            <tr>
                                                <td>{{ $app_data->amount_requested  }}</td>
                                                <td>{{ $app_data->amount_requested  }}</td>
                                                <td>
                                                @if($app_data->status==1):
                                                <button class="btn btn-success">Complete</button>
                                                @elseif($app_data->status!=1):
                                                <button class="btn btn-danger">Incomplete</button>
                                                @endif
                                              
                                                </td>

                                                <td>
                                                @if($app_data->status==1):
                                                <button class="btn btn-success">Complete</button>
                                                @elseif($app_data->status!=1):
                                                <button class="btn btn-danger">Incomplete</button>
                                                @endif
                                              
                                                </td>

                                                <td><a href="{{url('view_my_application')}}/{{ $app_data->id  }}" class="btn btn-success">View</td>
                                           </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection