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
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">New Location</span>
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
                                                <label class="control-label col-md-3">Location Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                  {!! Form::text('name', $value=old('name'),['data-required'=>'1','class'=>'form-control','required'=>'required']) !!}
                                                  @if ($errors->has('name'))

                                                                    <span class="help-block">

                                                                        <strong>{{ $errors->first('name') }}</strong>

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
													<a href="/location" class="btn btn-default" style="background-color:#e1e5ec;border-color:#e1e5ec;color:#666">Cancel</a>
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