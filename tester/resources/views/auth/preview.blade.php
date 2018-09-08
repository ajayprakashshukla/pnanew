<?php
$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");



$countries=[$data['country']=>$countries[ $data['country'] ]];


$Relationships=['spouse', 'wife' , 'husband', 'brother', 'sister', 'child', 'cousin','specify'];

$Relationships=[$data['relationship_with_next_of_kin']=>$Relationships[ $data['relationship_with_next_of_kin'] ]];

?>











@extends('layouts.app')
@section('content')
        
            <!-- BEGIN REGISTRATION FORM -->

           {!! Form::open(['class'=>'register-form','url'=>url('review'), 'method'=>'post', 'style'=>'display:block','files'=>true]) !!}
      
                
                
                <div class="block1-register"> 
                <h3 class="heading_t">Verify Registration Details</h3>
                <p class="heading_p" style="text-align: center;">This mobile number will receive login sms OTP</p>
                <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                    {!! Form::label('mobile_no', 'Mobile No.', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                    {!! Form::text('mobile_no', $value = isset($data['mobile_no'])?$data['mobile_no']:old('mobile_no'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' , 'readonly'=>'readonly', 'placeholder'=>'Mobile No','required'=>'required' ]) !!}
                     @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                     @endif
                </div>
              <input type="hidden" name="password" value="{{isset($data['password'])?$data['password']:old('password') }}">

    

              
                </div>
                
                <div class="block2-register">
                <h3 class="heading_t">Employment Details</h3>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Company Email', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('email', $value = isset($data['email'])?$data['email']:old('email'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'Company Email' ]) !!} 
                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                     @endif
                </div>
                <div class="form-group{{ $errors->has('office_extension') ? ' has-error' : '' }}">
                 {!! Form::label('office_extension', 'Office Extension.', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
               
                  {!! Form::text('office_extension', $value = isset($data['office_extension'])?$data['office_extension']:old('office_extension'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'Office Extension ','required'=>'required' ]) !!}
               
                @if ($errors->has('office_extension'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('office_extension') }}</strong>
                                                    </span>
                                                @endif
                </div>
                <div class="form-group{{ $errors->has('sharp_id') ? ' has-error' : '' }}">
                    {!! Form::label('sharp_id', 'Employee No. (Sharp Id)', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('sharp_id', $value = isset($data['sharp_id'])?$data['sharp_id']:old('sharp_id'), $attributes = ['class'=>'form-control number form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'Employee No. (Sharp Id) ' ,'required'=>'required' , 'pattern'=>'[0-9]{8}' ]) !!} 
                     @if ($errors->has('sharp_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sharp_id') }}</strong>
                                    </span>
                     @endif
                </div>
               
                </div>
                
                <div class="upload">
                <p class="heading_p">Upload last month payslip</p>
                <div class="form-group{{ $errors->has('identity_proof') ? ' has-error' : '' }}">
                     <div class="form-control form-control-solid number  placeholder-no-fix">
                     <a href="{{url('public/upload/'.App\Common\Common::getFile(['id'=>$data['identity_proof'] ]))}}">Last month payslip</a>

                     <input type="hidden" name="identity_proof" value="{{$data['identity_proof'] }}">
                     </div>
                </div>  
                </div>

                <div class="proposed">
                <p class="heading_p">Proposed Monthly Contributions (NGN)</p>
                <div class="form-group{{ $errors->has('proposed_monthly_income') ? ' has-error' : '' }}">
                    {!! Form::label('proposed_monthly_income', 'Proposed monthly Income', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('proposed_monthly_income', $value = isset($data['proposed_monthly_income'])?$data['proposed_monthly_income']:old('proposed_monthly_income') , $attributes = ['class'=>'form-control form-control-solid number  placeholder-no-fix','min'=>'20000' ,'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'0.00' ,'required'=>'required']) !!} 
                     @if ($errors->has('proposed_monthly_income'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('proposed_monthly_income') }}</strong>
                                    </span>
                     @endif
                </div>
                </div> 

                <div class="block3-register">
                 <h3 class="heading_t">Personal Details</h3>
                 <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    {!! Form::label('lastname', 'Last Name', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('lastname', $value = isset($data['lastname'])?$data['lastname']:old('lastname') , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'Last Name' ,'required'=>'required']) !!} 
                     @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                     @endif
                </div>
                
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'First Name', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('name', $value = isset($data['name'])?$data['name']:old('name'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'First Name' ,'required'=>'required']) !!} 
                     @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                     @endif
                </div>
 
                <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                    {!! Form::label('middle_name', 'Middle Name', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('middle_name', $value = isset($data['middle_name'])?$data['middle_name']:old('middle_name') , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'Middle Name ' ]) !!} 
                     @if ($errors->has('middle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                     @endif
                </div>
                </div>
                
                <div class="block4-register">
                <h3 class="heading_t">Contact Details</h3>
                <div class="form-group{{ $errors->has('secondary_email') ? ' has-error' : '' }}">
                    {!! Form::label('secondary_email', 'Secondary Email', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('secondary_email', $value = isset($data['secondary_email'])?$data['secondary_email']:old('secondary_email'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'Secondary Email','required'=>'required' ]) !!} 
                     @if ($errors->has('secondary_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary_email') }}</strong>
                                    </span>
                     @endif
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {!! Form::label('address', 'Address', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('address', $value =isset($data['address'])?$data['address']:old('address'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Address','readonly'=>'readonly','required'=>'required' ]) !!} 
                     @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                     @endif
                </div>

            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    {!! Form::label('state', 'State', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('state', $value = isset($data['state'])?$data['state']:old('state'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','placeholder'=>'state','required'=>'required' ]) !!} 
                     @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                     @endif
                </div>


 <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                    {!! Form::label('country', 'Country', ['class' => 'control-label visible-ie8 visible-ie9']); !!}

                     {!! Form::select('country', $countries,isset($data['country'])?$data['country']:old('country'),$attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','required'=>'required' ]); !!}

                     @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                     @endif
                </div>
                </div>
  
                <div class="block5-register">
                <h3 class="heading_t">Next of Kin Details</h3>
                <div class="form-group{{ $errors->has('next_of_kin') ? ' has-error' : '' }}">
                    {!! Form::label('next_of_kin', 'Next Of Kin ', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                     {!! Form::text('next_of_kin', $value = isset($data['next_of_kin'])?$data['next_of_kin']:old('next_of_kin'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' , 'readonly'=>'readonly','placeholder'=>'Next Of Kin ','required'=>'required' ]) !!} 
                     @if ($errors->has('next_of_kin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('next_of_kin') }}</strong>
                                    </span>
                     @endif
                </div>

                <div class="form-group{{ $errors->has('relationship_with_next_of_kin') ? ' has-error' : '' }}">
                    {!! Form::label('relationship_with_next_of_kin', 'Relationship With Next Of Kin', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                    

                  

{!! Form::select('relationship_with_next_of_kin', $Relationships, isset($data['relationship_with_next_of_kin'])?$data['relationship_with_next_of_kin']:old('relationship_with_next_of_kin'),$attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'readonly'=>'readonly','required'=>'required' ]); !!}




                     @if ($errors->has('relationship_with_next_of_kin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('relationship_with_next_of_kin') }}</strong>
                                    </span>
                     @endif
                </div>




                <div class="form-group{{ $errors->has('next_of_kin_phone_number') ? ' has-error' : '' }}">
                 {!! Form::label('next_of_kin_phone_number', 'Next Of Kin Phone Number.', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                
                  {!! Form::text('next_of_kin_phone_number', $value =isset($data['next_of_kin_phone_number'])?$data['next_of_kin_phone_number']:old('next_of_kin_phone_number'), $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number' , 'autocomplete'=>'off' ,'placeholder'=>'Next Of Kin Phone Number ','required'=>'required','readonly'=>'readonly','pattern'=>'[0-9]{11}' ]) !!}
                
                @if ($errors->has('next_of_kin_phone_number'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('next_of_kin_phone_number') }}</strong>
                                                    </span>
                                                @endif
                </div>
                </div>
              
                
                  

                <div class="form-actions">
                  

                   <a href="javascript:void(0);" action="action" type="button" class="btn btn-danger"  onclick="history.go(-1);" >Back</a>
                    {!! Form::submit('Submit',['class'=>'btn red uppercase pull-right','id'=>'register-submit-btn']); !!}
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
@endsection


<style>
.visible-ie9 {
    display: block !important;
}

components.min.css:1
.visible-ie8 {
    display: block !important;
}
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
</style>