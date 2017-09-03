//Chrome Smooth Scroll
(function () {

  try {
    $.browserSelector();
    if ($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch (err) {
    console.log(err);
  }
}());

$(document).ready(function () {

  // Bootstrap popover init
  $(function () {

    $('[data-toggle="popover"]').popover()
  });


  // Сounter campaign
  (function () {

    var date = getRelativeDate();

    $('#countdown').timeTo({
      timeTo: date,
      displayDays: 1,
      theme: "white",
      displayCaptions: true,
      fontSize: 24,
      captionSize: 12,
      lang: "ru",
      callback: true
    });

    function getRelativeDate(days, hours, minutes) {

      var countd = 16,
        countmo = '0' + ( (new Date().getMonth()) + 2 ),
        county = new Date().getFullYear(),
        countdate = '' + county + '/' + countmo + '/' + countd + ' 00:00:00',
        date = new Date(countdate);

      return date;
    };
  }());


  // Carousel
  (function () {

    var countSlides = $('#carousel-promo .item').size(),
      i = 0;

    while (i !== countSlides) {
      $('#carousel-promo .carousel-indicators')
        .append('<li data-target="#carousel-promo" data-slide-to="' + i + '"></li>');

      i++
    }
    ;
  }());

  (function () {

    var countSlides = $('#carousel-reviews .item').size(),
      i = 0;

    while (i !== countSlides) {
      $('#carousel-reviews .carousel-indicators')
        .append('<li data-target="#carousel-reviews" data-slide-to="' + i + '"></li>');

      i++;
    }
  }());

  $('.carousel-indicators :first-child, .carousel-inner>.item:first-child')
    .addClass('active');

  $('.services__item:nth-child(4)')
    .removeClass('col-sm-4')
    .addClass('col-md-offset-2 col-sm-5 col-sm-offset-1');

  $('.services__item:nth-child(5)')
    .removeClass('col-sm-4')
    .addClass('col-sm-5');


  // Float menu
  (function () {

    var float = {};
    float.menu = {

      initialize: function () {
        float.menu.initializeFloatMenu();
      },

      initializeFloatMenu: function () {
        var menu = $('.navbar'),
          header = $('.header');

        window.onscroll = function () {
          var scroll = float.menu.getScrollTop();

          if (scroll >= header.height()) {
            menu.removeClass('float-menu_normal')
              .addClass('float-menu_fixed');

          } else if (scroll < header.height()) {
            menu.removeClass('float-menu_fixed')
              .addClass('float-menu_normal');
          }
        };
      },

      getScrollTop: function () {
        return (document.documentElement.scrollTop || document.body.scrollTop);
      },
    };

    if (document.documentElement.clientWidth > 768) {
      float.menu.initialize();
    }
    ;
  }());


  // Smooth anchor scroll
  (function () {

    var scroll = new SmoothScroll('a[href^="#ss-"]', {
      // Selectors
      ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
      header: null, // Selector for fixed headers (must be a valid CSS selector)

      // Speed & Easing
      speed: 500, // Integer. How fast to complete the scroll in milliseconds
      offset: 0, // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
      easing: 'easeInOutCubic', // Easing pattern to use
      customEasing: function (time) {
      }, // Function. Custom easing pattern

      // Callback API
      before: function () {
      }, // Callback to run before scroll
      after: function () {
      } // Callback to run after scroll
    });
  }());

});


// Form new review
$(function () {
  $('#send').click(function () {
    var formValid = true;

    $('input, textarea').each(function () {
      var formGroup = $(this).parents('.form-group'),
        icon = formGroup.find('.form-control-feedback');

      if (this.checkValidity()) {
        formGroup.addClass('has-success').removeClass('has-error');
        icon.addClass('icon-ok').removeClass('icon-error');

      } else {
        formGroup.addClass('has-error').removeClass('has-success');
        icon.addClass('icon-error').removeClass('icon-ok');

        formValid = false;
      }
    });

    if (formValid) {
      $('form').val(function () {
        var str = $(this).serialize();

        $.ajax({
          url: '/wp-content/themes/gp/send.php',
          type: 'POST',
          data: str,
          success: function (data) {
            data
          }
        });
      });

      $('#reviewModal').modal('hide');
      $('.reviews-add').removeClass('hidden');
      $('.reviews__btn').attr('disabled', 'disabled').addClass('hidden');
    }
  });
});