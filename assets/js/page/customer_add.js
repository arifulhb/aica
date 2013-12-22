require(['order!jquery','order!nprogress','order!moment','order!bootstrap','order!appaica','order!appplugin','order!appdata','order!dtpicker',
    'order!parsly','order!jquery-touch'], function($,NProgress,moment){    
     
    var license_date=$('#cust_license_date').val();
        
    //console.log('diff: '+moment(license_date, "DD-MM-YYYY").fromNow(true)+' ');
    $('#getDrivingExperience').text(moment(license_date, "DD-MM-YYYY").fromNow(true));
    
    $('#cust_instruction_div').bind('change keypress focusout',function(){
        $('#cust_instruction').val($(this).text());
    });
    //console.log('diff: '+ calculateDaysFromNow(license_date));
    //alert(license_date);
//   
//                
//    $('#customer_save1').click(function(){                       
//        $('input, select,#cust_instruction').attr('disabled','disabled');
//        NProgress.start();                
//        var validate=$('#cust_name').parsley( 'validate' );
//        //alert(validate);
//        console.log(validate);
//        
//        NProgress.set(0.1);        
//        var data='cust_name='+$('#cust_name').val();
//            data += '&cust_nric='+$('#cust_nric').val();
//            data += '&cust_dob='+$('#cust_dob').val();
//            data += '&cust_gender='+$('#cust_dob').val();
//            data += '&cust_customer_type='+$('#opt_customer_type').val();
//            data += '&cust_marital_status='+$('#opt_marital_status').val();
//            data += '&cust_license_date='+$('#cust_license_date').val();
//            data += '&cust_instruction='+$('#cust_instruction').text();
//            data += '&cust_occupation='+$('#cust_occupation').val();
//            data += '&cust_email='+$('#cust_email').val();
//            data += '&cust_contact_office='+$('#cust_contact_office').val();
//            data += '&cust_contact_hp='+$('#cust_contact_hp').val();
//            data += '&cust_contact_house='+$('#cust_contact_house').val();
//            data += '&cust_contact_fax='+$('#cust_contact_fax').val();
//            data += '&cust_address_1='+$('#cust_address_1').val();
//            data += '&cust_address_2='+$('#cust_address_2').val();
//            data += '&cust_address_postcode='+$('#cust_address_postcode').val();            
//            alert(data);        
//            $.ajax({
//                url: "",
//                data:data,
//                success:function(){
//                    
//                },
//                error:function(){
//            
//                }
//            });
//            $(document).ajaxStart(function(){
//                
//            });
//            $(document).ajaxStop(function(){
//            NProgress.done();  
//            });
//        
//        //$('input').removeAttr('disabled');
//        
//                     
//    });
              
});