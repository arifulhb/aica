require(['order!jquery','order!nprogress'], function($,NProgress){            
        NProgress.start();
        NProgress.done();
        //setTimeout(function() { NProgress.done(); $(".fade").removeClass("out"); }, 1500);        
});