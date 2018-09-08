<?php $__env->startSection('content'); ?>
<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')); ?>

<?php echo Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>


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
                                <a href="index.html">Admin</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Wallet : <?php echo e(isset($wallet['wallet_name']) ? $wallet['wallet_name'] : 'New'); ?></span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                     
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                                  <?php if(count($errors) > 0): ?>
                                        <div class="alert alert-danger">
                                           <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                            <div class="portlet light bordered" id="form_wizard_1">
                                
                                <div class="portlet-body form">
                                    
                                    <?php echo Form::open(['id'=>'submit_form','class'=>'form-horizontal','method'=>'post']); ?>

                                   


                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Wallet Detail</span>
                                                        </a>
                                                    </li>
                                                   
                                                    
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Confirm </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Provide your account details</h3>


<div class="form-group">
        <label class="control-label col-md-3">Creation Date
            <span class="required"> * </span>
        </label>
        <div class="input-group input-medium date date-picker col-md-4" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                    <input value= "<?php echo e(date('Y-m-d',strtotime($wallet['creation_date']))); ?>" type="text" name="creation_date" class="form-control" readonly>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>

</div>


<div class="form-group">
        <label class="control-label col-md-3">Wallet Name
             <span class="required"> * </span>
        </label>
        <div class="col-md-4">
        <?php echo Form::text('wallet_name', $value=isset($wallet->wallet_name)?$wallet->wallet_name:old('wallet_name'),['data-required'=>'1','class'=>'form-control','required'=>'required']); ?>

    </div>
</div>

<div class="form-group">
        <label class="control-label col-md-3">Wallet Type
             <span class="required"> * </span>
        </label>
        <div class="col-md-4">
        <?php echo Form::text('wallet_type', $value=isset($wallet->wallet_type)?$wallet->wallet_type:old('wallet_type'),['data-required'=>'1','class'=>'form-control','required'=>'required']); ?>

    </div>
</div>



<div class="form-group">
        <label class="control-label col-md-3">Company Email
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">

        
      <?php echo Form::text('company_email', $value=isset($wallet->company_email)?$wallet->company_email:old('company_email'),['data-required'=>'1' ,   'class'=>'form-control','required'=>'required']); ?>

    </div>
</div>



<div class="form-group">
        <label class="control-label col-md-3">  Sharp Id.
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">

        
      <?php echo Form::text('sharp_id', $value=isset($wallet->sharp_id)?$wallet->sharp_id:old('sharp_id'),['data-required'=>'1',   'class'=>'form-control','required'=>'required']); ?>

    </div>
</div>

<div class="form-group">
        <label class="control-label col-md-3"> Monthly Payment
        </label>
        <div class="col-md-4">

        
      <?php echo Form::text('monthly_payment', $value=isset($wallet->monthly_payment)?$wallet->monthly_payment:old('monthly_payment'),['data-required'=>'1',   'class'=>'form-control']); ?>

    </div>
</div>


<div class="form-group">
        <label class="control-label col-md-3"> Quarterly Payment    
        </label>
        <div class="col-md-4">

        
      <?php echo Form::text('quarterly_payment', $value=isset($wallet->quarterly_payment)?$wallet->quarterly_payment:old('quarterly_payment'),['data-required'=>'1',   'class'=>'form-control']); ?>

    </div>
</div>




<div class="form-group">
        <label class="control-label col-md-3">Annual Payment    
        </label>
        <div class="col-md-4">

        
      <?php echo Form::text('annual_payment', $value=isset($wallet->annual_payment)?$wallet->annual_payment:old('annual_payment'),['data-required'=>'1',   'class'=>'form-control']); ?>

    </div>
</div>
<div class="form-group">
        <label class="control-label col-md-3">Wallet Balance    
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">

        
      <?php echo Form::text('wallet_balance', $value=isset($wallet->wallet_balance)?$wallet->wallet_balance:old('wallet_balance'),['data-required'=>'1',   'class'=>'form-control','required'=>'required']); ?>

    </div>
</div>


                                                        
</div>
                                                    
                                                    
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">Confirm your details</h3>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Creation Date:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="creation_date"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Wallet Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="wallet_name"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Wallet type:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="wallet_type"> </p>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Company Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="company_email"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Sharp Id:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="sharp_id"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Monthly Payment:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="monthly_payment"> </p>
                                                            </div>
                                                        </div>

                                                           <div class="form-group">
                                                            <label class="control-label col-md-3">Quarterly Payment:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="quarterly_payment"> </p>
                                                            </div>
                                                        </div>
                                                           <div class="form-group">
                                                            <label class="control-label col-md-3">Annual Payment:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="annual_payment"> </p>
                                                            </div>
                                                        </div>
                                                           <div class="form-group">
                                                            <label class="control-label col-md-3">Wallet Balance :</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="wallet_balance"> </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Back </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <input type="submit" onclick="$('form').submit();" class="btn green button-submit" value="Submit"> 
                                                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
<?php $__env->stopSection(); ?>

<script type="text/javascript">
    
jQuery(document).ready(function() {
    
});

</script>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>