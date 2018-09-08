<?php $__env->startSection('content'); ?>
            
            <!-- BEGIN CONTENT -->
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
                                <span>Dashboard</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Dashboard
                        <img src="<?php echo e(url('public/images/ngn.png')); ?>" style="float: right">
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo e($no_of_members); ?>"></span>
                                    </div>
                                    <div class="desc"> Members </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value=" <?php echo e(number_format($wallet_amounts[3],2)); ?>"></span> </div>
                                    <div class="desc">Contributions</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number" >
                                        <span data-counter="counterup" data-value="<?php echo e(number_format($total_loan_amount,2)); ?>"></span>
                                    </div>
                                    <div class="desc"> Facilites/Loan </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value=" <?php echo e(number_format($total_revenue,2)); ?>"></span> </div>
                                    <div class="desc"> Revenue</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Users</span>
                                        <div class="btn-group">
                                          <select id="user_type" class="btn dark btn-outline btn-circle btn-sm form-control"  onchange="userchart();">
                                            <option value="">Select User</option>
                                            <option>User</option>
                                            <option>Member</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <select id="user_range" class="btn dark btn-outline btn-circle btn-sm form-control" onchange="userchart();"> 
                                            <option value="">Select range</option>
                                            <option>Daily</option>
                                            <option>Monthly</option>
                                            <option>yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading">
                                        <img src="<?php echo e(url('public/assets/global/img/loading.gif')); ?>" alt="loading" /> </div>
                                    <div id="site_statistics_content" class="display-none">
                                        <div id="site_statistics" class="chart"> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Revenue</span>
                                        <div class="btn-group">
                                          <select id="r_type" class="btn dark btn-outline btn-circle btn-sm form-control"  onchange="revenuechart();">
                                            <option>Revenue</option>
                                            <option>Contribution</option>
                                            <option>Loan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                         <select id="revenue_range" class="btn dark btn-outline btn-circle btn-sm form-control" onchange="revenuechart();"> 
                                            <option value="">Select range</option>
                                            <option>Daily</option>
                                            <option>Monthly</option>
                                            <option>yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading">
                                        <img src="<?php echo e(url('public/assets/global/img/loading.gif')); ?>" alt="loading" /> </div>
                                    <div id="site_activities_content" class="display-none">
                                        <div id="site_activities" style="height: 280px;"> </div>
                                    </div>
                                    <div style="margin: 20px 0 10px 30px">
                                   
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                       
                    </div>
                     <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Revenue</span>
                                        <div class="btn-group">
                                        
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                   
<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Date</th>
                                                <th class="all">Revenue Amount</th>
                                                <th class="all">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $__currentLoopData = $revenues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(date('Y-m-d',strtotime($revenue->dates) )); ?></td>
                                                <td><?php echo e(number_format($revenue->revenue,2)); ?></td>
                                                <td><?php echo e($revenue->description); ?></td>
                                                
                                           </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>



                            </div>
                            <!-- END PORTLET-->
                        </div>
                </div>

               
                <!-- END CONTENT BODY -->
            </div>
           
            <!-- END QUICK SIDEBAR -->
<?php $__env->stopSection(); ?>

<style>.dashboard-stat .details .number { font-size: 26px !important; }</style>





            <script type="text/javascript">
              user_daily = [
                    <?php  foreach ($user_daily as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];

              member_daily = [
                    <?php  foreach ($member_daily as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];

              user_monthly = [
                    <?php  foreach ($user_monthly as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];

              member_monthly = [
                    <?php  foreach ($member_monthly as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];

               user_yearly = [
                    <?php  foreach ($user_yearly as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];

                 member_yearly = [
                    <?php  foreach ($member_yearly as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];




 var visitors =user_daily;
 function userchart(argument) {
  var user_type=$('#user_type').val();
  var user_range=$('#user_range').val();

   if(user_type=='User'){
        if (user_range=='Daily') {
              visitors =user_daily;
        }else if(user_range=='Monthly'){
              visitors =user_monthly;
        }else if(user_range=='yearly'){
             visitors =user_yearly;
        }else{
            visitors =user_daily;
        }

   }else{
         if (user_range=='Daily') {
                      visitors =member_daily;
                }else if(user_range=='Monthly'){
                      visitors =member_monthly;
                }else if(user_range=='yearly'){
                     visitors =member_yearly;
                }else{
                    visitors =member_daily;
                }

   }

             Dashboard.init();
  }

var loan_daily;
var loan_monthly;
var loan_yearly;


loan_daily = [
                    <?php  foreach ($loan_daily as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];
loan_monthly = [
                    <?php  foreach ($loan_monthly as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];
loan_yearly = [
                    <?php  foreach ($loan_yearly as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];

var revenue_monthly;
var revenue_yearly;
var revenue_daily;

revenue_monthly = [
                    <?php  foreach ($revenue_monthly as $key => $value) { if($value >0) ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];
revenue_yearly = [
                    <?php  foreach ($revenue_yearly as $key => $value) { ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php } ?>
                ];
revenue_daily = [
                    <?php  foreach ($revenue_daily as $key => $value) { if($value >0){ ?>
                       ['<?php echo $key ;?>', <?php echo $value ;?>],            
                     <?php }} ?>
                ];

 var data1 = revenue_daily;

  function revenuechart(){
    var revenue_range=$('#revenue_range').val();
    var r_type=$('#r_type').val();


   if(r_type=='Revenue') {
            if(revenue_range=='Daily'){data1=revenue_daily;}
            else if(revenue_range=='Monthly'){data1=revenue_monthly;}
            else if(revenue_range=='yearly'){data1=revenue_yearly;}
                else{data1=revenue_daily; }
   }
   if(r_type=='Loan') {
            if(revenue_range=='Daily'){data1=loan_daily;}
            else if(revenue_range=='Monthly'){data1=loan_monthly;}
            else if(revenue_range=='yearly'){data1=loan_yearly;}
                else{ data1=loan_daily;}
   }
Dashboard.init(); 

  }

</script>



<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>