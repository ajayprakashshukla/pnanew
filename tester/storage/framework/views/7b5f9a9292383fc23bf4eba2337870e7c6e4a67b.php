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
                                <a href="<?php echo e(url('admin/home')); ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Users</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Applications</span>
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
                
                   
                    
                    <div class="row">
                      <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                        <p><?php echo e($message); ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>All Applications </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Facility Name</th>
                                                <th class="all">Facility Category</th>
                                                <th class="all">User Name </th>
                                                
                                                <th class="all">Status</th>
                                                <th class="all">View</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $__currentLoopData = $app_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($app_data->facilities_name); ?></td>
                                                <td><?php echo e($app_data->facility_category_name); ?></td>

                                                <td><?php echo e($app_data->user_name); ?></td>
                                                
                                                <td>
                                               <?php if($app_data->status==1): ?>
                                                <button class="btn btn-success">Approved</button>
                                                <?php elseif($app_data->status==2): ?>
                                                <button class="btn btn-danger">Rejected</button>
                                                <?php else: ?>
                                                <button class="btn btn-primary">Pending</button>
                                                <?php endif; ?>
                                                </td>
                                                <td><a class="btn btn-danger " href="<?php echo e(url('admin/view_application')); ?>/<?php echo e($app_data->id); ?>">View</a></td>
                                           </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>