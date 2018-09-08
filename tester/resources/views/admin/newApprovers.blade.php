@extends('admin.master')
@section('content')
{!! Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}

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
                                <a href="{{url('admin/home')}}">Admin</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Approver : {{$approvers->name or 'New'}}</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                     <h3 class="page-title"> Approver :
                        <small> {{$approvers->name or 'New'}}</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                                  @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                           <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                            <div class="portlet light bordered" id="form_wizard_1">
                                
                                <div class="portlet-body form">
                                    
                                    {!! Form::open(['id'=>'submit_form','class'=>'form-horizontal','method'=>'post'])!!}
                                   


                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Approver/ Admin Detail</span>
                                                        </a>
                                                    </li>
                                                   
                                                    
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Confirm </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Provide your account details</h3>


<div class="form-group">
        <label class="control-label col-md-3">First Name
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
        {!! Form::text('name', $value=isset($approvers->name)?$approvers->name:old('name'),['data-required'=>'1','class'=>'form-control','required'=>'required']) !!}

        <span class="help-block">   Provide your first name 
        </span>
    </div>
</div>


<div class="form-group">
        <label class="control-label col-md-3">Middle Name
           
        </label>
        <div class="col-md-4">
        {!! Form::text('middle_name', $value=isset($approvers->middle_name)?$approvers->middle_name:old('middle_name'),['class'=>'form-control']) !!}

        
    </div>
</div>

<div class="form-group">
        <label class="control-label col-md-3">Last Name
             <span class="required"> * </span>
        </label>
        <div class="col-md-4">
        {!! Form::text('lastname', $value=isset($approvers->lastname)?$approvers->lastname:old('lastname'),['data-required'=>'1','class'=>'form-control','required'=>'required']) !!}
        <span class="help-block">   Provide your last name 
        </span>
    </div>
</div>



<div class="form-group">
        <label class="control-label col-md-3">Company Email
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">

        
      {!! Form::text('email', $value=isset($approvers->email)?$approvers->email:old('email'),['data-required'=>'1',isset($approvers->email)?'readonly':'' =>isset($approvers->email)?'readonly':''  ,   'class'=>'form-control','required'=>'required']) !!}

        <span class="help-block">   Provide your company email 
        </span>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-3">Password
        <span class="required"> * </span>
    </label>
    <div class="col-md-4">
        <input type="password" class="form-control" name="password" id="submit_form_password" />
        <span class="help-block"> Provide your password. </span>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Confirm Password
        <span class="required"> * </span>
    </label>
    <div class="col-md-4">
        <input type="password" class="form-control" name="rpassword" />
        <span class="help-block"> Confirm your password </span>
    </div>
</div>


<div class="form-group">
        <label class="control-label col-md-3">Mobile No
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
     {!! Form::text('mobile_no', $value=isset($approvers->mobile_no)?$approvers->mobile_no:old('mobile_no'),['data-required'=>'1','class'=>'form-control number','autocomplete'=>'off','required'=>'required' ]) !!}

        <span class="help-block">   Provide your mobile no 
        </span>
    </div>
</div>


<div class="form-group">
        <label class="control-label col-md-3">Role
            <span class="required"> * </span>
        </label>
        <div class="col-md-4">
        {!! Form::select('role',[''=>'','1'=>'admin','2'=>'Approver'], $value=isset($approvers->mobile_no_country)?$approvers->role:old('role'),['data-required'=>'1','class'=>'form-control number','autocomplete'=>'off','required'=>'required']) !!}

        <span class="help-block">   Please select a member role
        </span>
    </div>
</div>
                                                        
</div>
                                                    
                                                    
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">Confirm your details</h3>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">First Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="name"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Middle Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="middle_name"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Last Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="lastname"> </p>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Company Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="email"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Mobile No:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="mobile_no"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Role:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="role"> </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Back </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <input type="submit" onclick="$('form').submit();" class="btn green button-submit" value="Submit"> 
                                                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection

<script type="text/javascript">
    
jQuery(document).ready(function() {
    
});

</script>
