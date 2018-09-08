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
                                <span>All Approvers</span>
                            </li>
                        </ul>
                    
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
                                        <i class="fa fa-globe"></i>All Approvers </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Full name</th>
                                                <th class="min-phone-l">Company Email</th>
                                            
                                                <th class="none">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($approvers as $approver)
                                            <tr>
                                                <td>{{ $approver->name  }}</td>
                                                <td>{{ $approver->email }}</td>
                                              
                                                <td><button class="btn btn-sm btn-success">Approve</button>
                                                <a href="{{url('admin/approvers/'.$approver->id)}}"class="btn btn-sm btn-success"> Edit</a>
                                                  <a href="{{url('admin/approvers/delete/'.$approver->id)}}"class="btn btn-sm btn-danger">Delete</a>
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