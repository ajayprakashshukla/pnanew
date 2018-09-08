<?php
$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

$Relationships=['spouse', 'wife' , 'husband', 'brother', 'sister', 'child', 'cousin','specify'];
?>


<?php $__env->startSection('content'); ?>
    
            <!-- BEGIN REGISTRATION FORM -->
             <div class="portlet-body form" id="form_wizard_1">
                                 

                                    <?php echo Form::open(['class'=>'register-form','url'=>url('preview'), 'method'=>'post', 'id'=>'submit_form','style'=>'display:block','files'=>true]); ?>

                                    <?php echo e(csrf_field()); ?>

                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps hide">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step"> </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step"></a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab1">
<!-- ========================================== -->
          
                <div class="block1-register"> 
                <h3 class="heading_t">Setup Login Credentials</h3>
                <p class="heading_p" style="text-align: center;">This mobile number will receive login sms OTP</p>
                <div class="form-group<?php echo e($errors->has('mobile_no') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('mobile_no', 'Mobile No.', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                    <?php echo Form::text('mobile_no', $value = old('mobile_no'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,  'placeholder'=>'Mobile No','required'=>'required' ]); ?>

                     <?php if($errors->has('mobile_no')): ?>
                                    <span class="help-block showBlock" >
                                        <strong><?php echo e($errors->first('mobile_no')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>

                   <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('password', 'Password', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::password('password',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Password',  'id'=>'submit_form_password']); ?> 
                     <?php if($errors->has('password')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
    

                <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::password('password_confirmation',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Confirm Password','required'=>'required']); ?> 
                     <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                  
                </div>
                
                <div class="block2-register">
                <h3 class="heading_t">Employment Details</h3>
                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('email', 'Company Email', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('email', $value = old('email'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix' ,'autocomplete'=>'off' ,'placeholder'=>'Company Email' ]); ?> 
                     <?php if($errors->has('email')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>

               
                <div class="form-group<?php echo e($errors->has('office_extension') ? ' has-error' : ''); ?>">
                 <?php echo Form::label('office_extension', 'Office Extension.', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

               
                  <?php echo Form::text('office_extension', $value = old('office_extension'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,'placeholder'=>'Office Extension ','required'=>'required' ]); ?>

               
                <?php if($errors->has('office_extension')): ?>
                                                    <span class="help-block showBlock">
                                                        <strong><?php echo e($errors->first('office_extension')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('sharp_id') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('sharp_id', 'Employee No. (Sharp Id)', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('sharp_id', $value = old('sharp_id'), $attributes = ['class'=>'form-control number form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Employee No. (Sharp Id) ' ,'required'=>'required' , 'pattern'=>'[0-9]{8}' ]); ?> 
                     <?php if($errors->has('sharp_id')): ?>
                                    <span class="help-block showBlock" >
                                        <strong><?php echo e($errors->first('sharp_id')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
               
                </div>
                
                <div class="upload">
                <p class="heading_p">Upload last month payslip</p>
                <div class="form-group<?php echo e($errors->has('identity_proof') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('identity_proof', 'Identity Proof', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::file('identity_proof',$attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'City/Town','required'=>'required' ]); ?> 
                     <?php if($errors->has('identity_proof')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('identity_proof')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>  
                </div>

                <div class="proposed">
                <p class="heading_p">Proposed Monthly Contributions (NGN)</p>
                <div class="form-group<?php echo e($errors->has('proposed_monthly_income') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('proposed_monthly_income', 'Proposed monthly Income', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('proposed_monthly_income', $value = old('proposed_monthly_income'), $attributes = ['class'=>'form-control form-control-solid number  placeholder-no-fix','min'=>'20000' ,'autocomplete'=>'off' ,'placeholder'=>'0.00' ,'required'=>'required']); ?> 
                     <?php if($errors->has('proposed_monthly_income')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('proposed_monthly_income')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                </div> 

                <div class="block3-register">
                 <h3 class="heading_t">Personal Details</h3>
                 <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('lastname', 'Last Name', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('lastname', $value = old('lastname'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Last Name' ,'required'=>'required']); ?> 
                     <?php if($errors->has('lastname')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('name', 'First Name', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('name', $value = old('name'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'First Name' ,'required'=>'required']); ?> 
                     <?php if($errors->has('name')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
 
                <div class="form-group<?php echo e($errors->has('middle_name') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('middle_name', 'Middle Name', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('middle_name', $value = old('middle_name'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Middle Name ' ]); ?> 
                     <?php if($errors->has('middle_name')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('middle_name')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                </div>
                
                <div class="block4-register">
                <h3 class="heading_t">Contact Details</h3>
                <div class="form-group<?php echo e($errors->has('secondary_email') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('secondary_email', 'Secondary Email', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('secondary_email', $value = old('secondary_email'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Secondary Email','required'=>'required' ]); ?> 
                     <?php if($errors->has('secondary_email')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('secondary_email')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('address', 'Address', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('address', $value = old('address'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Address','required'=>'required' ]); ?> 
                     <?php if($errors->has('address')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>

            <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('state', 'State', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('state', $value = old('state'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'state','required'=>'required' ]); ?> 
                     <?php if($errors->has('state')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('state')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>


 <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('country', 'Country', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>


                     <?php echo Form::select('country', $countries, old('country'),$attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Country','required'=>'required' ]);; ?>


                     <?php if($errors->has('country')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('country')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>
                </div>
  
                <div class="block5-register">
                <h3 class="heading_t">Next of Kin Details</h3>
                <div class="form-group<?php echo e($errors->has('next_of_kin') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('next_of_kin', 'Next Of Kin ', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                     <?php echo Form::text('next_of_kin', $value = old('next_of_kin'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Next Of Kin ','required'=>'required' ]); ?> 
                     <?php if($errors->has('next_of_kin')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('next_of_kin')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>

                <div class="form-group<?php echo e($errors->has('relationship_with_next_of_kin') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('relationship_with_next_of_kin', 'Relationship With Next Of Kin', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                    

                  

<?php echo Form::select('relationship_with_next_of_kin', $Relationships, old('relationship_with_next_of_kin'),$attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Relationship With Next Of Kin','required'=>'required' ]);; ?>





                     <?php if($errors->has('relationship_with_next_of_kin')): ?>
                                    <span class="help-block showBlock">
                                        <strong><?php echo e($errors->first('relationship_with_next_of_kin')); ?></strong>
                                    </span>
                     <?php endif; ?>
                </div>




                <div class="form-group<?php echo e($errors->has('next_of_kin_phone_number') ? ' has-error' : ''); ?>">
                 <?php echo Form::label('next_of_kin_phone_number', 'Next Of Kin Phone Number.', ['class' => 'control-label visible-ie8 visible-ie9']);; ?>

                
                  <?php echo Form::text('next_of_kin_phone_number', $value = old('next_of_kin_phone_number'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number' , 'autocomplete'=>'off' ,'placeholder'=>'Next Of Kin Phone Number ','required'=>'required' ]); ?>

                
                <?php if($errors->has('next_of_kin_phone_number')): ?>
                                                    <span class="help-block showBlock">
                                                        <strong><?php echo e($errors->first('next_of_kin_phone_number')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                </div>
                </div>
              
                
       


<!-- =========================================================== -->

                                                    </div>

                                                   <div class="tab-pane" id="tab4">
                                                         <h3 class="heading_t" style="color: yellow;">Verify Registration Details</h3>
                                                        <h4 class="form-section">Login Credentials</h4>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Mobile No.:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="mobile_no"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Password</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="password"> </p>
                                                            </div>
                                                        </div>

                                                       <h4 class="form-section">Employment Details</h4>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Company Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="email"> </p>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Office Extension:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="office_extension"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Employee No. (Sharp Id):</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="sharp_id"> </p>
                                                            </div>
                                                        </div>

                                                        <h4 class="form-section">Proposed Monthly Contributions (NGN)</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Proposed monthly Income:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="proposed_monthly_income"> </p>
                                                            </div>
                                                        </div>

                                                        <h4 class="form-section">Personal Details</h4>

                                                       <div class="form-group">
                                                            <label class="control-label col-md-4">Last Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="lastname"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">First Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="name"> </p>
                                                            </div>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="control-label col-md-4">Middle Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="middle_name"> </p>
                                                            </div>
                                                        </div>

                                                        <h4 class="form-section">Contact Details</h4>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Secondary Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="secondary_email"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Address:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="address"> </p>
                                                            </div>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="control-label col-md-4">State:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="state"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Country:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="country"> </p>
                                                            </div>
                                                        </div>
                                                       <h4 class="form-section">Next of Kin Details</h4>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Next Of Kin :</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="next_of_kin"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Relationship With Next Of Kin:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="relationship_with_next_of_kin"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Next Of Kin Phone Number:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="next_of_kin_phone_number"> </p>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                          
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Back </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <button href="javascript:;" class="btn green button-submit"> Submit
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </form>
                                </div>
            <!-- END REGISTRATION FORM -->
<?php $__env->stopSection(); ?>



<style>

h3 {
    font-size: 17px !important;
}

.block1-register {
    margin-bottom: 15px;
}
.block1-register .form-group {
    margin-bottom: 0;
}
.block2-register {
    margin-bottom: 15px;
}
.block2-register .form-group {
    margin-bottom: 0;
}
.block3-register {
    margin-bottom: 15px;
}
.block3-register .form-group {
    margin-bottom: 0;
}
.block4-register {
    margin-bottom: 15px;
}
.block4-register .form-group {
    margin-bottom: 0;
}
.block5-register {
    margin-bottom: 15px;
}
.block5-register .form-group {
    margin-bottom: 0;
}


form.register-form input, form.register-form select {
    background-color: #5c97bd!important;
    border: 1px solid rgba(81, 102, 115, 0.36)!important;
}


h3.heading_t {
    color: #fff;
    text-align: center;
}
p.heading_p {
    color: #fff;
    margin-top: 0px;
    margin-bottom: 5px;
}
a#back-btn {
    background-color: #0099cc!important;
    font-weight: 500;
}
input#register-submit-btn {
    background-color: #ff0000!important;
    font-weight: 500;
}
.form-group{
    clear: both;
}
.form-section{
     clear: both;
}

.control-label {
    margin-top: 6px !important;
    font-weight: 400;
}
.form .form-section, .portlet-form .form-section {
    color: #fdfdfd !important;
}
a.btn.default.button-previous {
        background-color: #e7505a !important;
    border-color: #e73d4a !important;
}
.showBlock{
        display: block !important;
}
</style>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>