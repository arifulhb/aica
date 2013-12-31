require(['order!jquery','order!apppath','order!bootstrap','order!appaica', 'order!jquery-touch'], function($,apppath){ 

    $('.del_modal').click(function(){
        
        var id = $(this).val();
        $('#del_com_sn').val(id);
        var name=$('#tr'+id).find('.name').text();
        $('#com_name').text(name);
        $('#remove_model').modal();
    });       
                  
});