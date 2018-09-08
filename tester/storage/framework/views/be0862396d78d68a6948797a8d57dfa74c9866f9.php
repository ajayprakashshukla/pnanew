<?php $__env->startSection('content'); ?>

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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span> <?php echo e($facility_category->name); ?></span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> <?php echo e($facility_category->name); ?>

                        <small>(<?php echo e($Facility->name); ?>)</small>
                    </h3>
                   
                    <div class="row">
                        <div class="col-md-12">
                             <?php echo Form::open(['id'=>'','class'=>'form-horizontal','method'=>'post']); ?>

                               <input type="hidden" name="facility_id" value="<?php echo e($Facility->id); ?>">
                               <input type="hidden" name="facility_category" value="<?php echo e($facility_category->id); ?>" >
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>THRIFT LOAN REQUEST FORM </div>
                                    <div class="tools">
                                              <?php if($app_datas->status==1): ?>
                                                <span class="btn btn-success">Approved</span>
                                                <?php elseif($app_datas->status==2): ?>:
                                                <span class="btn btn-danger">Rejected</span>
                                                <?php else: ?>
                                                <span class="btn btn-primary">Pending</span>
                                                <?php endif; ?>
                                    </div>
                                </div>
                               
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



        

                                       <?php if(count($errors) > 0): ?>
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>





    <div class="form-group">
        <label class="control-label col-md-3">NAME (Surname First)
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('name', $value = ($applicant->surname).' '.($applicant->name).' '.($applicant->lastname) , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Full Name' ,'readonly'=>'readonly' ]); ?> 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Company
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('company', $value = $app_datas->company  , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Company','readonly'=>'readonly'   ]); ?> 
        </div>
         <?php if($errors->has('company')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('company')); ?></strong>
                            </span>
         <?php endif; ?> 
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Dept. / Location
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('dept_location', $value = $app_datas->dept_location  , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Dept. / Location'  ,'readonly'=>'readonly']); ?> 
        <?php if($errors->has('dept_location')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('dept_location')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
        
    </div>

   <div class="form-group">
        <label class="control-label col-md-3">Employee Sharp ID .
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('user_id', $value = $applicant->id , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee Sharp ID' ,'readonly'=>'readonly' ]); ?> 
        </div>
    </div>

   <div class="form-group">
        <label class="control-label col-md-3">GSM number .
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('gsm_number', $value = '+'.($applicant->mobile_no_country).' '.($applicant->mobile_no) , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'GSM number' ,'readonly'=>'readonly' ]); ?> 
        </div>
    </div>


       <div class="form-group">
        <label class="control-label col-md-3">Tel Ext.
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('tel_ext', $value =  $applicant->office_extension , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee Sharp ID' ,'readonly'=>'readonly' ]); ?> 
        </div>
    </div>

       <div class="form-group">
        <label class="control-label col-md-3">ADDRESS .
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('address', $value = $applicant->address , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee Sharp ID' ,'readonly'=>'readonly' ]); ?> 
        </div>
    </div>



                                              <!-- ================================================= -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"> 2. CASH REQUEST DETAILS: </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_2" class="panel-collapse collapse">
                                                <div class="panel-body" >
    <div class="form-group">
        <label class="control-label col-md-3">Amount Requested in Words
            <span class="required"> * </span>
        </label>
        <div class="col-md-9">
       <?php echo Form::text('amount_in_words', $value = $app_datas->amount_in_words , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Amount Requested in Words' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('amount_in_words')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('amount_in_words')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3">Amount in figures (=N=)
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('amount_in_figure', $value =$app_datas->amount_in_figure  , $attributes = ['class'=>' number form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Amount in figures (=N=)' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('amount_in_figure')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('amount_in_figure')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>
                                               
    <div class="form-group">
        <label class="control-label col-md-3">Tenor
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('tenor', $value =$app_datas->tenor  , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'tenor' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('tenor')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('tenor')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>
            
    <div class="form-group">
        <label class="control-label col-md-3">Purpose for Loan
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('purpose_for_cash_request', $value = $app_datas->purpose_for_cash_request , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'purpose_for_cash_request' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('purpose_for_cash_request')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('purpose_for_cash_request')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>




                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"> 3. GUIDELINES: </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3" class="panel-collapse collapse">
                                                <div class="panel-body">

 <ol>                                                
<li> Maximum Loan amount is 200% (i.e. Two Times) of Member’s Total Savings</li>
<li> Maximum Loan amount shall not exceed Five Million Naira only (=N= 5M).</li>
<li> Repayment interest is currently on Yearly interest of 5% reducing balance and reviewable.</li>
<li> Maximum repayment period of 48 months with equal Monthly deduction of Principal and interest.</li>
<li> Minimum saving must be 20% of Monthly repayment (i.e. one quarter of the Monthly deduction ofPrincipal & interest).</li>
<li> Monthly payroll deduction must be within approved Loan Burden Allowance of the Company.</li>
<li> Treatment of applications shall be on “first come first served” basis and subject to availability of fund.</li>
<li> Applicants are required to attach a copy of immediate past three (3) Months’ Pay Slip.</li>
<li> Society shall have all the rights exercisable by the Indemnifier over all the benefits including but not limited to his /her,
terminal benefits, retirement benefits, ESP, Superannuation, etc. to the extent to which he/ she is indebted to the Society and
the amount deductible shall be limited to the amount formally advised to the company by the Cooperative Society.</li>
<li> Completed, signed and executed application is irrevocable.</li>
</ol>
                                                </div>
                                            </div>
                                        </div>



<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4"> 4. Upload Files: </a>
                </h4>
            </div>
            <div id="collapse_4" class="panel-collapse collapse">
                <div class="panel-body" id="last_file_div">
                    <div class="form-group" >
                           <?php $files= json_decode($app_datas->files);  ?>
                             <?php if(count($files)): ?>

                           <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="col-md-12"> <a href="<?php echo e(url('public/upload/'.App\Common\Common::getFile(['id'=>$file->file]) )); ?>">(<?php echo e($key+1); ?>.)  <?php echo e($file->title); ?></a></div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           <?php endif; ?>
                    </div>
               </div>
            </div>
 </div>

<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5"> 5. Upload Signature:  </a>
                </h4>
            </div>
            <div id="collapse_5" class="panel-collapse collapse">
                <div class="panel-body">
 <div class="form-group<?php echo e($errors->has('signature') ? ' has-error' : ''); ?>">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                            <?php if(isset($app_datas->signature)): ?>
                            <img src="<?php echo e(url('public/upload/'.App\Common\Common::getFile(['id'=>$app_datas->signature]))); ?>" alt="" /> 
                            <?php else: ?> 
                            <img src="<?php echo e(url('/public/images/signhere.png')); ?>" alt="" /> 
                            <?php endif; ?>
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
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6"> 6. AUTHORIZATION TO DEDUCT: </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_6" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                  <h4>To: Manager, Payroll</h4>
      <div class="form-group">
        <label class="control-label col-md-3">I have just obtained a Thrift loan of
            <span class="required"> * </span>
        </label>
        <div class="col-md-9">
       <?php echo Form::text('thrift_loan_of', $value = $app_datas->thrift_loan_of  , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Thrift loan of' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('thrift_loan_of')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('thrift_loan_of')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>

     <div class="form-group">
        <label class="control-label col-md-3">(=N=)
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('thrift_loan_of_n', $value = $app_datas->thrift_loan_of_n, $attributes = ['class'=>'  form-control number form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'(=N=)' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('thrift_loan_of_n')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('thrift_loan_of_n')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3">from the Cooperative Society. I hereby authorize you to deduct the following amount
            <span class="required"> * </span>
        </label>
        <div class="col-md-9">
       <?php echo Form::text('deduction_amount', $value = $app_datas->deduction_amount , $attributes = ['class'=>'  form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'deduction amount','readonly'=>'readonly'  ]); ?> 
        <?php if($errors->has('deduction_amount')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('deduction_amount')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">(=N=)
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('deduction_amount_n', $value = $app_datas->deduction_amount_n , $attributes = ['class'=>'  form-control number form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'(=N=)' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('deduction_amount_n')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('deduction_amount_n')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3">from my Salary monthly in equal installments of 
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
       <?php echo Form::text('salary_monthly', $value =$app_datas->salary_monthly  , $attributes = ['class'=>'  form-control number form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'No of instasllments' ,'readonly'=>'readonly' ]); ?> 
        <?php if($errors->has('salary_monthly')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('salary_monthly')); ?></strong>
                            </span>
         <?php endif; ?> 
        </div>
    </div>


  

  <div class="form-group">
    <label class="control-label col-md-3">with effect from</label>
    <div class="col-md-3">
        <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
            <input value= "<?php echo e($app_datas->effect_from); ?>" type="text" name="effect_from" class="form-control" readonly>
            <span class="input-group-btn">
                <button class="btn default" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
        </div>
          <?php if($errors->has('effect_from')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('effect_from')); ?></strong>
                            </span>
            <?php endif; ?>
    </div>
</div>

                                                </div>
                                            </div>
                                        </div>



<?php echo e(Form::close()); ?>


<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_7"> 7. FOR OFFICIAL USE ONLY: REVIEWERS: </a>
                </h4>
            </div>
            <div id="collapse_7" class="panel-collapse collapse">
                <div class="panel-body" >

                 <?php echo Form::open(['id'=>'','class'=>'form-horizontal','method'=>'post']); ?>

                      
                    <input type="hidden" name="facility_id" value="<?php echo e($Facility->id); ?>">
                    <input type="hidden" name="facility_category" value="<?php echo e($facility_category->id); ?>" >




                     <div class="form-group" >
                       <div class="form-group" >
                           <table class="table" style="width: 80%;margin: 20px;">
                            <tr><th></th><th></th> <th>Amount (=N=)</th></tr>

                            
                               <tr><td>A</td><td>Total Approved Ammount</td><td>
                                  <input type="text" class="form-control number" value="<?php echo e($app_datas->approved_ammount); ?>"  name="approved_ammount"></td></tr>
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
                                            <option <?php echo e($Pending); ?> value="">Select</option>
                                            <option <?php echo e($Approve); ?> value="1">Approve</option>
                                            <option <?php echo e($Reject); ?> value="2">Reject</option>
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
                    <input value= "<?php echo e($app_datas->approvel_date); ?>" type="text" name="approvel_date" class="form-control" readonly>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
                  <?php if($errors->has('approvel_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('approvel_date')); ?></strong>
                                    </span>
                    <?php endif; ?>
            </div>
        </div>
    </td>
</tr>
<td></td><td></td><td><input type="submit" class="btn btn-success" value="Save Details"  name="loan"></td></tr>
                           </table>
                    </div>
                    </div>

                    <?php echo e(Form::close()); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>