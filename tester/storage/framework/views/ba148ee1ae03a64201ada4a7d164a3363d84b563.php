<?php $__env->startSection('content'); ?>
            <!-- BEGIN LOGIN FORM -->

            <?php echo Form::open(['class'=>'login-form','url'=>'/login/', 'method'=>'post']); ?>

            <?php echo e(csrf_field()); ?>

                <div class="form-title">
                    <span class="form-subtitle">Please login.</span>
                </div>
               <!--  <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Company Email and password. </span>
                </div> -->



                 <?php if(isset($error)): ?>
                                <div class="alert alert-danger">
                                <button class="close" data-close="alert"></button>
                                <span> <?php echo e($error); ?> </span>
                            </div>
                    <?php endif; ?>




    <?php if(isset($otp) && $otp !=''): ?>
            <div class="form-group">
                    <?php echo Form::label('otp', 'OTP', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                    <?php echo Form::text('otp', $value = null, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Please enter 6 digit OTP' ]); ?>

                     <?php if($errors->has('otp')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('otp')); ?></strong>
                        </span>
                     <?php endif; ?>
               </div>
               <input type="hidden" name="auth_data" value="<?php echo e($otp); ?>">
           
     <?php else: ?>
                <div class="form-group">
                    <?php echo Form::label('email', 'Company Email', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                    <?php echo Form::email('email', $value = null, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Username' ]); ?>

                     <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                     <?php endif; ?>
               </div>
                
                <div class="form-group">
                    <?php echo Form::label('password', 'Password', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                    <?php echo Form::password('password', ['class'=>'form-control form-control-solid placeholder-no-fix', 'type'=>'password' ,'autocomplete'=>'off', 'placeholder'=>'Password']);; ?>


                    <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

         <?php endif; ?>

                <div class="form-actions">
                    <?php echo Form::submit('Login',['class'=>'btn red btn-block uppercase']);; ?>

                </div>
                <div class="form-actions">
                    <div class="pull-left">
                        <label class="rememberme check">
                               <?php echo Form::checkbox('remember', '1', old('remember') ? true:false );; ?>

                            Remember me </label>
                    </div>
                    <div class="pull-right forget-password-block">
                        <a href="<?php echo e(route('password.request')); ?>" id="forget-password" class="forget-password">Forgot Password?</a>
                    </div>
                </div>
               
                <div class="create-account">
                    <p>
                        <a href="<?php echo e(route('register')); ?>" class="btn-primary btn" id="register-btn">Create an account</a>
                    </p>
                </div>
            <?php echo Form::close(); ?>

            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>