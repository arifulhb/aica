require(['order!jquery','order!moment','order!appaica', 'order!jquery-touch'], function($,moment){    
     
    var license_date=$('#cust_license_date').val();
        
    //console.log('diff: '+moment(license_date, "DD-MM-YYYY").fromNow(true)+' ');
    $('#getDrivingExperience').text(moment(license_date, "DD-MM-YYYY").fromNow(true));
    
    $('#cust_instruction_div').bind('change keypress focusout',function(){
        $('#cust_instruction').val($(this).text());
    });
    
//    $('.customer_view input,.customer_view select').attr('disabled','DISABLED');
//    $('.customer_view input,.customer_view select ').css('cursor','default');
//    $('.customer_view input,.customer_view select ').css('background-color','white');
//    $('.customer_view input,.customer_view select ').css('border','none');
              
});