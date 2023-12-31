<?php 
	$online_food_delivery_custom_css ='';

	/*----------------Width Layout -------------------*/
	$online_food_delivery_theme_lay = get_theme_mod( 'online_food_delivery_width_options','Full Layout');
    if($online_food_delivery_theme_lay == 'Full Layout'){
		$online_food_delivery_custom_css .='body{';
			$online_food_delivery_custom_css .='max-width: 100%;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == 'Contained Layout'){
		$online_food_delivery_custom_css .='body{';
			$online_food_delivery_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == 'Boxed Layout'){
		$online_food_delivery_custom_css .='body{';
			$online_food_delivery_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$online_food_delivery_custom_css .='}';
	}

	/*------ Button Style -------*/
	$online_food_delivery_top_buttom_padding = get_theme_mod('online_food_delivery_top_button_padding');
	$online_food_delivery_left_right_padding = get_theme_mod('online_food_delivery_left_button_padding');
	if($online_food_delivery_top_buttom_padding != false || $online_food_delivery_left_right_padding != false ){
		$online_food_delivery_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$online_food_delivery_custom_css .='padding-top: '.esc_attr($online_food_delivery_top_buttom_padding).'px; padding-bottom: '.esc_attr($online_food_delivery_top_buttom_padding).'px; padding-left: '.esc_attr($online_food_delivery_left_right_padding).'px; padding-right: '.esc_attr($online_food_delivery_left_right_padding).'px;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_button_border_radius = get_theme_mod('online_food_delivery_button_border_radius');
	$online_food_delivery_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$online_food_delivery_custom_css .='border-radius: '.esc_attr($online_food_delivery_button_border_radius).'px;';
	$online_food_delivery_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$online_food_delivery_woocommerce_button_padding_top = get_theme_mod('online_food_delivery_woocommerce_button_padding_top');
	if($online_food_delivery_woocommerce_button_padding_top != false){
		$online_food_delivery_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$online_food_delivery_custom_css .='padding-top: '.esc_attr($online_food_delivery_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($online_food_delivery_woocommerce_button_padding_top).'px;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_woocommerce_button_padding_right = get_theme_mod('online_food_delivery_woocommerce_button_padding_right');
	if($online_food_delivery_woocommerce_button_padding_right != false){
		$online_food_delivery_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$online_food_delivery_custom_css .='padding-left: '.esc_attr($online_food_delivery_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($online_food_delivery_woocommerce_button_padding_right).'px;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_woocommerce_button_border_radius = get_theme_mod('online_food_delivery_woocommerce_button_border_radius');
	if($online_food_delivery_woocommerce_button_border_radius != false){
		$online_food_delivery_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$online_food_delivery_custom_css .='border-radius: '.esc_attr($online_food_delivery_woocommerce_button_border_radius).'px;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_related_product = get_theme_mod('online_food_delivery_related_product',true);

	if($online_food_delivery_related_product == false){
		$online_food_delivery_custom_css .='.related.products{';
			$online_food_delivery_custom_css .='display: none;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_woocommerce_product_border = get_theme_mod('online_food_delivery_woocommerce_product_border',false);

	if($online_food_delivery_woocommerce_product_border == true){
		$online_food_delivery_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$online_food_delivery_custom_css .='border: 1px solid #ddd;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_woocommerce_product_padding_top = get_theme_mod('online_food_delivery_woocommerce_product_padding_top',0);
		$online_food_delivery_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$online_food_delivery_custom_css .='padding-top: '.esc_attr($online_food_delivery_woocommerce_product_padding_top).'px; padding-bottom: '.esc_attr($online_food_delivery_woocommerce_product_padding_top).'px;';
		$online_food_delivery_custom_css .='}';

	$online_food_delivery_woocommerce_product_padding_right = get_theme_mod('online_food_delivery_woocommerce_product_padding_right',0);
		$online_food_delivery_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$online_food_delivery_custom_css .='padding-left: '.esc_attr($online_food_delivery_woocommerce_product_padding_right).'px; padding-right: '.esc_attr($online_food_delivery_woocommerce_product_padding_right).'px;';
		$online_food_delivery_custom_css .='}';

	$online_food_delivery_woocommerce_product_border_radius = get_theme_mod('online_food_delivery_woocommerce_product_border_radius');
	if($online_food_delivery_woocommerce_product_border_radius != false){
		$online_food_delivery_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$online_food_delivery_custom_css .='border-radius: '.esc_attr($online_food_delivery_woocommerce_product_border_radius).'px;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_woocommerce_product_box_shadow = get_theme_mod('online_food_delivery_woocommerce_product_box_shadow');
	if($online_food_delivery_woocommerce_product_box_shadow != false){
		$online_food_delivery_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$online_food_delivery_custom_css .='box-shadow: '.esc_attr($online_food_delivery_woocommerce_product_box_shadow).'px '.esc_attr($online_food_delivery_woocommerce_product_box_shadow).'px '.esc_attr($online_food_delivery_woocommerce_product_box_shadow).'px #aaa;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_product_sale_font_size = get_theme_mod('online_food_delivery_product_sale_font_size');
	$online_food_delivery_custom_css .='.woocommerce span.onsale {';
		$online_food_delivery_custom_css .='font-size: '.esc_attr($online_food_delivery_product_sale_font_size).'px;';
	$online_food_delivery_custom_css .='}';

	/*---- Preloader Color ----*/
	$online_food_delivery_preloader_color = get_theme_mod('online_food_delivery_preloader_color');
	$online_food_delivery_preloader_bg_color = get_theme_mod('online_food_delivery_preloader_bg_color');

	if($online_food_delivery_preloader_color != false){
		$online_food_delivery_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$online_food_delivery_custom_css .='background-color: '.esc_attr($online_food_delivery_preloader_color).';';
		$online_food_delivery_custom_css .='}';
	}
	if($online_food_delivery_preloader_bg_color != false){
		$online_food_delivery_custom_css .='.preloader{';
			$online_food_delivery_custom_css .='background-color: '.esc_attr($online_food_delivery_preloader_bg_color).';';
		$online_food_delivery_custom_css .='}';
	}

	/*-------- Scrollup icon css -------*/
	$online_food_delivery_scroll_icon_font_size = get_theme_mod('online_food_delivery_scroll_icon_font_size', 18);
	$online_food_delivery_custom_css .='.scrollup{';
		$online_food_delivery_custom_css .='font-size: '.esc_attr($online_food_delivery_scroll_icon_font_size).'px;';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_scroll_icon_color = get_theme_mod('online_food_delivery_scroll_icon_color');
	$online_food_delivery_custom_css .='.scrollup{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_scroll_icon_color).'!important;';
	$online_food_delivery_custom_css .='}';

	/*---- Copyright css ----*/
	$online_food_delivery_copyright_color = get_theme_mod('online_food_delivery_copyright_color');
	$online_food_delivery_custom_css .='#footer p,#footer p a{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_copyright_color).'!important;';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_copyright__hover_color = get_theme_mod('online_food_delivery_copyright__hover_color');
	$online_food_delivery_custom_css .='#footer p:hover,#footer p a:hover{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_copyright__hover_color).'!important;';
	$online_food_delivery_custom_css .='}';
	
	$online_food_delivery_copyright_fontsize = get_theme_mod('online_food_delivery_copyright_fontsize',16);
	if($online_food_delivery_copyright_fontsize != false){
		$online_food_delivery_custom_css .='#footer p{';
			$online_food_delivery_custom_css .='font-size: '.esc_attr($online_food_delivery_copyright_fontsize).'px; ';
		$online_food_delivery_custom_css .='}';
	}

	/*-------- Copyright background css -------*/
	$online_food_delivery_copyright_background_color = get_theme_mod('online_food_delivery_copyright_background_color');
	$online_food_delivery_custom_css .='#footer{';
		$online_food_delivery_custom_css .='background-color: '.esc_attr($online_food_delivery_copyright_background_color).';';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_copyright_top_bottom_padding = get_theme_mod('online_food_delivery_copyright_top_bottom_padding',15);
	if($online_food_delivery_copyright_top_bottom_padding != false){
		$online_food_delivery_custom_css .='#footer {';
			$online_food_delivery_custom_css .='padding-top:'.esc_attr($online_food_delivery_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($online_food_delivery_copyright_top_bottom_padding).'px; ';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_resp_sidebar = get_theme_mod( 'online_food_delivery_sidebar_hide_show',true);
    if($online_food_delivery_resp_sidebar == true){
    	$online_food_delivery_custom_css .='@media screen and (max-width:575px) {';
		$online_food_delivery_custom_css .='#sidebar{';
			$online_food_delivery_custom_css .='display:block;';
		$online_food_delivery_custom_css .='} }';
	}else if($online_food_delivery_resp_sidebar == false){
		$online_food_delivery_custom_css .='@media screen and (max-width:575px) {';
		$online_food_delivery_custom_css .='#sidebar{';
			$online_food_delivery_custom_css .='display:none;';
		$online_food_delivery_custom_css .='} }';
	}

	$online_food_delivery_copyright_alignment = get_theme_mod( 'online_food_delivery_copyright_alignment','Center');
    if($online_food_delivery_copyright_alignment == 'Left'){
		$online_food_delivery_custom_css .='#footer p{';
			$online_food_delivery_custom_css .='text-align:start;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_copyright_alignment == 'Center'){
		$online_food_delivery_custom_css .='#footer p{';
			$online_food_delivery_custom_css .='text-align:center;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_copyright_alignment == 'Right'){
		$online_food_delivery_custom_css .='#footer p{';
			$online_food_delivery_custom_css .='text-align:end;';
		$online_food_delivery_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$online_food_delivery_woocommerce_sale_top_padding = get_theme_mod('online_food_delivery_woocommerce_sale_top_padding',5);
	$online_food_delivery_woocommerce_sale_left_padding = get_theme_mod('online_food_delivery_woocommerce_sale_left_padding',8);
	$online_food_delivery_custom_css .=' #food-category .product-image span.onsale, .woocommerce span.onsale{';
		$online_food_delivery_custom_css .='padding-top: '.esc_attr($online_food_delivery_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($online_food_delivery_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($online_food_delivery_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($online_food_delivery_woocommerce_sale_left_padding).'px;';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_woocommerce_sale_border_radius = get_theme_mod('online_food_delivery_woocommerce_sale_border_radius', 5);
	$online_food_delivery_custom_css .='#food-category .product-image span.onsale, .woocommerce span.onsale{';
		$online_food_delivery_custom_css .='border-radius: '.esc_attr($online_food_delivery_woocommerce_sale_border_radius).'px;';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_sale_position = get_theme_mod( 'online_food_delivery_sale_position','left');
    if($online_food_delivery_sale_position == 'left'){
		$online_food_delivery_custom_css .='#food-category .product-image span.onsale, .woocommerce ul.products li.product span.onsale{';
			$online_food_delivery_custom_css .='left: 10px; right: auto;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_sale_position == 'right'){
		$online_food_delivery_custom_css .='#food-category .product-image span.onsale, .woocommerce ul.products li.product span.onsale{';
			$online_food_delivery_custom_css .='left: auto; right: 10px;';
		$online_food_delivery_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$online_food_delivery_footer_background_color = get_theme_mod('online_food_delivery_footer_background_color');
	$online_food_delivery_custom_css .='.footertown{';
		$online_food_delivery_custom_css .='background-color: '.esc_attr($online_food_delivery_footer_background_color).';';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_footer_background_img = get_theme_mod('online_food_delivery_footer_background_img');
	if($online_food_delivery_footer_background_img != false){
		$online_food_delivery_custom_css .='.footertown{';
			$online_food_delivery_custom_css .='background: url('.esc_attr($online_food_delivery_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$online_food_delivery_custom_css .='}';
	}

	/*---- Comment form ----*/
	$online_food_delivery_comment_width = get_theme_mod('online_food_delivery_comment_width', '100');
	$online_food_delivery_custom_css .='#comments textarea{';
		$online_food_delivery_custom_css .=' width:'.esc_attr($online_food_delivery_comment_width).'%;';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_comment_submit_text = get_theme_mod('online_food_delivery_comment_submit_text', 'Post Comment');
	if($online_food_delivery_comment_submit_text == ''){
		$online_food_delivery_custom_css .='#comments p.form-submit {';
			$online_food_delivery_custom_css .='display: none;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_comment_title = get_theme_mod('online_food_delivery_comment_title', 'Leave a Reply');
	if($online_food_delivery_comment_title == ''){
		$online_food_delivery_custom_css .='#comments h2#reply-title {';
			$online_food_delivery_custom_css .='display: none;';
		$online_food_delivery_custom_css .='}';
	}

	// Sticky Header padding
	$online_food_delivery_sticky_header_padding = get_theme_mod('online_food_delivery_sticky_header_padding');
	$online_food_delivery_custom_css .='.fixed-header{';
		$online_food_delivery_custom_css .=' padding-top:'.esc_attr($online_food_delivery_sticky_header_padding).'px; padding-bottom:'.esc_attr($online_food_delivery_sticky_header_padding).'px;';
	$online_food_delivery_custom_css .='}';

	// Navigation Font Size 
	$online_food_delivery_nav_font_size = get_theme_mod('online_food_delivery_nav_font_size');
	if($online_food_delivery_nav_font_size != false){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-size: '.esc_attr($online_food_delivery_nav_font_size).'px;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_navigation_case = get_theme_mod('online_food_delivery_navigation_case', 'capitalize');
	if($online_food_delivery_navigation_case == 'uppercase' ){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .=' text-transform: uppercase;';
		$online_food_delivery_custom_css .='}';
	}elseif($online_food_delivery_navigation_case == 'capitalize' ){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .=' text-transform: capitalize;';
		$online_food_delivery_custom_css .='}';
	}

    // site title color option
	$online_food_delivery_site_title_color_setting = get_theme_mod('online_food_delivery_site_title_color_setting');
	$online_food_delivery_custom_css .=' .logo h1 a, .logo p a{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_site_title_color_setting).'!important;';
	$online_food_delivery_custom_css .='} ';

	$online_food_delivery_tagline_color_setting = get_theme_mod('online_food_delivery_tagline_color_setting');
	$online_food_delivery_custom_css .=' .logo p.site-description{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_tagline_color_setting).'!important;';
	$online_food_delivery_custom_css .='} ';   

	//Site title Font size
	$online_food_delivery_site_title_fontsize = get_theme_mod('online_food_delivery_site_title_fontsize');
	$online_food_delivery_custom_css .='.logo h1, .logo p.site-title{';
		$online_food_delivery_custom_css .='font-size: '.esc_attr($online_food_delivery_site_title_fontsize).'px;';
	$online_food_delivery_custom_css .='}';

	$online_food_delivery_site_description_fontsize = get_theme_mod('online_food_delivery_site_description_fontsize');
	$online_food_delivery_custom_css .='.logo p.site-description{';
		$online_food_delivery_custom_css .='font-size: '.esc_attr($online_food_delivery_site_description_fontsize).'px;';
	$online_food_delivery_custom_css .='}';

	/*----- Featured image css -----*/
	$online_food_delivery_featured_image_border_radius = get_theme_mod('online_food_delivery_featured_image_border_radius');
	if($online_food_delivery_featured_image_border_radius != false){
		$online_food_delivery_custom_css .='.inner-service .service-image img{';
			$online_food_delivery_custom_css .='border-radius: '.esc_attr($online_food_delivery_featured_image_border_radius).'px;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_featured_image_box_shadow = get_theme_mod('online_food_delivery_featured_image_box_shadow');
	if($online_food_delivery_featured_image_box_shadow != false){
		$online_food_delivery_custom_css .='.inner-service .service-image img{';
			$online_food_delivery_custom_css .='box-shadow: 8px 8px '.esc_attr($online_food_delivery_featured_image_box_shadow).'px #aaa;';
		$online_food_delivery_custom_css .='}';
	} 

	/*------Shop page pagination ---------*/
	$online_food_delivery_shop_page_pagination = get_theme_mod('online_food_delivery_shop_page_pagination', true);
	if($online_food_delivery_shop_page_pagination == false){
		$online_food_delivery_custom_css .= '.woocommerce nav.woocommerce-pagination {';
			$online_food_delivery_custom_css .='display: none;';
		$online_food_delivery_custom_css .='}';
	}

	/*------- Post into blocks ------*/
	$online_food_delivery_post_blocks = get_theme_mod('online_food_delivery_post_blocks', 'Without box');
	if($online_food_delivery_post_blocks == 'Within box' ){
		$online_food_delivery_custom_css .='.services-box{';
			$online_food_delivery_custom_css .=' border: 1px solid #222;';
		$online_food_delivery_custom_css .='}';
	}

	//  ------------ Mobile Media Options ----------
	$online_food_delivery_responsive_sticky_header = get_theme_mod('online_food_delivery_responsive_sticky_header',false);
	if($online_food_delivery_responsive_sticky_header == true && get_theme_mod('online_food_delivery_sticky_header',false) == false){
		$online_food_delivery_custom_css .='@media screen and (min-width:575px){
			.fixed-header{';
			$online_food_delivery_custom_css .='position:static !important;';
		$online_food_delivery_custom_css .='} }';
	}

	if($online_food_delivery_responsive_sticky_header == false){
		$online_food_delivery_custom_css .='@media screen and (max-width:575px){
			.fixed-header{';
			$online_food_delivery_custom_css .='position:static !important;';
		$online_food_delivery_custom_css .='} }';
	}

	// responsive slider
	if (get_theme_mod('online_food_delivery_slider_responsive',true) == true && get_theme_mod('online_food_delivery_slider_hide_show',false) == false) {
		$online_food_delivery_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$online_food_delivery_custom_css .=' display: none;';
		$online_food_delivery_custom_css .='} }';
	}
	if (get_theme_mod('online_food_delivery_slider_responsive',true) == false) {
		$online_food_delivery_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$online_food_delivery_custom_css .=' display: none;';
		$online_food_delivery_custom_css .='} }';
	}

	$online_food_delivery_responsive_show_back_to_top = get_theme_mod('online_food_delivery_responsive_show_back_to_top',true);
	if($online_food_delivery_responsive_show_back_to_top == true && get_theme_mod('online_food_delivery_show_back_to_top',true) == false){
		$online_food_delivery_custom_css .='@media screen and (min-width:575px){
			.scrollup{';
			$online_food_delivery_custom_css .='visibility:hidden;';
		$online_food_delivery_custom_css .='} }';
	}

	if($online_food_delivery_responsive_show_back_to_top == false){
		$online_food_delivery_custom_css .='@media screen and (max-width:575px){
			.scrollup{';
			$online_food_delivery_custom_css .='visibility:hidden;';
		$online_food_delivery_custom_css .='} }';
	}

	$online_food_delivery_responsive_preloader_hide = get_theme_mod('online_food_delivery_responsive_preloader_hide',false);
	if($online_food_delivery_responsive_preloader_hide == true && get_theme_mod('online_food_delivery_preloader_hide',false) == false){
		$online_food_delivery_custom_css .='@media screen and (min-width:575px){
			.preloader{';
			$online_food_delivery_custom_css .='display:none !important;';
		$online_food_delivery_custom_css .='} }';
	}

	if($online_food_delivery_responsive_preloader_hide == false){
		$online_food_delivery_custom_css .='@media screen and (max-width:575px){
			.preloader{';
			$online_food_delivery_custom_css .='display:none !important;';
		$online_food_delivery_custom_css .='} }';
	}

	// menu font weight
	$online_food_delivery_theme_lay = get_theme_mod( 'online_food_delivery_font_weight_menu_option','600');
    if($online_food_delivery_theme_lay == '100'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight:100;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '200'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 200;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '300'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 300;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '400'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 400;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '500'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 500;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '600'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 600;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '700'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 700;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '800'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 800;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_theme_lay == '900'){
		$online_food_delivery_custom_css .='.primary-navigation ul li a{';
			$online_food_delivery_custom_css .='font-weight: 900;';
		$online_food_delivery_custom_css .='}';
	}

	// menu color
	$online_food_delivery_menu_color = get_theme_mod('online_food_delivery_menu_color');

	$online_food_delivery_custom_css .='.primary-navigation a,.primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a{';
			$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_menu_color).'!important;';
	$online_food_delivery_custom_css .='}';

	// menu hover color
	$online_food_delivery_menu_hover_color = get_theme_mod('online_food_delivery_menu_hover_color');
	$online_food_delivery_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, .primary-navigation ul.sub-menu a:hover, .primary-navigation ul.sub-menu li a:hover{';
			$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_menu_hover_color).' !important;';
	$online_food_delivery_custom_css .='}';

	// Submenu color
	$online_food_delivery_submenu_menu_color = get_theme_mod('online_food_delivery_submenu_menu_color');
	$online_food_delivery_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a{';
			$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_submenu_menu_color).' !important;';
	$online_food_delivery_custom_css .='}';

	// Submenu Hover Color Option
	$online_food_delivery_submenu_hover_color = get_theme_mod('online_food_delivery_submenu_hover_color');
	$online_food_delivery_custom_css .='.primary-navigation ul.sub-menu li a:hover {';
	$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_submenu_hover_color).'!important;';
	$online_food_delivery_custom_css .='} ';

	// Breadcrumb color option
	$online_food_delivery_breadcrumb_color = get_theme_mod('online_food_delivery_breadcrumb_color');
	$online_food_delivery_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_breadcrumb_color).'!important;';
	$online_food_delivery_custom_css .='}';

	// Breadcrumb bg color option
	$online_food_delivery_breadcrumb_background_color = get_theme_mod('online_food_delivery_breadcrumb_background_color');
	$online_food_delivery_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$online_food_delivery_custom_css .='background-color: '.esc_attr($online_food_delivery_breadcrumb_background_color).'!important;';
	$online_food_delivery_custom_css .='}';

	// Breadcrumb hover color option
	$online_food_delivery_breadcrumb_hover_color = get_theme_mod('online_food_delivery_breadcrumb_hover_color');
	$online_food_delivery_custom_css .='.bradcrumbs a:hover{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_breadcrumb_hover_color).'!important;';
	$online_food_delivery_custom_css .='}';

	// Breadcrumb hover bg color option
	$online_food_delivery_breadcrumb_hover_bg_color = get_theme_mod('online_food_delivery_breadcrumb_hover_bg_color');
	$online_food_delivery_custom_css .='.bradcrumbs a:hover{';
		$online_food_delivery_custom_css .='background-color: '.esc_attr($online_food_delivery_breadcrumb_hover_bg_color).'!important;';
	$online_food_delivery_custom_css .='}';

	// Category color option
	$online_food_delivery_category_color = get_theme_mod('online_food_delivery_category_color');
	$online_food_delivery_custom_css .='.tc-single-category a{';
		$online_food_delivery_custom_css .='color: '.esc_attr($online_food_delivery_category_color).'!important;';
	$online_food_delivery_custom_css .='}';

	// Category bg color option
	$online_food_delivery_category_background_color = get_theme_mod('online_food_delivery_category_background_color');
	$online_food_delivery_custom_css .='.tc-single-category a{';
		$online_food_delivery_custom_css .='background-color: '.esc_attr($online_food_delivery_category_background_color).'!important;';
	$online_food_delivery_custom_css .='}';

	// Single post image border radious
	$online_food_delivery_single_post_img_border_radius = get_theme_mod('online_food_delivery_single_post_img_border_radius', 0);
	$online_food_delivery_custom_css .='.feature-box img{';
		$online_food_delivery_custom_css .='border-radius: '.esc_attr($online_food_delivery_single_post_img_border_radius).'px;';
	$online_food_delivery_custom_css .='}';

	// slider hide css
	$online_food_delivery_slider_hide_show = get_theme_mod('online_food_delivery_slider_hide_show',false);
	if($online_food_delivery_slider_hide_show == false) {
		$online_food_delivery_custom_css .='.page-template-custom-frontpage #header{';
			$online_food_delivery_custom_css .='position:static; border-bottom: 1px solid #e2e2e2;';
		$online_food_delivery_custom_css .='}';
	}

	//slider content alignment css
	$online_food_delivery_theme_lay = get_theme_mod( 'online_food_delivery_slider_content_alignment','Left');
    if($online_food_delivery_theme_lay == 'Left'){
		$online_food_delivery_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$online_food_delivery_custom_css .='text-align:left !important; left:15%; right:45%;';
		$online_food_delivery_custom_css .='}';
		$online_food_delivery_custom_css .='@media screen and (max-width:720px){
			#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$online_food_delivery_custom_css .='text-align:left !important; left:5%; right:25%;';
		$online_food_delivery_custom_css .='} }';
	}else if($online_food_delivery_theme_lay == 'Center'){
		$online_food_delivery_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$online_food_delivery_custom_css .='text-align:center !important; left:30%; right:30%;';
		$online_food_delivery_custom_css .='}';
		$online_food_delivery_custom_css .='@media screen and (max-width:720px){
			#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$online_food_delivery_custom_css .='text-align:center !important; left:15%; right:15%;';
		$online_food_delivery_custom_css .='} }';
	}else if($online_food_delivery_theme_lay == 'Right'){
		$online_food_delivery_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$online_food_delivery_custom_css .='text-align:right !important; left:45%; right:15%;';
		$online_food_delivery_custom_css .='}';
		$online_food_delivery_custom_css .='@media screen and (max-width:720px){
			#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$online_food_delivery_custom_css .='text-align:right !important; left:20%; right:15%;';
		$online_food_delivery_custom_css .='} }';
	}	

	/*---- Slider Height ------*/
	$online_food_delivery_slider_height = get_theme_mod('online_food_delivery_slider_height');
	$online_food_delivery_custom_css .='#slider img{';
		$online_food_delivery_custom_css .='height: '.esc_attr($online_food_delivery_slider_height).'px;';
	$online_food_delivery_custom_css .='}';
	$online_food_delivery_custom_css .='@media screen and (max-width: 768px){
		#slider img{';
		$online_food_delivery_custom_css .='height: auto;';
	$online_food_delivery_custom_css .='} }';

	// Single post image border radious
	$online_food_delivery_single_post_img_border_radius = get_theme_mod('online_food_delivery_single_post_img_border_radius', 0);
	$online_food_delivery_custom_css .='.feature-box img{';
		$online_food_delivery_custom_css .='border-radius: '.esc_attr($online_food_delivery_single_post_img_border_radius).'px;';
	$online_food_delivery_custom_css .='}';

	// Single post image box shadow
	$online_food_delivery_single_post_img_box_shadow = get_theme_mod('online_food_delivery_single_post_img_box_shadow',0);
	$online_food_delivery_custom_css .='.feature-box img{';
		$online_food_delivery_custom_css .='box-shadow: '.esc_attr($online_food_delivery_single_post_img_box_shadow).'px '.esc_attr($online_food_delivery_single_post_img_box_shadow).'px '.esc_attr($online_food_delivery_single_post_img_box_shadow).'px #ccc;';
	$online_food_delivery_custom_css .='}';

	// Metabox Seperator
	$online_food_delivery_metabox_seperator = get_theme_mod('online_food_delivery_metabox_seperator');
	if($online_food_delivery_metabox_seperator != '' ){
		$online_food_delivery_custom_css .='.metabox .me-2:after{';
			$online_food_delivery_custom_css .=' content: "'.esc_attr($online_food_delivery_metabox_seperator).'"; padding-left:10px;';
		$online_food_delivery_custom_css .='}';		
	}

	// Metabox Seperator
	$online_food_delivery_single_post_metabox_seperator = get_theme_mod('online_food_delivery_single_post_metabox_seperator');
	if($online_food_delivery_single_post_metabox_seperator != '' ){
		$online_food_delivery_custom_css .='.metabox .px-2:after{';
			$online_food_delivery_custom_css .=' content: "'.esc_attr($online_food_delivery_single_post_metabox_seperator).'"; padding-left:10px;';
		$online_food_delivery_custom_css .='}';		
	}

	/*----------- Footer widgets heading alignment -----*/
	$online_food_delivery_footer_widgets_heading = get_theme_mod( 'online_food_delivery_footer_widgets_heading','Left');
    if($online_food_delivery_footer_widgets_heading == 'Left'){
		$online_food_delivery_custom_css .='footer h3{';
		$online_food_delivery_custom_css .='text-align: left;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_footer_widgets_heading == 'Center'){
		$online_food_delivery_custom_css .='footer h3{';
			$online_food_delivery_custom_css .='text-align: center;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_footer_widgets_heading == 'Right'){
		$online_food_delivery_custom_css .='footer h3{';
			$online_food_delivery_custom_css .='text-align: right;';
		$online_food_delivery_custom_css .='}';
	}

	$online_food_delivery_footer_widgets_content = get_theme_mod( 'online_food_delivery_footer_widgets_content','Left');
    if($online_food_delivery_footer_widgets_content == 'Left'){
		$online_food_delivery_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer.gallery,aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
		$online_food_delivery_custom_css .='text-align: left;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_footer_widgets_content == 'Center'){
		$online_food_delivery_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
			$online_food_delivery_custom_css .='text-align: center;';
		$online_food_delivery_custom_css .='}';
	}else if($online_food_delivery_footer_widgets_content == 'Right'){
		$online_food_delivery_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
			$online_food_delivery_custom_css .='text-align: right !important;';
		$online_food_delivery_custom_css .='}';
	}
