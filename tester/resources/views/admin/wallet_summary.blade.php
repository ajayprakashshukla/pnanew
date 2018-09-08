@extends('admin.master')
@section('content')
            
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="{{url('admin/home')}}">Wallet</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span><{{ $WalletUsers->name }}</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Wallet Details
                        <small>({{$WalletUsers->name}})</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        

@if($wallet_category->id==1)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ url('admin/wallet_summary') }}/{{$WalletUsers->id}}/1">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="{{$total_amount}}"></span>
                                    </div>
                                    <div class="desc"> Contributions </div>
                                </div>
                            </a>
                        </div>
@elseif($wallet_category->id==3)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="{{ url('admin/wallet_summary') }}/{{$WalletUsers->id}}/3">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="{{$total_amount}}"></span></div>
                                    <div class="desc "> Quick cash</div>
                                </div>
                            </a>
                        </div>
@elseif($wallet_category->id==2)                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="{{ url('admin/wallet_summary') }}/{{$WalletUsers->id}}/2">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="{{$total_amount}}"></span>
                                    </div>
                                    <div class="desc"> Loans </div>
                                </div>
                            </a>
                        </div>
@elseif($wallet_category->id==4)                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ url('admin/wallet_summary') }}/{{$WalletUsers->id}}/4">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="{{$total_amount}}"></span> </div>
                                    <div class="desc"> Net Position </div>
                                </div>
                            </a>
                        </div>

  @endif         


<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="#">
        <div class="visual">
           
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="no_of_deposit" data-value="{{$no_of_deposit}}"></span> </div>
            <div class="desc"> No of deposits</div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="#">
        <div class="visual">
           
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="no_of_withdrawals" data-value="{{$no_of_withdrawals}}"></span> </div>
            <div class="desc"> no of withdrawals</div>
        </div>
    </a>
</div>


<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="">
        <div class="visual">
           
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="total_debit" data-value="{{$debit}}"></span> </div>
            <div class="desc"> Total deposits</div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="">
        <div class="visual">
            
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="total_credit" data-value="{{$credit}}"></span> </div>
            <div class="desc"> Total Withdrawals </div>
        </div>
    </a>
</div>



                    </div>
                    <div class="clearfix"></div>

<!-- ================================================================================ -->


                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Update Wallet</span>
                                        <span class="caption-helper"> (Debit/Credit) </span>
                                    </div>
                                 
                                </div>
                                <div class="portlet-body">
                                    <!-- ================Form Start ========================== -->
                              <input type="hidden" id="email"  value="{{$WalletUsers->email}}">
                              <input type="hidden" id="wallet_category" value="{{$wallet_category->id }}">

                                    {!! Form::open(['id'=>'form_sample_3','class'=>'form_sample_3 form-horizontal','method'=>'post'])!!}
                                    
                                      
                                        <div class="form-body">
                                            @if(count($errors)):
                                            <div class="alert alert-danger">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>
                                            @endif

                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>

                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                        
                                         
                                         
                                     <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3"> Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">{!! Form::text('amount',$value='',['data-required'=>'1','class'=>'form-control number', 'id'=>'amount', 'required'=>'required']) !!}
                                                </div>
                                                 @if ($errors->has('amount'))
                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('amount') }}</strong>
                                                                    </span>
                                                     @endif
                                      </div>


                               <div class="form-group{{ $errors->has('dates') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3"> Date
                                                    <span class="required"> * </span>
                                                </label>
                                              


                                                <div class="col-md-9">
                                                    <input class="form-control form-control-inline  date-picker" required="required" readonly size="16" name="dates" id="dates" type="text" value="" />
                                                    
                                               </div>








                                                 @if ($errors->has('dates'))
                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('dates') }}</strong>
                                                                    </span>
                                                     @endif
                                      </div>
                                               <div class="form-group{{ $errors->has('wallet_id') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3"> Wallet Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">

                                               {{ Form::select('wallet_id',$Wallets,'',['data-required'=>'1','class'=>'form-control number', 'id'=>'wallet_id', 'required'=>'required'])}}
                                                </div>
                                                 @if ($errors->has('wallet_id'))
                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('wallet_id') }}</strong>
                                                                    </span>
                                                     @endif
                                      </div>

                                      <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Debit/Credit
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                  {!! Form::select('type', [''=>'','1'=>'Debit','2'=>'Credit'],'',['data-required'=>'1','id'=>'type','class'=>'form-control number','required'=>'required']) !!}
                                                </div>
                                                @if ($errors->has('type'))
                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('type') }}</strong>
                                                                    </span>
                                                     @endif
                                            </div>

                                         <div class="form-group{{ $errors->has('discription') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Discription
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                  {!! Form::text('discription', $value='',['data-required'=>'1','class'=>'form-control','id'=>'discription','required'=>'required']) !!}
                                                </div>
                                                     @if ($errors->has('discription'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('discription') }}</strong>
                                                                    </span>
                                                     @endif
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" id="submit_form" class="btn green">Submit</button>
                                                    <button type="reset" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- =================fORM cLOSE=========================== -->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>




                        <div class="col-md-8 col-sm-8">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Summary</span>
                                        
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                <!-- ============================================ -->
                                   <div class="portlet light portlet-fit portlet-datatable bordered">
                               
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <div class="table-actions-wrapper">
                                           
                                       
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                                        <thead>
                                          <tr role="row" class="heading">
                                            
                                            <th width="20%">Date</th>
                                            <th width="20%">Debit</th>
                                            <th width="20%">Credit</th>
                                            <th width="20%">Description</th>
                                            <th width="20%">Total</th>
                                          </tr>
                                            </thead>
                                            <tbody> </tbody>
                                        </table>
                                    </div>
                                </div>

                          

                            </div>
                                <!-- ============================================= -->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                            
        

<div class="row">
<h3 class="page-title">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    Wallet Details          
   </div>
   <br>
  </h3>   
@foreach($WalletsDetails as $WalletsDetail)

                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ url('admin/wallet_summary') }}/{{$WalletUsers->id}}/1">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    
                                      <div class="desc"><span class="btn btn-danger">Wallet Name: {{ $WalletsDetail['wallet_name']}}</span></div>
                                      <div class="desc">Debit : {{ $WalletsDetail['debit']}}</div>
                                      <div class="desc">Credit:{{ $WalletsDetail['credit']}}</div>
                                      <div class="desc">Total : {{ $WalletsDetail['total_amount']}}</div>
                                      <div class="desc">Status:{{ $WalletsDetail['status']}}</div>
                                </div>
                            </a>
                        </div>  
     @endforeach
</div>













                    </div>
                   
                  
                </div>
                <!-- END CONTENT BODY -->
            </div>
        <script type="text/javascript">var tbl_ajax_url="{!!url('admin/debit_credit_summary/'. $WalletUsers->id.'/'.$wallet_category->id)!!}"; </script>
            @endsection