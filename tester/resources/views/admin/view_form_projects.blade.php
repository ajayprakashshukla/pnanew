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
                                <span> {{ $facility_category->name }}</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> {{ $facility_category->name }}
                        <small>({{ $Facility->name }})</small>
                    </h3>
                   
                    <div class="row">
                        <div class="col-md-12">
                             {!! Form::open(['id'=>'','class'=>'form-horizontal','method'=>'post','files'=>true])!!}
                               
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                    <i class="fa fa-gift"></i>CAR ACQUISITION APPLICATION FORM</div>
                                    <div class="tools">
                                       @if($app_datas->status==1)
                                                <span class="btn btn-success">Approved</span>
                                                @elseif($app_datas->status==2):
                                                <span class="btn btn-danger">Rejected</span>
                                                @else
                                                <span class="btn btn-primary">Pending</span>
                                                @endif
                                    </div>
                                </div>
                           @if (count($errors) > 0)
			                <div class="alert alert-danger">
			                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
			                    <ul>
			                        @foreach ($errors->all() as $error)
			                            <li>{{ $error }}</li>
			                        @endforeach
			                    </ul>
			                </div>
			            @endif
                                <div class="portlet-body">
                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"> 1. MEMBER’S DETAILS </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_1" class="panel-collapse in">
                                                <div class="panel-body">
                                                 
                                     <!--========================================== ======= -->  



        






    <div class="form-group">
        <label class="control-label col-md-3">NAME (Surname First)
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('name', $value = ($applicant->surname).' '.($applicant->name).' '.($applicant->lastname) , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Full Name' ,'readonly'=>'readonly']) !!} 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Company
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('company', $value =$app_datas->company  , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Company'  ,'readonly'=>'readonly' ]) !!} 
        </div>
         @if ($errors->has('company'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
         @endif 
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Dept. / Location
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('dept_location', $value =$app_datas->dept_location  , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Dept. / Location' ,'readonly'=>'readonly'  ]) !!} 
        @if ($errors->has('dept_location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dept_location') }}</strong>
                            </span>
         @endif 
        </div>
        
    </div>

   <div class="form-group">
        <label class="control-label col-md-3">Employee Sharp ID .
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('user_id', $value = $applicant->id , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee Sharp ID' ,'readonly'=>'readonly' ,'readonly'=>'readonly' ]) !!} 
        </div>
    </div>

   <div class="form-group">
        <label class="control-label col-md-3">GSM number .
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('gsm_number', $value = '+'.($applicant->mobile_no_country).' '.($applicant->mobile_no) , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'GSM number' ,'readonly'=>'readonly' ]) !!} 
        </div>
    </div>


       <div class="form-group">
        <label class="control-label col-md-3">Tel Ext.
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('tel_ext', $value =  $applicant->office_extension , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee Sharp ID' ,'readonly'=>'readonly' ]) !!} 
        </div>
    </div>

    



                                              <!-- ================================================= -->
                                                </div>
                                            </div>
                                        </div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"> 2. CAR DETAILS:: </a>
        </h4>
    </div>
    <div id="collapse_2" class="panel-collapse collapse">
        <div class="panel-body" >
       <div class="form-group">
        <label class="control-label col-md-3">Car Brand
            <span class="required"> * </span>
        </label>
        <div class="col-md-9">
       {!! Form::text('car_brand', $value = $app_datas->car_brand  , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Car Brand' ,'readonly'=>'readonly'  ]) !!} 
        @if ($errors->has('car_brand'))
                            <span class="help-block">
                                <strong>{{ $errors->first('car_brand') }}</strong>
                            </span>
         @endif 
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3">Preferred Colour
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('car_color', $value = $app_datas->car_color   , $attributes = ['class'=>' form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Preferred Colour' ,'readonly'=>'readonly'  ]) !!} 
        @if ($errors->has('car_color'))
                            <span class="help-block">
                                <strong>{{ $errors->first('car_color') }}</strong>
                            </span>
         @endif 
        </div>
    </div>
                                               
    <div class="form-group">
        <label class="control-label col-md-3">Registration Name
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('car_reg_name', $value =$app_datas->car_reg_name  , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Registration Name' ,'readonly'=>'readonly'  ]) !!} 
        @if ($errors->has('car_reg_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('car_reg_name') }}</strong>
                            </span>
         @endif 
        </div>
    </div>
            
    <div class="form-group">
        <label class="control-label col-md-3">Registration Address
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('car_reg_add', $value = $app_datas->car_reg_add  , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Registration Address'  ,'readonly'=>'readonly' ]) !!} 
        @if ($errors->has('car_reg_add'))
                            <span class="help-block">
                                <strong>{{ $errors->first('car_reg_add') }}</strong>
                            </span>
         @endif 
        </div>
       </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"> 3. DELIVERY ADDRESS: </a>
                </h4>
            </div>
            <div id="collapse_3" class="panel-collapse collapse">
                <div class="panel-body" id="">
				     <div class="form-group">
				        <label class="control-label col-md-3"> DELIVERY ADDRESS
				            <span class="required"> * </span>
				        </label>
				        <div class="col-md-4">
				       {!! Form::text('car_delevery_add', $value = $app_datas->car_delevery_add   , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' DELIVERY ADDRESS' ,'readonly'=>'readonly'  ]) !!} 
				        @if ($errors->has('car_delevery_add'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('car_delevery_add') }}</strong>
				                            </span>
				         @endif 
				        </div>
				      </div>
               </div>
            </div>
 </div>





<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4"> 4.  TERMS OF AGREEMENT:: </a>
        </h4>
    </div>
    <div id="collapse_4" class="panel-collapse collapse">
        <div class="panel-body">

 <ol>                                                
<li>  Only Cars advertised and promoted by the co-operative are supported under this programme.</li>
<li>  Minimum of 10% of cost of chosen type of car to be paid with application and balance is treated and loan principal.</li>
<li>  Currently interest on 20% for all other cars. 16.5% for Coscharis brands per annum on reducing annual balance of loan amount and reviewable.</li>
<li>  Maximum repayment period of 48 months (i.e. 4 years) with different repayment options as listed below for your choice.</li>
<li>  Monthly payroll deduction must be within approved loan burden percentage of the Company.</li>
<li>  Treatment of applications shall be on “first come first served” basis and subject to availability of fund.</li>
<li>  Applicant will charged a “handling charge” of =N= 30,000.00 per car and to be paid with application on submission.</li>
<li>  Members who choose not to obtain a loan must pay 100% of car cost plus N30, 000 handling charge with application.</li>
<li>  Loan limit is subject to applicant’s terminal benefit and Society shall have all the rights exercisable by the Indemnifier over all the benefits
including but not limited to his /her, terminal benefits, retirement benefits, ESP, Superannuation, etc. to the extent to which he/ she is indebted to
the Society and the amount deductible shall be limited to the amount formally advised to the company by the Cooperative Society.</li>
<li>  Delivery is free to Eket, Uyo, PH, Lagos and Calabar but outside of these towns attracts additional minimum charges of N20, 000 plus fuel cost.</li>
<li>  Completed, signed and executed application is irrevocable.</li>
</ol>
                                                </div>
                                            </div>
                                        </div>


<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5"> 5. Upload Files: </a>
                </h4>
            </div>
            <div id="collapse_5" class="panel-collapse collapse">
                <div class="panel-body" id="last_file_div">
                    <div class="form-group" >
                           <?php $files= json_decode($app_datas->files);  ?>
                             @if(count($files))

                           @foreach($files as $key=> $file)
                           <div class="col-md-12"> <a href="{{url('public/upload/'.App\Common\Common::getFile(['id'=>$file->file]) )}}">({{ $key+1 }}.)  {{$file->title}}</a></div>
                           @endforeach

                           @endif
                    </div>
               </div>
            </div>
 </div>

<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6"> 6. Upload Signature:  </a>
                </h4>
            </div>
            <div id="collapse_6" class="panel-collapse collapse">
                <div class="panel-body">
 <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }}">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                            @if(isset($app_datas->signature))
                            <img src="{{url('public/upload/'.App\Common\Common::getFile(['id'=>$app_datas->signature]))}}" alt="" /> 
                            @else 
                            <img src="{{url('/public/images/signhere.png')}}" alt="" /> 
                            @endif
                        </div>  
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                        <div>
                            




                        </div>
                    </div>
                    
                </div>
                  
               </div>
            </div>
 </div>

 <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_7"> 7. REPAYMENT OPTION: </a>
                </h4>
            </div>
            <div id="collapse_7" class="panel-collapse collapse">
                <div class="panel-body" id="last_file_div">
                <div class="col-lg-4"> </div>
				      <div class="form-group col-lg-8">
                                           
                                                <div class="radio-list">
                                                    <label>
                                                        <input type="radio" name="payment_option" id="optionsRadios1" 
                                                         @if($app_datas->payment_option ==1 ) 
                                                          checked
                                                         @endif
                                                           value="1" > FULL PAYMENT</label>
                                                    <label>
                                                        <input type="radio" name="payment_option" id="optionsRadios2"
                                                         @if($app_datas->payment_option ==2 ) 
                                                          checked
                                                         @endif
                                                         value="2"> EQUAL MONTHLY REPAYMENT  (PRINCIPAL + INTEREST)</label>
                                                    <label>
                                                        <input type="radio" 

                                                          @if($app_datas->payment_option ==3 ) 
                                                          checked
                                                         @endif
                                                         name="payment_option" id="optionsRadios3" value="3" > ANNUAL PRINCIPAL & MONTHLY (INTEREST REPAYMENT) </label>
                                                </div>
                          </div>
                          
               </div>
            </div>
 </div>







                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_8"> 8.  AUTHORIZATION: </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_8" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                  

    <div class="form-group">
				        <label class="control-label col-md-3"> I
				            <span class="required"> * </span>
				        </label>
				        <div class="col-md-4">
				       {!! Form::text('', $value = ($applicant->surname).' '.($applicant->name).' '.($applicant->lastname) , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly'  ]) !!} 
				        </div>
	</div>

    <div class="form-group">
				        <label class="control-label col-md-3">hereby authorize  (company name)
				            <span class="required"> * </span>
				        </label>
				       <div class="col-md-4">
				       {!! Form::text('company2', $value = $app_datas->company2  , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' company name'  ,'readonly'=>'readonly' ]) !!} 
				        @if ($errors->has('company2'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('company2') }}</strong>
				                            </span>
				         @endif 
				        </div>
	</div>

    <div class="form-group">
				        <label class="control-label col-md-3">to deduct from my monthly
salary =N=
				            <span class="required"> * </span>
				        </label>
				       <div class="col-md-4">
				       {!! Form::text('deduction_amount_n', $value =$app_datas->deduction_amount_n   , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' Monthly Deduction'  ,'readonly'=>'readonly' ]) !!} 
				        @if ($errors->has('deduction_amount_n'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('deduction_amount_n') }}</strong>
				                            </span>
				         @endif 
				        </div>
	</div>


    <div class="form-group">
				        <label class="control-label col-md-3">and annually =N=
				            <span class="required"> * </span>
				        </label>
				       <div class="col-md-4">
				       {!! Form::text('deduction_amount_anual', $value =$app_datas->deduction_amount_anual  , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' annually Deduction' ,'readonly'=>'readonly'  ]) !!} 
				        @if ($errors->has('deduction_amount_anual'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('deduction_amount_anual') }}</strong>
				                            </span>
				         @endif 
				        </div>
	</div>

	    <div class="form-group">
				        <label class="control-label col-md-12">
				        from my January lump sum payments being the total
charges due on this transaction and remit to PROGRESSIVE MOBIL EMPLOYEES MULTI-PURPOSE COOPERATIVE
SOCIETY Limited, Akwa Ibom State being loan plus interest of items acquired under car acquisition program and also hereby
agree to abide by the above Terms of agreement.

				        </label>
				     
	  </div>
      
					
                </div>
            </div>
        </div>


{{Form::close()}}

<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_9"> 9. FOR OFFICIAL USE ONLY: </a>
                </h4>
            </div>
            <div id="collapse_9" class="panel-collapse collapse">
                <div class="panel-body" >

                 {!! Form::open(['id'=>'','class'=>'form-horizontal','method'=>'post'])!!}
			          
			        <input type="hidden" name="facility_id" value="{{$Facility->id }}">
			        <input type="hidden" name="facility_category" value="{{$facility_category->id}}" >




				     <div class="form-group" >
					   <div class="form-group" >
                           <table class="table" style="width: 80%;margin: 20px;">
                            <tr><th></th><th></th> <th>Amount (=N=)</th></tr>

							<tr><td>A</td><td>Car Price </td>                <td>
							      <input type="text" class="form-control number" value="{{$app_datas->car_price}}" name="car_price"></td></tr>

							<tr><td>B</td><td>Less initial Deposit</td>      <td>
							      <input type="text" class="form-control number" value="{{$app_datas->less_initial_deposit}}"  name="less_initial_deposit"></td></tr>

							<tr><td>C</td><td>Loan Amount (A - B)</td>       <td>
							      <input type="text" class="form-control number" value="{{$app_datas->loan_amount}}"  name="loan_amount"></td></tr>

							<tr><td>D</td><td>Interest</td>                  <td>
							      <input type="text" class="form-control number" value="{{$app_datas->interest}}"  name="interest"></td></tr>

							<tr><td>E</td><td>Total Monthly deductions</td>  <td>
							      <input type="text" class="form-control number" value="{{$app_datas->total_monthly_deductions}}"  name="total_monthly_deductions"></td></tr>

							<tr><td>f</td><td>Annual Principal Repayment</td><td>
							      <input type="text" class="form-control number" value="{{$app_datas->annual_principal_repayment}}"  name="annual_principal_repayment"></td></tr>
							
                            <tr><td>G</td><td>Total Approved Ammount</td><td>
                                  <input type="text" class="form-control number" value="{{$app_datas->approved_ammount}}"  name="approved_ammount"></td></tr>

                            <tr><td></td><td>Status</td><td>
<?php
$Pending="";
$Approve="";
$Reject="";
if($app_datas->status==1){$Approve="Selected";}
elseif ($app_datas->status==1) {$Reject="Selected"; }
else{$Pending="Selected";}
?>


                                         <select name="status" class="form-control">
                                           	<option {{$Pending}} value="">Select</option>
											<option {{$Approve}} value="1">Approve</option>
											<option {{$Reject}} value="2">Reject</option>
                                         </select>
                                          



							      </td></tr>

                                  <tr>
    <td></td>
    <td>Approvel Date</td>
    <td>
            <div class="form-group">
            <label class="control-label col-md-3">Approvel Date</label>
            <div class="col-md-3">
                <div class="input-group input-medium date date-picker" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                    <input value= "{{$app_datas->approvel_date}}" type="text" name="approvel_date" class="form-control" readonly>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
                  @if ($errors->has('approvel_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('approvel_date') }}</strong>
                                    </span>
                    @endif
            </div>
        </div>
    </td>
</tr>

<td></td><td></td><td><input type="submit" class="btn btn-success" value="Save Details"  name="project"></td></tr>
                           </table>
                    </div>
				    </div>

				    {{Form::close() }}
               </div>
            </div>
 </div>









                                    </div>
                                </div>
                            </div>
                           
                        </div>



                    </div>
                </div>
            </div>
@endsection