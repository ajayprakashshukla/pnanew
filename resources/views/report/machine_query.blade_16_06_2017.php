@extends('admin.master')
@section('content')



<script> var ajax_datatable_url='{{url("machine_query_report")}}'; </script>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                 <a href="{{url('dashboard')}}">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                          
                            
                        </ul>
                    </div>
              <div class="row">
                        <div class="col-md-12">
                           
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Machine Query</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-share"></i>
                                                <span class="hidden-xs"> Tools </span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="{{url('machine_query_xls')}}" target="_blank"  > Export to Excel </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <!-- <th width="15%" style="width:200px;"> Date </th>
                                                    <th width="12%"> Serial No. </th>
                                                    <th width="20%">Transaction Type </th>
                                                    <th width="25%"> Customer (with address)</th>
                                                    <th width="18%"> Location (PNA) </th>
                                                    <th width="15%"> Notes </th> -->
                                                    <th>Id</th>
                                                    <th style="width:125px;"> S.No# </th>
                                                    <th> Serial No. </th>
                                                    <th>Transaction Type </th>
                                                    <th> Customer (with address)</th>
                                                    <th> Location (PNA) </th>
                                                    <th> Notes </th>
                                                </tr>
                                              <tr role="row" class="filter">
                                              <td></td>
                                                  <td>
                                                        <div class="input-group date date-picker margin-bottom-5" style="min-width: 90px;" data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="From">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="To">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{Form::select('serial_no', ['' => ''] +$Machine->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}
                                                    </td>
                                                    <td>
                                                        {{Form::select('transactions_types', ['' => ''] +$transactions_types->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}
                                                    </td>
                                                    <td>
                                                        {{Form::select('customer_id', ['' => ''] +$Customers->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}
                                                    </td>
                                                    <td>
                                                         {{Form::select('location', ['' => ''] +$location->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}
                                                    </td>
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                            <button class="btn btn-xs green btn-outline filter-submit margin-bottom">
                                                                <i class="fa fa-search"></i> Search</button>
                                                        </div>
                                                        <button class="btn btn-xs red btn-outline filter-cancel">
                                                            <i class="fa fa-times"></i> Reset</button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody> </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End: life time stats -->
                        </div>
                    </div>
                   

                    


                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection