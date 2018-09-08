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
                                <a href="#">Users</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Approvers</span>
                            </li>
                        </ul>
                    
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
                                        <i class="fa fa-globe"></i>All Approvers </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Full name</th>
                                                <th class="min-phone-l">Company Email</th>
                                                <th class="min-phone-l">Mobile No.</th>
                                                <th class="min-phone-l">Role</th>
                                                 <th class="min-phone-l">Status</th>
                                                <th class="">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $__currentLoopData = $approvers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($approver->name); ?></td>
                                                <td><?php echo e($approver->email); ?></td>
                                                 <td><?php echo e($approver->mobile_no); ?></td>
                                                <td>
                                                    <?php if($approver->role==1): ?>
                                                    
                                                <button class="btn btn-success"> Admin</button>
                                                 <?php else: ?>
                                                 <button class="btn btn-success"> Approver</button>
                                                <?php endif; ?>

                                                </td>
                                                 <td> 
                                                 <?php if($approver->status): ?>
                                                 <button class="btn btn-success"> Active</button>
                                                 <?php else: ?>
                                                 <button class="btn btn-danger"> Deactive</button>
                                                <?php endif; ?>
                                                 
                                                 </td>
                                                <td>
                                                <!-- <a href="<?php echo e(url('admin/approvers/'.$approver->id)); ?>"class="btn btn-sm btn-success"> Edit</a> -->
                                                  <button onclick ="deletedata('approversDelete',<?php echo e($approver->id); ?>)"   class="btn btn-sm btn-danger ">Delete</button>
                                                </td>
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