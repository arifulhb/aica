require(['order!jquery','order!bootstrap','order!appaica'], function($){    
        $('#del_quotation').click(function(){
            
            $('#del_com_sn').val($(this).val());
            $('#com_name').text('QT'+$(this).val());
            $('#remove_model').modal({ backdrop: false});
        });
});