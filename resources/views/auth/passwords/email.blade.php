@extends('layouts.app')
@section('content')
            
            <!-- BEGIN FORGOT PASSWORD FORM -->
                {!! Form::open(['class'=>'forget-form','url'=>route('password.email'), 'method'=>'post','style'=>'display: block']) !!}
               {{ csrf_field() }}
                <div class="form-title">
                    <span class="form-title">Forget Password ?</span>
                    <span class="form-subtitle">Enter your e-mail to reset it.</span>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::email('email', $value = null, $attributes = ['class'=>'form-control placeholder-no-fix', 'autocomplete'=>'off' ,'placeholder'=>'company email' ]) !!}
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                     @endif
                </div>
                <div class="form-actions">
                    <a type="button" href="{{ route('login') }}" id="back-btn" class="btn btn-default">Back</a>
                    {!! Form::submit('Submit',['class'=>'btn btn-primary uppercase pull-right']); !!}
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
          
            <!-- END REGISTRATION FORM -->
       @endsection