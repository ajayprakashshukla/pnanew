@extends('admin.master')
@section('content')
{!! Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="{{url('dashboard')}}">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                           
                        </ul>
                        
                    </div>
                    
                    <div class="row">
						@if ($message = Session::get('success'))

                        <div class="alert alert-success">

                        <p>{{ $message }}</p>

                        </div>

                        @endif

                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Update Profile</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

                                    {!! Form::open(['id'=>'form_sample_3','class'=>'form-horizontal','method'=>'post'])!!}

                                        <div class="form-body">
                                            @if(count($errors)):
                                            <div class="alert alert-danger">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>
                                            @endif

                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> All Fields Are Required
                                            </div>

                                            
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                           

                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  {!! Form::text('name', $value=$user->name,['data-required'=>'1','class'=>'form-control','required'=>'required']) !!}
                                                  @if ($errors->has('name'))

                                                                    <span class="help-block">

                                                                        <strong>{{ $errors->first('name') }}</strong>

                                                                    </span>

                                                 @endif 
                                                </div>
                                            </div>
                                            

                                             <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  {!! Form::email('email', $value=$user->email,['data-required'=>'1','class'=>'form-control','required'=>'required']) !!}
                                                  @if ($errors->has('email'))

                                                                    <span class="help-block">

                                                                        <strong>{{ $errors->first('email') }}</strong>

                                                                    </span>

                                                 @endif 
                                                </div>
                                            </div>
											
											 <div class="form-group">
                                                <label class="control-label col-md-3">Secondary Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  {!! Form::email('secondary_email', $value=$user->secondary_email,['data-required'=>'1','class'=>'form-control','required'=>'required']) !!}
                                                  @if ($errors->has('secondary_email'))

                                                                    <span class="help-block">

                                                                        <strong>{{ $errors->first('secondary_email') }}</strong>

                                                                    </span>

                                                 @endif 
                                                </div>
                                            </div>
                                                              
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <?php /*
													<button type="button" class="btn default">Cancel</button>
													*/ ?>
													
													<a href="/dashboard" class="btn btn-default" style="background-color:#e1e5ec;border-color:#e1e5ec;color:#666">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection