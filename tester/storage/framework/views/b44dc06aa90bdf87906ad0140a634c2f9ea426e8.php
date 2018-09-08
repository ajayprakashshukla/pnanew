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
                                <a href="#">All Wallets </a>
                                <i class="fa fa-circle"></i>
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
                                            <th width="1%">ID </th>
                                            <th width="15%">Creation Date</th>
                                            <th width="10%">Wallet Description</th>
                                            <th width="9%">Wallet type</th>
                                            <th width="10%">User email</th>
                                            <th width="10%">User sharp id</th>
                                            <th width="10%">Monthly Payment</th>
                                            <th width="10%">Quarterly Payment</th>
                                            <th width="25%">Annual Payment</th>
                                            <th width="10%">Wallet Balance</th>
                                            <th width="25%">Action</th>
                                         </tr>

                                                <tr role="row" class="filter">
                                                   <td colspan="">
                                                       
                                                    </td>
                                                    <td colspan="">
                                                          <div style="width: 125px;" class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="creation_date" placeholder="Creation Date">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                   <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="wallet_name" placeholder="Wallet Name">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="wallet_type" placeholder=" Wallet Type">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="company_email" placeholder="Company Email">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="sharp_id" placeholder="Sharp Id">
                                                    </td>
                                                    <td colspan="">
                                                        <input style="" type="text" class="form-control form-filter input-sm" name="monthly_payment" placeholder="Monthly Payment">
                                                    </td>
                                                     <td colspan="">
                                                       <input style="" type="text" class="form-control form-filter input-sm" name="quarterly_payment" placeholder="Quarterly Payment">
                                                    </td>
                                                     <td colspan="">
                                                       <input style="" type="text" class="form-control form-filter input-sm" name="annual_payment" placeholder="Annual Payment">
                                                    </td>
                                                     <td colspan="">
                                                       <input style="" type="text" class="form-control form-filter input-sm" name="wallet_balance" placeholder="Wallet Balance">
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
            <script type="text/javascript">var tbl_ajax_url="<?php echo url('admin/wallets'); ?>"; </script>
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