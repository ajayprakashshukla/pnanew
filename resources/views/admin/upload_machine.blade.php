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
					@if ($message = Session::get('error'))
						<div style="clear:both;">&nbsp;</div>
						<div class="alert alert-danger fade in">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  {{ $message }}
						</div>

                        @endif

                        <div class="col-md-12">

                            <!-- BEGIN VALIDATION STATES-->

                            <div class="portlet light portlet-fit portlet-form bordered">

                                <div class="portlet-title">

                                    <div class="caption">

                                        <i class="icon-settings font-dark"></i>

                                        <span class="caption-subject font-dark sbold uppercase">
											Upload Machines
										</span>
										<br/>
										<span class="caption-subject" style="margin-left:20px;">
											(<a href="{{url('public/sample_csv.csv')}}" title="Sample CSV">Sample CSV</a>)
										</span>

                                    </div>

                                    

                                </div>

                                <div class="portlet-body">

                                    <!-- BEGIN FORM-->



                                    {!! Form::open(['id'=>'form_sample_3','class'=>'form-horizontal','method'=>'post','enctype'=>"multipart/form-data"])!!}



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

                                            <?php /* ?><div class="form-group">

                                                <label class="control-label col-md-3">Machine Name

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

                                            <?php */ ?>

                                            <div class="form-group">

                                                <label class="control-label col-md-3">Upload CSV

                                                    <span class="required"> * </span>

                                                </label>

                                                <div class="col-md-4">

												 <input data-required="1" class="form-control" required="required" name="csv" type="file" aria-required="true">
                                                              

                                                 @if ($errors->has('csv'))



                                                                    <span class="help-block">



                                                                        <strong>{{ $errors->first('csv') }}</strong>



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
													
													<a href="/machines" class="btn btn-default" style="background-color:#e1e5ec;border-color:#e1e5ec;color:#666">Cancel</a>

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