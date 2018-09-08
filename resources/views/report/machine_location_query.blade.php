@extends('admin.master')

@section('content')





@if(!empty($serial_no))

    <script> var ajax_datatable_url='{{url("machine_location_query_report")}}/{{$serial_no}}'; </script>

@else

    <script> var ajax_datatable_url='{{url("machine_location_query_report")}}'; </script>

@endif 



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

                                        <span class="caption-subject font-dark sbold uppercase">Current Machine Location Query</span>

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

                                                    <a href="<?php echo url('/')."/machinelocation_query_xls"; ?>" target="_blank"> Export to Excel </a>

                                                </li>

                                                <li>

                                                    <a href="<?php echo url('/')."/machine_location_csv"; ?>" target="_blank"> Export to CSV </a>

                                                </li>
											<?php /*
                                                <li>

                                                    <a href="javascript:;"> Export to XML </a>

                                                </li>

                                                <li class="divider"> </li>

                                                <li>

                                                    <a href="javascript:;"> Print Invoices </a>

                                                </li>
											*/ ?>	
                                            </ul>

                                        </div>

                                    </div>

                                    <div class="clearfix"> </div>

                                    <div class="col-md-12" style="padding: 20px; border: 4px solid #36c6d3;" >

                                          <div class="col-md-3">

                                              <span class="caption-subject font-dark sbold uppercase">Select Machine</span>

                                          </div>

                                          <div class="col-md-4">

                                             {{Form::select('serial_no',['' => ''] + $Machine->toArray(),$serial_no,['class'=> 'form-control form-filter input-sm select_filter','onchange'=>'window.location="'.url('machine_location_query').'/"+this.value']) }}

                                          </div>

                                   

                                      </div> 

                                    

                                </div>

                                <div class="portlet-body">

                                    <div class="table-container">

                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">

                                            <thead>

                                                <tr role="row" class="heading">

                                                    <th width="15%"> S.No# </th>
                                                    <th width="15%"> Date </th>
                                                    <th width="15%"> Customer </th>

                                                    <th width="20%">Transaction Type </th>

                                                    <th width="30%"> Serial No#</th>

                                                    <th width="15%"> Return Location </th>

                                                  

                                                </tr>

                                               <tr role="row" class="filter">
                                                     <td></td>
                                                  <td>

                                                        <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">

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

                                                   {{Form::select('customer_id', ['' => ''] +$Customers->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}



                                                    </td>

                                                    <td>

                                                        {{Form::select('transactions_types', ['' => ''] +$transactions_types->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}

                                                    </td>

                                                    <td>

                                                    {{Form::select('serial_no', ['' => ''] +$Machine->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}



                                                    </td>

                                                    <td>

                                                         {{Form::select('location', ['' => ''] +$location->toArray(),'',['class'=> 'form-control form-filter input-sm select_filter'])}}

                                                    </td>

                                                    <td>

                                                        <div class="margin-bottom-5">

                                                            <button class="btn btn-sm green btn-outline filter-submit margin-bottom">

                                                                <i class="fa fa-search"></i> Search</button>

                                                        </div>

                                                        <button class="btn btn-sm red btn-outline filter-cancel">

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