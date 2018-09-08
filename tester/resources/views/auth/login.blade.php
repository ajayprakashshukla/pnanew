@extends('layouts.app')
@section('content')
            <!-- BEGIN LOGIN FORM -->

            {!! Form::open(['class'=>'login-form','url'=>'/login/', 'method'=>'post']) !!}
            {{ csrf_field() }}
                <div class="form-title">
                    <span class="form-subtitle">Please login.</span>
                </div>
               <!--  <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Company Email and password. </span>
                </div> -->



                 @if (isset($error))
                                <div class="alert alert-danger">
                                <button class="close" data-close="alert"></button>
                                <span> {{$error}} </span>
                            </div>
                    @endif




    @if(isset($otp) && $otp !='')
            <div class="form-group">
                    {!! Form::label('otp', 'OTP', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                    {!! Form::text('otp', $value = null, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Please enter 6 digit OTP' ]) !!}
                     @if ($errors->has('otp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('otp') }}</strong>
                        </span>
                     @endif
               </div>
               <input type="hidden" name="auth_data" value="{{$otp}}">
           
     @else
                <div class="form-group">
                    {!! Form::label('email', 'Company Email', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                    {!! Form::email('email', $value = null, $attributes = ['class'=>'form-control form-control-solid placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'Username' ]) !!}
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                     @endif
               </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label visible-ie8 visible-ie9']); !!}
                    {!!  Form::password('password', ['class'=>'form-control form-control-solid placeholder-no-fix', 'type'=>'password' ,'autocomplete'=>'off', 'placeholder'=>'Password']); !!}

                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

         @endif

                <div class="form-actions">
                    {!! Form::submit('Login',['class'=>'btn red btn-block uppercase']); !!}
                </div>
                <div class="form-actions">
                    <div class="pull-left">
                        <label class="rememberme check">
                               {!! Form::checkbox('remember', '1', old('remember') ? true:false ); !!}
                            Remember me </label>
                    </div>
                    <div class="pull-right forget-password-block">
                        <a href="{{ route('password.request') }}" id="forget-password" class="forget-password">Forgot Password?</a>
                    </div>
                </div>
               
                <div class="create-account">
                    <p>
                        <a href="{{ route('register') }}" class="btn-primary btn" id="register-btn">Create an account</a>
                    </p>
                </div>
            {!! Form::close() !!}
            
@endsection