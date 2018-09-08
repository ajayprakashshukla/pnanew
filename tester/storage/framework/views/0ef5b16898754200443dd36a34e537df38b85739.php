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
                                <span>Wallet</span>
                            </li>
                        </ul>
                     
                    </div>
                    <h3 class="page-title"> Update Wallet : Group
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Update Wallet : Group</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

                                    <?php echo Form::open(['id'=>'form_sample_3','class'=>'form-horizontal','method'=>'post','files' => true]); ?>


                                        <div class="form-body">
                                            <?php if(isset($success) && ($success !='')): ?>:
                                            <div class="alert alert-success">
                                             <button class="close" data-close="alert"></button> <?php echo e($success); ?><br>
                                            </div>
                                            <?php endif; ?>


                                            


                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Import Xlsx
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                          

                                                  <?php echo Form::file('import_file', ['data-required'=>'1','class'=>'form-control','required'=>'required']); ?>

                                                <a href="<?php echo e(url('public/upload/wallet_update.xlsx')); ?>">Download sample xls file</a> 
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