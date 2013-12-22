require(['order!jquery','order!bootstrap','order!appaica','order!dtpicker'], function($){    
   
    $('#panel_vehicle_info_pvt').css('display','none');
    $('#panel_vehicle_info_com').css('display','none');
    $('#panel_quot_pvt').css('display','none');
    $('#panel_quot_com').css('display','none');
    
    $('#qt_insurance_type_pvt').click(function(){
        $('#panel_vehicle_info_pvt').css('display','block');
        $('#panel_quot_pvt').css('display','block');
        $('#panel_vehicle_info_com').css('display','none');
        $('#panel_quot_com').css('display','none');
    });//end click
    $('#qt_insurance_type_com').click(function(){
        $('#panel_vehicle_info_pvt').css('display','none');
        $('#panel_quot_pvt').css('display','none');
        $('#panel_vehicle_info_com').css('display','block');
        $('#panel_quot_com').css('display','block');
        
    });//end click
});