@extends('user.master')
@section('content')


<div class="page-content-wrapper"><div class="page-content">
                        
                        <div class="row">
                            <div class="col-md-12">
                              
                                <div class="portlet light bordered" id="form_wizard_1">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-red"></i>
                                            <span class="caption-subject font-red bold uppercase"> Loan Request -
                                                <span class="step-title"> Step 1 of 4 </span>
                                            </span>
                                        </div>
                                   
                                    </div>
  <?php print_r($facility_detail);?>
                                      @if(count($errors) >1)
                                      <h4 style="color: red"> Something went wrong</h4>
                                      @endif

                                    <div class="portlet-body form">
                                        <form class="" action="#" id="submit_form" enctype="multipart/form-data"  method="POST">
                                        {!! Form::open(['class'=>'form-horizontal','url'=>url('preview'), 'method'=>'post', 'id'=>'submit_form','files'=>true]) !!}



                                        {{ csrf_field() }}
                                            <div class="form-wizard">
                                                <div class="form-body">
                                                    <ul class="nav nav-pills nav-justified steps">
                                                        <li>
                                                            <a href="#tab1" data-toggle="tab" class="step">
                                                                <span class="number"> 1 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Loan Request </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab2" data-toggle="tab" class="step">
                                                                <span class="number"> 2 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Profile Setup </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab3" data-toggle="tab" class="step active">
                                                                <span class="number"> 3 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Billing Setup </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab4" data-toggle="tab" class="step">
                                                                <span class="number"> 4 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Confirm </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab5" data-toggle="tab" class="step">
                                                                <span class="number"> 5 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Confirm </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                                        <div class="progress-bar progress-bar-success"> </div>
                                                    </div>
                                                    <div class="tab-content">
                                                       <div class="tab-pane active" id="tab1">
                                                            <div class="col-md-5" >
                                                
                                             
                                                
                                              
                                        {!! Form::select('facility_id',[''=>'']+$facility->toArray(),isset($facility_detail['facility_id'])?$facility_detail['facility_id']:old('facility_id'),['data-required'=>'1','class'=>'form-control custom','required'=>'required' , 'id'=>'facility' ,'onchange'=>'load_facility_detail(this.value)' ])!!}
                                        @if ($errors->has('facility'))
                                                <span class="help-block">
                                                          <strong>{{ $errors->first('facility') }}</strong>
                                                   </span>
                                        @endif
                                         
                                       </div>
                                       <div class="portlet-body flip-scroll facility_detail_table">
                                    @if(isset($facility_detail['facility_id']))
                                          <table class="table facility_detail_table">
                                          <tbody>
                                          <tr>
                                          <th>Facility Title</th><td>{{$facility_detail['name']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Facility Description</th><td>{{$facility_detail['description']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Min. Amount</th><td>{{$facility_detail['min_amount']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Max. Amount</th><td>{{$facility_detail['max_amount']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Interest Rate</th><td>{{$facility_detail['interest_rate']}}%</td>
                                          </tr>
                                          <tr>
                                          <th>Maximum Tenor</th><td>{{$facility_detail['maximum_tenor']}}yrs</td>
                                          </tr>
                                          <tr>
                                          <th>Allowable Payment Schedule</th><td> {{$facility_detail['payment_schedule']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Monthly Principal Payment Date</th><td>{{$facility_detail['monthly_payment_date']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Quarterly Principal Payment Dates</th><td>{{$facility_detail['quarterly_payment_date']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Annually Principal Payment Dates</th><td>{{$facility_detail['annualy_payment_date']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Monthly Interest Payment Date</th><td>{{$facility_detail['monthly_interest_payment_date']}}</td></tr>
                                          <tr>
                                          <th>Processing Fee</th><td>{{$facility_detail['processing_fee']}}</td></tr>
                                          <tr>
                                          <th>Insurance Fee</th><td>{{$facility_detail['insurance_fee']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Management Fee</th><td>{{$facility_detail['management_fee']}}</td>
                                          </tr>
                                    </tbody></table>
                                    @endif
                                       </div>
                                    
                                    <div class="footer_btn">
                                    <dir class="terms">
                                        <a href="">Terms and Conditions</a> <br>
                                        <span>By clicking proceed, I agree to the <a href="">terms and tonditions</a> of this loan.</span>
                                    </dir>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn default button-previous">
                                                                <i class="fa fa-angle-left"></i> Back </a>
                                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn green button-submit "> Submit
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                            <h3 class="block">Provide your profile details</h3>
                                                            <div class="portlet-body flip-scroll">

                                          <div class="portlet-body flip-scroll facility_detail_table">
                                                                                  @if(isset($facility_detail['facility_id']))
                                          <table class="table facility_detail_table">
                                          <tbody>
                                          <tr>
                                          <th>Facility Title</th><td>{{$facility_detail['name']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Facility Description</th><td>{{$facility_detail['description']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Min. Amount</th><td>{{$facility_detail['min_amount']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Max. Amount</th><td>{{$facility_detail['max_amount']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Interest Rate</th><td>{{$facility_detail['interest_rate']}}%</td>
                                          </tr>
                                          <tr>
                                          <th>Maximum Tenor</th><td>{{$facility_detail['maximum_tenor']}}yrs</td>
                                          </tr>
                                          <tr>
                                          <th>Allowable Payment Schedule</th><td> {{$facility_detail['payment_schedule']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Monthly Principal Payment Date</th><td>{{$facility_detail['monthly_payment_date']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Quarterly Principal Payment Dates</th><td>{{$facility_detail['quarterly_payment_date']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Annually Principal Payment Dates</th><td>{{$facility_detail['annualy_payment_date']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Monthly Interest Payment Date</th><td>{{$facility_detail['monthly_interest_payment_date']}}</td></tr>
                                          <tr>
                                          <th>Processing Fee</th><td>{{$facility_detail['processing_fee']}}</td></tr>
                                          <tr>
                                          <th>Insurance Fee</th><td>{{$facility_detail['insurance_fee']}}</td>
                                          </tr>
                                          <tr>
                                          <th>Management Fee</th><td>{{$facility_detail['management_fee']}}</td>
                                          </tr>
                                    </tbody></table>
                                    @endif


                                          </div>
                                          <div class="portlet-body flip-scroll facility_detail_table_2">

 @if(isset($facility_detail['facility_id']))

<?php $selectschedule=(json_decode($facility_detail['selectschedule'])); ?>
<table class="table facility_detail_table_payment">
<tbody>
<tr><th>Amount Requested</th><td><input onkeyup="get_MQA_payment();" type="text" id="amount_requested" class="form-control number "  value="{{$loan_application->amount_requested }}" readonly required name="amount_requested"></td></tr>

<tr><th>Tenor(months)</th><td>
<select readonly onchange="get_MQA_payment();" required="" class="form-control" id="tenors" name="tenors">
   <option value="{{ $loan_application['tenor'] }}">{{ $loan_application['tenor'] }}</option>
</select></td></tr>

<tr><th>Payment Schedule</th><td><select readonly onchange="get_MQA_payment();" required="" class="form-control" id="payment_schedule" name="payment_schedule"> 
@foreach($selectschedule as $schedule)
 @if($schedule->id== $loan_application['payment_schedule'] )
 <option value="{{$schedule->id}}" selected> {{$schedule->name}}</option>
@endif
@endforeach
@endif
</select></td></tr>

@if($loan_application['monthly_payment']>0)
<tr> <td>Monthly Payment</td><td>{{$loan_application['monthly_payment']}}</td></tr>
@endif

@if($loan_application['quarterly_payment']>0)
<tr> <td>Quarterly Payment</td><td>{{$loan_application['quarterly_payment']}}</td></tr>
@endif

@if($loan_application['annually_payment']>0)
<tr> <td>Annual Payment</td><td>{{$loan_application['annually_payment']}}</td></tr>
@endif
</tbody></table>

                                          </div>
                                    </div>

                                    <div class="footer_btn">
                                    <dir class="terms">
                                        <a href="">Terms and Conditions</a> <br><br>
                                        <span>By clicking proceed, I agree to the <a href="">terms and tonditions</a> of this loan.</span>
                                    </dir>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn default button-previous">
                                                                <i class="fa fa-angle-left"></i> Back </a>
                                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn green button-submit"> Submit
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab3">
                                                            <h3 class="block">Review</h3>
                                                            <div class="portlet-body flip-scroll">
                                        <table class="table table-bordered table-striped table-condensed flip-content">
                                            <thead class="flip-content">
                                                <tr>
                                                <th width="20%"> Date </th>
                                                    <th> Cycle </th>
                                                    <th class="numeric"> Amount </th>
                                                </tr>
                                            </thead>
                                            <tbody id="payment_cycle">
                                    @if(isset($facility_detail['facility_id']))
                                            @foreach($repayment_plan as $repayment)
                                               <tr>
                                                    <td> {{ $repayment->date }} </td>
                                                    <td> {{ $repayment->cycle }} </td>
                                                    <td> {{ $repayment->amount }} </td>
                                                </tr>


                                            @endforeach
                                 @endif

                                            </tbody>
                                        </table>

                                    <div class="footer_btn">
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn default button-previous">
                                                                <i class="fa fa-angle-left"></i> Back </a>
                                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn green button-submit"> Submit
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    </div>
                                                        </div>

                                       <div class="tab-pane" id="tab4">
                                                            <h4 class="block">Attachments</h4>
                                                            <div class="portlet-body flip-scroll">
                                        

                                        <table class="table table-bordered table-striped table-condensed flip-content">
                                            <tbody>

                                     @if(!isset($facility_detail['facility_id'])) 
                                                <tr>


                                                    <td>"{{date("M Y", strtotime("-1 month", strtotime(date("Y-m-d"))))}}" Payslip <br> <span class="f_th"><input type="file" name="payslip_1" class="file_upload" required /> </span></td>
                                                </tr>
                                                <tr>
                                                    <td>"{{date("M Y", strtotime("-2 month", strtotime(date("Y-m-d"))))}}" Payslip <br> <span class="f_th"><input type="file" name="payslip_2" class="file_upload" required /> </span></td>
                                                </tr>
                                                <tr>
                                                    <td>"60 Days Bank Account Statement<br>
                                                        <span style="color: red;font-size: 9px;"> ACCOUNT STATEMENT MUST BE FROM SALARY ACCOUNT</span>
                                                    <br> <span class="f_th"><input type="file" name="account_statment" required class="file_upload"/> </span></td>
                                                </tr>



                                                <tr>
                                                    <td style="padding-top: 40px;"> <strong>Bank verification Number</strong> <br> <span class="f_blue">Enter bank verification Number</span> <br> <input type="text" name="bank_verification_no" required class="f_input" /></td>
                                                </tr>
                                     @endif
                                    @if(isset($facility_detail['facility_id']))
 <tr>


                                                    <td> <a href="{{url('public/upload/'.App\Common\Common::getFile(['id'=>$loan_application['payslip_1']]))}}"> Payslip 1</a>      </td>
                                                </tr>
                                                <tr>
                                                    <td> <a href="{{url('public/upload/'.App\Common\Common::getFile(['id'=>$loan_application['payslip_2']]))}}">Payslip 2</a> </td>
                                                </tr>
                                                <tr>
                                                    <td> 
<a href="{{url('public/upload/'.App\Common\Common::getFile(['id'=>$loan_application['account_statment']]))}}">Bank Account Statement</a>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td style="padding-top: 40px;"> <strong>Bank verification Number</strong> <br>  <input type="text" name="bank_verification_no" value="{{$loan_application['account_statment']}}" readonly class="f_input" /></td>
                                                </tr>
                                    @endif




                                            </tbody>
                                        </table>





                                    <div class="footer_btn">
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn default button-previous">
                                                                <i class="fa fa-angle-left"></i> Back </a>
                                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn green button-submit"> Submit
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    </div>
                                                        </div>
                                                        <div class="tab-pane active" id="tab5">
                                                            <h4 class="block">Facility Details</h4>
                                                            <div class="portlet-body flip-scroll">

                                          <div class="portlet-body flip-scroll facility_detail_table_3_div">
                                     @if(isset($facility_detail['facility_id']))
                                           <table class="table facility_detail_table_3">
                                           <tbody>
                                            <tr><th>Facility Title</th><td>{{$facility_detail['name']}}</td></tr>
                                            <tr><th>Facility Description</th><td>{{$facility_detail['description']}}</td></tr>
                                            <tr><th>Interest Rate</th><td>{{$facility_detail['interest_rate']}}</td></tr>
                                            <tr><th>Processing Fee</th><td>1{{$facility_detail['processing_fee']}}</td></tr>
                                            <tr><th>Insurance Fee</th><td>{{$facility_detail['processing_fee']}}</td></tr>
                                            <tr><th>Management Fee</th><td>{{$facility_detail['processing_fee']}}</td></tr></tbody></table>
                                     @endif
                                          </div>

                                          <div class="portlet-body flip-scroll">
                                             <h4 class="block">Applications Details</h4>
                                              <div class="application_detail_div">
                                        @if(isset($facility_detail['facility_id']))
                                            <table class="table application_detail_table"><tbody>
                                            <tr><th>Amount Requested</th><td>NGN{{$loan_application['amount_requested']}}</td></tr>
                                            <tr><th>Tenor</th><td>{{$loan_application['tenors']}} Months</td></tr>
                                            <tr><th>Repayment Plan</th><td>
                                                    @foreach($selectschedule as $schedule)
                                                     @if($schedule->id ==$loan_application['payment_schedule'])
                                                      {{$schedule->name}}
                                                     @endif
                                                    @endforeach
                                            </td></tr>
                                            </tbody></table>
                                        @endif
                                               </div>
                                           </div>
 
                                          <div class="portlet-body flip-scroll">
                                             <h4 class="block">Repayemnts Plans</h4>
                                              <table class="table table-bordered table-striped table-condensed flip-content f_submit">
                                            <thead class="flip-content">
                                                <tr>
                                                    <th width="20%"> DATE </th>
                                                    <th> CYCLE </th>
                                                    <th class="numeric"> AMOUNT </th>
                                                    <th class="numeric"> INTEREST PAYMENT </th>
                                                </tr>
                                            </thead>
                                            <tbody id="repayemnts_plans_tbody">
                                         @if(isset($facility_detail['facility_id']))
                                            @foreach($repayment_plan as $repayment)
                                               <tr>
                                                    <td> {{ $repayment->date }} </td>
                                                    <td> {{ $repayment->cycle }} </td>
                                                    <td> {{ $repayment->amount }} </td>
                                                    <td> {{ $repayment->interest }} </td>
                                                </tr>


                                            @endforeach
                                          @endif

                                            </tbody>
                                        </table>
                            </div>
                            @if(isset($facility_detail['facility_id']))
                           <div>
<h4>Print and Sign Documents</h4>
<h6>Print the application documents below and attach in the upload section to enable us receive your signed application</h6>
<div class="col-md-12">  
    <div class="col-md-6">  
<a target="_blank" href="{{url('direct_debit_authorization_pdf/'.$loan_application['id'])}}" class="btn btn-success">Print Direct Debit Authorization  </a>
    </div>
    <div class="col-md-6">  
<a target="_blank" href="{{url('application_package_print/'.$loan_application['id'])}}" class="btn btn-success">Print Application Package </a>
    </div>
</div>

<div class="col-md-12">  
  <h4>Attach Signed Direct Debit Authorization</h4>
  <input type="file" required name="direct_debit_auth_print">
</div>

                           </div>


                            @endif

                                       
                                    </div>

                                    <div class="footer_btn">
                                    <dir class="terms">
                                        <a href="">Terms and Conditions</a> <br><br>
                                        <span>By clicking proceed, I agree to the <a href="">terms and tonditions</a> of this loan.</span>
                                    </dir>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn default button-previous" style="display: inline-block;">
                                                                <i class="fa fa-angle-left"></i> Back </a>
                                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn green button-submit loan_app_submit" style="display: none; "> Submit
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> 


        
            <style type="text/css">
            .border_no th, .border_no td, .border_no tr {
                border: none!important;
                background: none!important;
                font-weight: 600;
            }
            .border_no {
                border: none;
            }
            .custom
            {
                background-color: #ccc;
                border: 2px solid #adabab;
                color: #000;
                font-size: 14px;
                font-weight: 600;
                width: 50%;
            }
            dir.terms a {
                color: #0bcee0;
                font-weight: 600;
            }
            dir.terms {
                padding-left: 0px;
                clear: both;
                display: inline-block;
            }
            div#tab1 .col-md-5 {
            padding-left: 0;
            margin-bottom: 10px;
            }
            .facility_detail_table td, .facility_detail_table th{border: none!important;}
            div#tab1 .col-md-9 {
            margin-left: 0px;
            }
            div#tab1 .form-actions, div#tab2 .form-actions {
            float: right;
            border: none;
            width: 230px;
            }
            .footer_btn {
            display: block;
            clear: both;
            }
            div#tab3 table th {
            background-color: #32c5d2;
            color: #fff;
            font-weight: normal;
            }
            div#tab3 table td {
            background-color: #fff4e7;
            border: 1px solid #32c5d2;
            }
            div#tab3 table th {
            background-color: #32c5d2;
            color: #fff;
            font-weight: normal;
            }
            div#tab5 table.f_submit th {
            background-color: #32c5d2;
            color: #fff;
            font-weight: normal;
            }
            div#tab5 table.f_submit td {
            background-color: #fff4e7;
            border: 1px solid #32c5d2;
            }
            div#tab5 table.f_submit th {
            background-color: #32c5d2;
            color: #fff;
            font-weight: normal;
            }
            .footer_btn a.green {
            background-color: #0070c0!important;
            color: #fff!important;
            }
            .footer_btn a.button-previous {
            background-color: #ff0000!important;
            color: #fff!important;
            }
            div#tab3 table {
            width: 50%;
            float: left;
            }
            div#tab3 .form-actions {
            float: right;
            border: none;
            width: 230px;
            padding-top: 0;
            margin-top: -47px;
            }
            .form-wizard .steps>li>a.step>.desc, .form-wizard .steps>li>a.step>.number {
            display: inline-block;
            font-size: 15px;
            font-weight: 300;
            }
            div#tab4 table td, div#tab4 table th, div#tab4 table {
            border: none;
            }
            span.f_th {
            border: 1px solid #000;
            float: left;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            position: relative;
            }
            span.f_th:before {
            content: "Choose file";
            background-color: #dedede;
            color: #000;
            padding: 3px 9px;
            position: absolute;
            top: 9px;
            }
            span.f_blue {
            color: #0070c0;
            font-weight: bolder;
            font-size: 11px;
            }
            input.f_input {
            width: 292px;
            padding: 4px;
            margin-top: 7px;
            }
            div#tab4 table {
            width: 50%;
            float: left;
            }
            div#tab4 .form-actions {
            float: right;
            border: none;
            width: 230px;
            padding-top: 0;
            margin-top: -47px;
            }
            input.file_upload {
            display: block;
            -webkit-appearance: none;
            z-index: 999;
            position: relative;
            opacity: 0;
            }
            span.f_th:after {
            content: "no file choosen";
            position: absolute;
            top: 12px;
            left: 107px;
            }
            table.f_submit {
            width: 50%;
            }
            div#tab5 .form-actions {
            float: right;
            border: none;
            width: 230px;
            padding-top: 0;
            margin-top: 68px;
            }
        </style>
@endsection

