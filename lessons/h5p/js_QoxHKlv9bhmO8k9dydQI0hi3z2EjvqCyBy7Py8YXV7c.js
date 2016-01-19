jQuery(document).ready(function($) {
  /* Handle clicking on the content type blocks */
  $('.view-content-types-applications .h5p-content-type').click(function(event) {
    if (event.target && event.target.nodeName !== 'A') {
      window.location = $('a', $(this)).first().attr('href');
    }
  });
  $('.nav-toggle').click(function() {
    $(this).toggleClass('menu-open');
    $('.main-menu').slideToggle(250);
    return false;
  });
  if (($(window).width() > 960) || ($(document).width() > 960)) {
    $('#main-menu li').mouseenter(function() {
      $(this).children('ul').css('display', 'none').stop(true, true).slideToggle(250).css('display', 'block').children('ul').css('display', 'none');
    });
    $('#main-menu li').mouseleave(function() {
      $(this).children('ul').stop(true, true).fadeOut(250).css('display', 'block');
    })
  } else {
    $('#main-menu li').each(function() {
      if ($(this).children('ul').length)
        $(this).append('<span class="drop-down-toggle"><span class="drop-down-arrow"></span></span>');
    });
    $('.drop-down-toggle').click(function() {
      $(this).parent().children('ul').slideToggle(250);
    });
  }

  // The magnus menu, chapter 1
  var $headers = $('.node-guide .field-name-body h2');
  if ($headers.length !== 0 && $('.page-node-583').length === 0) {
    var menu = '';
    $headers.each(function(i, e) {
      var id = 'guides-header-' + i;
      menu += '<a href="#' + id + '"><li>' + $(e).attr('id', id).text() + '</li></a>';
    });
    if (menu !== '') {
      var $menu = $('<div class="guide-quick-menu"><h2>Quick menu</h2><ul>' + menu + '</ul></div>').insertBefore('.node-guide .field-name-body');

      var $window = $(window);
      var offset = $menu.offset();
      var padding = parseInt($menu.css('marginTop'));
      var menuHeight = $menu.height();

      $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
          var marginTop = $window.scrollTop() - offset.top + (padding * 2);
          var max = $('.field-name-body').height() - menuHeight;
          if (marginTop > max) {
            marginTop = max;
          }

          $menu.stop().animate({
            marginTop: marginTop
          }, 200);
        } else {
          $menu.stop().animate({
            marginTop: padding
          });
        }
      });
    }
  }

  //Scroll To
  $(".scroll").click(function(event) {
    event.preventDefault();
    $("html,body").stop().animate({scrollTop: $(this.hash).offset().top}, 500);
  });


  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });

  $('.scrollToTop').click(function() {
    $("html, body").stop().animate({scrollTop: 0}, 600);
    return false;
  });

  if ($('body.node-type-h5p-content').length != 0) {

    // Add download buttons
    if (Drupal.settings.h5p !== undefined && Drupal.settings.h5p.content) {
      for (var cid in Drupal.settings.h5p.content){
        var $h5pContent = $('.h5p-content[data-content-id='+cid.substring(4)+']');

        // It might be this H5P is rendered in an iFrame, then DOM
        // is a little bit different
        if ($h5pContent.length === 0) {
          $h5pContent = $('.h5p-iframe[data-content-id='+cid.substring(4)+']');
        }

        if ($h5pContent.length !== 0) {
          $('<div/>', {
            'class': 'h5p-org-download-container'
          }).append($('<a/>', {
            href: Drupal.settings.h5p.content[cid]['exportUrl'],
            'class': 'h5p-org-download',
            text: 'Download'
          })).insertAfter($h5pContent);
        }
      }
    }
  }

  // Documentation menu navigation
  var $docHeader = $('#block-menu-menu-documentation h2');
  if ($docHeader.length !== 0) {
    $docHeader.click(function (e) {
      $(this).parent().toggleClass('visible');
    });
  }

  $('.h5p-doc-box').click(function () {
    $a = $(this).find('a');
    if ($a.length) {
      window.location = $a.attr('href');
    }
  });
});
;
