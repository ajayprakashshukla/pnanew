<div class="portlet-body">
        <!-- BEGIN FORM-->
        {{Form::open(['url'=>'#','id'=>'form_sample_2','class'=>'form-horizontal form_sample','files'=>true   ]) }}
          <input type="hidden" name="form_id" value="{{$form_id}}" >
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                
                    
                    
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Customer name
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-6">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            {{ Form::select('customer_id', $customers, $form_data->customer_id,['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Date  
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            {{ Form::text('serial_no',$form_data->serial_no,['class'=>'form-control','required'=>'required','readonly'=>'readonly'])}}
                        </div>
                    </div>
                </div>
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Shipping Carrier   
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-6">
                        <div class="input-icon right">
                            <i class="fa"></i>
                             {{ Form::text('shipping_carrier',$form_data->shipping_carrier,['class'=>'form-control','required'=>'required',''=>''])}}

                        </div>
                    </div>
                </div>
                
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Shipping Tracking    
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-6">
                        <div class="input-icon right">
                            <i class="fa"></i>
                         {{ Form::text('shipping_tracking',$form_data->shipping_tracking,['class'=>'form-control','required'=>'required',''=>''])}}

                        </div>
                    </div>
                </div>
               <div class="form-group  margin-top-20">
                    <label class="control-label col-md-3">Notes/Explanation    
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-6">
                        <div class="input-icon right">
                            <i class="fa"></i>
                           {{ Form::text('notes_explanation',$form_data->notes_explanation,['class'=>'form-control','required'=>'required',''=>''])}}

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
        </form>
        <!-- END FORM-->
    </div>
