require(['order!jquery','order!appaica','order!appdata'], function($){    
    
    
        $('tr .data-role').each(function(index){
            var rsn= parseInt($(this).find('.role_sn').val());
               console.log('rsn: '+rsn);
               
            switch (rsn) {
                    case 1:                        
                        $(this).find('.role').text('Super user');
                        break;
                    case 2 :
                        $(this).find('.role').text('Sales Consultant');                       
                        break;
                    case 3:                        
                        $(this).find('.role').text('Quotation Team');
                        //$('tr .role').html('');
                        break;
                    case 4:                        
                        $(this).find('.role').text('Accountant');
                        //$('tr .role').html('');
                        break;
                    case 5:                        
                        $(this).find('.role').text('External Agent');
                        //$('tr .role').html('');
                        break;                    
                    default:
                        $('tr .role').html('error');
                }
            
            //$('tr .role').html(rsn);
            
        });
});