<?php $__env->startSection('content'); ?>
            
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Wallet</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span><<?php echo e($WalletUsers->name); ?></span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Wallet Details
                        <small>(<?php echo e($WalletUsers->name); ?>)</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        

<?php if($wallet_category->id==1): ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo e(url('admin/wallet_summary')); ?>/<?php echo e($WalletUsers->id); ?>/1">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="<?php echo e($total_amount); ?>"></span>
                                    </div>
                                    <div class="desc"> Contributions </div>
                                </div>
                            </a>
                        </div>
<?php elseif($wallet_category->id==3): ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo e(url('admin/wallet_summary')); ?>/<?php echo e($WalletUsers->id); ?>/3">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="<?php echo e($total_amount); ?>"></span></div>
                                    <div class="desc "> Quick cash</div>
                                </div>
                            </a>
                        </div>
<?php elseif($wallet_category->id==2): ?>                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo e(url('admin/wallet_summary')); ?>/<?php echo e($WalletUsers->id); ?>/2">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="<?php echo e($total_amount); ?>"></span>
                                    </div>
                                    <div class="desc"> Loans </div>
                                </div>
                            </a>
                        </div>
<?php elseif($wallet_category->id==4): ?>                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo e(url('admin/wallet_summary')); ?>/<?php echo e($WalletUsers->id); ?>/4">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" class="total_amounts" data-value="<?php echo e($total_amount); ?>"></span> </div>
                                    <div class="desc"> Net Position </div>
                                </div>
                            </a>
                        </div>

  <?php endif; ?>         


<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="#">
        <div class="visual">
           
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="no_of_deposit" data-value="<?php echo e($no_of_deposit); ?>"></span> </div>
            <div class="desc"> No of deposits</div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="#">
        <div class="visual">
           
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="no_of_withdrawals" data-value="<?php echo e($no_of_withdrawals); ?>"></span> </div>
            <div class="desc"> no of withdrawals</div>
        </div>
    </a>
</div>


<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="">
        <div class="visual">
           
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="total_debit" data-value="<?php echo e($debit); ?>"></span> </div>
            <div class="desc"> Total deposits</div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
    <a class="dashboard-stat dashboard-stat-v2 " href="">
        <div class="visual">
            
        </div>
        <div class="details">
            <div class="number"> 
                <span data-counter="counterup" class="total_credit" data-value="<?php echo e($credit); ?>"></span> </div>
            <div class="desc"> Total Withdrawals </div>
        </div>
    </a>
</div>



                    </div>
                    <div class="clearfix"></div>

<!-- ================================================================================ -->


                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                      




                        <div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Summary</span>
                                        
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                <!-- ============================================ -->
                                   <div class="portlet light portlet-fit portlet-datatable bordered">
                               
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <div class="table-actions-wrapper">
                                           
                                       
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                                        <thead>
                                          <tr role="row" class="heading">
                                            
                                            <th width="20%">Date</th>
                                            <th width="20%">Debit</th>
                                            <th width="20%">Credit</th>
                                            <th width="20%">Description</th>
                                            <th width="20%">Total</th>
                                          </tr>
                                            </thead>
                                            <tbody> </tbody>
                                        </table>
                                    </div>
                                </div>

                          

                            </div>
                                <!-- ============================================= -->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                            
        

<div class="row">
<h3 class="page-title">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    Wallet Details          
   </div>
   <br>
  </h3>   
<?php $__currentLoopData = $WalletsDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $WalletsDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo e(url('admin/wallet_summary')); ?>/<?php echo e($WalletUsers->id); ?>/1">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    
                                      <div class="desc"><span class="btn btn-danger">Wallet Name: <?php echo e($WalletsDetail['wallet_name']); ?></span></div>
                                      <div class="desc">Debit : <?php echo e($WalletsDetail['debit']); ?></div>
                                      <div class="desc">Credit:<?php echo e($WalletsDetail['credit']); ?></div>
                                      <div class="desc">Total : <?php echo e($WalletsDetail['total_amount']); ?></div>
                                      <div class="desc">Status:<?php echo e($WalletsDetail['status']); ?></div>
                                </div>
                            </a>
                        </div>  
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>













                    </div>
                   
                  
                </div>
                <!-- END CONTENT BODY -->
            </div>
        <script type="text/javascript">var tbl_ajax_url="<?php echo url('admin/debit_credit_summary/'. $WalletUsers->id.'/'.$wallet_category->id); ?>"; </script>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>