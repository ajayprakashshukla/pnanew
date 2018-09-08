<?php $__env->startSection('content'); ?>
<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')); ?>

<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>


<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>FACILITY :<?php echo e(isset($facility_detail->name) ? $facility_detail->name : 'New'); ?></span>
                            </li>
                        </ul>
                       
                    </div>
                    <h3 class="page-title"> FACILITY
                        <small><?php echo e(isset($facility_detail->name) ? $facility_detail->name : 'New'); ?></small>
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase"><?php echo e(isset($facility_detail->name) ? $facility_detail->name : 'New Facility'); ?> Facility</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

                                    <?php echo Form::open(['id'=>'form_sample_3','class'=>'form-horizontal','method'=>'post']); ?>


                                        <div class="form-body">
                                            <?php if(count($errors)): ?>:
                                            <div class="alert alert-danger">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>
                                            <?php endif; ?>

                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>

                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Facility Title
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::text('name', $value=isset($facility_detail->name)?$facility_detail->name:old('name'),['data-required'=>'1','class'=>'form-control','required'=>'required']); ?>

                                                </div>
                                                     <?php if($errors->has('name')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>
 


                                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Facility Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::text('description', $value=isset($facility_detail->description)?$facility_detail->description:old('description'),['data-required'=>'1','class'=>'form-control','required'=>'required']); ?>

                                                </div>
                                                     <?php if($errors->has('description')): ?>
                                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>




                                            <div class="form-group<?php echo e($errors->has('facility_category') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Select Facility Category
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="radio-list" data-error-container="#form_2_membership_error">
                                               <?php $__currentLoopData = $facility_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <label>
                                                        <?php echo Form::radio('facility_categories', $facility_category->id, isset($facility_detail->facility_categories)? $facility_detail->facility_categories :old('facility_categories'),['required'=>'required'] ); ?><?php echo e($facility_category->name); ?>

                                                        </label>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <?php if($errors->has('facility_category')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('facility_category')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group<?php echo e($errors->has('min_amount') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Min Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::text('min_amount', $value=isset($facility_detail->min_amount)?$facility_detail->min_amount:old('min_amount'),['data-required'=>'1','class'=>'form-control number','required'=>'required']); ?>

                                                </div>
                                                 <?php if($errors->has('min_amount')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('min_amount')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>
                                             <div class="form-group<?php echo e($errors->has('max_amount') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Max Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::text('max_amount', $value=isset($facility_detail->max_amount)?$facility_detail->max_amount:old('max_amount'),['data-required'=>'1','class'=>'form-control number','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('max_amount')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('max_amount')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Select Interest Rate(%)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('interest_rate',[''=>'']+$percent,
                                                   isset($facility_detail->interest_rate)?$facility_detail->interest_rate:old('interest_rate')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('interest_rate')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('interest_rate')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3">Maximum Tenor(Years)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('maximum_tenor',[''=>'']+$years,
                                                  isset($facility_detail->maximum_tenor)?$facility_detail->maximum_tenor:old('maximum_tenor')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('maximum_tenor')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('maximum_tenor')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>

                                         <div class="form-group">
                                                <label class="control-label col-md-3">Payment Schedule  
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('payment_schedule[]',[''=>'']+$payment_schedule->toArray() ,
                                                  isset($paymentSchedule)? $paymentSchedule:old('payment_schedule')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required','multiple'=>'multiple']); ?>

                                                </div>
                                                <?php if($errors->has('payment_schedul')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('payment_schedul')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>


                                        <div class="form-group">
                                                <label class="control-label col-md-3">Monthly Principal Payment Dates
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('monthly_payment_date',[''=>'']+$date,
                                                   isset($facility_detail->monthly_payment_date)?$facility_detail->monthly_payment_date:old('monthly_payment_date')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('monthly_payment_date')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('monthly_payment_date')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>

 
                                           <div class="form-group">
                                                <label class="control-label col-md-3">Quarterly Principal Payment Dates
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4 quarterly_payment" >
                                                     <div class="col-md-12 quarterly_payment_div">
                                                        <div class="col-md-1">1-)</div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_month_1',[''=>'']+$month,
                                                    isset($quarterly_payment_date['quarterly_payment_month_1'])?$quarterly_payment_date['quarterly_payment_month_1']:old('quarterly_payment_month_1')

                                                    ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                    
                                                    <?php if($errors->has('quarterly_payment_month_1')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_month_1')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_date_1',[''=>'']+$date,
                                                isset($quarterly_payment_date['quarterly_payment_date_1'])?$quarterly_payment_date['quarterly_payment_date_1']:old('quarterly_payment_date_1')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required','placeholder'=>'Month']); ?>


                                                 <?php if($errors->has('quarterly_payment_date_1')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_date_1')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                     </div>  

                                                     <div class="col-md-12 quarterly_payment_div">
                                                        <div class="col-md-1">2-)</div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_month_2',[''=>'']+$month,
                                                   isset($quarterly_payment_date['quarterly_payment_month_2'])?$quarterly_payment_date['quarterly_payment_month_2']:old('quarterly_payment_month_2')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                    
                                                    <?php if($errors->has('quarterly_payment_month_2')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_month_2')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_date_2',[''=>'']+$date,
                                                  isset($quarterly_payment_date['quarterly_payment_date_2'])?$quarterly_payment_date['quarterly_payment_date_2']:old('quarterly_payment_date_2')

                                                ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required','placeholder'=>'Month']); ?>


                                                 <?php if($errors->has('quarterly_payment_date_2')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_date_2')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                     </div>  

                                                     <div class="col-md-12 quarterly_payment_div">
                                                        <div class="col-md-1">3-)</div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_month_3',[''=>'']+$month,
  isset($quarterly_payment_date['quarterly_payment_month_3'])?$quarterly_payment_date['quarterly_payment_month_3']:old('quarterly_payment_month_3')

                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                    
                                                    <?php if($errors->has('quarterly_payment_month_3')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_month_3')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_date_3',[''=>'']+$date,
  isset($quarterly_payment_date['quarterly_payment_date_3'])?$quarterly_payment_date['quarterly_payment_date_3']:old('quarterly_payment_date_3')

                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required','placeholder'=>'Month']); ?>


                                                 <?php if($errors->has('quarterly_payment_date_3')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_date_3')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                     </div> 

                                                      <div class="col-md-12 quarterly_payment_div">
                                                        <div class="col-md-1">4-)</div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_month_4',[''=>'']+$month,
  isset($quarterly_payment_date['quarterly_payment_month_4'])?$quarterly_payment_date['quarterly_payment_month_4']:old('quarterly_payment_month_4')

                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                    
                                                    <?php if($errors->has('quarterly_payment_month_4')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_month_4')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('quarterly_payment_date_4',[''=>'']+$date,
                                                              isset($quarterly_payment_date['quarterly_payment_date_4'])?$quarterly_payment_date['quarterly_payment_date_4']:old('quarterly_payment_date_4')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required','placeholder'=>'Month']); ?>


                                                 <?php if($errors->has('quarterly_payment_date_4')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('quarterly_payment_date_4')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                     </div>   


                                                     
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="control-label col-md-3">Annual Principal Payment Dates  
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <div class="col-md-12 quarterly_payment_div">
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('annual_payment_month',[''=>'']+$month,
                                                   isset($annual_payment_month)?$annual_payment_month:old('annual_payment_month')

                                               ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                    
                                                    <?php if($errors->has('annual_payment_month')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('annual_payment_month')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                              <?php echo Form::select('annual_payment_date',[''=>'']+$date,
                                                  isset($annual_payment_date)?$annual_payment_date:old('annual_payment_date')

                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required','placeholder'=>'Month']); ?>


                                                 <?php if($errors->has('annual_payment_date')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('annual_payment_date')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                                        </div>
                                                     </div> 
                                                </div>
                                              
                                            </div>


                                           <div class="form-group">
                                                <label class="control-label col-md-3">Monthly Interest Payment Dates
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('monthly_interest_payment_date',[''=>'']+$date,
                                                 isset($facility_detail->monthly_interest_payment_date)?$facility_detail->monthly_interest_payment_date:old('monthly_interest_payment_date')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('monthly_interest_payment_date')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('monthly_interest_payment_date')); ?>

                                                                    </strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>



<div class="form-group">
                                                <label class="control-label col-md-3">Select Processing Fee(%)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('processing_fee',[''=>'']+$percent,
                                                 isset($facility_detail->processing_fee)?$facility_detail->processing_fee:old('processing_fee')

                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('processing_fee')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('processing_fee')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Select Insurance Fee(%)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('insurance_fee',[''=>'']+$percent,
                                                    isset($facility_detail->insurance_fee)?$facility_detail->insurance_fee:old('insurance_fee')

                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('insurance_fee')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('insurance_fee')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Select Management Fee(%)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('management_fee',[''=>'']+$percent,
                                                 isset($facility_detail->management_fee)?$facility_detail->management_fee:old('management_fee')
                                                 ,['data-required'=>'1','class'=>'form-control select2me','required'=>'required']); ?>

                                                </div>
                                                <?php if($errors->has('management_fee')): ?>
                                                    <span class="help-block">
                                                                        <strong><?php echo e($errors->first('management_fee')); ?></strong>
                                                                    </span>
                                                     <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
<?php $__env->stopSection(); ?>

<style type="text/css">
    .quarterly_payment{
    padding: 8px;
    border-bottom: 1px solid black;
    border-top: 1px solid black;
}

.quarterly_payment_div{
    padding: 5px;
    border: 1px solid #b2cb40;
    }
</style>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>