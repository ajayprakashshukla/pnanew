<?php

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

?>


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
                                <span>Profile</span>
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
                    <h3 class="page-title"> My Profile | Account
                     
                    </h3>
                      <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                        <p><?php echo e($message); ?></p>
                        </div>
                        <?php endif; ?>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                      
                         <?php if(isset($user->img)): ?>
                            <img src="<?php echo e(url('public/upload/'.App\Common\Common::getFile(['id'=>$user->img]))); ?>"  class="img-responsive" alt="" />
                            <?php else: ?> 
                            <img src="<?php echo e(url('/public/images/avtar.png')); ?>" class="img-responsive"  alt="" /> 
                            <?php endif; ?>


                                         </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"><?php echo e($user->name); ?> </div>
                                        <div class="profile-usertitle-job"> <?php echo e($user->email); ?> </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                   <!--  <div class="profile-userbuttons">
                                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                    </div> -->
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                              <!--       <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li>
                                                <a href="page_user_profile_1.html">
                                                    <i class="icon-home"></i> Overview </a>
                                            </li>
                                            <li class="active">
                                                <a href="page_user_profile_1_account.html">
                                                    <i class="icon-settings"></i> Account Settings </a>
                                            </li>
                                            <li>
                                                <a href="page_user_profile_1_help.html">
                                                    <i class="icon-info"></i> Help </a>
                                            </li>
                                        </ul>
                                    </div> -->
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                                <!-- PORTLET MAIN -->
                                <!-- -->
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                </div>
      <ul class="nav nav-tabs">
        <li  <?php if(null === old('tab')): ?>
             class="active"
             <?php endif; ?>
          >
            <a href="#tab_1_1" data-toggle="tab" id="tab1">Personal Info</a>
        </li>
        <li <?php if('2' === old('tab')): ?>
             class="active"
             <?php endif; ?>  >
            <a href="#tab_1_2" data-toggle="tab" id="tab2">Change Avatar</a>
        </li>
        <li <?php if('3' === old('tab')): ?>
             class="active"
             <?php endif; ?>   >
            <a href="#tab_1_3" data-toggle="tab" id="tab3">Change Password</a>
        </li>
    </ul>
</div>
<div class="portlet-body">
    <div class="tab-content">
        <!-- PERSONAL INFO TAB -->
        <div  
             <?php if(null === old('tab')): ?>
             class="tab-pane active"
             <?php else: ?>
              class="tab-pane"
             <?php endif; ?>
     id="tab_1_1">
            <?php echo Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block']); ?>

            <?php echo e(csrf_field()); ?>


          


            <div class="form-group">
              <?php echo Form::label('name', 'First Name', ['class' => 'control-label']);; ?>

              <?php echo Form::text('name', $value = $user->name, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Full Name' ]); ?> 
              <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
              <?php endif; ?> 
            </div>


  <div class="form-group">
              <?php echo Form::label('middle_name', 'Middle Name', ['class' => 'control-label']);; ?>

              <?php echo Form::text('middle_name', $value = $user->middle_name, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Middle Name' ]); ?> 
              <?php if($errors->has('middle_name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('middle_name')); ?></strong>
                            </span>
              <?php endif; ?> 
            </div>


            <div class="form-group">
              <?php echo Form::label('lastname', 'Last Name', ['class' => 'control-label']);; ?>

              <?php echo Form::text('lastname', $value = $user->lastname, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Last Name' ]); ?> 
              <?php if($errors->has('lastname')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('lastname')); ?></strong>
                            </span>
              <?php endif; ?> 
            </div>

            <div class="form-group">

              <?php echo Form::label('sharp_id', 'Employee No. (Sharp Id)', ['class' => 'control-label']);; ?>


              <?php echo Form::text('sharp_id', $value = $user->sharp_id, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee No. (Sharp Id)' ]); ?> 

              <?php if($errors->has('sharp_id')): ?>

                            <span class="help-block">

                                <strong><?php echo e($errors->first('sharp_id')); ?></strong>

                            </span>

              <?php endif; ?> 

            </div>

            <div class="form-group">

              <?php echo Form::label('proposed_monthly_income', 'Proposed monthly Income ', ['class' => 'control-label']);; ?>


              <?php echo Form::text('proposed_monthly_income', $value = $user->proposed_monthly_income, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Proposed monthly Income' ]); ?> 

              <?php if($errors->has('proposed_monthly_income')): ?>

                            <span class="help-block">

                                <strong><?php echo e($errors->first('proposed_monthly_income')); ?></strong>

                            </span>

              <?php endif; ?> 

            </div>












                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('email', 'Company Email', ['class' => 'control-label ']);; ?>

                     <?php echo Form::text('email', $value = $user->email , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Company Email' ]); ?> 
                     <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>

                <div class="form-group<?php echo e($errors->has('secondary_email') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('secondary_email', 'Secondary Email', ['class' => 'control-label ']);; ?>

                     <?php echo Form::text('secondary_email', $value = $user->secondary_email , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Secondary Email' ]); ?> 
                     <?php if($errors->has('secondary_email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('secondary_email')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>


                <div class="form-group<?php echo e($errors->has('mobile_no') ? ' has-error' : ''); ?>">
                 <?php echo Form::label('mobile_no', 'Mobile no.', ['class' => 'control-label ']);; ?>

                
                  <?php echo Form::text('mobile_no', $value = $user->mobile_no , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,'placeholder'=>'Mobile No' ,'pattern'=>'[0-9]{10}']); ?>

                
                <?php if($errors->has('mobile_no')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('mobile_no')); ?></strong>
                                                    </span>
                                                <?php endif; ?>

                </div>

                <div class="form-group<?php echo e($errors->has('office_extension') ? ' has-error' : ''); ?>">
                 <?php echo Form::label('office_extension', 'Office Extension.', ['class' => 'control-label ']);; ?>

               
                  <?php echo Form::text('office_extension', $value = $user->office_extension , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,'placeholder'=>'Office Extension ','pattern'=>'[0-9]{5}' ]); ?>

               
                <?php if($errors->has('office_extension')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('office_extension')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                </div>




           <div class="form-group<?php echo e($errors->has('next_of_kin') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('next_of_kin', 'Next Of Kin ', ['class' => 'control-label ']);; ?>

                     <?php echo Form::text('next_of_kin', $value = $user->next_of_kin , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Next Of Kin ' ]); ?> 
                     <?php if($errors->has('next_of_kin')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('next_of_kin')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>

          <div class="form-group<?php echo e($errors->has('relationship_with_next_of_kin') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('relationship_with_next_of_kin', 'Relationship With Next Of Kin', ['class' => 'control-label ']);; ?>

                     <?php echo Form::text('relationship_with_next_of_kin', $value = $user->relationship_with_next_of_kin , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Relationship With Next Of Kin' ]); ?> 
                     <?php if($errors->has('relationship_with_next_of_kin')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('relationship_with_next_of_kin')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>




                <div class="form-group<?php echo e($errors->has('next_of_kin_phone_number') ? ' has-error' : ''); ?>">
                 <?php echo Form::label('next_of_kin_phone_number', 'Next Of Kin Phone Number.', ['class' => 'control-label ']);; ?>

                
                  <?php echo Form::text('next_of_kin_phone_number', $value =  $user->next_of_kin_phone_number , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number' , 'autocomplete'=>'off' ,'placeholder'=>'Next Of Kin Phone Number ','max'=>'9999999999' ]); ?>

                
                <?php if($errors->has('next_of_kin_phone_number')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('next_of_kin_phone_number')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                </div>



          <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('address', 'Address', ['class' => 'control-label ']);; ?>

                     <?php echo Form::text('address', $value = $user->address , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Address' ]); ?> 
                     <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>

            <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('state', 'State', ['class' => 'control-label ']);; ?>

                     <?php echo Form::text('state', $value = $user->state , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'State' ]); ?> 
                     <?php if($errors->has('state')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('state')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>


               <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('country', 'Country', ['class' => 'control-label ']);; ?>


                     <?php echo Form::select('country', $countries, $user->country ,$attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Country' ]);; ?>


                     <?php if($errors->has('country')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('country')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                                                          
                <div class="margiv-top-10">
                    <?php echo Form::submit('Save Changes',['class'=>'btn green', 'name'=>'persional info']);; ?>

                    <a type="button" href="<?php echo e(url('profile#tab_1_1')); ?>" id="back-btn" class="btn btn-default">Cancel</a>

                </div>
             <?php echo Form::close(); ?>

    </div>
    <!-- END PERSONAL INFO TAB -->
    <!-- CHANGE AVATAR TAB -->
   
   <div 
        <?php if('2'== old('tab')): ?>
             class="tab-pane active" 
             <?php else: ?>
             class="tab-pane"
             <?php endif; ?> 
    id="tab_1_2" >
                                                       
     <?php echo Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block','files'=>true]); ?>

            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="tab" value="2">
                <div class="form-group<?php echo e($errors->has('img') ? ' has-error' : ''); ?>">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                            <?php if(isset($user->img)): ?>
                            <img src="<?php echo e(url('public/upload/'.App\Common\Common::getFile(['id'=>$user->img]))); ?>" alt="" /> 
                            <?php else: ?> 
                            <img src="<?php echo e(url('/public/images/avtar.png')); ?>" alt="" /> 
                            <?php endif; ?>
                        </div>  
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                        <div>
                            <span class="btn default btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <?php echo Form::file('img', array('class' => 'form-control')); ?>

                            </span>
                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    <div class="clearfix margin-top-10">
                        <span class="label label-danger">NOTE! </span>
                        <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                    </div>
                </div>
                    <?php if($errors->has('img')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('img')); ?></strong>
                                    </span>
                     <?php endif; ?>
            <div class="margin-top-10">
                  <?php echo Form::submit('Save Changes',['class'=>'btn green', 'name'=>'Change Avatar']);; ?>

                  <a type="button" href="<?php echo e(url('profile#tab_1_2')); ?>" id="back-btn" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
    <!-- END CHANGE AVATAR TAB -->
    <!-- CHANGE PASSWORD TAB -->
    <div 
             <?php if('3'=== old('tab')): ?>
             class="tab-pane active" 
             <?php else: ?>
             class="tab-pane"
             <?php endif; ?>    id="tab_1_3">
            <?php echo Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block']); ?>

            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="tab" value="3">
               <div class="form-group<?php echo e($errors->has('current_password') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('current_password', 'Current Password', ['class' => 'control-label ']);; ?>

                     <?php echo Form::password('current_password',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Current Password',  'id'=>'register_password']); ?> 
                     <?php if($errors->has('current_password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('current_password')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                 <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('password', 'Password', ['class' => 'control-label ']);; ?>

                     <?php echo Form::password('password',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Password',  'id'=>'register_password']); ?> 
                     <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>


                <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label ']);; ?>

                     <?php echo Form::password('password_confirmation',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Confirm Password']); ?> 
                     <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                <div class="margin-top-10">
                  <?php echo Form::submit('Save Changes',['class'=>'btn green', 'name'=>'Change Password']);; ?>

                  <a type="button" href="<?php echo e(url('profile#tab_1_3')); ?>" id="back-btn" class="btn btn-default">Cancel</a>
                </div>
        </form>
    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
                                                   
                                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
</div>
<!-- END CONTENT BODY -->
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>