$(document).ready(function() {
  $("#sidebarCollapse").on("click", function() {
    $("#sidebar").addClass("active");
  });

  $("#sidebarCollapseX").on("click", function() {
    $("#sidebar").removeClass("active");
  });

  $("#sidebarCollapse").on("click", function() {
    if ($("#sidebar").hasClass("active")) {
      $(".overlay").addClass("visible");
      console.log("it's working!");
    }
  });

  $("#sidebarCollapseX").on("click", function() {
    $(".overlay").removeClass("visible");
  });
});

// :: Header Cart Active Code
    var cartbtn1 = $('#essenceCartBtn');
    var cartbtn02 = $('#essenceCartBtn2');
    var cartOverlay = $(".cart-bg-overlay");
    var cartWrapper = $(".right-side-cart-area");
    var cartbtn2 = $("#rightSideCart");
    var cartOverlayOn = "cart-bg-overlay-on";
    var cartOn = "cart-on";

    cartbtn1.on('click', function () {
        cartOverlay.toggleClass(cartOverlayOn);
        cartWrapper.toggleClass(cartOn);
    });
    cartbtn02.on('click', function () {
        cartOverlay.toggleClass(cartOverlayOn);
        cartWrapper.toggleClass(cartOn);
    });
    cartOverlay.on('click', function () {
        $(this).removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });
    cartbtn2.on('click', function () {
        cartOverlay.removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });
    // :: Nicescroll Active Code
    if ($.fn.niceScroll) {
        $(".cart-list, .cart-content").niceScroll();
    }
/*=======================
      Popular Slider JS
    =========================*/ 
    $('.popular-slider').owlCarousel({
      items:1,
      autoplay:true,
      autoplayTimeout:5000,
      smartSpeed: 400,
      animateIn: 'fadeIn',
      animateOut: 'fadeOut',
      autoplayHoverPause:true,
      loop:true,
      nav:true,
      merge:true,
      dots:false,
      navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
      responsive:{
        0: {
          items:1,
        },
        300: {
          items:1,
        },
        480: {
          items:2,
        },
        768: {
          items:3,
        },
        1170: {
          items:4,
        },
      }
    });

    /*====================================
    14. CountDown
    ======================================*/ 
    $('[data-countdown]').each(function() {
      var $this = $(this),
        finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime(
          '<div class="cdown"><span class="days"><strong>%-D</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> %-H</strong><p>Hours.</p></span></div> <div class="cdown"><span class="minutes"><strong>%M</strong> <p>MINUTES.</p></span></div><div class="cdown"><span class="second"><strong> %S</strong><p>SECONDS.</p></span></div>'
        ));
      });
    });

    /*===========================
      Quick View Slider JS
    =============================*/ 
    $('.quickview-slider-active').owlCarousel({
      items:1,
      autoplay:true,
      autoplayTimeout:5000,
      smartSpeed: 400,
      autoplayHoverPause:true,
      nav:true,
      loop:true,
      merge:true,
      dots:false,
      navText: ['<i class=" ti-arrow-left"></i>', '<i class=" ti-arrow-right"></i>'],
    });
    /*====================================
      Cart Plus Minus Button
    ======================================*/
    
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


/* MAGNIFY Image on Hover in product-details
* ========================================== */

!function ($) {

        "use strict"; // jshint ;_;

        /* MAGNIFY PUBLIC CLASS DEFINITION
         * =============================== */

        var Magnify = function (element, options) {
            this.init('magnify', element, options)
        }

        Magnify.prototype = {

            constructor: Magnify

            , init: function (type, element, options) {
                var event = 'mousemove'
                    , eventOut = 'mouseleave';

                this.type = type
                this.$element = $(element)
                this.options = this.getOptions(options)
                this.nativeWidth = 0
                this.nativeHeight = 0

                this.$element.wrap('<div class="magnify" >');
                this.$element.parent('.magnify').append('<div class="magnify-large" >');
                this.$element.siblings(".magnify-large").css("background", "url('" + this.$element.attr("src") + "') no-repeat");

                this.$element.parent('.magnify').on(event + '.' + this.type, $.proxy(this.check, this));
                this.$element.parent('.magnify').on(eventOut + '.' + this.type, $.proxy(this.check, this));
            }

            , getOptions: function (options) {
                options = $.extend({}, $.fn[this.type].defaults, options, this.$element.data())

                if (options.delay && typeof options.delay == 'number') {
                    options.delay = {
                        show: options.delay
                        , hide: options.delay
                    }
                }

                return options
            }

            , check: function (e) {
                var container = $(e.currentTarget);
                var self = container.children('img');
                var mag = container.children(".magnify-large");

                // Get the native dimensions of the image
                if (!this.nativeWidth && !this.nativeHeight) {
                    var image = new Image();
                    image.src = self.attr("src");

                    this.nativeWidth = image.width;
                    this.nativeHeight = image.height;

                } else {

                    var magnifyOffset = container.offset();
                    var mx = e.pageX - magnifyOffset.left;
                    var my = e.pageY - magnifyOffset.top;

                    if (mx < container.width() && my < container.height() && mx > 0 && my > 0) {
                        mag.fadeIn(100);
                    } else {
                        mag.fadeOut(100);
                    }

                    if (mag.is(":visible")) {
                        var rx = Math.round(mx / container.width() * this.nativeWidth - mag.width() / 2) * -1;
                        var ry = Math.round(my / container.height() * this.nativeHeight - mag.height() / 2) * -1;
                        var bgp = rx + "px " + ry + "px";

                        var px = mx - mag.width() / 2;
                        var py = my - mag.height() / 2;

                        mag.css({ left: px, top: py, backgroundPosition: bgp });
                    }
                }

            }
        }


        /* MAGNIFY PLUGIN DEFINITION
         * ========================= */

        $.fn.magnify = function (option) {
            return this.each(function () {
                var $this = $(this)
                    , data = $this.data('magnify')
                    , options = typeof option == 'object' && option
                if (!data) $this.data('tooltip', (data = new Magnify(this, options)))
                if (typeof option == 'string') data[option]()
            })
        }

        $.fn.magnify.Constructor = Magnify

        $.fn.magnify.defaults = {
            delay: 0
        }


        /* MAGNIFY DATA-API
         * ================ */

        $(window).on('load', function () {
            $('[data-toggle="magnify"]').each(function () {
                var $mag = $(this);
                $mag.magnify()
            })
        })

    }(window.jQuery);