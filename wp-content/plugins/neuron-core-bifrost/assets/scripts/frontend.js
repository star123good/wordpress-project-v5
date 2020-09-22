jQuery(document).ready(function($) {
  'use strict';

  // Perfect Scrollbar
  function neuronPerfectScrollBar() {
    if ($('.elementor-section').hasClass('neuron-fixed-yes')) {
      new PerfectScrollbar('.neuron-fixed-yes');
    }
  }

  /**
   * Mega Menu Calculation
   */
  function neuronCalculateMegaMenu() {
    $('.elementor-widget-neuron-nav-menu').each(function() {
      var $menu = $(this);

      var $navHolder = $menu.find('.m-nav-menu--holder');
      var $subMenu = $navHolder.find('.m-mega-menu > .sub-menu');
      var $elementorContainer = $menu.parents('.elementor-container');
      var columnPadding;

      if ($.browser.mozilla) {
        columnPadding = parseInt(
          $menu.parents('.elementor-column-wrap').css('padding-left')
        );
      } else {
        columnPadding = parseInt(
          $menu.parents('.elementor-column-wrap').css('padding')
        );
      }

      var containerOffset = $elementorContainer.offset().left;
      var subMenuOffset = $navHolder.offset().left;

      var width = $elementorContainer.outerWidth() - columnPadding * 2;
      var offset = containerOffset - subMenuOffset + columnPadding;

      $subMenu.css({
        width: width,
        left: offset
      });
    });
  }

  /**
   * Mobile Menu Calculation
   */
  function neuronCalculateMobileMenu() {
    $('.m-nav-menu--stretch.elementor-widget-neuron-nav-menu').each(function() {
      var $menu = $(this);

      var $navHolder = $menu.find('.m-nav-menu--mobile-holder');
      var $mobileMenu = $navHolder.find('.m-nav-menu--mobile');
      var $elementorContainer = $menu.parents('.elementor-container');
      var columnPadding;

      if ($.browser.mozilla) {
        columnPadding = parseInt(
          $menu.parents('.elementor-column-wrap').css('padding-left')
        );
      } else {
        columnPadding = parseInt(
          $menu.parents('.elementor-column-wrap').css('padding')
        );
      }

      var columnLeftMargin = parseInt(
        $menu.find('.elementor-widget-container').css('marginLeft')
      );

      columnLeftMargin = columnLeftMargin ? columnLeftMargin : 0;

      var containerOffset = $elementorContainer.offset().left;
      var mobileMenuOffset = $navHolder.offset().left;

      var width = $elementorContainer.outerWidth() - columnPadding * 2;
      var offset =
        containerOffset - mobileMenuOffset + columnPadding + columnLeftMargin;

      $mobileMenu.css({
        width: width,
        left: offset
      });
    });
  }

  /**
   * Hamburger Menu
   */
  function neuronHamburgerMenu() {
    $('.elementor-widget-neuron-nav-menu').each(function() {
      var $menu = $(this);

      $menu
        .find('.m-nav-menu--mobile-holder .m-nav-menu--mobile-icon')
        .on('click', function(e) {
          e.stopPropagation();
          e.preventDefault();

          $menu
            .find('.m-nav-menu--mobile-holder .m-nav-menu--mobile')
            .toggleClass('active');

          $menu
            .find(
              '.m-nav-menu--mobile-holder .m-nav-menu--mobile .menu-item-has-children > .menu-item-icon'
            )
            .removeClass('active');

          $menu
            .find('.m-nav-menu--mobile-holder .m-nav-menu--mobile')
            .find('.sub-menu')
            .slideUp('fast');
        });
    });
  }

  /**
   * Hidden Sections
   *
   * Show hidden sections in
   * elementor no matter the
   * selected option.
   */
  function neuronRemoveHiddenSections() {
    var $neuron_fixed = $('.neuron-fixed-yes');
    if (
      $neuron_fixed.is('.elementor-hidden-tablet') &&
      $(window).width() > 730 &&
      $(window).width() < 1025
    ) {
      $neuron_fixed.hide();
    } else if (
      $neuron_fixed.is('.elementor-hidden-phone') &&
      $(window).width() < 730
    ) {
      $neuron_fixed.hide();
    } else {
      $neuron_fixed.show();
    }
  }

  /**
   * Justified Gallery
   */
  function neuronJustifiedGallery() {
    var $justifiedGallery = $('.justified');

    // $('.l-posts-wrapper #filters li').on('click', function() {
    //   console.log($(this));

    //   $('.justified-gallery').isotope({
    //     filter: filterValue
    //   });

    //   $(this)
    //     .addClass('active')
    //     .siblings('li')
    //     .removeClass('active');
    // });

    if ($justifiedGallery) {
      $justifiedGallery.each(function() {
        var options = $(this)
          .parents('.elementor-element.elementor-widget')
          .data('settings');

        if (options) {
          var rowHeight = options['justified_height'],
            margins = options['justified_margins'],
            lastRowOption = options['justified_last_row'];
        }

        $(this).justifiedGallery({
          rowHeight: rowHeight ? rowHeight : 200,
          margins: margins ? margins : 10,
          selector: '.selector',
          imgSelector: '.h-calculated-image img',
          captions: false,
          waitThumnbailsLoad: false,
          lastRow: lastRowOption ? lastRowOption : 'justify'
        });
      });
    }
  }

  /**
   * Neuron Hover Effects
   */
  function neuronHoverEffects(ajax = true) {
    $('.l-posts-wrapper').each(function() {
      var $posts = $(this);

      // Tooltip Effect
      if ($posts.hasClass('l-posts-wrapper--meta-tooltip')) {
        if (ajax) {
          $('body').append(
            '<div id="tooltip-caption" class="tooltip-caption-effect o-neuron-custom-hover o-neuron-hover-holder__body-meta"><div class="o-neuron-hover-holder__body-meta-inner"><span class="o-neuron-hover-holder__body-meta__subtitle o-neuron-post__meta"></span><h4 class="o-neuron-post__title o-neuron-hover-holder__body-meta__title"></h4></div></div>'
          );
        }

        var $tooltipCaption = $('#tooltip-caption'),
          $tooltipTitle = $tooltipCaption.find(
            '.o-neuron-hover-holder__body-meta__title'
          ),
          $tooltipMeta = $tooltipCaption.find(
            '.o-neuron-hover-holder__body-meta__subtitle'
          ),
          $titleSelector = '.o-neuron-hover-holder__body-meta__title',
          $subtitleSelector = '.o-neuron-hover-holder__body-meta__subtitle';

        $posts.on('mousemove', function(e) {
          $tooltipCaption.css({
            top: e.clientY,
            left: e.clientX
          });
        });

        $posts
          .find(
            '.m-media-gallery__item .o-neuron-hover-holder, .selector .o-neuron-hover-holder, .o-post .o-neuron-hover-holder'
          )
          .on('mouseover', function(e) {
            $tooltipTitle.text(
              $(this)
                .find($titleSelector)
                .text()
            );
            $tooltipMeta.text(
              $(this)
                .find($subtitleSelector)
                .text()
            );

            if ($tooltipMeta.text().length <= 0) {
              $tooltipMeta.hide();
            } else {
              $tooltipMeta.show();
            }

            setTimeout(function() {
              $tooltipCaption
                .addClass('active')
                .attr('data-id', $posts.data('id'));
            }, 1);
          })
          .on('mouseout', function(e) {
            $tooltipCaption.removeClass('active');
          });
      } else if ($posts.hasClass('l-posts-wrapper--meta-fixed')) {
        if (ajax) {
          $('body').append(
            '<div id="fixed-caption" class="fixed-caption-effect o-neuron-custom-hover o-neuron-hover-holder__body-meta"></div>'
          );
        }

        var $titleSelector = '.o-neuron-hover-holder__body-meta__title',
          $subtitleSelector = '.o-neuron-hover-holder__body-meta__subtitle';

        $posts
          .find(
            '.m-media-gallery__item .o-neuron-hover-holder, .selector .o-neuron-hover-holder, .o-post .o-neuron-hover-holder'
          )
          .each(function() {
            $('#fixed-caption').append(
              '<div class="o-neuron-hover-holder__body-meta" data-id="' +
                $(this)
                  .parents('.selector')
                  .data('id') +
                '"><div class="o-neuron-hover-holder__body-meta__inner"><h4 class="o-neuron-hover-holder__body-meta__title o-neuron-post__title">' +
                $(this)
                  .find($titleSelector)
                  .text() +
                '</h4><span class="o-neuron-hover-holder__body-meta__subtitle o-neuron-post__meta">' +
                $(this)
                  .find($subtitleSelector)
                  .text() +
                '</span></div></div>'
            );
          });

        $posts
          .find(
            '.m-media-gallery__item .o-neuron-hover-holder, .selector .o-neuron-hover-holder, .o-post .o-neuron-hover-holder'
          )
          .on('mouseover', function(e) {
            var $selectorID = $(this)
              .parents('.selector')
              .data('id');

            $('#fixed-caption .o-neuron-hover-holder__body-meta').each(
              function() {
                if ($selectorID == $(this).data('id')) {
                  $(this).addClass('active');
                  $('.l-posts-wrapper--meta-fixed').addClass('active');
                }
              }
            );
          })
          .on('mouseout', function(e) {
            var $selectorID = $(this)
              .parents('.selector')
              .data('id');

            $('#fixed-caption .o-neuron-hover-holder__body-meta').each(
              function() {
                if ($selectorID == $(this).data('id')) {
                  $(this).removeClass('active');
                  $('.l-posts-wrapper--meta-fixed').removeClass('active');
                }
              }
            );
          });
      } else if ($posts.hasClass('l-interactive-posts-wrapper')) {
        // Meta Interactive
        $('body').append(
          '<div id="interactive-effect" class="o-image--meta-interactive"></div>'
        );

        var $selector = $('.o-interactive-item'),
          $image = $('.o-interactive-item .o-interactive-item--image img'),
          $interactiveImage = $('#interactive-effect'),
          $header = $('.l-primary-header');

        // Active
        if ($posts.data('active') === 'yes') {
          var $firstPost = $posts.find($selector[0]);

          $interactiveImage.css(
            'background-image',
            'url(' + $firstPost.find($image).attr('src') + ')'
          );

          $firstPost.addClass('o-interactive-item--active');

          $header.css('background-color', 'transparent');

          setTimeout(function() {
            $interactiveImage
              .addClass('active')
              .attr('data-id', $posts.data('id'));
          }, 1);
        }

        $posts
          .find($selector)
          .on('mouseover', function(e) {
            var $parent = $(this);

            $selector.each(function() {
              if ($(this).data('id') === $parent.data('id')) {
                $parent.addClass('o-interactive-item--active');
              } else {
                $(this).removeClass('o-interactive-item--active');
              }
            });

            $interactiveImage.css(
              'background-image',
              'url(' +
                $(this)
                  .find($image)
                  .attr('src') +
                ')'
            );

            if ($posts.hasClass('l-interactive-posts-wrapper--image-offset')) {
              $interactiveImage.css(
                'margin-top',
                $(this).data('count') * 4 + 'rem'
              );

              $interactiveImage.css('position', 'absolute');
            }

            $header.css('background-color', 'transparent');

            setTimeout(function() {
              $interactiveImage
                .addClass('active')
                .attr('data-id', $posts.data('id'));
            }, 1);
          })
          .on('mouseout', function(e) {
            if ($posts.data('mouseout') === 'yes') {
              $interactiveImage.removeClass('active');
            }
          });
      }
    });
  }

  /**
   * Active on Scroll
   */
  function neuronMenuActiveOnScroll(event) {
    var scrollPosition = $(document).scrollTop();
    $('.m-nav-menu--holder ul li a').each(function() {
      var currentLink = $(this);
      var $parent = $(this).parents('.elementor-widget-neuron-nav-menu');

      if (
        $parent.hasClass('m-nav-menu--active-class-yes') &&
        currentLink.attr('href') !== '#' &&
        currentLink.attr('href').indexOf('#') !== -1
      ) {
        var ref = currentLink.attr('href').split('#');
        ref = typeof ref[1] !== 'undefined' ? ref[1] : ref[0];
        var refElement = $('#' + ref);
        if (refElement.length !== 0) {
          if (
            refElement.position().top <= scrollPosition &&
            refElement.position().top + refElement.height() > scrollPosition
          ) {
            currentLink.parents('li').addClass('current_page_item');
          } else {
            currentLink.parents('li').removeClass('current_page_item');
          }
        }
      }
    });
  }

  /**
   * Owl Carousel
   */
  function neuronOwlCarouselAnimations() {
    $('.owl-theme').each(function() {
      var owl = $(this);

      if (owl.data('stage-padding')) {
        return;
      }

      if (owl.data('animation') != 'none' && owl.data('wow') == 'yes') {
        $(this)
          .find($('.owl-item'))
          .each(function() {
            if ($(this).hasClass('active')) {
              $(this)
                .find('.o-post, .m-media-gallery__item, .m-neuron-testimonial')
                .addClass(owl.data('animation'));

              $(this)
                .find('.o-post, .m-media-gallery__item, .m-neuron-testimonial')
                .removeClass('intro-animation');
            }
          });

        owl.on('translated.owl.carousel', function(e) {
          $(this)
            .find($('.owl-item'))
            .each(function() {
              if ($(this).hasClass('active')) {
                $(this)
                  .find(
                    '.o-post, .m-media-gallery__item, .m-neuron-testimonial'
                  )
                  .addClass(owl.data('animation'));

                $(this)
                  .find(
                    '.o-post, .m-media-gallery__item, .m-neuron-testimonial'
                  )
                  .removeClass('intro-animation');
              }
            });
        });
      }
    });
  }

  /**
   * Multi Scroll
   */
  // function neuronMultiScroll() {
  //   $('.l-neuron-multi-scroll').each(function() {
  //     $(this).css('opacity', '1');
  //     $(this).css('visibility', 'visible');

  //     // Settings
  //     if ($('.elementor-widget-neuron-multi-scroll').data('settings')) {
  //       var $settings = $('.elementor-widget-neuron-multi-scroll').data(
  //           'settings'
  //         ),
  //         scrollingSpeed = $settings['scrollingspeed'],
  //         navigation = $settings['navigation'],
  //         navigationAlignment = $settings['navigation_alignment'];
  //     }

  //     // Navigation Tooltips
  //     var tooltips = [];
  //     var anchors = [];
  //     $(this)
  //       .find('.l-neuron-multi-scroll__section')
  //       .each(function() {
  //         if ($(this).data('name')) {
  //           tooltips.push($(this).data('name'));
  //           anchors.push(
  //             $(this)
  //               .data('name')
  //               .replace(/\W+/g, '-')
  //               .toLowerCase()
  //           );
  //         }
  //       });

  //     // Options
  //     $(this).multiscroll({
  //       // Selectors
  //       sectionSelector: '.l-neuron-multi-scroll__section',
  //       leftSelector: '.l-neuron-multi-scroll__left',
  //       rightSelector: '.l-neuron-multi-scroll__right',
  //       // Options
  //       scrollingSpeed: scrollingSpeed ? scrollingSpeed : 600,
  //       navigation: navigation ? true : false,
  //       navigationPosition: navigationAlignment ? navigationAlignment : 'right',
  //       navigationTooltips: navigation && tooltips ? tooltips : '',
  //       anchors: navigation && anchors ? anchors : '',
  //       lockAnchors: true,
  //       css3: true,
  //       afterLoad: function(anchorLink, index) {
  //         window.dispatchEvent(new Event('resize'));
  //         neuronOwlCarouselAnimations();
  //         neuronOwlCarousel();
  //       }
  //     });
  //   });
  // }

  /**
   * Init
   */
  neuronRemoveHiddenSections();
  neuronCalculateMegaMenu();
  neuronCalculateMobileMenu();
  neuronHamburgerMenu();
  neuronHoverEffects();
  neuronPerfectScrollBar();
  neuronJustifiedGallery();
  neuronMenuActiveOnScroll();
  neuronOwlCarouselAnimations();

  /**
   * No Ajax
   */
  $(document).ajaxStop(function() {
    neuronHoverEffects(false);
  });

  /**
   * Resize
   */
  $(window).on('resize', function() {
    neuronRemoveHiddenSections();
    neuronCalculateMegaMenu();
    neuronCalculateMobileMenu();
  });

  /**
   * Scroll
   */
  $(document).on('scroll', neuronMenuActiveOnScroll);
});
