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
                                <span>New Application</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> {{$facility_category->name}} / {{$Facility->name}} : 
                        <small>New Application</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                           
                            <div class="portlet light bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red bold uppercase"> New Application -
                                            <span class="step-title"> Step 1 of 4 </span>
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" id="submit_form" method="POST">
                                    <input type=" " name="facility_category" value="{{$facility_category->id}}">
                                    <input type=" " name="facility_id" value="{{$Facility->id}}">

                                    
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> MEMBER’S DETAILS</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> CASH REQUEST DETAILS: </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> 3. GUIDELINES: </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i>  AUTHORIZATION TO DEDUCT: </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">MEMBER’S DETAILS</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">NAME (Surname First)
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" value="{{ $user->name }}"  required readonly name="username" />
                                                                <span class="help-block"> NAME (Surname First) </span>
                                                            </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3">Company
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" required name="company" />
                                                                <span class="help-block"> Company </span>
                                                            </div>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Dept. / Location
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" required name="dept_location" />
                                                                <span class="help-block"> Dept. / Location </span>
                                                            </div>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Employee Sharp ID 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text"  value="{{ $user->id }}" readonly  class="form-control" required name="id" />
                                                                <span class="help-block"> Employee Sharp ID  </span>
                                                            </div>
                                                        </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-md-3">GSM number
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text"  value="{{ $user->mobile_no }}" readonly  class="form-control" required name="mobile_no" />
                                                                <span class="help-block"> GSM number  </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Tel Ext
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text"  value="{{ $user->office_extension }}" readonly  class="form-control" required name="office_extension" />
                                                                <span class="help-block">  Tel Ext  </span>
                                                            </div>
                                                        </div>
                                                           <div class="form-group">
                                                            <label class="control-label col-md-3"> ADDRESS:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text"  value="{{ $user->address }}" readonly  class="form-control" required name="office_extension" />
                                                                <span class="help-block">  ADDRESS:  </span>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">CASH REQUEST DETAILS</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Amount Requested in Words
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" required class="form-control" name="amount_in_words" />
                                                                <span class="help-block"> Provide Amount Requested in Words </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Amount Requested in figures (=N=)
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" required class="form-control number" name="amount_in_figure" />
                                                                <span class="help-block"> Provide Amount Requested in figures (=N=) </span>
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Repayment Duration
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" required class="form-control" name="repayment_duration" />
                                                                <span class="help-block"> Provide Repayment Duration </span>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="control-label col-md-3">Purpose for the Cash Requested
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" required class="form-control" name="purpose_for_cash_request" />
                                                                <span class="help-block"> Purpose for the Cash Requested </span>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                       
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <h3 class="block">GUIDELINES:</h3>



                                                            <ol class="dd-list">
                                                                <li class="dd-item" data-id="13">
                                                                      Maximum Amount is One Million Naira (=N= 1M) Only.
                                                                </li>
                                                                <li class="dd-item" data-id="14">
                                                                     Repayment interest is currently on Monthly interest of 3% Flat rate and reviewable.
                                                                </li>
                                                                <li class="dd-item" data-id="13">
                                                                    Maximum repayment period of 6 months with equal Monthly deduction of Principal and interest for the duration.
                                                                </li>
                                                                <li class="dd-item" data-id="14">
                                                                    Monthly payroll deduction must be within approved loan burden percentage of the Company.
                                                                </li>
                                                                 <li class="dd-item" data-id="13">
                                                                     Treatment of applications shall be on “first come first served” basis and subject to availability of fund.
                                                                </li>
                                                                <li class="dd-item" data-id="14">
                                                                    Applicants are required to attach a copy of immediate past three (3) Months’ Pay Slip.
                                                                </li>
                                                                <li class="dd-item" data-id="13">
                                                                      Society shall have all the rights exercisable by the Indemnifier over all the benefits including but not limited to his /her,
                                                            terminal benefits, retirement benefits, ESP, Superannuation, etc. to the extent to which he/ she is indebted to the Society and
                                                            the amount deductible shall be limited to the amount formally advised to the company by the Cooperative Society.
                                                                </li>
                                                                <li class="dd-item" data-id="14">
                                                                  Completed, signed and executed application is irrevocable
                                                                </li>
                                                            </ol>
 <h3 class="block">AUTHORIZATION TO DEDUCT:</h3>





I,<input type="text" class="smetext" value="{{ $user->name }}" readonly>hereby authorize <input required type="text" class="smetext"> (company name) to deduct from my monthly
salary =N= <input required type="text" class="smetext number" name="deduct_monthly">, and annually =N= <input required type="text" class="smetext number"  name="deduct_annually">from my January lump sum payments being the total
charges due on this transaction and remit to PROGRESSIVE MOBIL EMPLOYEES MULTI-PURPOSE COOPERATIVE
SOCIETY Limited, Akwa Ibom State being loan plus interest of items acquired under car acquisition program and also hereby
agree to abide by the above Terms of agreement.






                                                    </div>
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">AUTHORIZATION TO DEDUCT:</h3>
                                                      
                                                    <center>Submit Now </center>




                                                    </div>
                                                </div>
                                            </div>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>

            @endsection