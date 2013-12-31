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
    $('#cust_license_date').on('changeDate',function(){
        $('#getDrivingExperience').empty();
        var license_date=$('#cust_license_date').val();
        $('#getDrivingExperience').text(moment(license_date, "DD-MM-YYYY").fromNow(true));
        
    });
              
});