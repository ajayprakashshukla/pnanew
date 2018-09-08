@extends('admin.master')
@section('content')



<script> var ajax_datatable_url='{{url("part_query_report")}}'; </script>
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
                                        <span class="caption-subject font-dark sbold uppercase">Part Query</span>
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
                                                    <a href="javascript:;"> Export to Excel </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to CSV </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to XML </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Print Invoices </a>
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
                                                <th width="7%"> S.No# </th>
                                                    <th width="7%"> Date </th>
                                                    <th width="10%">Serial</th>
                                                    <th style="width: 0%;" width="10%">Transaction</th>
                                                    <th width="10%">Customer</th>
                                                    <th width="10%"> Location</th>
                                                    <th width="43%"> Parts used in repair</th>
                                                </tr>
                                            <tr role="row" class="filter">
                                            <td> </td>
                                                <td colspan="2">
                                                    <div class="input-group date date-picker margin-bottom-5" style="    width: 48%;float: left;" data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="From">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    <div class="input-group date date-picker" style="    width: 48%;float: left;" data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="To">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    
                                                        {{Form::select('serial_no', ['' => ''] +$Machine->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                         {{Form::select('customers', ['' => ''] +$Customers->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}

                                                    </td>


                                                    <td>
                                                         {{Form::select('location', ['' => ''] +$location->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}
                                                    </td>
                                                    <td>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            {{Form::select('part', ['' => ''] +$Parts->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="margin-bottom-5" style="float:left" >
                                                            <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                                <i class="fa fa-search"></i> Search</button>
                                                        </div>
                                                        <button class="btn btn-sm red btn-outline filter-cancel" style="float:left">
                                                            <i class="fa fa-times"></i> Reset</button>

                                                        </div>

                                                     </div>
                                                    
                                                        
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