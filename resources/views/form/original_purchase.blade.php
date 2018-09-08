<div class="portlet-body">
        {{Form::open(['url'=>'#','id'=>'form_sample_2','class'=>'form-horizontal form_sample','files'=>true ,   ]) }}
        <input type="hidden" name="form_id" value="{{$form_id}}" >
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                
                    
                    
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Date
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                         {{ Form::text('dates',$form_data->dates,['class'=>'form-control datepic','required'=>'required'])}}
                        </div>
                    </div>
                </div>
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Serial # 
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            {{ Form::text('serial_no',$form_data->serial_no,['class'=>'form-control','required'=>'required','readonly'=>'readonly'])}}
                        </div>
                    </div>
                </div>
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Invoice Number
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                           {{ Form::text('invoice_no',$form_data->id,['class'=>'form-control','required'=>'required','readonly'])}}
                        </div>
                    </div>
                </div>
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">File
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            {{ Form::file('file[]',['class'=>'form-control','required'=>'required'])}}
                        </div>
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
        {{ Form::close()}}
        <!-- END FORM-->
    </div>
