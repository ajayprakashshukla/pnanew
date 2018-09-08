var SITE_URL='http://pna.webdevelopmentcompanyinlucknow.website/tester/';
 $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

function change_status(table,id){
    $.get(SITE_URL+"admin/change_status/"+table+'/'+id, function(data, status){
        $('#message').html('Status successfully chenged');
    });
}

function get_wallet_users_list(wallet_id){

 $.get(SITE_URL+"admin/get_wallet_users_list/"+wallet_id, function(data, status){
       var response = $.parseJSON(data);
        var trHTML = '';
        $.each(response, function (i, item) {
            trHTML += '<tr><td>' + item.name + '</td><td><a class="btn btn-success" href="'+SITE_URL+'/admin/user/'+item.user_id+'"> View Details</a></td></tr>';
        });
    $('#user_list_table').append(trHTML);
    });
}




function load_facility(id){
   $.get(SITE_URL+"load_facility/"+id, function(data, status){
       var response = $.parseJSON(data);
        var trHTML = '';
        $.each(response, function (i, item) {
            trHTML += '<option value="' + item.id+ '">'+item.name+'</option>';
        });
        $('#select_facility')
          .find('option')
          .remove()
          .end()
          .append(trHTML)
          .val('whatever');
    });
}

$('#select_facility').on('change',function(){
   $('#get_n_app').attr('href','application_form/'+this.value);

});

$('.facility_category_id').on('click',function(){
   $('#get_n_app').attr('href','javascript:void(0);');
});


function chengeApplicationStatus(app_id, status){
  $.get(SITE_URL+"admin/chengeApplicationStatus/"+app_id+'/'+status, function(data, status){
       var response = $.parseJSON(data);
  });

}



        $(document).on("click", ".conferm", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Are you sure to delete?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });


$('.form_sample_3').on('submit',function(e){
e.preventDefault();
var email=$('#email').val();
var wallet_category=$('#wallet_category').val();
var amount=$('#amount').val();
var type=$('#type').val();
var discription=$('#discription').val();
var wallet_id=$('#wallet_id').val();
var dates=$('#dates').val();


var data={'email':email,'wallet_category':wallet_category,'wallet_id':wallet_id,'amount':amount,'type':type,'discription':discription,'dates':dates};
if((data.email !='') && (data.wallet_category !='')&& (data.wallet_category !='') && (data.amount !='') && (data.type !='')&& (data.discription !='')&& (data.dates !='')){
  
    $.post(SITE_URL+"admin/debit_credit_form_submit", data, function(data, status){
       var response = $.parseJSON(data);
        $('.alert-success').html(response.msg);
        $('.total_amounts').text(response.total_amounts);
        $('.no_of_deposit').text(response.no_of_deposit);
        $('.total_debit').text(response.total_debit);
        $('.no_of_withdrawals').text(response.no_of_withdrawals);
        $('.total_credit').text(response.total_credit);       



       $('#form_sample_3 input').val('');
       $('#form_sample_3 select').val('');
       var table=$('#datatable_ajax').DataTable();
       table.ajax.reload(null,false);
    });









}

})




function add_more_files(){

 var html='<div class="form-group" id=""><div class="col-md-4"><input type="text"  name="file_name[]" class="form-control"></div>';
     html=html+ '<div class="col-md-4"><input type="file" name="file[]" class="form-control"></div><div class="col-md-4">';
     html=html+  '<span class="btn btn-success" onclick="add_more_files()">Add More</span><span class="btn btn-danger removes" onclick="$(this).parent().parent().remove()" >Remove</span></div></div>';


$('#last_file_div').append(html);
}



$('#approvel_button').on('click', function(){
   $('body').css('opacity','.1');
   $('body').css( 'pointer-events', 'none');
   $.post(SITE_URL+"send_otp_user_verification", function(data, status){
    $('body').css('opacity','1');
    $('body').css( 'pointer-events', 'all');
     if(status=='success'){
      var potp=data;
    bootbox.prompt({
              title: "To approve or reject user please first enter 6 digit otp sent on your mobile",
              inputType: 'text',
              placeholder:'Please enter Otp here....',
              callback: function (otp) {
                  if(otp==null){
                    $('.bootbox.modal').modal('hide');
                     return false;
                  }
                  var status= $('#approvel_status').val();
                  var user_id= $('#approvel_user').val();
                  
                  var data={'status':status,'otp':otp,'potp':potp,'user_id':user_id};
                  $.post(SITE_URL+"approve_user_reg", data, function(data, status){
                      $('.bootbox-form').html('<h3>'+data+'</h3>');
                      setTimeout(function(){ $('.bootbox.modal').modal('hide'); }, 3000);
                  })

                  return false;
              }
          });




     }
  });

     
});



function getApprovedLoans(user_id){
$.get(SITE_URL+"admin/getApprovedLoans/"+user_id, function(data, status){
       var response = $.parseJSON(data);
        var trHTML = '<option value=""></option>';
        $.each(response, function (i, item) {
            trHTML += '<option value="' + item.id+ '">'+item.name+'(Loan No:'+item.id+')</option>';
        });
        $('#select_loanfacility')
          .find('option')
          .remove()
          .end()
          .append(trHTML)
          .val('whatever');
    });
}





function deletedata(deletefuncton,id){
   $('body').css('opacity','.1');
   $('body').css( 'pointer-events', 'none');
   $.post(SITE_URL+"send_otp_user_verification", function(data, status){
    $('body').css('opacity','1');
    $('body').css( 'pointer-events', 'all');
     if(status=='success'){
      var potp=data;
    bootbox.prompt({
              title: "please enter 6 digit otp sent on your mobile",
              inputType: 'text',
              placeholder:'Please enter Otp here....',
              callback: function (otp) {
                  if(otp==null){
                    $('.bootbox.modal').modal('hide');
                     return false;
                  }
                  var status= $('#approvel_status').val();
                  var user_id= $('#approvel_user').val();
                  
                  var data={'otp':otp,'potp':potp,'user_id':id,'id':id};
                  $.post(SITE_URL+'admin/'+deletefuncton, data, function(data, status){
                      $('.bootbox-form').html('<h3>'+data+'</h3>');
                      setTimeout(function(){ $('.bootbox.modal').modal('hide'); }, 3000);
                      if('approversDelete'==deletefuncton || 'delete_facility'==deletefuncton){
                            window.location.reload();
                      }else{
                              var table=$('#datatable_ajax').DataTable();
                             table.ajax.reload(null,false);
                      }
                             
 
                  })

                  return false;
              }
          });




     }
  });

     
};


function ViewWallet(id){
   $.post(SITE_URL+"/admin/getwallet/"+id, function(data, status){
            var obj = $.parseJSON(data);
            var table = "<table class='table'><thead>" +
                              "<tr><th>Creation Date</th>       <th>"+obj.creation_date+"</th></tr>" +
                                "<tr><th>Wallet Description</th><th>"+obj.wallet_name+"</th></tr>" +
                                "<tr><th>Wallet type</th>       <th>"+obj.wallet_type+"</th></tr>" +
                                "<tr><th>user email</th>        <th>"+obj.company_email+"</th></tr>" +
                                "<tr><th>User sharp id</th>     <th>"+obj.sharp_id+"</th></tr>" +
                                "<tr><th>Monthly Payment</th>   <th>"+obj.monthly_payment+"</th></tr>" +
                                "<tr><th>Quarterly Payment</th> <th>"+obj.quarterly_payment+"</th></tr>" +
                                "<tr><th>Annual Payment</th>    <th>"+obj.annual_payment+"</th></tr>" +
                                "<tr><th>Wallet Balance</th>    <th>"+obj.wallet_balance+"</th></tr>" +
                              "</tr></thead></table>";
            bootbox.alert(table);
   })
        
}

function getWallets (search_by){



  $("[name='wallet']").find('option').remove().end()
   var value= $('.'+search_by).val();
  var data={'search_by':search_by,value:value};
                  $.post(SITE_URL+'admin/getwallets', data, function(data, status){   
                  var obj = $.parseJSON(data);
                  var listitems;
                  listitems += '<option value=""></option>';
                  $.each(obj, function(key, value){
                      listitems += '<option value=' + key + '>' + value + '</option>';
                  });
                 $("[name='wallet']").append(listitems);

                  });
}


function userDueWallet(company_email){

 var search_month= $('#search_month').val();
 var search_year= $('#search_year').val();
  var data= {search_month:search_month,search_year:search_year};
   $.post(SITE_URL+"admin/userduewallet/"+company_email,data, function(data, status){
           var obj = $.parseJSON(data);
            var table = "<table class='table'><thead>" ;
                 table=table+"<tr><th>Creation Date</th><th>Wallet Name</th><th>Wallet Type</th><th>Monthly Payment</th><th>Quarterly Payment</th><th>Annual Payment</th><th>Wallet Balance</th><th>Due Amount</th><th>Paid Amount</th></tr>";
                 table=table+  "</thead><tbody>";
                 $.each(obj ,function(key,value){
                  table=table+"<tr><td>"+value.creation_date+"</td><td>"+value.wallet_name+"</td><th>"+value.wallet_type+"</th><th>"+value.monthly_payment+"</th><th>"+value.quarterly_payment+"</th><th>"+value.annual_payment+"</th><th>"+value.wallet_balance+"</th><th>"+value.due_amount+"</th><th>"+value.paid_amount+"</th></tr>";
                 })
                 table=table+  "</table>";
            bootbox.alert(table);
            $('.modal-content').css('width','768px');
   })
        
}


function load_facility_detail(id){
$.post(SITE_URL+"load_facility_detail/"+id, function(data, status){
       var data =$.parseJSON(data);
       var table='<table class="table facility_detail_table">';
           table=table+'<tr><th>Facility Title</th><td>'+data.name+'</td></tr>';
           table=table+'<tr><th>Facility Description</th><td>'+data.description+'</td></tr>';
           table=table+'<tr><th>Min. Amount</th><td>'+data.min_amount+'</td></tr>';
           table=table+'<tr><th>Max. Amount</th><td>'+data.max_amount+'</td></tr>';
           table=table+'<tr><th>Interest Rate</th><td>'+data.interest_rate+'%</td></tr>';
           table=table+'<tr><th>Maximum Tenor</th><td>'+data.maximum_tenor+'yrs</td></tr>';
           table=table+'<tr><th>Allowable Payment Schedule</th><td>'+data.payment_schedule+'</td></tr>';
           table=table+'<tr><th>Monthly Principal Payment Date</th><td>'+data.monthly_payment_date+'</td></tr>';
           table=table+'<tr><th>Quarterly Principal Payment Dates</th><td>'+data.quarterly_payment_date+'</td></tr>';
           table=table+'<tr><th>Annually Principal Payment Dates</th><td>'+data.annualy_payment_date+'</td></tr>';
           table=table+'<tr><th>Monthly Interest Payment Date</th><td>'+data.monthly_interest_payment_date+'</td></tr>';
           table=table+'<tr><th>Processing Fee</th><td>'+data.processing_fee+'</td></tr>';
           table=table+'<tr><th>Insurance Fee</th><td>'+data.insurance_fee+'</td></tr>';
           table=table+'<tr><th>Management Fee</th><td>'+data.management_fee+'</td></tr></table>';
$('.facility_detail_table').html(table);


var table='<table class="table facility_detail_table_3">';
           table=table+'<tr><th>Facility Title</th><td>'+data.name+'</td></tr>';
           table=table+'<tr><th>Facility Description</th><td>'+data.description+'</td></tr>';
           table=table+'<tr><th>Interest Rate</th><td>'+data.interest_rate+'%</td></tr>';
           table=table+'<tr><th>Processing Fee</th><td>'+data.processing_fee+'</td></tr>';
           table=table+'<tr><th>Insurance Fee</th><td>'+data.insurance_fee+'</td></tr>';
           table=table+'<tr><th>Management Fee</th><td>'+data.management_fee+'</td></tr></table>';

$('.facility_detail_table_3_div').html(table);
var select_tenor=$.parseJSON(data.select_tenor);
var selectschedule=$.parseJSON(data.selectschedule);

var selectschedules = '<select onchange="get_MQA_payment();" required class="form-control"id="payment_schedule" name="payment_schedule"> <option value=""></option>';
$.each(selectschedule, function (i, item) {
            selectschedules += '<option value="' + item.id+ '">'+item.name+'</option>';
});
selectschedules += '</select>';


var select_tenors = '<select onchange="get_MQA_payment();" required class="form-control" id="tenors" name="tenors"> <option value=""></option>';
$.each(select_tenor, function (i, val) {
  var disabled='fasle'
  if(val%12 ==0){  select_tenors += '<option  '+disabled+' value="' + val+ '">'+val+'</option>'; }
            
});
select_tenors += '</select>';

var table='<table class="table facility_detail_table_payment">';
table=table+'<tr><th>Amount Requested</th><td><input onkeyup="get_MQA_payment();" type="text" id="amount_requested" class="form-control number " required name="amount_requested"></td></tr>';
table=table+'<tr><th>Tenor(months)</th><td>'+select_tenors+'</td></tr>';
table=table+'<tr><th>Payment Schedule</th><td>'+selectschedules+'</td></tr>';

table=table+'</table>';
$('.facility_detail_table_2').html(table);

});

}



function get_MQA_payment(){
 
$('.payValue').remove();
 var payment_schedule= $('#payment_schedule').val();
 var payment_schedule_text=$('#payment_schedule option:selected').text();
 var tenors= $('#tenors').val();
 var amount_requested= $('#amount_requested').val();
 if((payment_schedule >0) && (tenors>0)&& (amount_requested>0)){
 

 var Monthly=0;
 var Quarterly=0;
 var Annually=0;

 //Monthly
 if(payment_schedule==1){
  Monthly= (amount_requested)/tenors;
 }
  //Quarterly
 if(payment_schedule==2){
   Quarterly= (amount_requested *3)/tenors ;
 }
//Annually
 if(payment_schedule==3){
   Annually= (amount_requested *12)/tenors ;
 }

 //Monthly/Quarterly

  if(payment_schedule==4){
    Monthly= amount_requested/(2*tenors);
    Quarterly=(3*amount_requested)/(2*tenors);
  }

  //Monthly/Quarterly Annually
  if(payment_schedule==5){
    Monthly=amount_requested/(3*tenors);
    Quarterly=amount_requested/tenors;
    Annually=4*amount_requested/tenors;
  }

//Quarterly/Annually
  if(payment_schedule==6){
    Quarterly=(amount_requested*3)/(2*tenors);
    Annually=(amount_requested*6)/(2*tenors);

  }

 // Monthly/Annually
  if(payment_schedule==7){
    Monthly=amount_requested/(2*tenors);
    Annually=(6*amount_requested)/(tenors);
  }



    if(Monthly>0){
    $('.facility_detail_table_payment').append('<tr class="payValue"><th>Monthly Payment</th><td>'+Monthly.toFixed(2)  +'</td></tr>'   )
    }

    if(Quarterly>0){
    $('.facility_detail_table_payment').append('<tr class="payValue"><th>Quarterly Payment</th><td>'+Quarterly.toFixed(2)  +'</td></tr>'   )
    }
    if(Annually>0){
    $('.facility_detail_table_payment').append( '<tr class="payValue"><th>Annual Payment</th><td>'+Annually.toFixed(2)  +'</td></tr>'  )
    }


    var facility =$('#facility').val();
    var data={'amount_requested':amount_requested, 'tenors':tenors,'facility':facility,'payment_schedule':payment_schedule};
    $.get(SITE_URL+"get_repayment_schedule", data, function(data, status){ 

         var  obj=  $.parseJSON(data);
         var tdata='';
         $.each(obj, function (i, item) {
            tdata=tdata+'<tr><td>'+item.date+'</td><td>'+item.cycle+'</td><td>'+item.amount+'</td></tr>'
         });
         $('#payment_cycle').html(tdata);

         //repayemnts_plans_tbody
       var tdata='';
         $.each(obj, function (i, item) {
            tdata=tdata+'<tr><td>'+item.date+'</td><td>'+item.cycle+'</td><td>'+item.amount+'</td><td>'+item.interest+'</td></tr>'
         });
         $('#repayemnts_plans_tbody').html(tdata);



    })


   //Application Details
    
      var table='<table class="table application_detail_table">';
           table=table+'<tr><th>Amount Requested</th><td>NGN'+amount_requested+'</td></tr>';
           table=table+'<tr><th>Tenor</th><td>'+tenors+' Months</td></tr>';
           table=table+'<tr><th>Repayment Plan</th><td>'+payment_schedule_text+'</td></tr></table>';
        $('.application_detail_div').html(table);
 }
}


$('.loan_app_submit').on('click',function(){
$('form').submit();
});