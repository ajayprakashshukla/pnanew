var SITE_URL='https://machdb.popcake-na.com/';

var parts;
 $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });



$( document ).ready(function(){
 $(".select_filter").select2();   
    
    
})


  


function load_form(id,name){
 $('#transaction_name').html(name);
 $('#form_body').html(getTransactionsForm(id));
 $('#transactions_types').val(id);

  
 $('.datepic').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

  

$("#serial_no").select2({
  data: MachineJson    
})
$("#select_customer").select2({
  data: CustomerJson    
})

$(".parts").select2({
  data: ProductJson    
})

$(".locations").select2({
  data: LocationJson    
})


CKEDITOR.replace( 'notes_explanation' );  
 


 $('table.table-condensed td').css('cursor','pointer');
    	
}

function getTransactionsForm(id){
    
    var html='';
    switch(id) {
    case 1:
          //         Original Purchase  Form Start 
          //         =============================
      
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Invoice Number<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="invoice_no" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File </label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
       
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
      
          //         Orgina Purchase Form Ends
        break;
        
    case 2:
          //         Customer Placement  Form Start 
          //         =============================

      
        
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Customer Name<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<select name="customer_id" id="select_customer" required="required" class="form-control " ><option value=""> Select a Customer</option> </select>';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Carrier <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_carrier" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Tracking <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_tracking" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"     class="ckeditor form-control editor"  rows="6" data-error-container="#editor2_error"               > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
       
       
  
          //         Customer Placement Form Ends
       
       
       
        break;
        
    case 3:
      
       //         Customer Replacement  Form Start 
          //         =============================

      
        
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Customer Name<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<select name="customer_id" id="select_customer" required="required" class="form-control " ><option value=""> Select a Customer</option> </select>';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Carrier <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_carrier" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Tracking <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_tracking" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
       
    
          //        Customer Replacement Form Ends
             
        break;
        
    case 4:
       
             
       //         Defective Return  Form Start 
          //         =============================

      
        
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Customer Name<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<select name="customer_id" id="select_customer" required="required" class="form-control " ><option value=""> Select a Customer</option> </select>';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Carrier <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_carrier" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Tracking <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_tracking" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Return Location<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<select  name="return_location" required="required" class=" locations form-control"></select>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]" class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
       
       
   
          //        Defective Return Form Ends
           
           
        break;
        
    case 5:
        
               //        Customer Return  Form Start 
          //         =============================

      
        
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Customer Name<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<select name="customer_id" id="select_customer" required="required" class="form-control " ><option value=""> Select a Customer</option> </select>';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Carrier <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_carrier" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Shipping Tracking <span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<input type="text" name="shipping_tracking" required="required" class="form-control" >';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Return Location<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                   '<select  name="return_location" required="required" class=" locations form-control"></select>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';    
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
       
       
    
          //       Customer Return Form Ends
           
        break;
        
    case 6:
        
        //         Receipt   Form Start 
          //         =============================
      
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Location<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<select  name="location" required="required" class=" locations form-control"></select>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
        
         html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       

          //         Receipt  Form Ends
        break;
        
       
        
    case 7:
        //         Refurbish     Form Start 
        //         =============================
      
         
        
      
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Location<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<select  name="location" required="required" class=" locations form-control"></select>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
            
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Parts used in repair <span class="required"> * </span></label>';
        html+=           '<div class="col-md-9">';
        html+=          '<table class="table parts_table" >';
        html+=             '<tr><th style="width:50%">Part #</th> <th style="width:10%">Qty</th>  <th style="width:20%">Failure</th><th style="width:50%">Action</th></tr>';
        html+=                     '<tr>';
        html+=                          '<th><select class="form-control parts"   name="parts[]" required ><option></option></select></th>';
        html+=                          '<th><input type ="text" name="qry[]" required class="form-control number"></th>';
        html+=                          '<th><select class="form-control" name="failure[]" required ><option value="Y">Yes</option><option value="N">No</option></select></th>';
        html+=                          '<th><span class="btn btn-success btn-sm" onclick="addmoreParts();" >+</span></th>';
        html+=                     '</tr>';
        html+=          '</table>';
        html+=            '</div>';
        html+=        '</div>';
           
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
       
            html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       
       
     
          //         Refurbish    Form Ends
        
        
        
        break;
        
    case 8:
        
        //         Disposal    Form Start 
        //         =============================
      
        html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Location<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                     '<select  name="location" required="required" class=" locations form-control"></select>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
               html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       
  
          //         Disposal   Form Ends
        
        break;
        
    case 9:
      html+=    '<div class="form-group  margin-top-20">';
        html+=         '<label class="control-label col-md-3">Date<span class="required"> * </span></label>';
        html+=        '<div class="col-md-4">';
        html+=          '<div class="input-icon right">';
        html+=                    '<i class="fa"></i>';
        html+=                     '<input type="text" name="dates" required="required" class="form-control datepic" >';
        html+=               '</div>';
        html+=            '</div>';
        html+=        '</div>';
        
        html+=   '<div class="form-group  margin-top-20">';
        html+=              '<label class="control-label col-md-3">Serial #<span class="required"> * </span></label>';
        html+=              '<div class="col-md-4">';
        html+=                ' <div class="input-icon right">';
        html+=                     ' <i class="fa"></i>';
        html+=                      '<select  name="serial_no" id="serial_no" required="required" class="form-control" > </select>';
        html+=                  '</div>';
        html+=             ' </div>';
        html+=   '</div>';
        
        
        
   
        html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">from Location<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<select  name="from_location" required="required" class=" locations form-control"></select>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
             html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">To Location<span class="required"> * </span></label>';
        html+=            '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<select  name="to_location" required="required" class=" locations form-control"></select>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
        
        
        html+=        '<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">File</label>';
        html+=           '<div class="col-md-4">';
        html+=                '<div class="input-icon right">';
        html+=                   '<i class="fa"></i>';
        html+=                      '<input type="file" name="file[]"  class="form-control" >';
        html+=               ' </div>';
        html+=            '</div>';
        html+=        '</div>';
               html+='<div class="form-group  margin-top-20">';
        html+=            '<label class="control-label col-md-3">Notes/Explanation </label>';
        html+=            '<div class="col-md-9">';
        html+=                '<div class="input-icon right">';
        html+=                   ' <i class="fa"></i>';
        html+=                    '<textarea name="notes_explanation"  class="form-control editor" > </textarea>';
        html+=                '</div>';
        html+=            '</div>';
        html+='</div>';
       
        break;
   
}
    
    return html;
    
}



function all_parts(){
  $.ajax({
        url: SITE_URL+"all_parts",
        success: function (resp) {
            data = resp;
            callback(data);
        },
        error: function () {}
    });

}    

function addmoreParts(){
    var html="";
      html+=                     '<tr>';
        html+=                          '<th><select class="form-control parts"  name="parts[]" required ><option></option></select></th>';
        html+=                          '<th><input type ="text" name="qry[]" required class="form-control number"></th>';
        html+=                          '<th><select class="form-control" name="failure[]" required ><option value="Y">Yes</option><option value="N">No</option></select></th>';
        html+=                          '<th><span class="btn btn-success btn-sm" onclick="addmoreParts();" >+</span><span class="btn btn-danger btn-sm" onclick="$(this).parent().parent().remove();" >-</span></th>';
        html+=                     '</tr>';
       $('.parts_table').append(html);
      
      $(".parts").each(function(){
            var lend=  $(this).children().length;
            if(lend<2){
                  $(this).select2({
                     data: ProductJson    
                  })
                
            }
      })
      
      }
      
function getOriginalPurchase(transaction_id){
 $('#transaction_name').html('Original Purchase');

 $('.modal-footer').hide(); 
 $('#form_body').html(''); 
  $.ajax({
        url: SITE_URL+"getOriginalPurchase/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
          var files=''; 
		  if (data.files_url !='') 
			{  
				files='<a href="'+data.files_url+'" download="'+data.files_title+'">'+data.files_title+'</a>';
			}
		  else{
			  files="NA";
		  }	
           var table='<table class="table" width="100%"><tr><th>Date</th><th>S.No</th><th>Invoice No</th><th>File</th><th>Notes/Explanation </th></tr></th>';
               table=table+'<tr><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.invoice_no+'</td><td>'+files+' </td><td>'+data.notes_explanation+'</td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}
 
 
function getCustomerPlacement(transaction_id){
 $('#transaction_name').html('Customer Placement');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getCustomerPlacement/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
          var files=''; if (data.files_url !='') {  files='<a href="'+data.files_url+'">'+data.files_title+'</a>';}
		  else{files='NA'}
          var table='<table class="table" width="100%"><tr><th>Customer Name</th><th>Date</th><th>Serial No</th><th>Shipping Carrier</th><th>Shipping Tracking</th><th>Notes/Explanation </th><th>File</th></tr></th>';
               table=table+'<tr><td>'+data.customer_name+'</td><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.shipping_carrier+'</td><td>'+data.shipping_tracking+'</td><td>'+data.notes_explanation+'</td><td>'+files+' </td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}

function getCustomerReplacement(transaction_id){
 $('#transaction_name').html('Customer Replacement');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getCustomerReplacement/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
          var files=''; 
		  if (data.files_url !='') 
			{  
				files='<a href="'+data.files_url+'" download="'+data.files_title+'">'+data.files_title+'</a>';
			}
			else{
				files='NA';
			}
            var table='<table class="table" width="100%"><tr><th>Customer Name</th><th>Date</th><th>Serial No</th><th>Shipping Carrier</th><th>Shipping Tracking</th><th>Notes/Explanation </th> <th>File</th></tr></th>';
               table=table+'<tr><td>'+data.customer_name+'</td><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.shipping_carrier+'</td><td>'+data.shipping_tracking+'</td><td>'+data.notes_explanation+'</td><td>'+files+' </td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}


function getDefectiveReturn(transaction_id){
 $('#transaction_name').html('Defective Return');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getDefectiveReturn/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
          var files=''; 
		  if(data.files_url !='') 
			{  
				files='<a href="'+data.files_url+'">'+data.files_title+'</a>';
			}
			else{
				files="NA";
			}
           var table='<table class="table" width="100%"><tr><th>Customer Name</th><th>Date</th><th>Serial No</th><th>Shipping Carrier</th><th>Shipping Tracking</th><th>Return Location</th><th>Notes/Explanation </th><th>File</th></tr></th>';
               table=table+'<tr><td>'+data.customer_name+'</td><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.shipping_carrier+'</td><td>'+data.shipping_tracking+'</td><td>'+data.return_location+'</td><td>'+data.notes_explanation+'</td><td>'+files+' </td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}

function getCustomerReturn(transaction_id){
 $('#transaction_name').html('Customer Return');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getCustomerReturn/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
          var files=''; if (data.files_url !='') {  files='<a href="'+data.files_url+'">'+data.files_title+'</a>';}
		  else{files="NA";}
          var table='<table class="table" width="100%"><tr><th>Customer Name</th><th>Date</th><th>Serial No</th><th>Shipping Carrier</th><th>Shipping Tracking</th><th>Return Location</th><th>Notes/Explanation </th><th>File</th></tr></th>';
               table=table+'<tr><td>'+data.customer_name+'</td><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.shipping_carrier+'</td><td>'+data.shipping_tracking+'</td><td>'+data.return_location+'</td><td>'+data.notes_explanation+'</td><td>'+files+' </td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}


function getReceipt(transaction_id){
 $('#transaction_name').html('Receipt');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getReceipt/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
          var files=''; 
		  if (data.files_url !='') 
			{  
				files='<a href="'+data.files_url+'" download="'+data.files_title+'">'+data.files_title+'</a>';
			}
			else{
				files="NA";
			}
              var table='<table class="table" width="100%"><tr><th>Date</th><th>S.No</th><th>Location</th><th>File</th><th>Notes/Explanation </th></tr></th>';
               table=table+'<tr><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.location+'</td><td>'+files+' </td><td>'+data.notes_explanation+'</td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}


function getRefurbish(transaction_id){
 $('#transaction_name').html('Refurbish Part');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getUsedParts/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);

          var t_data = data.t_data
          var files=''; if (t_data.files_url !='') {  files='<a href="'+t_data.files_url+'" download="'+t_data.files_title+'">'+t_data.files_title+'</a>';}
		  else{files='NA';}
          
           var table='<h4> Transaction  </h4> <table class="table" width="100%"><tr><th>Date</th><th>Serial No</th><th>Location</th><th>File</th> <th>Notes/Explanation </th></tr><tr><td>'+t_data.dates+'</td><td>'+t_data.serial_no+'</td><td>'+t_data.location+'</td><td>'+files+'</td> <td>'+t_data.notes_explanation+'</td> </tr></table>';
           table=table+'<h4> Parts Used</h4><table class="table" width="100%"><tr><th>Part</th><th>Quantity</th><th>Faliure</th></tr></th>';
            $.each(data.parts, function( index, value ) {
               table=table+'<tr><td>'+value.name+'</td><td>'+value.qty+'</td><td>'+value.failure+'</td></tr>';
             });
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}


function getDisposal(transaction_id){
 $('#transaction_name').html('Disposal');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getDisposal/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
          var files=''; if (data.files_url !='') {  files='<a href="'+data.files_url+'">'+data.files_title+'</a>';}
           var table='<table class="table" width="100%"><tr><th>Date</th><th>S.No</th><th>Location</th><th>File</th> <th>Notes/Explanation </th></tr></th>';
               table=table+'<tr><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.location+'</td><td>'+files+' </td><td>'+data.notes_explanation+'</td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}


function getTransfer(transaction_id){
 $('#transaction_name').html('Transfer');

 $('.modal-footer').hide(); 
 $('#form_body').html('');
  $.ajax({
        url: SITE_URL+"getTransfer/"+transaction_id,
        success: function (resp) {
          var data = jQuery.parseJSON(resp);
           var files=''; 
		   if(data.files_url !='') 
			{  
				files='<a href="'+data.files_url+'">'+data.files_title+'</a>';
			}
		   else{
			   files='NA';
		   }	

       var table='<table class="table" width="100%"><tr><th>Date</th><th>S.No</th><th>From Location</th><th>To Location</th> <th>File</th><th>Notes/Explanation </th></tr>';
               table=table+'<tr><td>'+data.dates+'</td><td>'+data.serial_no+'</td><td>'+data.from_location+'</td><td>'+data.to_location+'</td>  <td>'+files+' </td><td>'+data.notes_explanation+'</td></tr>';
              table=table+'</table>';
               $('#form_body').html(table);
        },
        error: function () {}
    }); 
}