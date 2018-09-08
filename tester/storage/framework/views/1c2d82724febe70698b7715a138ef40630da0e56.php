<script type="text/javascript">var tbl_ajax_url='';</script>







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

                                <a href="<?php echo e(url('admin/home')); ?>">Home</a>

                                <i class="fa fa-circle"></i>

                            </li>

                            <li>

                                <span><?php echo e($details->name); ?></span>

                            </li>

                        </ul>

                      

                    </div>

                    <!-- END PAGE BAR -->

                    <!-- BEGIN PAGE TITLE-->

                    <h3 class="page-title">  Account | <?php echo e($details->name); ?>


                     

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
                           

                            <!-- END BEGIN PROFILE SIDEBAR -->

                            <!-- BEGIN PROFILE CONTENT -->

                            <div class="profile-content">

                                <div class="row">

                                    <div class="col-md-3" >

<?php if(!$details->approved_by): ?>
                                        <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> 
                             <div class="col-md-12" style="    border: 1px solid black; padding: 14px;"> 
                                      <div class="col-md-12">
                                                   <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Approve/Reject</span>
                                                   <input type="hidden" id="approvel_user" value="<?php echo e($details->id); ?>">
                                                   <select id="approvel_status" class="form-control" onchange ="" >
                                              
                                                   <option 
                                                             <?php if($details->status==1): ?>
                                                                selected
                                                             <?php endif; ?>
                                                   value="1">Approve</option>
                                                   <option value="0"
                                                          <?php if($details->status=='0'): ?>
                                                                selected
                                                             <?php endif; ?>
                                                   >Reject</option></select>
                                      </div>
                                      <div class="col-md-12"><br><button class="btn btn-success" id="approvel_button" > CHANGE STATUS </button></div>
                        </div>
<?php endif; ?>
                                    </div>
                                    <div class="col-md-9">


                                  <div class="profile-userpic">
                                   <?php if(isset($details->img)): ?>
                                    <img src="<?php echo e(url('public/images/'.$details->img)); ?>" style="height: 200px;width: 200px;"  class="img-responsive" alt="" />
                                    <?php else: ?> 
                                    <img src="<?php echo e(url('/public/images/avtar.png')); ?>" style="width: 200px;height: 200px;" class="img-responsive"  alt="" /> 
                                    <?php endif; ?>
                                   </div>
                            
                                        <div class="portlet light ">

                                            

                                            <div class="portlet-title tabbable-line">

                                            



                                                <div class="caption caption-md">

                                                    <i class="icon-globe theme-font hide"></i>

                                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>

                                                </div>

    <ul class="nav nav-tabs">

        <li class="active">

            <a href="#tab_1_1" data-toggle="tab" id="tab1">Personal Info</a>

        </li>

   </ul>

</div>

<div class="portlet-body">

    <div class="tab-content">

        <!-- PERSONAL INFO TAB -->

        <div class="tab-pane active" id="tab_1_1">

            <?php echo Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block']); ?>


            <?php echo e(csrf_field()); ?>




            <div class="form-group">

              <?php echo Form::label('name', 'First Name', ['class' => 'control-label']);; ?>


              <?php echo Form::text('name', $value = $details->name, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Full Name' ]); ?> 

              <?php if($errors->has('name')): ?>

                            <span class="help-block">

                                <strong><?php echo e($errors->first('name')); ?></strong>

                            </span>

              <?php endif; ?> 

            </div>



             <div class="form-group">
              <?php echo Form::label('middle_name', 'Middle Name', ['class' => 'control-label']);; ?>

              <?php echo Form::text('middle_name', $value = $details->middle_name, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Middle Name' ]); ?> 
              <?php if($errors->has('middle_name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('middle_name')); ?></strong>
                            </span>
              <?php endif; ?> 
            </div>


            <div class="form-group">
              <?php echo Form::label('lastname', 'Last Name', ['class' => 'control-label']);; ?>

              <?php echo Form::text('lastname', $value = $details->lastname, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Last Name' ]); ?> 
              <?php if($errors->has('lastname')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('lastname')); ?></strong>
                            </span>
              <?php endif; ?> 
            </div>

            <div class="form-group">

              <?php echo Form::label('sharp_id', 'Employee No. (Sharp Id)', ['class' => 'control-label']);; ?>


              <?php echo Form::text('sharp_id', $value = $details->sharp_id, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee No. (Sharp Id)' ]); ?> 

              <?php if($errors->has('sharp_id')): ?>

                            <span class="help-block">

                                <strong><?php echo e($errors->first('sharp_id')); ?></strong>

                            </span>

              <?php endif; ?> 

            </div>

            <div class="form-group">

              <?php echo Form::label('proposed_monthly_income', 'Proposed monthly Income ', ['class' => 'control-label']);; ?>


              <?php echo Form::text('proposed_monthly_income', $value = $details->proposed_monthly_income, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Proposed monthly Income' ]); ?> 

              <?php if($errors->has('proposed_monthly_income')): ?>

                            <span class="help-block">

                                <strong><?php echo e($errors->first('proposed_monthly_income')); ?></strong>

                            </span>

              <?php endif; ?> 
            </div>













            

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('email', 'Company Email', ['class' => 'control-label ']);; ?>


                     <?php echo Form::text('email', $value = $details->email , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'readonly'=>'readonly' ,'placeholder'=>'Company Email' ]); ?> 

                     <?php if($errors->has('email')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('email')); ?></strong>

                                    </span>

                     <?php endif; ?>

                </div>



                <div class="form-group<?php echo e($errors->has('secondary_email') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('secondary_email', 'Secondary Email', ['class' => 'control-label ']);; ?>


                     <?php echo Form::text('secondary_email', $value = $details->secondary_email , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Secondary Email' ]); ?> 

                     <?php if($errors->has('secondary_email')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('secondary_email')); ?></strong>

                                    </span>

                     <?php endif; ?>

                </div>





                <div class="form-group<?php echo e($errors->has('mobile_no') ? ' has-error' : ''); ?>">

                 <?php echo Form::label('mobile_no', 'Mobile no.', ['class' => 'control-label ']);; ?>


                

                  <?php echo Form::text('mobile_no', $value = $details->mobile_no , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,'placeholder'=>'Mobile No' ,'pattern'=>'[0-9]{10}']); ?>


                

                <?php if($errors->has('mobile_no')): ?>

                                                    <span class="help-block">

                                                        <strong><?php echo e($errors->first('mobile_no')); ?></strong>

                                                    </span>

                                                <?php endif; ?>



                </div>



                <div class="form-group<?php echo e($errors->has('office_extension') ? ' has-error' : ''); ?>">

                 <?php echo Form::label('office_extension', 'Office Extension.', ['class' => 'control-label ']);; ?>


               

                  <?php echo Form::text('office_extension', $value = $details->office_extension , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,'placeholder'=>'Office Extension ','pattern'=>'[0-9]{5}' ]); ?>


               

                <?php if($errors->has('office_extension')): ?>

                                                    <span class="help-block">

                                                        <strong><?php echo e($errors->first('office_extension')); ?></strong>

                                                    </span>

                                                <?php endif; ?>

                </div>









           <div class="form-group<?php echo e($errors->has('next_of_kin') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('next_of_kin', 'Next Of Kin ', ['class' => 'control-label ']);; ?>


                     <?php echo Form::text('next_of_kin', $value = $details->next_of_kin , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Next Of Kin ' ]); ?> 

                     <?php if($errors->has('next_of_kin')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('next_of_kin')); ?></strong>

                                    </span>

                     <?php endif; ?>

                </div>



          <div class="form-group<?php echo e($errors->has('relationship_with_next_of_kin') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('relationship_with_next_of_kin', 'Relationship With Next Of Kin', ['class' => 'control-label ']);; ?>


                     <?php echo Form::text('relationship_with_next_of_kin', $value = $details->relationship_with_next_of_kin , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Relationship With Next Of Kin' ]); ?> 

                     <?php if($errors->has('relationship_with_next_of_kin')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('relationship_with_next_of_kin')); ?></strong>

                                    </span>

                     <?php endif; ?>

                </div>









                <div class="form-group<?php echo e($errors->has('next_of_kin_phone_number') ? ' has-error' : ''); ?>">

                 <?php echo Form::label('next_of_kin_phone_number', 'Next Of Kin Phone Number.', ['class' => 'control-label ']);; ?>


                

                  <?php echo Form::text('next_of_kin_phone_number', $value =  $details->next_of_kin_phone_number , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number' , 'autocomplete'=>'off' ,'placeholder'=>'Next Of Kin Phone Number ','max'=>'9999999999' ]); ?>


                

                <?php if($errors->has('next_of_kin_phone_number')): ?>

                                                    <span class="help-block">

                                                        <strong><?php echo e($errors->first('next_of_kin_phone_number')); ?></strong>

                                                    </span>

                                                <?php endif; ?>

                </div>







          <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('address', 'Address', ['class' => 'control-label ']);; ?>


                     <?php echo Form::text('address', $value = $details->address , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Address' ]); ?> 

                     <?php if($errors->has('address')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('address')); ?></strong>

                                    </span>

                     <?php endif; ?>

                </div>



            <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('state', 'State', ['class' => 'control-label ']);; ?>


                     <?php echo Form::text('state', $value = $details->state , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'State' ]); ?> 

                     <?php if($errors->has('state')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('state')); ?></strong>

                                    </span>

                     <?php endif; ?>

                </div>





               <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('country', 'Country', ['class' => 'control-label ']);; ?>




                     <?php echo Form::select('country', $countries, $details->country ,$attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Country' ]);; ?>




                     <?php if($errors->has('country')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('country')); ?></strong>

                                    </span>

                     <?php endif; ?>

                </div>

               <?php if($user->role =='1'): ?>                                     

                <div class="margiv-top-10">

                    <?php echo Form::submit('Save Changes',['class'=>'btn green', 'name'=>'persional info']);; ?>


                </div>

                <?php endif; ?>

             <?php echo Form::close(); ?>


    </div>

    <!-- END PERSONAL INFO TAB -->

    <!-- CHANGE AVATAR TAB -->

  

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





<style type="text/css">

    .dashboard-stat {

    margin: 4;}

</style>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>