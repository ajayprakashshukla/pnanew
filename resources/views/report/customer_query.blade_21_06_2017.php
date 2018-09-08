@extends('admin.master')
@section('content')


@if(!empty($customer_id))
    <script> var ajax_datatable_url='{{url("customer_query_report")}}/{{$customer_id}}'; </script>
@else
    <script> var ajax_datatable_url='{{url("customer_query_report")}}'; </script>
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
                                        <span class="caption-subject font-dark sbold uppercase">Customer Query</span>
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
                                                    <a href="<?php echo url('/')."/customer_query_xls"; ?>" target="_blank"> Export to Excel </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo url('/')."/customer_csv"; ?>" target="_blank"> Export to CSV </a>
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
                                    <div class="clearfix"> </div>
                                    <div class="col-md-12" style="padding: 20px; border: 4px solid #36c6d3;" >
                                          <div class="col-md-3">
                                              <span class="caption-subject font-dark sbold uppercase">Select Customer</span>
                                          </div>
                                          <div class="col-md-4">
                                             {{Form::select('customer_id',['' => ''] + $Customers->toArray(),$customer_id,['class'=> 'form-control form-filter input-sm select_filter','onchange'=>'window.location="'.url('customer_query').'/"+this.value']) }}
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
                                                    <th width="20%">Transaction Type </th>
                                                    <th width="30%"> Serial No#</th>
                                                    <th width="15%"> Notes </th>
                                                  
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