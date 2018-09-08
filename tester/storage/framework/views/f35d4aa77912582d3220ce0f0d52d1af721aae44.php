<?php $__env->startSection('content'); ?>

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
                                <a href="#">User</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Users</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
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
                        <div class="col-md-12">
                           
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                               
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <!--  -->
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                                        <thead>
                                          <tr role="row" class="heading">
                                            <th width="1%"> </th>
                                            <th width="15%"> Name</th>
                                            <th width="10%">Company Email</th>
                                            <th width="9%">Sharp Id</th>
                                            <th width="10%">Mobile No</th>
                                            <th width="10%">Secondary Email</th>
                                            <th width="10%">Monthly Contribution</th>
                                            <th width="10%">Online status</th>
                                            <th width="25%">Action</th>
                                         </tr>




   
        ',



                                                <tr role="row" class="filter">
                                                   <td colspan="">
                                                       
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="name" placeholder="name">
                                                    </td>
                                                   <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="email" placeholder="Company Email">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="sharp_id" placeholder=" Sharp Id">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="mobile_no" placeholder="Mobile No">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="secondary_email" placeholder="Secondary Email">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="proposed_monthly_income" placeholder="Monthly Contribution">
                                                    </td>
                                                     <td colspan="">
                                                       
                                                    </td>

                                                    <td>
                                                         <div class="margin-bottom-5">
                                                            <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                                <i class="fa fa-search"></i> Search</button>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </thead>



                                            <tbody> </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End: life time stats -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <script type="text/javascript">var tbl_ajax_url="<?php echo url('admin/users'); ?>"; </script>
<?php $__env->stopSection(); ?>


<style>
.toggle.btn.btn-danger.off {
    margin-top: -8px !important;
}

.toggle.btn.btn-success {
    margin-top: -8px !important;
}
</style>




<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>