@extends('admin.master')
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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Users</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Users</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            
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
                                                <th class="all">Full name</th>
                                                <th class="min-phone-l">Company Email</th>
                                                <th class="min-tablet">Mobile No</th>
                                                <th class="none">Address</th>
                                                <th class="none">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($all_users as $user_all)
                                            <tr>
                                                <td>{{ $user_all->name  }}</td>
                                                <td>{{ $user_all->email }}</td>
                                                <td>{{ $user_all->mobile_no }}</td>
                                                <td>{{ $user_all->address  }}</td>
                                                <td><button class="btn btn-sm btn-success">Approve</button>
                                                <a href="{{url('admin/user/'.$user_all->id)}}"class="btn btn-sm btn-success">View Details</a>

                                                <a href="{{url('admin/user/edit/'.$user_all->id)}}"class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{url('admin/user/delete/'.$user_all->id)}}"class="btn btn-sm btn-success">delete</a>
                                                </td>
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