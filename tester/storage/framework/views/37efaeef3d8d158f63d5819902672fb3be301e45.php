<?php $__env->startSection('content'); ?>
            
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 500px !important">
                   
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?php echo e(url('admin/home')); ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                         
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                   
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                 
                    <div class="clearfix"></div>

                    <div class="col-md-12"> 
                    <div class="col-md-6">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/0v3CmiH4-bc" frameborder="0" allowfullscreen></iframe>
                    </div>
                    
                    <!-- END DASHBOARD STATS 1-->
                 </div>
                  

               
                <!-- END CONTENT BODY -->
            </div>
           </div>
            <!-- END QUICK SIDEBAR -->
<?php $__env->stopSection(); ?>





<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>