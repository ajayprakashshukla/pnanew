@extends('admin.master')
@section('content')


<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="{{url('admin/home')}}">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Import User</span>
                            </li>
                        </ul>
                     
                    </div>
                    <h3 class="page-title"> Import User
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Import User</span>
                                    </div>
                                   
                                </div>

                    @if (isset($associated))
                        <div class="alert alert-danger">
                        <p>{{ $associated }}</p>
                        </div>
                        @endif
                        
                      @if ($message = Session::get('success'))
                        <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                        </div>
                        @endif

                        @if($duplicate_users = Session::get('duplicate_users'))
                                           
                                            <div class="alert alert-danger">
                                                 @foreach($duplicate_users as $duplicate_user)
                                                 <li>{{$duplicate_user}}</li>
                                                 @endforeach
                                            </div>
                                            @endif

                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->

                                    {!! Form::open(['id'=>'form_sample_3','class'=>'form-horizontal','method'=>'post','files' => true])!!}

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
                                                <label class="control-label col-md-3">Import User
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                          

                                                  {!! Form::file('import_file', ['data-required'=>'1','class'=>'form-control','required'=>'required']) !!}
                                                 <a target="_blank" href="{{url('public/upload/sample.xlsx')}}"> Download Sample File</a>
                                                </div>

                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
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