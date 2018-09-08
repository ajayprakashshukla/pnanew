@extends('user.master')
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
                                <a href="{{url('home')}}">Home</a>
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
                               <input type="hidden" name="facility_id" value="{{$Facility->id }}">
                               <input type="hidden" name="facility_category" value="{{$facility_category->id}}" >
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                    <i class="fa fa-gift"></i>CAR ACQUISITION APPLICATION FORM</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                               
                                <div class="portlet-body">
                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"> 1. MEMBER’S DETAILS <small class="help-block" style="display: inline;">(All fields are required)</small></a>
                                                </h4>
                                            </div>
                                            <div id="collapse_1" class="panel-collapse in">
                                                <div class="panel-body">
                                                 
                                     <!--========================================== ======= -->  



        

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





    <div class="form-group">
        <label class="control-label col-md-3">NAME (Surname First)
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('name', $value = ($user->surname).' '.($user->name).' '.($user->lastname) , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Full Name' ,'readonly'=>'readonly']) !!} 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Company
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('company', $value = old('company') , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Company'  ]) !!} 
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
       {!! Form::text('dept_location', $value = old('dept_location') , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Dept. / Location'  ]) !!} 
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
       {!! Form::text('user_id', $value = $user->id , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee Sharp ID' ,'readonly'=>'readonly' ]) !!} 
        </div>
    </div>

   <div class="form-group">
        <label class="control-label col-md-3">GSM number .
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('gsm_number', $value = '+'.($user->mobile_no_country).' '.($user->mobile_no) , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'GSM number' ,'readonly'=>'readonly' ]) !!} 
        </div>
    </div>


       <div class="form-group">
        <label class="control-label col-md-3">Tel Ext.
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       {!! Form::text('tel_ext', $value =  $user->office_extension , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee Sharp ID' ,'readonly'=>'readonly' ]) !!} 
        </div>
    </div>

    



                                              <!-- ================================================= -->
                                                </div>
                                            </div>
                                        </div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"> 2. CAR DETAILS:: <small class="help-block" style="display: inline;">(All fields are required)</small></a>
        </h4>
    </div>
    <div id="collapse_2" class="panel-collapse collapse">
        <div class="panel-body" >
       <div class="form-group">
        <label class="control-label col-md-3">Car Brand
            <span class="required"> * </span>
        </label>
        <div class="col-md-9">
       {!! Form::text('car_brand', $value = old('car_brand') , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Car Brand'  ]) !!} 
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
       {!! Form::text('car_color', $value = old('car_color') , $attributes = ['class'=>' form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Preferred Colour'  ]) !!} 
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
       {!! Form::text('car_reg_name', $value = old('car_reg_name') , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Registration Name'  ]) !!} 
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
       {!! Form::text('car_reg_add', $value = old('car_reg_add') , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Registration Address'  ]) !!} 
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
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"> 3. DELIVERY ADDRESS:<small class="help-block" style="display: inline;">(All fields are required)</small> </a>
                </h4>
            </div>
            <div id="collapse_3" class="panel-collapse collapse">
                <div class="panel-body" id="">
				     <div class="form-group">
				        <label class="control-label col-md-3"> DELIVERY ADDRESS
				            <span class="required"> * </span>
				        </label>
				        <div class="col-md-4">
				       {!! Form::text('car_delevery_add', $value = old('car_delevery_add') , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' DELIVERY ADDRESS'  ]) !!} 
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
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5"> 5. Upload Files:<small class="help-block" style="display: inline;">(All fields are required)</small> </a>
                </h4>
            </div>
            <div id="collapse_5" class="panel-collapse collapse">
                <div class="panel-body" id="last_file_div">
				     <div class="form-group" >
					        <div class="col-md-4">
					            <input type="text"  name="file_name[]" class="form-control">
					        </div>
					        <div class="col-md-4">
					           <input type="file"  name="file[]" class="form-control">
					       </div>
					       <div class="col-md-4">
					       <span class="btn btn-success" onclick="add_more_files()">Add More</span>
					       </div>
				    </div>
               </div>
            </div>
 </div>



<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6"> 6. Upload Signature: <small class="help-block" style="display: inline;">(Please uplode your latest signature a)</small> </a>
                </h4>
            </div>
            <div id="collapse_6" class="panel-collapse collapse">
                <div class="panel-body">
 <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }}">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                            @if(isset($user->signature))
                            <img src="{{url('public/images/'.$user->signature)}}" alt="" /> 
                            @else 
                            <img src="{{url('/public/images/signhere.png')}}" alt="" /> 
                            @endif
                        </div>  
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                        <div>
                            <span class="btn default btn-file">
                                <span class="fileinput-new"> Select Signature </span>
                                <span class="fileinput-exists"> Change </span>
                                {!! Form::file('signature', array('class' => 'form-control')) !!}
                            </span>
                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    
                </div>
                    @if ($errors->has('signature'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('signature') }}</strong>
                                    </span>
                     @endif
               </div>
            </div>
 </div>










 <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_7"> 7. REPAYMENT OPTION:<small class="help-block" style="display: inline;">(All fields are required)</small> </a>
                </h4>
            </div>
            <div id="collapse_7" class="panel-collapse collapse">
                <div class="panel-body" id="">
                <div class="col-lg-4"> </div>
				      <div class="form-group col-lg-8">
                                           
                                                <div class="radio-list">
                                                    <label>
                                                        <input type="radio" name="payment_option" id="optionsRadios1" value="1" checked> FULL PAYMENT</label>
                                                    <label>
                                                        <input type="radio" name="payment_option" id="optionsRadios2" value="2"> EQUAL MONTHLY REPAYMENT  (PRINCIPAL + INTEREST)</label>
                                                    <label>
                                                        <input type="radio" name="payment_option" id="optionsRadios3" value="3" > ANNUAL PRINCIPAL & MONTHLY (INTEREST REPAYMENT) </label>
                                                </div>
                          </div>
                          
               </div>
            </div>
 </div>







                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_8"> 8.  AUTHORIZATION: <small class="help-block" style="display: inline;">(All fields are required)</small></a>
                                                </h4>
                                            </div>
                                            <div id="collapse_8" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                  

    <div class="form-group">
				        <label class="control-label col-md-3"> I
				            <span class="required"> * </span>
				        </label>
				        <div class="col-md-4">
				       {!! Form::text('', $value = ($user->surname).' '.($user->name).' '.($user->lastname) , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly'  ]) !!} 
				        </div>
	</div>

    <div class="form-group">
				        <label class="control-label col-md-3">hereby authorize  (company name)
				            <span class="required"> * </span>
				        </label>
				       <div class="col-md-4">
				       {!! Form::text('company2', $value = old('company2') , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' company name'  ]) !!} 
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
				       {!! Form::text('deduction_amount_n', $value = old('deduction_amount_n') , $attributes = ['class'=>'number  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' Monthly Deduction'  ]) !!} 
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
				       {!! Form::text('deduction_amount_anual', $value = old('deduction_amount_anual') , $attributes = ['class'=>' number form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>' annually Deduction'  ]) !!} 
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
      
					<div class="form-group">
					<div class="col-md-3"></div>
					<div class="col-md-3">
					<input type="submit" class="btn btn-success" name="Submit" value="Submit Application Form">
					</div>
					</div>
                </div>
            </div>
        </div>




                                    </div>
                                </div>
                            </div>
                           
                        </div>
{{Form::close()}}


                    </div>
                </div>
            </div>
@endsection