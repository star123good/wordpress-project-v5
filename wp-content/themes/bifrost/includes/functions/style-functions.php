<?php
/**
 * Custom Style
 */
function bifrost_custom_style() {
	$bifrost_style_output = [];

	/**
	 * Body Color
	 */
	$bifrost_bg_color = get_theme_mod('style_bg_color', '#FFFFFF');
	
	if ($bifrost_bg_color && ($bifrost_bg_color != '#FFFFFF' && $bifrost_bg_color != '#ffffff')) {
		// Color
		$bifrost_style_output[] = 'html, body, .l-main-wrapper, input, textarea, .select2-container--default .select2-selection--single { background-color: '. $bifrost_bg_color .' }';

		// Background Color Important
		$bifrost_style_output[] = implode(',', [
			'.l-primary-footer .l-primary-footer__widgets'
		]) . '{ background-color: '. $bifrost_bg_color .' !important}';

		// Background Color Darken (3%) Important
		$bifrost_style_output[] = implode(',', [
			'.l-primary-footer .l-primary-footer__copyright'
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_bg_color)), -3) .') !important}'; 
	}

	/**
	 * Main Color
	 */
	$bifrost_main_color = get_theme_mod('style_main_color', '#000000');

	if ($bifrost_main_color && ($bifrost_main_color != '#000000')) {

		// Color
		$bifrost_style_output[] = implode(',', [
			'.a-site-search-icon:hover',
			'.a-slidingbar-icon a:hover',
			'a',
			'.l-primary-footer .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a:hover',
			'.m-filters ul li a:hover',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__close-icon:hover',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span:hover',
			'.m-social-media ul li a:hover',
			'.l-primary-footer--dark-skin .widget.widget_calendar table td a',
			'.l-primary-footer--dark-skin .widget.widget_calendar table th a',
			'.woocommerce .woocommerce-shipping-calculator a',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .woocommerce-Reviews-title span',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .commentlist .comment .comment_container .comment-text .star-rating',
			'.o-breadcrumb .o-breadcrumb__list .o-breadcrumb__list__item.o-breadcrumb__list__item--separator',
			'.l-primary-header__bag .l-primary-header__bag__icon:hover',
			'.o-post-navigation .o-post-navigation__link a:hover .o-post-navigation__title',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover svg'
		]) . '{ color: '. $bifrost_main_color .' }';

		// Color Important
		$bifrost_style_output[] = implode(',', [
			'.woocommerce table td.product-remove a:hover',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li a:hover',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li.active a',
			'.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove:hover',
			'.o-pagination ul.o-pagination__numbers li a:hover',
			'.o-slidingbar .o-slidingbar__content .o-slidingbar__content__holder .o-slidingbar__close-icon svg:hover'
		]) . '{ color: '. $bifrost_main_color .' !important}';

		// Stroke
		$bifrost_style_output[] = implode(',', [
			'.o-pagination .o-pagination__arrow a:hover svg',
			'.o-post-navigation .o-post-navigation__link a:hover svg'
		]) . '{ stroke: '. $bifrost_main_color .' }';

		// Link Box Shadow (Color and RGB)
		$bifrost_style_output[] = implode(',', [
			'a',
			'.elementor a'
		]) . '{ -webkit-box-shadow: inset 0 -1px 0 rgba('. bifrost_hexToRgb($bifrost_main_color, 'zero') .'); box-shadow: inset 0 -1px 0 rgba('. bifrost_hexToRgb($bifrost_main_color, 'zero') .');}';

		// Link Box Shadow (Color and RGB) HOVER
		$bifrost_style_output[] = implode(',', [
			'a:hover',
			'a.active',
			'ul.menu.m-header-default-menu li.menu-item.current_page_ancestor > a',
			'ul.menu.m-header-default-menu li.menu-item.current_page_item > a',
			'.m-filters ul li.active a',
			'.m-filters ul li a:hover',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-outside .o-portfolio-item .o-portfolio-item__content .o-portfolio-item__title a:hover',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-outside .o-portfolio-item .o-portfolio-item__content .a-separator ul li a:hover',
			'.elementor a:hover',
			'.elementor a.active',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-inside .o-portfolio-item .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a:hover',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-inside .o-portfolio-item .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .a-separator ul li a:hover',
			'.o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .title a:hover'
		]) . '{ -webkit-box-shadow: inset 0 0 0 rgb('. bifrost_hexToRgb($bifrost_main_color) .'), 0 2px 0 rgb('. $bifrost_main_color .'); box-shadow: inset 0 0 0 rgb('. bifrost_hexToRgb($bifrost_main_color) .'), 0 1px 0 '. $bifrost_main_color .';}';

		// Link Box Shadow (Color and RGB) HOVER !important
		$bifrost_style_output[] = implode(',', [
			'.m-filters ul li a:hover',
		]) . '{ -webkit-box-shadow: inset 0 0 0 rgb('. bifrost_hexToRgb($bifrost_main_color) .'), 0 2px 0 rgb('. $bifrost_main_color .') !important; box-shadow: inset 0 0 0 rgb('. bifrost_hexToRgb($bifrost_main_color) .'), 0 1px 0 '. $bifrost_main_color .' !important;}';

		// Background Color
		$bifrost_style_output[] = implode(',', [
			'.a-woo-badge.a-woo-badge--theme-color',
			'input[type=submit]',
			'button',
			'.button',
			'mark',
			'.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option.select2-results__option--highlighted',
			'.a-button.a-button--theme-color',
			'.elementor-button',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button:hover',
			'.m-progress-bar .m-progress-bar__content-holder .m-progress-bar__content span',
			'.l-primary-header__bag .l-primary-header__bag__icon span',
			'.a-form--dark-skin input[type=submit]',
			'.a-form--dark-skin button',
			'.a-form--dark-skin .button'
		]) . '{ background-color: '. $bifrost_main_color .' }';

		// Background Color Selection
		$bifrost_style_output[] = implode(',', [
			'::-moz-selection'
		]) . '{ background-color: '. $bifrost_main_color .' }';

		// Background Color Selection
		$bifrost_style_output[] = implode(',', [
			'::selection'
		]) . '{ background-color: '. $bifrost_main_color .' }';

		// Background Color Important
		$bifrost_style_output[] = implode(',', [
			'.woocommerce .button',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input'
		]) . '{ background-color: '. $bifrost_main_color .' !important}';
		
		// Background Color (Darken)
		$bifrost_style_output[] = implode(',', [
			'input[type=submit]:hover',
			'button:hover',
			'.button:hover',
			'.a-button.a-button--theme-color:hover',
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_main_color)), -10) .') }';


		// Background Color (Darken) !important
		$bifrost_style_output[] = implode(',', [
			'.woocommerce .button:hover',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input:hover'
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_main_color)), -10) .') !important}';

		// Border Color
		$bifrost_style_output[] = implode(',', [
			'input:focus',
			'textarea:focus',
			'.select2-container .select2-dropdown',
			'blockquote',
			'abbr',
			'.widget .widgettitle-wrapper .widgettitle',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li a:hover',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li.active a',
			'.a-form--dark-skin input:focus',
			'.a-form--dark-skin textarea:focus'
		]) . '{ border-color: '. $bifrost_main_color .' }';

		// Border Color Important
		$bifrost_style_output[] = implode(',', [
			'select2.select2-container.select2-container--default.select2-container--open .select2-selection--multiple',
			'.select2.select2-container.select2-container--default.select2-container--open .selection .select2-selection'
		]) . '{ border-color: '. $bifrost_main_color .' !important}';

		// Border Top Color
		$bifrost_style_output[] = implode(',', [
			'.woocommerce .blockUI.blockOverlay::before',
			'.woocommerce .loader::before',
			'.woocommerce-info',
			'.woocommerce-message'
		]) . '{ border-top-color: '. $bifrost_main_color .' }';
	}

	/**
	 * Headings
	 */
	$bifrost_headings_color = get_theme_mod('style_headings_color', '#333333');

	if ($bifrost_headings_color && $bifrost_headings_color != '#333333') {
		// Color
		$bifrost_style_output[] = implode(', ', [
			'h1', '.h1', 'h2', '.h2', 'h3', '.h3', 'h4', '.h4', 'h5', '.h5', 'h6', '.h6',
			'.o-hero .o-hero__content .o-hero__content__title',
			'.t-404 .o-hero .o-hero__content .o-hero__content__title h1',
			'legend',
			'input',
			'textarea',
			'label',
			'.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option[data-selected=true]',
			'.select2-container--default .select2-selection--single .select2-selection__rendered',
			'.a-separator ul li a',
			'.a-site-search-icon',
			'.a-slidingbar-icon a',
			'table td a',
			'table th a',
			'table td#today',
			'table thead td',
			'table thead th',
			'.tagcloud a',
			'dl dt',
			'blockquote',
			'b',
			'strong',
			'.woocommerce .star-rating',
			'.woocommerce table tfoot tr:last-child th',
			'.woocommerce table tfoot tr:last-child td',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .widget_shopping_cart_content .o-mini-cart__no-products p',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .title a',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .subtotal',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .price .amount',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-outside .o-neuron-hover .o-neuron-hover__body .o-neuron-hover__body-meta .o-neuron-hover__body-meta__title a',
			'.m-filters ul li a',
			'.m-filters ul li.active a',
			'.m-progress-bar .m-progress-bar__label',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__close-icon',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span',
			'.m-social-media ul li a',
			'.m-primary-top-header .m-primary-top-header__holder .m-primary-top-header__content p',
			'.widget.widget_rss .widgettitle-wrapper .widgettitle .rsswidget',
			'.widget ul li a',
			'.woocommerce .o-product .m-product-summary .woocommerce-product-rating a',
			'.woocommerce .o-product .m-product-summary .price',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel.woocommerce-Tabs-panel--additional_information table tr th',
			'.o-comments .o-comments__area .o-comment .o-comment__details .o-comment__author-meta .comment-reply-link',
			'.l-primary-header__bag .l-primary-header__bag__icon',
			'.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .title a',
			'.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__total .subtotal',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__total .price .amount',
			'.o-pagination ul.o-pagination__numbers li a',
			'.o-pagination ul.o-pagination__numbers li.active a',
			'.o-pagination.o-pagination--pages .o-pagination__title',
			'.o-pagination.o-pagination--pages .o-pagination--pages__numbers span',
			'.o-slidingbar .o-slidingbar__content .o-slidingbar__content__holder .o-slidingbar__close-icon svg',
			'.o-blog-post .o-blog-post__title a',
			'.o-blog-post .o-blog-post__meta',
			'.o-blog-post .o-blog-post__author .author-name a',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-outside .o-portfolio-item .o-portfolio-item__content .o-portfolio-item__title a',
			'.woocommerce .woocommerce-cart-form table td::before',
			'.woocommerce .woocommerce-cart-form table .actions .coupon #coupon_code',
			'.woocommerce .cart-collaterals .cart_totals table th',
			'.woocommerce .cart-collaterals .cart_totals table td[data-title=Total]::before, .woocommerce .cart-collaterals .cart_totals table td[data-title=Subtotal]::before',
			'.woocommerce-checkout .woocommerce-checkout-review-order table tr.order-total td strong',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a svg',
			'.a-button.a-button--white-color',
        ]) . '{ color: '. $bifrost_headings_color .' }';
        
		// Color Important
		$bifrost_style_output[] = implode(',', [
            '.woocommerce table td.product-remove a',
			'ul.menu.m-header-default-menu li.menu-item > a',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li a',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]',
			'.l-primary-footer .l-primary-footer__widgets',
			'.l-primary-footer .l-primary-footer__copyright',
			'.l-primary-footer .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a',
        ]) . '{ color: '. $bifrost_headings_color .' !important}';
        
        // Color Placeholder
        $bifrost_style_output[] = implode(',', [
            '.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]::-webkit-input-placeholder',
		]) . '{ color: '. $bifrost_headings_color .'}';
		
		$bifrost_style_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]:-moz-placeholder',
		]) . '{ color: '. $bifrost_headings_color .'}';
		
		$bifrost_style_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]::-moz-placeholder',
		]) . '{ color: '. $bifrost_headings_color .'}';
		
		$bifrost_style_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]:-ms-input-placeholder'
        ]) . '{ color: '. $bifrost_headings_color .'}';

		// Stroke
		$bifrost_style_output[] = implode(',', [
			'.l-primary-header.l-primary-header--responsive .l-primary-header--responsive__icon svg line',
			'.o-pagination .o-pagination__arrow a svg',
			'.o-post-navigation .o-post-navigation__link a svg',
			'.o-blog-post .o-blog-post__meta svg'
		]) . '{ stroke: '. $bifrost_headings_color .'  }';

		// Stroke Lighten 40%
		$bifrost_style_output[] = implode(',', [
			'.o-pagination .o-pagination__arrow.o-pagination__arrow--disabled a svg'
		]) . '{ stroke: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_headings_color)), 40) .')  }';

		// Background Color
		$bifrost_style_output[] = implode(',', [
			'.l-primary-header.l-primary-header--responsive .l-primary-header--responsive__nav',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button',
			'ul.menu.m-header-default-menu li.menu-item.menu-item-has-children > ul.sub-menu',
			'.m-primary-top-header.m-primary-top-header--dark-skin',
			'.o-mini-cart',
			'.o-slidingbar .o-slidingbar__content.o-slidingbar__content--dark-skin',
			'.a-button.a-button--dark-color'
		]) . '{ background-color: '. $bifrost_headings_color .'  }';

		// Background Color Important
		$bifrost_style_output[] = implode(',', [
			'.ui-slider .ui-slider-range',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.woocommerce .o-main-sidebar input[type=submit]',
			'.woocommerce .o-main-sidebar button',
			'.woocommerce .o-main-sidebar .button',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.o-mini-cart .o-mini-cart__holder .blockUI.blockOverlay',
			'.o-mini-cart .o-mini-cart__holder .loader'	
		]) . '{ background-color: '. $bifrost_headings_color .' !important}';

		// Background Color Lighten (10%) IMPORTANT
		$bifrost_style_output[] = implode(',', [
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button:hover'
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_headings_color)), 10) .') !important}';

		// Background Color RGBA(0.5) 
		$bifrost_style_output[] = implode(',', [
			'.a-to-top',
		]) . '{ background-color: rgba('. bifrost_hexToRgb($bifrost_headings_color, 0.5) .') !important}';

		// Background Color RGBA (0.3) 
		$bifrost_style_output[] = implode(',', [
			'.m-site-search .m-site-search__overlay',
			'.o-slidingbar .o-slidingbar__overlay'
		]) . '{ background-color: rgba('. bifrost_hexToRgb($bifrost_headings_color, 0.3) .') !important}';

		// Background Color Lighten (10%) 
		$bifrost_style_output[] = implode(',', [
			'.a-button.a-button--dark-color:hover'
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_headings_color)), 10) .') }';

		// Background Color Lighten (8%) IMPORTANT 
		$bifrost_style_output[] = implode(',', [
			'.woocommerce .o-main-sidebar input[type=submit]:hover',
			'.woocommerce .o-main-sidebar button:hover',
			'.woocommerce .o-main-sidebar .button:hover'	
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_headings_color)), 8) .') !important}';

		// Background Color Darken (20%)
		$bifrost_style_output[] = implode(',', [
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .quantity'
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_headings_color)), -20) .')}'; 

		// Background Color Darken (15%) IMPORTANT
		$bifrost_style_output[] = implode(',', [
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button:hover'
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_headings_color)), -15) .') !important}'; 

		// Border Color
		$bifrost_style_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]'
		]) . '{ border-color: '. $bifrost_headings_color .'  }';

	}

	/**
	 * Paragraphs
	 */
	$bifrost_paragraphs_color = get_theme_mod('style_paragraphs_color', '#333333');

	if ($bifrost_paragraphs_color && $bifrost_paragraphs_color != '#333333') {
        // Color
 		$bifrost_style_output[] = implode(',', [
            'body',
            'select',
            '.woocommerce .star-rating::before',
            '.woocommerce table tr.shipping td label',
            '.woocommerce table tr.shipping td label span',
            '.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-outside .o-neuron-hover .o-neuron-hover__body .o-neuron-hover__body-meta .o-neuron-hover__body-meta__price',
            '.l-primary-footer.l-primary-footer--light-skin .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a',
            '.l-primary-footer--dark-skin .widget select',
            '.l-primary-footer--dark-skin .widget input',
            '.l-primary-footer--dark-skin .widget textarea',
            '.o-slidingbar__content--dark-skin .widget select',
            '.o-slidingbar__content--dark-skin .widget input',
            '.o-slidingbar__content--dark-skin .widget textarea',
            '.widget.widget_rss ul li',
            '.widget ul li',
            '.m-team.m-team--meta-outside .m-team__member .m-team__member__content .m-team__member__content__subtitle',
            '.woocommerce-info',
            '.woocommerce-message',
            '.woocommerce-error',
            '.woocommerce .o-product .m-product-summary .quantity input',
            '.o-breadcrumb .o-breadcrumb__list .o-breadcrumb__list__item',
            '.o-hero .o-hero__content .o-hero__content__subtitle',
            '.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .quantity',
            '.o-post-navigation .o-post-navigation__link a .o-post-navigation__text-icon .o-post-navigation__subtitle',
            '.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-outside .o-portfolio-item .o-portfolio-item__content .a-separator ul li a',
            '.p-portfolio-single .p-portfolio-single__content .p-portfolio-single__content__meta .meta-subtitle',
            '.woocommerce-checkout .woocommerce-checkout-review-order table tr td strong',
            '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a svg',
			'.woocommerce ul.order_details li',
			'#add_payment_method #payment div.payment_box p',
			'.woocommerce-cart #payment div.payment_box p',
			'.woocommerce-checkout #payment div.payment_box p',
			'.t-404 .o-hero .o-hero__content .o-hero__content__subtitle h5',
			'.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option'
        ]) . '{ color: '. $bifrost_paragraphs_color .'}';

        // Placeholder Color
        $bifrost_style_output[] = implode(',', [
            'input::-webkit-input-placeholder',
            'textarea::-webkit-input-placeholder', 
            'input:-moz-placeholder',
            'textarea:-moz-placeholder', 
            'input::-moz-placeholder',
            'textarea::-moz-placeholder',
            'input:-ms-input-placeholder',
            'textarea:-ms-input-placeholder'
        ]) . '{ color: '. $bifrost_paragraphs_color .' }';
        
        // Border Color Lighten (38%)
        $bifrost_style_output[] = implode(',', [
			'table',
            'table td',
			'table th',
			'.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment',
			'#add_payment_method #payment ul.payment_methods, .woocommerce-cart #payment ul.payment_methods',
			'.woocommerce-checkout #payment ul.payment_methods'
		]) . '{ border-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_paragraphs_color)), 38) .') !important}';
	}

	/**
	 * Border
	 */
	$bifrost_border_color = get_theme_mod('style_border_color', '#E5E5E5');

	if ($bifrost_border_color && ($bifrost_border_color != '#E5E5E5' && $bifrost_border_color != '#e5e5e5')) {
        // Color
        $bifrost_style_output[] = implode(',', [
            'fieldset',
            'fieldset legend',
            'select',
            '.select2 .selection .select2-selection .select2-selection__rendered .select2-selection__choice',
            '.select2-container .select2-dropdown .select2-search input',
            '.tagcloud a',
            'hr',
            '#add_payment_method #payment div.payment_box',
            '.woocommerce-cart #payment div.payment_box',
            '.woocommerce-checkout #payment div.payment_box',
            '.l-primary-footer.l-primary-footer--light-skin .l-primary-footer__widgets .l-primary-footer__widgets__space',
            '.l-primary-header--sticky .headroom.headroom--not-top',
            '.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span',
            '.m-primary-top-header',
            '.l-primary-footer--dark-skin .widget .widgettitle-wrapper hr',
            '.o-slidingbar__content--dark-skin .widget .widgettitle-wrapper hr',
            '.woocommerce form .form-row.woocommerce-validated input.input-text',
            '.woocommerce form.login',
            '.woocommerce form.register',
            '.woocommerce .o-product .m-product-summary .product_meta',
            '.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel',
            '.o-breadcrumb',
            '.o-comments .o-comments__area .o-comment .o-comment__avatar img',
            '.o-comments .o-comments__area .comment-respond',
            '.o-pagination',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a span',
            '.o-post-navigation',
            '.l-blog-wrapper .l-blog-wrapper__posts-holder.l-blog-wrapper__posts-holder--meta-outside .o-blog-post',
            '.woocommerce .woocommerce-cart-form table .actions .coupon #coupon_code',
            '.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment',
            '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li',
            '.woocommerce ul.order_details',
            '.woocommerce ul.order_details li'
        ]) . '{ border-color: '. $bifrost_border_color .'}'; 

        // Border Color Important
        $bifrost_style_output[] = implode(',', [
            '.o-comments__area',
            '.select2 .selection .select2-selection',
            '.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .commentlist .comment .comment_container img.avatar',
            '.o-mini-cart__total-holder .o-mini-cart__total-holder__total',
            '.woocommerce-checkout .checkout_coupon',
            '.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment .wc_payment_methods'
        ]) . '{ border-color: '. $bifrost_border_color .' !important}'; 

        // Border Color Darken (3%)
        $bifrost_style_output[] = implode(',', [
            'input',
            'textarea'
        ]) . '{ border-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_border_color)), -3) .')}';
        
        // Border Color Darken (6%)
        $bifrost_style_output[] = implode(',', [
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers span',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a:hover span'
        ]) . '{ border-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_border_color)), -6) .')}';
        
        // Background Color
        $bifrost_style_output[] = implode(',', [
            '.ui-slider',
            '.o-pagination ul.o-pagination__numbers li.active a'
        ]) . '{ background-color: '. $bifrost_border_color .'}'; 
	}	

	/**
	 * Pattern
	 */
	$bifrost_pattern_color = get_theme_mod('style_pattern_color', '#FFFFFF');

	if ($bifrost_pattern_color && ($bifrost_pattern_color != '#FFFFFF' && $bifrost_pattern_color != '#FFFFFF')) {
        // Background Color
        $bifrost_style_output[] = implode(',', [
            '.select2 .selection .select2-selection .select2-selection__rendered .select2-selection__choice',
            '.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option[data-selected=true]',
            '.tagcloud a',
			'code',
			'pre',
            '#add_payment_method #payment div.payment_box',
            '.woocommerce-cart #payment div.payment_box',
            '.woocommerce-checkout #payment div.payment_box',
            '.l-primary-footer.l-primary-footer--light-skin',
            '.m-progress-bar .m-progress-bar__content-holder',
            '.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span',
            '.woocommerce-info',
            '.woocommerce-message',
            '.woocommerce-error',
            '.o-breadcrumb',
            '.o-comments .o-comments__area',
            '.o-hero',
            '.o-pagination',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a span',
            '.o-post-navigation',
            '.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment .place-order'
        ]) . '{ background-color: '. $bifrost_pattern_color .'}'; 

        // Background Color Darken (3%)
        $bifrost_style_output[] = implode(',', [
            '.tagcloud a:hover'
        ]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_pattern_color)), -3) .')}';

        // Background Color Darken (6%)
        $bifrost_style_output[] = implode(',', [
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers span',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a:hover span'
        ]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_pattern_color)), -6) .')}';
    }	
    
    /**
     * Warnings
     */
	$bifrost_warnings_color = get_theme_mod('style_warnings_color', '#D72323');

	if ($bifrost_warnings_color && ($bifrost_warnings_color != '#D72323' && $bifrost_warnings_color != '#d72323')) {
        // Color
        $bifrost_style_output[] = implode(',', [
            '.a-woo-badge.a-woo-badge--red-color',
            '.woocommerce form .form-row .required',
			'.woocommerce .o-product .m-product-summary p.stock.out-of-stock',
			'.widget.widget_layered_nav_filters ul li a::before',
			'.woocommerce form .form-row.woocommerce-invalid label'
        ]) . '{ color: '. $bifrost_warnings_color .'}'; 
        
        
        // Border Color
        $bifrost_style_output[] = implode(',', [
            '.woocommerce form .form-row.woocommerce-invalid input.input-text',
            '.woocommerce-error'
        ]) . '{ border-color: '. $bifrost_warnings_color .'}'; 
	}
	
	/**
	 * Light
	 */
	$bifrost_light_color = get_theme_mod('style_light_color', '#FFFFFF');

	if ($bifrost_light_color && ($bifrost_light_color != '#FFFFFF' && $bifrost_light_color != '#ffffff')) {
		// Color
		$bifrost_style_output[] = implode(',', [
			'.l-blog-wrapper .l-blog-wrapper__posts-holder.l-blog-wrapper__posts-holder--meta-inside .o-blog-post .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'.l-primary-footer .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a',
			'.l-primary-header.l-primary-header--light-skin .a-logo.a-logo--text a',
			'.l-primary-header.l-primary-header--responsive .l-primary-header--responsive__nav nav ul.menu li.menu-item a',
			'.l-primary-header.l-primary-header--responsive .l-primary-header--responsive__nav nav ul.menu li.menu-item.menu-item-has-children .menu-item-icon svg',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-inside .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'ul.menu.m-header-default-menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item.menu-item-has-children:after',
			'.m-primary-top-header.m-primary-top-header--dark-skin .m-primary-top-header__holder .m-primary-top-header__content p',
			'.o-slidingbar__content--dark-skin .widget',
			'.m-team .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta ul.o-neuron-hover-holder__body-meta__social-media li a',
			'.m-team.m-team--meta-inside .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover__body-meta__title',
			'.m-team.m-team--meta-inside .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__social-media ul li a',
			'.m-team.m-team--meta-outside .m-team__member .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__social-media ul li a',
			'.l-primary-header__bag .l-primary-header__bag__icon span',
			'.o-mini-cart .widget_shopping_cart_content .o-mini-cart__no-products p',
			'.o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .title a',
			'.o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .subtotal',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .price .amount',
			'.o-slidingbar .o-slidingbar__content.o-slidingbar__content--dark-skin .o-slidingbar__content__holder .o-slidingbar__close-icon svg',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-inside .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-inside .o-portfolio-item .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'.a-button.a-button--dark-color'
		]) . '{ color: '. $bifrost_light_color .'}'; 
		
		// Color Important
		$bifrost_style_output[] = implode(',', [
			'woocommerce .button',
			'.woocommerce .o-main-sidebar input[type=submit]',
			'.woocommerce .o-main-sidebar button',
			'.woocommerce .o-main-sidebar .button',
			'.m-primary-top-header.m-primary-top-header--dark-skin .m-primary-top-header__nav .m-header-default-menu > li a',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'ul.menu.m-header-default-menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item a'
		]) . '{ color: '. $bifrost_light_color .' !important}';
		
		// Color Darken (20%)
        $bifrost_style_output[] = implode(',', [
			'.o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .quantity'
		]) . '{ color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_light_color)), -20) .')}';

		// Color Lighten (3%)
        $bifrost_style_output[] = implode(',', [
			'.m-team.m-team--meta-inside .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover__body-meta__subtitle'
		]) . '{ color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_light_color)), 10) .')}';

		// Background Color
        $bifrost_style_output[] = implode(',', [
			'.a-button.a-button--white-color',
			'.a-button.a-button--white-color:hover',
			'.select2-results__options'
        ]) . '{ background-color: '. $bifrost_light_color .'}';

		// Color Darken (3%)
        $bifrost_style_output[] = implode(',', [
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-inside .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__price',
			'.l-blog-wrapper .l-blog-wrapper__posts-holder.l-blog-wrapper__posts-holder--meta-inside .o-blog-post .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .o-blog-post__meta .a-separator ul li a',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-inside .o-portfolio-item .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .a-separator ul li a'
        ]) . '{ color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_light_color)), -3) .')}';
		
		// Link Box Shadow Hover
		$bifrost_style_output[] = implode(',', [
			'.l-primary-header.l-primary-header--default.l-primary-header--light-skin .l-primary-header--default__nav ul.menu li.menu-item > a:hover',
			'.l-primary-header.l-primary-header--default.l-primary-header--light-skin .l-primary-header--default__nav ul.menu li.menu-item.current_page_ancestor > a',
			'.l-primary-header.l-primary-header--default.l-primary-header--light-skin .l-primary-header--default__nav ul.menu li.menu-item.current_page_item > a',
			'.l-primary-header.l-primary-header--responsive .l-primary-header--responsive__nav nav ul.menu li.menu-item a:hover',
			'.l-primary-header.l-primary-header--responsive .l-primary-header--responsive__nav nav ul.menu li.menu-item.current_page_ancestor > a',
			'.l-primary-header.l-primary-header--responsive .l-primary-header--responsive__nav nav ul.menu li.menu-item.current_page_item > a',
			'ul.menu.m-header-default-menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item a:hover',
			'ul.menu.m-header-default-menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item.current_page_ancestor > a',
			'ul.menu.m-header-default-menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item.current_page_item > a',
			'.m-team .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta ul.o-neuron-hover-holder__body-meta__social-media li a:hover',
			'.m-team.m-team--meta-inside .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__social-media ul li a:hover',
			'.m-team.m-team--meta-outside .m-team__member .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__social-media ul li a:hover'
		]) . '{ --webkit-box-shadow: inset 0 0 0 rgb('. bifrost_hexToRgb($bifrost_light_color) .'), 0 2px 0 rgb('. $bifrost_light_color .'); box-shadow: inset 0 0 0 rgba('. bifrost_hexToRgb($bifrost_light_color) .'), 0 2px 0 '. $bifrost_light_color .';}';

		// Stroke
		$bifrost_style_output[] = implode(',', [
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__icons svg',
			'.l-primary-header.l-primary-header--responsive.l-primary-header--light-skin .l-primary-header--responsive__icon svg line',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button svg',
			'.o-neuron-hover.o-neuron-hover--icon .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta svg'
		]) . '{ stroke: '. $bifrost_light_color .'}'; 

		// Background Color
		$bifrost_style_output[] = implode(',', [
			'select',
			'.l-primary-header',
			'.l-primary-header--sticky .headroom',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart',
			'.m-site-loader',
			'.m-site-search .m-site-search__content',
			'.m-primary-top-header',
			'.o-comments .o-comments__area .comment-respond',
			'.o-slidingbar .o-slidingbar__content'
		]) . '{ background-color: '. $bifrost_light_color .'}'; 

		// Background Color Important
		$bifrost_style_output[] = implode(',', [
			'.ui-slider-handle',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .blockUI.blockOverlay',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .loader',
			'.l-primary-header .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.woocommerce .blockUI.blockOverlay',
			'.woocommerce .loader',
			'.o-mini-cart__holder .blockUI.blockOverlay',
			'.o-mini-cart__holder .loader',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button'
		]) . '{ background-color: '. $bifrost_light_color .' !important}'; 

		// Background Color Darken (5%) Important
        $bifrost_style_output[] = implode(',', [
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button:hover'
		]) . '{ background-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_light_color)), -5) .') !important}';

		// Border Darken (70%) Important
        $bifrost_style_output[] = implode(',', [
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total'
		]) . '{ border-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_light_color)), -70) .') !important}';

		// Border Darken (70%)
        $bifrost_style_output[] = implode(',', [
			'.m-mega-menu > ul.sub-menu > .menu-item'
		]) . '{ border-color: hsl('. bifrost_color_lightness(explode(', ', bifrost_hexToRgb($bifrost_light_color)), -70) .')}';

		// Border Top Color
		$bifrost_style_output[] = implode(',', [
			'.mfp-zoom-in.mfp-ready .mfp-preloader'
		]) . '{ border-top-color: '. $bifrost_light_color .'}'; 	
		
	}

	/**
	 * Theme Borders
	 */
	$bifrost_theme_borders = get_field('theme_borders', get_queried_object()) == '1' ? get_theme_mod('theme_borders', '2') : (int)get_field('theme_borders', get_queried_object()) - 1;
	$bifrost_theme_borders_thickness = get_field('theme_borders', get_queried_object()) == '1' ? get_theme_mod('theme_borders_thickness', 16) : get_field('theme_borders_thickness', get_queried_object());
	$bifrost_theme_borders_color = get_field('theme_borders', get_queried_object()) == '1' ? get_theme_mod('theme_borders_color', '#FFFFFF') : get_field('theme_borders_color', get_queried_object());

	if ($bifrost_theme_borders == '1') {
		// Thickness
		if ($bifrost_theme_borders_thickness && $bifrost_theme_borders_thickness != 16) {
			// Theme Borders
			$bifrost_style_output[] = implode(',', [
			'.l-theme-borders .l-theme-borders__top', 
			'.l-theme-borders .l-theme-borders__bottom'
			]) . '{ height: '. $bifrost_theme_borders_thickness .'px}'; 	

			$bifrost_style_output[] = implode(',', [
			'@media (max-width: 991px) { .l-theme-borders .l-theme-borders__top', 
			'.l-theme-borders .l-theme-borders__bottom'
			]) . '{ height: '. $bifrost_theme_borders_thickness / 2 .'px} }'; 	
	
			$bifrost_style_output[] = implode(',', [
			'.l-theme-borders .l-theme-borders__left',
			'.l-theme-borders .l-theme-borders__right'
			]) . '{ width: '. $bifrost_theme_borders_thickness / 2 .'px}'; 

			$bifrost_style_output[] = implode(',', [
			'@media (min-width: 991px) { .l-theme-borders .l-theme-borders__left',
			'.l-theme-borders .l-theme-borders__right'
			]) . '{ width: '. $bifrost_theme_borders_thickness .'px} }'; 	
	
			// Theme Wrapper
			$bifrost_style_output[] = implode(',', [
			'.h-theme-borders .l-theme-wrapper'
			]) . '{ margin: '. $bifrost_theme_borders_thickness / 2 .'px !important}'; 

			$bifrost_style_output[] = implode(',', [
			'@media (min-width: 991px) { .h-theme-borders .l-theme-wrapper'
			]) . '{ margin: '. $bifrost_theme_borders_thickness .'px !important} }'; 	

			// Sticky Header
			$bifrost_style_output[] = implode(',', [
			'.h-theme-borders .l-theme-wrapper .l-primary-header--sticky .l-primary-header'
			]) . '{ margin: '. $bifrost_theme_borders_thickness / 2 . 'px ' . $bifrost_theme_borders_thickness / 2 . 'px 0 ' . $bifrost_theme_borders_thickness / 2 .'px !important}'; 
			
			$bifrost_style_output[] = implode(',', [
			'@media (min-width: 991px) { .h-theme-borders .l-theme-wrapper .l-primary-header--sticky .l-primary-header'
			]) . '{ margin: '. $bifrost_theme_borders_thickness . 'px ' . $bifrost_theme_borders_thickness . 'px 0 ' . $bifrost_theme_borders_thickness .'px !important} }'; 

			// Admin Bar
			$bifrost_style_output[] = implode(',', [
			'.admin-bar.h-theme-borders .l-primary-header--sticky .l-primary-header'
			]) . '{ margin-top: calc(46px + '. $bifrost_theme_borders_thickness / 2 .'px) !important }'; 

			$bifrost_style_output[] = implode(',', [
			'@media (min-width: 991px) { .admin-bar.h-theme-borders .l-primary-header--sticky .l-primary-header'
			]) . '{ margin-top: calc(32px + '. $bifrost_theme_borders_thickness .'px) !important }}'; 	

			// Parallax Footer
			$bifrost_style_output[] = implode(',', [
			'@media (min-width: 991px) { .h-theme-borders.h-parallax-footer .l-primary-footer--parallax'
			]) . '{ right: '. $bifrost_theme_borders_thickness .'px !important; bottom: '. $bifrost_theme_borders_thickness .'px !important; left: '. $bifrost_theme_borders_thickness .'px !important }}';

			// To Top
			$bifrost_style_output[] = implode(',', [
			'.a-to-top'
			]) . '{ right: calc( 25px + '. $bifrost_theme_borders_thickness / 2 .'px ) !important; bottom: calc( 25px + '. $bifrost_theme_borders_thickness / 2 .'px ) !important; }'; 
				
			$bifrost_style_output[] = implode(',', [
			'@media (min-width: 991px) { .a-to-top'
			]) . '{ right: calc( 25px + '. $bifrost_theme_borders_thickness .'px ) !important; bottom: calc( 25px + '. $bifrost_theme_borders_thickness .'px ) !important; }}';

		}
	
		// Color
		if ($bifrost_theme_borders_color && ($bifrost_theme_borders_color != '#FFFFFF' && $bifrost_theme_borders_color != '#ffffff')) {
			$bifrost_style_output[] = implode(',', [
			'.l-theme-borders .l-theme-borders__top', 
			'.l-theme-borders .l-theme-borders__bottom',
			'.l-theme-borders .l-theme-borders__left',
			'.l-theme-borders .l-theme-borders__right'
			]) . '{ background-color: '. $bifrost_theme_borders_color .'}'; 	
		}
	}

	/**
	 * Background Type
	 */
	$bifrost_background_type = get_field('background_type') ? get_field('background_type') : get_theme_mod('background_type', 'classic');
	$bifrost_site_width = get_field('site_width') ? get_field('site_width') : get_theme_mod('site_width', 'full-width');

	if ($bifrost_background_type == 'classic') {
		$bifrost_background_site_color = get_field('background_type') == 'classic' ? get_field('background_site_color') : get_theme_mod('background_site_color');
		$bifrost_background_site_image = get_field('background_type') == 'classic' ? get_field('background_site_image') : get_theme_mod('background_site_image');
		$bifrost_background_site_repeat = get_field('background_type') == 'classic' ? get_field('background_site_repeat') : get_theme_mod('background_site_repeat', 'no-repeat');
		$bifrost_background_site_size = get_field('background_type') == 'classic' ? get_field('background_site_size') : get_theme_mod('background_site_size', 'auto');
		$bifrost_background_site_position = get_field('background_type') == 'classic' ? get_field('background_site_position') : get_theme_mod('background_site_position', 0);
		$bifrost_background_site_attachment = get_field('background_type') == 'classic' ? get_field('background_site_attachment') : get_theme_mod('background_site_attachment', 'scroll');

		// Selector
		$bifrost_background_selector = $bifrost_site_width == 'full-width' ? '.l-theme-wrapper .l-main-wrapper' : 'body';

		// Color
		if ($bifrost_background_site_color) {
			$bifrost_style_output[] = $bifrost_background_selector . ' { background-color: '. $bifrost_background_site_color .' !important}'; 
		}

		// Image
		if ($bifrost_background_site_image) {
			$bifrost_style_output[] = $bifrost_background_selector . ' { background: url('. $bifrost_background_site_image .'); background-repeat: '. $bifrost_background_site_repeat .'; background-size: '. $bifrost_background_site_size .'; background-position: '. str_replace("-", " ", $bifrost_background_site_position ).'; background-attachment: '. $bifrost_background_site_attachment .'}'; 
		}
	} elseif ($bifrost_background_type == 'gradient') {
		$bifrost_background_gradient = [
			'type' => get_field('background_type') == 'gradient' ? get_field('background_gradient_type') : get_theme_mod('background_gradient_type', 'linear'),
			'topColor' => get_field('background_type') == 'gradient' ? get_field('background_gradient_top_color')  : get_theme_mod('background_gradient_top_color', ''),
			'topLocation' => get_field('background_type') == 'gradient' ? get_field('background_gradient_top_location')  : get_theme_mod('background_gradient_top_location', 0),
			'bottomColor' => get_field('background_type') == 'gradient' ? get_field('background_gradient_bottom_color')  : get_theme_mod('background_gradient_bottom_color', '#f2295b'),
			'bottomLocation' => get_field('background_type') == 'gradient' ? get_field('background_gradient_bottom_location')  : get_theme_mod('background_gradient_bottom_location', 100),
			'gradientAngle' => get_field('background_type') == 'gradient' ? get_field('background_gradient_angle')  : get_theme_mod('background_gradient_angle', 180),
			'gradientPosition' => get_field('background_type') == 'gradient' ? get_field('background_gradient_position')  : get_theme_mod('background_gradient_position', 0)
		];

		if ($bifrost_background_gradient['type'] == 'linear') {
			$bifrost_style_output[] = $bifrost_background_selector . ' { background-image: linear-gradient('. $bifrost_background_gradient['gradientAngle'] .'deg, '. $bifrost_background_gradient['topColor'] .' '. $bifrost_background_gradient['topLocation'] .'%, '. $bifrost_background_gradient['bottomColor'] .' '. $bifrost_background_gradient['bottomLocation'] .'%); }';
		} elseif ($bifrost_background_gradient['type'] == 'radial') {
			$bifrost_style_output[] = $bifrost_background_selector . ' { background-image: radial-gradient('. $bifrost_background_gradient['gradientPosition'] .', '. $bifrost_background_gradient['topColor'] .' '. $bifrost_background_gradient['topLocation'] .'%, '. $bifrost_background_gradient['bottomColor'] .' '. $bifrost_background_gradient['bottomLocation'] .'%); }';
		}
	}

	/**
	 * Site Width
	 */
	$bifrost_site_width = get_field('site_width') ? get_field('site_width') : get_theme_mod('site_width', 'full-width');

	if ($bifrost_site_width == 'boxed') {
		// Width
		$bifrost_boxed_width = get_field('site_width') == 'boxed' ? get_field('boxed_width') : get_theme_mod('boxed_width', 1170);

		if ($bifrost_boxed_width) {
			$bifrost_style_output[] = '.l-theme-wrapper, .l-primary-header--sticky .l-primary-header--default, .l-primary-footer--parallax { max-width: '. $bifrost_boxed_width .'px; margin-left: auto !important; margin-right: auto !important; }';
		}

		// Padding
		$bifrost_body_offset = get_field('site_width') == 'boxed' ? get_field('general_body_offset') : get_theme_mod('body_offset', '2');

		if ($bifrost_body_offset == '1') {
			// Offset Breakpoint
			$bifrost_body_offset_breakpoint = get_field('site_width') == 'boxed' ? get_field('general_body_offset_breakpoint') : get_theme_mod('body_offset_breakpoint', '1');

			if ($bifrost_body_offset_breakpoint == '1') {
				$bifrost_offset_media_query = '1039px';
			} else {
				$bifrost_offset_media_query = '745px';
			}

			// Left
			$bifrost_body_offset_left_padding = get_field('site_width') == 'boxed' ? get_field('general_body_offset_padding_left') : get_theme_mod('body_offset_boxed_padding')['padding-left'];

			if (!empty($bifrost_body_offset_left_padding)) {
				$bifrost_style_output[] = '@media (min-width: '. $bifrost_offset_media_query .'){ .l-theme-wrapper .l-main-wrapper, .l-primary-header--default, .l-primary-footer__widgets, .l-primary-footer__copyright { padding-left: '. $bifrost_body_offset_left_padding .' !important}}';
			}

			// Right
			$bifrost_body_offset_right_padding = get_field('site_width') == 'boxed' ? get_field('general_body_offset_padding_right') : get_theme_mod('body_offset_boxed_padding')['padding-right'];

			if (!empty($bifrost_body_offset_right_padding)) {
				$bifrost_style_output[] = '@media (min-width: '. $bifrost_offset_media_query .'){ .l-theme-wrapper .l-main-wrapper, .l-primary-header--default, .l-primary-footer__widgets, .l-primary-footer__copyright { padding-right: '. $bifrost_body_offset_right_padding .' !important}}';
			}
		}

		// Boxed Background Type
		$bifrost_boxed_background_type = get_field('boxed_background_type') ? get_field('boxed_background_type') : get_theme_mod('boxed_background_type');

		if ($bifrost_boxed_background_type == 'classic') {
			$bifrost_boxed_background_color = get_field('boxed_background_color') ? get_field('boxed_background_color') : get_theme_mod('boxed_background_color');
			$bifrost_boxed_background_image = get_field('boxed_background_image') ? get_field('boxed_background_image') : get_theme_mod('boxed_background_image');
			$bifrost_boxed_background_repeat = get_field('boxed_background_repeat') ? get_field('boxed_background_repeat') : get_theme_mod('boxed_background_repeat', 'no-repeat');
			$bifrost_boxed_background_size = get_field('boxed_background_size') ? get_field('boxed_background_size') : get_theme_mod('boxed_background_size', 'auto');
			$bifrost_boxed_background_position = get_field('boxed_background_position') ? get_field('boxed_background_position') : get_theme_mod('boxed_background_position', 0);
			$bifrost_boxed_background_attachment = get_field('boxed_background_attachment') ? get_field('boxed_background_attachment') : get_theme_mod('boxed_background_attachment', 'scroll');

			// Color
			if ($bifrost_boxed_background_color) {
				$bifrost_style_output[] = implode(',', [
				'.l-theme-wrapper .l-main-wrapper', 
				]) . '{ background-color: '. $bifrost_boxed_background_color .' !important}'; 
			}

			// Image
			if ($bifrost_boxed_background_image) {
				$bifrost_style_output[] = '.l-theme-wrapper .l-main-wrapper { background: url('. $bifrost_boxed_background_image .'); background-repeat: '. $bifrost_boxed_background_repeat .'; background-size: '. $bifrost_boxed_background_size .'; background-position: '. $bifrost_boxed_background_position .'; background-attachment: '. $bifrost_boxed_background_attachment .'}'; 
			}
		} elseif ($bifrost_boxed_background_type == 'gradient') {
			$bifrost_boxed_background_type = get_field('boxed_background_gradient_type') ? get_field('boxed_background_gradient_type') : get_theme_mod('boxed_background_gradient_type', 'linear');

			$bifrost_boxed_background_gradient = [
				'topColor' => get_field('boxed_background_gradient_top_color') ? get_field('boxed_background_gradient_top_color') : get_theme_mod('boxed_background_gradient_top_color', ''),
				'topLocation' => get_field('boxed_background_gradient_top_location') ? get_field('boxed_background_gradient_top_location') : get_theme_mod('boxed_background_gradient_top_location', 0),
				'bottomColor' => get_field('boxed_background_gradient_bottom_color') ? get_field('boxed_background_gradient_bottom_color') : get_theme_mod('boxed_background_gradient_bottom_color', '#f2295b'),
				'bottomLocation' => get_field('boxed_background_gradient_bottom_location') ? get_field('boxed_background_gradient_bottom_location') : get_theme_mod('boxed_background_gradient_bottom_location', 100),
				'gradientAngle' => get_field('boxed_background_gradient_angle') ? get_field('boxed_background_gradient_angle') : get_theme_mod('boxed_background_gradient_angle', 180),
				'gradientPosition' => get_field('boxed_background_gradient_position') ? get_field('boxed_background_gradient_position') : get_theme_mod('boxed_background_gradient_position', 0)
			];

			if ($bifrost_boxed_background_type == 'linear') {
				$bifrost_style_output[] = '.l-theme-wrapper .l-main-wrapper { background-image: linear-gradient('. $bifrost_boxed_background_gradient['gradientAngle'] .'deg, '. $bifrost_boxed_background_gradient['topColor'] .' '. $bifrost_boxed_background_gradient['topLocation'] .'%, '. $bifrost_boxed_background_gradient['bottomColor'] .' '. $bifrost_boxed_background_gradient['bottomLocation'] .'%); }';
			} elseif ($bifrost_boxed_background_type == 'radial') {
				$bifrost_style_output[] = '.l-theme-wrapper .l-main-wrapper { background-image: radial-gradient('. $bifrost_boxed_background_gradient['gradientPosition'] .', '. $bifrost_boxed_background_gradient['topColor'] .' '. $bifrost_boxed_background_gradient['topLocation'] .'%, '. $bifrost_boxed_background_gradient['bottomColor'] .' '. $bifrost_boxed_background_gradient['bottomLocation'] .'%); }';
			}
		}
	} else if ($bifrost_site_width == 'full-width') {
		/**
		 * Body Offset
		 */
		$bifrost_body_offset = get_field('site_width') == 'full-width' || get_field('general_body_offset') == '1' ? get_field('general_body_offset') : get_theme_mod('body_offset', '2');

		// Offset Breakpoint
		$bifrost_body_offset_breakpoint = get_field('site_width') == 'full-width' || get_field('general_body_offset_breakpoint') ? get_field('general_body_offset_breakpoint') : get_theme_mod('body_offset_breakpoint', '1');

		if ($bifrost_body_offset_breakpoint == '1') {
			$bifrost_offset_media_query = '1039px';
		} else {
			$bifrost_offset_media_query = '745px';
		}

		// Left
		$bifrost_body_offset_left_padding = get_field('site_width') == 'full-width' || get_field('general_body_offset_padding_left') ? get_field('general_body_offset_padding_left') : get_theme_mod('body_offset_padding')['padding-left'];

		if (!empty($bifrost_body_offset_left_padding)) {
			$bifrost_style_output[] = '@media (min-width: '. $bifrost_offset_media_query .'){ .l-theme-wrapper .l-main-wrapper, .l-primary-header--default, .l-primary-footer__widgets, .l-primary-footer__copyright { padding-left: '. $bifrost_body_offset_left_padding .' !important}}';
		}

		// Right
		$bifrost_body_offset_right_padding = get_field('site_width') == 'full-width' || get_field('general_body_offset_padding_right') ? get_field('general_body_offset_padding_right') : get_theme_mod('body_offset_padding')['padding-right'];

		if (!empty($bifrost_body_offset_right_padding)) {
			$bifrost_style_output[] = '@media (min-width: '. $bifrost_offset_media_query .'){ .l-theme-wrapper .l-main-wrapper, .l-primary-header--default, .l-primary-footer__widgets, .l-primary-footer__copyright { padding-right: '. $bifrost_body_offset_right_padding .' !important}}';
		}
	}

	return $bifrost_style_output ? implode(' ', $bifrost_style_output) : '';
}
