<?php $__env->startSection('content'); ?>


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
                                <span>Add Single/multiple Users</span>
                            </li>
                        </ul>
                     
                    </div>
                    <h3 class="page-title"> Add Single/multiple Users
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Add Single/multiple Users</span>
                                    </div>
                                   
                                </div>

                     <?php if(isset($associated)): ?>
                        <div class="alert alert-danger">
                        <p><?php echo e($associated); ?></p>
                        </div>
                        <?php endif; ?>
                        
                      <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-danger">
                        <p><?php echo e($message); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if($duplicate_users = Session::get('duplicate_users')): ?>
                                           
                                            <div class="alert alert-danger">
                                                 <?php $__currentLoopData = $duplicate_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duplicate_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <li><?php echo e($duplicate_user); ?></li>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <?php endif; ?>

                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

                                    <?php echo Form::open(['id'=>'form_sample_3','class'=>'form-horizontal','method'=>'post','files' => true]); ?>


                                        <div class="form-body">
                                            <?php if(count($errors)): ?>:
                                            <div class="alert alert-danger">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>
                                            <?php endif; ?>



                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>

                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Company Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <textarea name="company_email" rows="6" data-required="1" class="form-control" required><?php echo e(old('company_email')); ?> </textarea>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Company Identification number
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <textarea name="company_id" rows="6" data-required="1" class="form-control" required><?php echo e(old('company_id')); ?> </textarea>
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