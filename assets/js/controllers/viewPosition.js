var $$ = jQuery2;

var inputs = $$("input[type='text']");

$$.each(inputs,function(i,input){
    $$(input).on('focus',function(){
        $$('html,body').animate({
                scrollTop: $$(this).offset().top-20},
            'slow');
    });
})