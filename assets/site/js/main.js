/*global $, document*/

$(document).ready(function () {
  "use strict";

  let isRtl = $('html[lang="ar"]').length > 0;

  // open search responsive
  $('.header .open-search').click(function() {
    $('.header .search-form').addClass('active')
  })
  $('.header .close-search').click(function() {
    $('.header .search-form').removeClass('active')
  })

  // footer responsive collapse
  if($(window).width() <= 576) {
    $('.footer .foot-links .links').slideUp(0)
  }
  $('.footer .foot-links .title').click(function() {
    if($(this).hasClass('active')) {
      $(this).removeClass('active')
      $(this).siblings('.links').slideUp()
    } else {
      $('.footer .foot-links .title').removeClass('active')
      $(this).addClass('active')
      $('.footer .foot-links .links').slideUp()
      $(this).siblings('.links').slideDown()
    }
  })

  // home slider
  let leftSvg = '<svg width="44" height="502" viewBox="0 0 44 502" fill="none" xmlns="http://www.w3.org/2000/svg" class="sc-jlZJtj QgNfY"><path class="wave" d="M0.999973 501C32.9999 301.5 42.9999 308 42.9999 252.5C42.9999 197 29.4999 189 1.00002 0.999996L0.999973 501Z" fill="rgba(255,255,255,.4)"></path></svg>'
  let rightSvg = '<svg width="44" height="501" viewBox="0 0 44 501" fill="none" xmlns="http://www.w3.org/2000/svg" class="sc-htmcrh emRwHY"><path class="wave" d="M42.9999 0.5C11 200 1 193.5 1 249C1 304.5 14.5 312.5 42.9999 500.5V0.5Z" fill="rgba(255,255,255,.4)"></path></svg>'
  $('.home-slide').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    nav: true,
    dots: true,
    rtl: isRtl,
    autoplayTimeout: 4000,
    smartSpeed: 1500,
    dragEndSpeed: 1500,
    slidSpeed: 5000,
    items: 1,
    navText: [
        '<i class="fas fa-chevron-right"></i>' + rightSvg,
        '<i class="fas fa-chevron-left"></i>' + leftSvg,
    ],
  });

  $('.main-slide').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    nav: true,
    dots: true,
    rtl: isRtl,
    autoplayTimeout: 4000,
    smartSpeed: 1500,
    dragEndSpeed: 1500,
    slidSpeed: 5000,
    items: 1,
    navText: [
        '<i class="fas fa-chevron-right"></i>',
        '<i class="fas fa-chevron-left"></i>',
    ],
  });

  // products-slide
  $('.products-slide').owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    nav: true,
    dots: true,
    rtl: isRtl,
    slideBy: 7,
    autoplayTimeout: 4000,
    smartSpeed: 200,
    dragEndSpeed: 200,
    slidSpeed: 1000,
    items: 7,
    navText: [
        '<i class="fas fa-chevron-right"></i>',
        '<i class="fas fa-chevron-left"></i>',
    ],
    responsive : {
        // breakpoint from 0 up
        0 : {
            items: 2,
        },
        // breakpoint from 480 up
        576 : {
            items: 3,
        },
        1000 : {
            items: 4,
        },
        // breakpoint from 768 up
        1200 : {
            items: 5,
        }
    }
  });

  $('.r-product-slide').owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    nav: false,
    dots: false,
    rtl: isRtl,
    autoplayTimeout: 4000,
    smartSpeed: 200,
    dragEndSpeed: 200,
    slidSpeed: 1000,
    items: 4,
    responsive : {
        // breakpoint from 0 up
        0 : {
            items: 1,
        },
        // breakpoint from 480 up
        576 : {
            items: 2,
        },
        1000 : {
            items: 3,
        },
        // breakpoint from 768 up
        1200 : {
            items: 4,
        }
    }
  });

  $('.rest-product-slide').owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    nav: true,
    dots: false,
    rtl: isRtl,
    autoplayTimeout: 4000,
    smartSpeed: 700,
    dragEndSpeed: 700,
    slidSpeed: 1000,
    center: true,
    items: 3,
    navText: [
        '<i class="fas fa-chevron-right"></i>',
        '<i class="fas fa-chevron-left"></i>',
    ],
    responsive : {
        // breakpoint from 0 up
        0 : {
            items: 1,
        },
        // breakpoint from 480 up
        576 : {
            items: 1,
        },
        1000 : {
            items: 3,
        },
        // breakpoint from 768 up
        1200 : {
            items: 3,
        }
    }
  });

  // product-img-slide
  $('.product-img-slide').owlCarousel({
    loop: false,
    margin: 30,
    autoplay: false,
    nav: false,
    dots: false,
    rtl: isRtl,
    autoplayTimeout: 4000,
    smartSpeed: 200,
    dragEndSpeed: 200,
    slidSpeed: 1000,
    items: 1,
    navText: [
        '<i class="fas fa-chevron-right"></i>',
        '<i class="fas fa-chevron-left"></i>',
    ],
  });

  // product-imgs-slide
  $('.product-imgs-slide').owlCarousel({
    loop: false,
    margin: 30,
    autoplay: false,
    nav: false,
    dots: false,
    rtl: isRtl,
    autoplayTimeout: 4000,
    smartSpeed: 200,
    dragEndSpeed: 200,
    slidSpeed: 1000,
    items: 7,
    navText: [
      '<i class="fas fa-chevron-right"></i>',
      '<i class="fas fa-chevron-left"></i>',
    ],
    responsive : {
      // breakpoint from 0 up
      0 : {
        items: 2,
      },
      // breakpoint from 480 up
      576 : {
        items: 3,
      },
      1000 : {
        items: 4,
      },
      // breakpoint from 768 up
      1200 : {
        items: 5,
      }
    }
  });

  $('.product-imgs-slide .owl-item').click(function() {
    $('.product-img-slide').trigger('to.owl.carousel', [$(this).index(), 300]);
  })

  // all categories tabs
  $('.main-nav .all-cat-menu .tab-list li a').hover(function() {
    const target = $(this).data('target');
    const links = $('.main-nav .all-cat-menu .tab-list li a');
    const tabs = $('.main-nav .all-cat-menu .content-list .tab');

    links.removeClass('active')
    $(this).addClass('active')
    tabs.removeClass('show')
    $(target).addClass('show')
  });

  if($(window).width() > 992) {
    // all categories menu
    $(".main-nav>.list>li.all").hover(function(){
      $(this).find('.all-cat-menu').addClass('show');
      $('.main-overlay').addClass('show');
    }, function(){
        $(this).find('.all-cat-menu').removeClass('show');
        $('.main-overlay').removeClass('show');
    });
  
    // megamenu show
    $(".main-nav .list>.list-item").hover(function(){
      $(this).find('.mega-menu').addClass('show');
      $('.main-overlay').addClass('show');
    }, function(){
        $(this).find('.mega-menu').removeClass('show');
        $('.main-overlay').removeClass('show');
    });
  }
  // products-filter
  $('.filters-page .filter-head .open-filter').click(function() {
    $('.filters-page .filter').addClass('open');
  });
  $('.filters-page .filter .close-filter').click(function() {
    $('.filters-page .filter').removeClass('open');
  });

  // select2 
  if($('.select-app').length > 0) {
    $('.select-app').select2({
      dir: isRtl ? "rtl" : 'ltr',
      minimumResultsForSearch: 20
    });
  }

  // grid transform
  $('.filters-page .grid-transform').click(function(e) {
    e.preventDefault()
    $('.filters-page .products-row').toggleClass('row-mode')
    $(this).find('i').toggleClass('d-none')
  });


  // quantity input
  let quantityInput = $('.quantity input');
  let quantityMax = quantityInput.attr('max');
  let quantityMin = quantityInput.attr('min');
  // $('.quantity .plus').click(function() {
  //   let currentVal = parseInt(quantityInput.val())
  //   if(currentVal < quantityMax) {
  //     $(this).prev().val(currentVal + 1)
  //   }
  // })
  // $('.quantity .min').click(function() {
  //   let currentVal = parseInt(quantityInput.val())
  //   if(currentVal > quantityMin) {
  //     $(this).next().val(currentVal - 1)
  //   }
  // });

  // input password
  $('.password-input i').click(function() {
    let input = $(this).siblings('input');
    let type = input.attr('type');

    if(type == 'password') {
      $(this).removeClass().addClass('far fa-eye')
      input.attr('type', 'text')
    } else {
      $(this).removeClass().addClass('far fa-eye-slash')
      input.attr('type', 'password')
    }

  });

  // brands-search
  let brandsText = []
      $('.brands-side .custom-check').each(function () {
        brandsText.push($(this).text())
      });
  $('#brands-search-input').keyup(function () {
    let inputValue = $(this).val();
    brandsText.forEach(function (item, index) {
      if(item.includes(inputValue)) {
        $('.brands-side .custom-check').eq(index).removeClass("d-none")
      } else {
        $('.brands-side .custom-check').eq(index).addClass("d-none")
      }
    })
  })
});
