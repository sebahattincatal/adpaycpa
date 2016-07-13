'use strict';
$(function () {

    var note = $('#note'),
            ts = new Date(2012, 0, 1),
            newYear = true;

    if ((new Date()) > ts) {

        ts = (new Date()).getTime() + 22 * 60 * 60 * 1000 + 16 * 60 * 1000 + 38 * 1000;
        newYear = false;
    }

    $('#countdown').countdown({
        timestamp: ts,
        callback: function (days, hours, minutes, seconds) {

            var message = "";

            // message += "Дней: " + days +", ";
            // message += "часов: " + hours + ", ";
            // message += "минут: " + minutes + " и ";
            // message += "секунд: " + seconds + " <br />";

            if (newYear) {
                //message += "осталось до Нового года!";
            }
            else {
                message += "До завершения акции:";
            }

            note.html(message);
        }
    });

});
//FOR DEMO
jQuery(document).ready(function () {



    $("#legaltrigger").click(function () {
        $("#legal").toggle();
    });

    // CHANGE COLOR

    // delegate all clicks on "a" tag (links)
    $(document).on("click", "#back", function () {

        // get the href attribute
        var newUrl = $(this).attr("href");

        // veryfy if the new url exists or is a hash
        if (!newUrl || newUrl[0] === "#") {
            // set that hash
            location.hash = newUrl;
            return;
        }

        // now, fadeout the html (whole page)
        $(".preloader").fadeIn('slow', function () {

            // when the animation is complete, set the new location
            location = newUrl;

        });

        // prevent the default browser behavior.
        return false;
    });

    (function ($)
    {
        $(document).ready(function () {
            $('.styleswitch').click(function ()
            {
                switchStylestyle(this.getAttribute("rel"));
                return false;
            });
            var c = readCookie('style');
            if (c)
                switchStylestyle(c);
        });

        function switchStylestyle(styleName)
        {
            $('link[rel*=style][title]').each(function (i)
            {
                this.disabled = true;
                if (this.getAttribute('title') == styleName)
                    this.disabled = false;
            });
            createCookie('style', styleName, 365);
        }
    })(jQuery);

    // Cookie functions
    function createCookie(name, value, days)
    {
        if (days)
        {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        }
        else
            var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/";
    }
    function readCookie(name)
    {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++)
        {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0)
                return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    function eraseCookie(name)
    {
        createCookie(name, "", -1);
    }

});



/*---------------------------------------------------------*/
/*  LOADER                                                 */
/*---------------------------------------------------------*/

jQuery(window).load(function () {


    $(".preloader").delay(0).fadeOut("slow");

    // SPECIAL VERSION
    setTimeout(function () {
        $('.header-special-version .intro').addClass('animated fadeInLeft')
    }, 0);
    setTimeout(function () {
        $('.hand-phone').delay(0).queue(function () {
            $(this).addClass('animated fadeInRight')
        }, 50);
    });

    // PHONES VERSION
    setTimeout(function () {
        $('.header-phones-version .intro, .header-minimal-version .intro, .header-blog-version .intro').addClass('animated fadeInDown')
    }, 0);
    setTimeout(function () {
        $('.phone-center').delay(0).queue(function () {
            $(this).addClass('animated fadeInUp')
        }, 50);
    });
    setTimeout(function () {
        $('.phone-left').delay(0).queue(function () {
            $(this).addClass('animated fadeInRight')
        }, 50);
    });
    setTimeout(function () {
        $('.phone-right').delay(0).queue(function () {
            $(this).addClass('animated fadeInLeft')
        }, 50);
    });
    setTimeout(function () {
        $('header .shadow-left').delay(0).queue(function () {
            $(this).addClass('animated fadeInRight')
        }, 50);
    });
    setTimeout(function () {
        $('header .shadow-right').delay(0).queue(function () {
            $(this).addClass('animated fadeInLeft')
        }, 50);
    });

});



/*---------------------------------------------------------*/
/*  NAVBAR LI AUTOHEIGHT                                   */
/*---------------------------------------------------------*/

// Auto counter for calculate the elements of the fullscreen menu
function contactNum() {

    var numberOfElementsList = $('nav .localScroll li').filter(function () {
        return $(this).css('display') !== 'none';
    }).length,
            calculation = (100 / numberOfElementsList),
            calculationInPixels = ($(window).height() / numberOfElementsList);
    $('nav .localScroll li').css('height', calculation + '%');
    $('nav .localScroll li').css('line-height', calculationInPixels + 'px');

}
;




/*---------------------------------------------------------*/
/*  DOCUMENT READY                                         */
/*---------------------------------------------------------*/

jQuery(document).ready(function () {


    /*---------------------------------------------------------*/
    /*  ONE PAGE NAV                                           */
    /*---------------------------------------------------------*/

    // Navigation for desktop bar
    $('#menu').onePageNav({
        currentClass: 'active',
        changeHash: false,
        scrollSpeed: 750,
        easing: 'swing'
    });


    /*=========================================================*/
    /*  LOCAL SCROLL                                           */
    /*=========================================================*/

    $('.localScroll').localScroll({
        duration: 1000
    });

    $('.localScroll-slow').localScroll({
        duration: 2000
    });


    /*---------------------------------------------------------*/
    /*  CLOSE FULLSCREEN MENU WHEN CLICK                       */
    /*---------------------------------------------------------*/

    $(".localScroll").find("li").click(function () {
        $(".overlay-close").click();
    });







    /*---------------------------------------------------------*/
    /*  CONTACT FORM                                           */
    /*---------------------------------------------------------*/

    $('#contact_form').validate({
        rules: {
            address: {
                required: false
            },
            name: {
                required: false
            },
            phone: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            phone: {
                required: "Заполните, пожалуйста.",
                minlength: "Заполните, пожалуйста."
            }
        }
    });


    $('#submit').click(function () {
        //event.preventDefault();	

        var flag = $("#contact_form").valid();

        //RESULT?
        if (flag) {
            //console.log('WIN');
            $("#contact_form").submit();
            $('#submit').text('Заказ отправлен, спасибо!');
            //$('#submit').hide(); //("Заказ отправлен, спасибо!");
        } else {
            //console.log('FAIL (');
        }

        /*var str = $( '#contact_form' ).serializeArray();
         console.log(str);	
         
         
         $.post("antonbeliy2412.e-autopay.com/checkout/save_order_data.php",str,function( data ) {
         console.log(data);	*/

    });





    /*---------------------------------------------------------*/
    /*  DECLARE IF IT IS A DEVICE                              */
    /*---------------------------------------------------------*/

    var onMobile = false;
    if (navigator.userAgent.match(/iPhone|iPad|iPod|Android|BlackBerry|IEMobile/i)) {
        var onMobile = true;
    }

    /*---------------------------------------------------------*/
    /*  ONLY FOR DEVICES                                       */
    /*---------------------------------------------------------*/

    if (onMobile == true) {
        $('.pulse-hover, header ul li i, .responsive-nav li i, .owl-prev, .owl-next, .social li a, .links li').addClass('no-pulse');

    }




    /*---------------------------------------------------------*/
    /*  CLICK ACTIVE ACCORDION                                 */
    /*---------------------------------------------------------*/

    if ($(window).width() >= 992) {
        $(".responsive-accordion .active .responsive-accordion-head").click();
    }


    /*---------------------------------------------------------*/
    /*  FULLSCREEN MENU                                        */
    /*---------------------------------------------------------*/

    //open/close primary navigation
    $('.cd-primary-nav-trigger').on('click', function () {
        $('.cd-menu-icon').toggleClass('is-clicked');
        $('.cd-header').toggleClass('menu-is-open');

        //in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
        if ($('.cd-primary-nav').hasClass('is-visible')) {
            $('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        } else {
            $('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').addClass('overflow-hidden');
            });
        }
    });

    /*$('.cd-primary-nav-trigger').on('click', function(){
     console.log('menu clicked');
     if( $('.cd-primary-nav').hasClass('is-visible') ) {
     }else{
     $('.cd-primary-nav').addClass('is-visible');
     }
     
     });*/



    /*---------------------------------------------------------*/
    /*  VIDEO AND SLIDE BACKGROUND                             */
    /*---------------------------------------------------------*/

    if ($("header").hasClass('video')) {
        $(".video").vide({
            'mp4': 'assets/videos/video-bg',
            'webm': 'assets/videos/video-bg',
            'ogv': 'assets/videos/video-bg',
            'poster': 'assets/videos/video-bg',
        });
    } else if ($("header").hasClass('slide-bg')) {
        $('#maximage').maximage({
            cycleOptions: {
                fx: 'fade',
                speed: 4000,
                timeout: 400
            },
            fillElement: '#home'
        });
    }
    ;




}); //END DOCUMENT READY


/*---------------------------------------------------------*/
/*  FULLSCREEN MENU                                        */
/*---------------------------------------------------------*/


// NAV FOR BLOG
function nav_blog() {
    if ($("header > div").hasClass("header-blog-version")) {
        $('.responsive-nav').css('top', '0');
        $('.responsive-nav').css('opacity', '1');
    }
}
;

nav_blog();


/*---------------------------------------------------------*/
/*  WINDOW SCROLL                                          */
/*---------------------------------------------------------*/

jQuery(window).scroll(function () {



    /*---------------------------------------------------------*/
    /*  NAVBAR                                                 */
    /*---------------------------------------------------------*/

    if ($(window).scrollTop() >= $('header').outerHeight() - 100) {
        $('.responsive-nav').css('top', '0');
        $('.responsive-nav').css('opacity', '1');
    }
    else {
        $('.responsive-nav').css('top', -$('.responsive-nav').outerHeight() + 'px');
        $('.responsive-nav').css('opacity', '0');
    }

    nav_blog();

    /*---------------------------------------------------------*/
    /*  OPACITY WHEN SCROLLING                                 */
    /*---------------------------------------------------------*/

    var fadeS = $('.fadeScroll');
    var st = $(this).scrollTop();
    fadeS.each(function () {
        var offset = $(this).offset().top;
        var height = $(this).outerHeight();
        offset = offset + height / 2;
        $(this).css({
            'opacity': (1 - ((st - offset + 300) / 200))
        });
    });


    /*---------------------------------------------------------*/
    /*  SIDEBAR BLOG                                           */
    /*---------------------------------------------------------*/

    if ($("aside").hasClass('sidebar-blog')) {
        var superarHeight = $(".sidebar-blog").height() + $(".sidebar-blog").offset().top;
        if ($(window).scrollTop() >= superarHeight) {
            $("#blog-scroll").removeClass('col-md-8').addClass('col-md-12');
        } else {
            $("#blog-scroll").addClass('col-md-8').removeClass('col-md-12');
        }
    }


}); //END WINDOW SCROLL





/*---------------------------------------------------------*/
/*  NAVBAR LI AUTOHEIGHT                                   */
/*---------------------------------------------------------*/

contactNum();
$(window).on('resize', function () {
    contactNum();
});

// NAVBAR LI AUTOHEIGHT END