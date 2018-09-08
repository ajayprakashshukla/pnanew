<?php 



$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");



?>



@extends('admin.master')

@section('content')

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

                                <a href="{{url('admin/home')}}">Home</a>

                                <i class="fa fa-circle"></i>

                            </li>

                            <li>

                                <span>Profile</span>

                            </li>

                        </ul>

                  

                    </div>

                    <!-- END PAGE BAR -->

                    <!-- BEGIN PAGE TITLE-->

                    <h3 class="page-title"> My Profile | Account

                     

                    </h3>

                      @if ($message = Session::get('success'))

                        <div class="alert alert-success">

                        <p>{{ $message }}</p>

                        </div>

                        @endif

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

                                      

                         @if(isset($user->img))

                            <img src="{{url('public/images/'.$user->img)}}"  class="img-responsive" alt="" />

                            @else 

                            <img src="{{url('/public/images/avtar.png')}}" class="img-responsive"  alt="" /> 

                            @endif





                                         </div>

                                    <!-- END SIDEBAR USERPIC -->

                                    <!-- SIDEBAR USER TITLE -->

                                    <div class="profile-usertitle">

                                        <div class="profile-usertitle-name">{{$user->name}} </div>

                                        <div class="profile-usertitle-job"> {{$user->email }} </div>

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

        <li  @if(null === old('tab'))
             class="active"
             @endif
          >

            <a href="#tab_1_1" data-toggle="tab" id="tab1">Personal Info</a>

        </li>

        <li @if('2' === old('tab'))
             class="active"
             @endif  >

            <a href="#tab_1_2" data-toggle="tab" id="tab2">Change Avatar</a>

        </li>

        <li @if('3' === old('tab'))
             class="active"
             @endif   >

            <a href="#tab_1_3" data-toggle="tab" id="tab3">Change Password</a>

        </li>

        

    </ul>

</div>

<div class="portlet-body">

    <div class="tab-content">

        <!-- PERSONAL INFO TAB -->

        <div  
             @if(null === old('tab'))
             class="tab-pane active"
             @else
              class="tab-pane"
             @endif
     id="tab_1_1">

            {!! Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block']) !!}

            {{ csrf_field() }}



            <div class="form-group">

              {!! Form::label('name', 'First Name', ['class' => 'control-label']); !!}

              {!! Form::text('name', $value = $user->name, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'First Name' ]) !!} 

              @if ($errors->has('name'))

                            <span class="help-block">

                                <strong>{{ $errors->first('name') }}</strong>

                            </span>

              @endif 

            </div>


            <div class="form-group">

              {!! Form::label('middle_name', 'Middle Name', ['class' => 'control-label']); !!}

              {!! Form::text('middle_name', $value = $user->middle_name, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Middle Name' ]) !!} 

              @if ($errors->has('middle_name'))

                            <span class="help-block">

                                <strong>{{ $errors->first('middle_name') }}</strong>

                            </span>

              @endif 

            </div>

                        <div class="form-group">

              {!! Form::label('lastname', 'Last Name', ['class' => 'control-label']); !!}

              {!! Form::text('lastname', $value = $user->lastname, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Last Name' ]) !!} 

              @if ($errors->has('lastname'))

                            <span class="help-block">

                                <strong>{{ $errors->first('lastname') }}</strong>

                            </span>

              @endif 

            </div>




        

            


                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    {!! Form::label('email', 'Contact Email', ['class' => 'control-label ']); !!}

                     {!! Form::text('email', $value = $user->email , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix','readonly'=>'readonly', 'autocomplete'=>'off' ,'placeholder'=>'Contact Email' ]) !!} 

                     @if ($errors->has('email'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('email') }}</strong>

                                    </span>

                     @endif

                </div>



             





                <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">

                 {!! Form::label('mobile_no', 'Mobile no.', ['class' => 'control-label ']); !!}

                

                  {!! Form::text('mobile_no', $value = $user->mobile_no , $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix number', 'autocomplete'=>'off' ,'placeholder'=>'Mobile No' ,'pattern'=>'[0-9]{11}']) !!}

                

                @if ($errors->has('mobile_no'))

                                                    <span class="help-block">

                                                        <strong>{{ $errors->first('mobile_no') }}</strong>

                                                    </span>

                                                @endif



                </div>







        

         







      



           





               

                                                          

                <div class="margiv-top-10">

                    {!! Form::submit('Save Changes',['class'=>'btn green', 'name'=>'persional info']); !!}

                    <a type="button" href="{{url('profile#tab_1_1')}}" id="back-btn" class="btn btn-default">Cancel</a>



                </div>

             {!! Form::close() !!}

    </div>

    <!-- END PERSONAL INFO TAB -->

    <!-- CHANGE AVATAR TAB -->

    <div 
        @if('2'== old('tab'))
             class="tab-pane active" 
             @else
             class="tab-pane"
             @endif 
    id="tab_1_2" >

                                                       

     {!! Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block','files'=>true]) !!}

            {{ csrf_field() }}
<input type="hidden" name="tab" value="2">
                <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">

                    <div class="fileinput fileinput-new" data-provides="fileinput">

                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">



                            @if(isset($user->img))

                            <img src="{{url('public/images/'.$user->img)}}" alt="" /> 

                            @else 

                            <img src="{{url('/public/images/avtar.png')}}" alt="" /> 

                            @endif

                        </div>  

                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>

                        <div>

                            <span class="btn default btn-file">

                                <span class="fileinput-new"> Select image </span>

                                <span class="fileinput-exists"> Change </span>

                                {!! Form::file('img', array('class' => 'form-control')) !!}

                            </span>

                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>

                        </div>

                    </div>

                    <div class="clearfix margin-top-10">

                        <span class="label label-danger">NOTE! </span>

                        <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>

                    </div>

                </div>

                    @if ($errors->has('img'))

                                    <span class="help-block" style="color:red">

                                        <strong>{{ $errors->first('img') }}</strong>

                                    </span>

                     @endif

            <div class="margin-top-10">

                  {!! Form::submit('Save Changes',['class'=>'btn green', 'name'=>'Change Avatar']); !!}

                  <a type="button" href="{{url('profile#tab_1_2')}}" id="back-btn" class="btn btn-default">Cancel</a>

            </div>

        </form>

    </div>

    <!-- END CHANGE AVATAR TAB -->

    <!-- CHANGE PASSWORD TAB -->

    <div 
             @if('3'=== old('tab'))
             class="tab-pane active" 
             @else
             class="tab-pane"
             @endif    id="tab_1_3">

    {!! Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block']) !!}        

            {{ csrf_field() }}
<input type="hidden" name="tab" value="3">
               <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">

                    {!! Form::label('current_password', 'Current Password', ['class' => 'control-label ']); !!}

                     {!! Form::password('current_password',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Current Password',  'id'=>'register_password']) !!} 

                     @if ($errors->has('current_password'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('current_password') }}</strong>

                                    </span>

                     @endif

                </div>

                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                    {!! Form::label('password', 'New Password', ['class' => 'control-label ']); !!}

                     {!! Form::password('password',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'New Password',  'id'=>'register_password']) !!} 

                     @if ($errors->has('password'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('password') }}</strong>

                                    </span>

                     @endif

                </div>





                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                    {!! Form::label('password_confirmation', 'Confirm New Password', ['class' => 'control-label ']); !!}

                     {!! Form::password('password_confirmation',$attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Confirm New Password']) !!} 

                     @if ($errors->has('password_confirmation'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('password_confirmation') }}</strong>

                                    </span>

                     @endif

                </div>

                <div class="margin-top-10">

                  {!! Form::submit('Save Changes',['class'=>'btn green', 'name'=>'Change Password']); !!}

                  <a type="button" href="{{url('profile#tab_1_3')}}" id="back-btn" class="btn btn-default">Cancel</a>

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





@endsection





