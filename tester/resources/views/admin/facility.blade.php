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
                                <a href="{{url('admin/home')}}">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Users</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Facilities</span>
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
                                        <i class="fa fa-globe"></i>All Facilities </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all"> name</th>
                                                <th class="all">Description</th>
                                                <th class="all"> Category</th>
                                                <th class="all">Min Amount</th>
                                                <th class="all">Max Amount</th>
                                                <th class="all">Interest Rate %</th>
                                                 <th class="all">Maximum Tenor(Years)</th>
                                                <th class="">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($Facilities as $Facility)
                                            <tr>
                                                <td>{{ $Facility->name  }}</td>
                                                <td>{{ $Facility->description  }}</td>
                                                <td>{{ $Facility->categories_name }}</td>
                                                <td>{{ $Facility->min_amount }}</td>
                                                <td>{{ $Facility->max_amount }}</td>
                                                <td>{{$Facility->interest_rate }}</td>
                                                <td>{{$Facility->maximum_tenor }}</td>
                                                <td>
                                                <table>
                                                    <tr>
                                                       <td>
                                                          <a href="{{url('admin/facility/'.$Facility->id)}}"class="btn btn-sm btn-success ">View</a>
                                                      </td>
                                                       <td>
                                                              <a href="javascript:void(0);"  onclick="deletedata('delete_facility',{{$Facility->id}})"  class="btn btn-sm btn-danger">Delete</a> 
                                                       </td>
                                                    </tr>
                                                </table>
                                                
                                            

                                                

                                                </td>
                                           </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                                                  
                          
                      <div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">User List Of Facility : <span id="Facility_name"></span></h4>
                                        </div>
                                        <div class="modal-body" id="Facility_users">
                                        <table class="table" id="user_list_table">
                                            <tr> <th> Name</th><th>View Detail</th></tr>

                                        </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection