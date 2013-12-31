requirejs.config({
    //By default load any module IDs from js/lib
    //baseUrl: 'assets/js',
    paths: {
        'apppath'   :'page/apppath',
        'appaica'   :'lib/app',
        'appplugin' :'lib/appplugin',
        'appdata'   :'lib/appdata',
        'parsly'    :'../plugins/parsley/parsley',
        'dtpicker'  :'plugins/datepicker/bootstrap-datepicker',
        'moment'    :'../plugins/momentjs/moment.min',
        //'pjax'      :'plugins/datepicker/bootstrap-datepicker',        
        'nprogress'  :'../plugins/nprogress/nprogress',
        //'raty'      :'../plugins/raty-2.5.2/jquery.raty',
        //'tinymce'    :'../plugins/tinymce_4.0.11_jquery/tinymce.min',        
        'order'     :'lib/order',
        'bootstrap' :'../plugins/bootstrap/js/bootstrap',
        //'json2'     :'lib/json2',
        'jquery-ui'     :'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min',
        'jquery-touch'  :'lib/jquery.ui.touch-punch.min',        
        'jquery'    :'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min'        
    },
    shim: {
        "bootstrap": {deps: ["jquery"]},
        "dtpicker": {deps: ["bootstrap"]},
        "parsly": {deps: ["jquery"]},
        "appaica": {deps: ["bootstrap"]},        
        "nprogress": {deps:['jquery']},
        "appplugin": {deps:['dtpicker']},
        "appdata": {deps:['jquery']},
        "jquery-ui": {deps:['jquery']},
        "jquery-touch": {deps:['jquery']}
        //"dtpicker": {deps: ["jquery"]}
    }
});
//console.log('require configured');
//requirejs(["main"]);
require(['order!jquery','order!bootstrap'],function($){
    console.log('LOADED require.js');

});