<?php $__env->startSection('content'); ?>
<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')); ?>

<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>

<script type="text/javascript">var tbl_ajax_url='';</script>
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
                                <span>Wallet New</span>
                            </li>
                        </ul>
                     
                    </div>
                    <h3 class="page-title"> Wallet
                        <small>New</small>
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">New Wallet</span>
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
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Wallet Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  <?php echo Form::text('wallet_name', $value=old('wallet_name'),['data-required'=>'1','class'=>'form-control','required'=>'required']); ?>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Select Users
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('user_id',[''=>'']+$all_users->toArray(),true,array('class'=>'form-control select2me','data-required'=>'1' ,'required'=>'required' ,'onchange'=>'getApprovedLoans(this.value)')); ?>

                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-3">Select Loan/Facility
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <?php echo Form::select('loan_applications_id',[],'true',['class'=>'form-control','id'=>'select_loanfacility']); ?>

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3">Select Wallet Category
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="radio-list" data-error-container="#form_2_membership_error">
                                                    <?php $__currentLoopData = $WalletCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wallet_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <label>
                                                        <?php echo Form::radio('wallet_category_id', $wallet_category->id, $wallet_category->id==old('wallet_category_id'),['required'=>'required'] ); ?><?php echo e($wallet_category->name); ?>

                                                        </label>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <div id="form_2_membership_error"> </div>
                                                </div>
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
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>