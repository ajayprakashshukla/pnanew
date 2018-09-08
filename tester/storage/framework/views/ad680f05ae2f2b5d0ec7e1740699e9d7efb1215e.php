<?php $__env->startSection('content'); ?>
<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')); ?>

<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>


<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo e(url('admin/home')); ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Update Wallet :Individual</span>
                            </li>
                        </ul>
                       
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase"> Update Wallet :Individual</span>
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

                                            <?php if(isset($success)): ?>:
                                            <div class="alert alert-success">
                                                <button class="close" data-close="alert"></button> <?php echo e($success); ?>

                                            </div>
                                            <?php endif; ?>

                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>
<div class="form-group">
    <div class="caption">
    
    <span style="margin-left: 176px;" class="caption-subject font-dark sbold uppercase"> Search User: By -</span>
    </div>
</div>
<div class="form-actions">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Sharp Id
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::select('sharp_ids',[''=>'']+$sharp_ids->toArray(), $value=isset($facility_detail->name)?$facility_detail->name:old('name'),['class'=>'form-control select2me sharp_ids']); ?>

                                                </div>
                                                <div class="col-md-2">
                                                    <a  href="javascript:void(0select)" onclick="getWallets('sharp_ids');"  class="btn green">Search</a>
                                                </div>
                                            </div>
                                         
                                           
                                            <div class="form-group<?php echo e($errors->has('min_amount') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">User Name
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::select('names', [''=>'']+$names->toArray(),$value=isset($facility_detail->min_amount)?$facility_detail->min_amount:old('min_amount'),['class'=>'form-control number select2me names']); ?>

                                                </div>
                                                <div class="col-md-2">
                                                    <a  href="javascript:void(0select)" onclick="getWallets('names');" class="btn green">Search</a>
                                                </div>
                                                
                                            </div>
                                             <div class="form-group<?php echo e($errors->has('max_amount') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Email
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::select('emails', [''=>'']+$emails->toArray(),$value=isset($facility_detail->max_amount)?$facility_detail->max_amount:old('max_amount'),['class'=>'form-control select2me emails']); ?>

                                                </div>
                                                <div class="col-md-2">
                                                    <a  href="javascript:void(0select)" onclick="getWallets('emails');" class="btn green">Search</a>
                                                </div>
                                            </div>
                                            </div>

<div class="form-actions">
                            <div class="form-group<?php echo e($errors->has('wallet') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Select Wallet
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::select('wallet', [],$value=old('wallet'),['class'=>'form-control ','required'=>'required']); ?>

                                                </div>
                                                
                                            </div>
                                            <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Add Amount
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::text('amount',$value=old('amount'),['class'=>'form-control number ','required'=>'required']); ?>

                                                </div>
                                                
                                            </div>
                                            <div class="form-group<?php echo e($errors->has('max_amount') ? ' has-error' : ''); ?>">
                                                <label class="control-label col-md-3">Description 
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::text('description', $value=old('description'),['class'=>'form-control ','required'=>'required']); ?>

                                                </div>
                                            </div>

                                              <div class="form-group<?php echo e($errors->has('max_amount') ? ' has-error' : ''); ?>">
                                              <div class="col-md-5"></div>
                                                   <div class="col-md-2">
                                                    <button  type="submit" class="btn green">Submit</button>
                                                    <button  type="reset" class="btn red">Reset</button>
                                                </div>
                                                </div>
                                            </div>
</div>






                                        </div>


                                        <div class="form-actions">
                                            <div class="row">
                                                
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
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>