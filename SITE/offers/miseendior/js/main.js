$(document).ready(function(){


    $( document ).on('click','.action',function(){
        console.clear();
        var el = $(this);
        if(el.is('button')){ el.css({"background-color":el.css('background-color')}).addClass('progress');}
        if(el.is('span')) { el.addClass('progress'); }
        if(el.is('div')) { el.addClass('progress'); }
        $.post("/index.php?query="+$(this).attr('data-route'), $.param( { id: $(this).attr('data-id'),  value: $(this).attr('data-value'), referrer: document.referrer, url:document.URL } ) + "&" + $('#'+$(this).attr('data-form')).serialize(),
            function(data) {
                el.removeClass('progress');
                if(data){
                    console.log(data);
                    var answer = $.parseJSON(data);
                    if(answer.script) { eval(answer.script);}
                }
            });
    event.preventDefault();
    });


    $( document ).on('click','.view',function(){
        view($('#data-'+$(this).attr('data-route')).html());
    });

    function view(text){
        $("body").append("<div class='modal-view'></div><div class='mask'></div>");
        $(".modal-view").html(text + "<div class='btn-center'><button type='button' class='button-close'>Закрыть</button></div>"); $(".mask,.modal-view").fadeIn("slow"); $(".mask,.button-close").click(function(){$(".mask,.modal-view").fadeOut("fast");});
        $(".mask,.modal-view").fadeIn("fast");
        $(".mask").click(function(){ $(".mask,.modal-view").fadeOut("fast", function() { $(".mask,.modal-view").remove(); });});
    };

});