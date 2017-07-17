<?php

// Custom Div

  function custom_div( $atts, $content = null ) {

    $a = shortcode_atts( array(
      'class'              => '',
      'animation_effect'   => '',
      'animation_duration' => '',
      'animation_delay'    => '',
      'animation_offset'   => '',
    ), $atts );

    $class      = 'custom-div';
    $animation  = '';

    if (!empty($a['class'])) {
      $class .= ' ' . $a['class'];
    }

    if (!empty($a['animation_effect'])) {
      $class = ' wow ' . $a['animation_effect'];
    }

    if (!empty($a['animation_duration'])) {
      $animation .= ' data-wow-duration="' . $a['animation_duration'] . '"';
    }

    if (!empty($a['animation_delay'])) {
      $animation .= ' data-wow-delay="' . $a['animation_delay'] . '"';
    }

    if (!empty($a['animation_offset'])) {
      $animation .= ' data-wow-offset="' . $a['animation_offset'] . '"';
    }

    return '<div class="' . $class . '"'. $animation . '>' . do_shortcode($content) . '</div>';
  }
  add_shortcode( 'custom_div', 'custom_div' );

// Button

  function btn_shortcode( $atts ) {

    $a = shortcode_atts( array(
      'title'              => '',
      'link'               => '',
      'class'              => '',
      'target'             => '',
      'icon'               => '',
      'animation_effect'   => '',
      'animation_duration' => '',
      'animation_delay'    => '',
      'animation_offset'   => '',
    ), $atts );
    
    $link       = '';
    $title      = '';
    $icon       = '';
    $class      = 'btn';
    $target     = '';
    $animation  = '';

    if (!empty($a['link'])) {
      $link = $a['link'];
    }

    if (!empty($a['title'])) {
      $title = $a['title'];
    }

    if (!empty($a['class'])) {
      $class .= ' ' . $a['class'];
    }

    if (!empty($a['icon'])) {
      $icon = '<i class="' . $a['icon'] . '"></i>';
    }

    if (!empty($a['target'])) {
      $target = ' target="_' . $a['target'] . '"';
    }

    if (!empty($a['animation_effect'])) {
      $class = ' wow ' . $a['animation_effect'];
    }

    if (!empty($a['animation_duration'])) {
      $animation .= ' data-wow-duration="' . $a['animation_duration'] . '"';
    }

    if (!empty($a['animation_delay'])) {
      $animation .= ' data-wow-delay="' . $a['animation_delay'] . '"';
    }

    if (!empty($a['animation_offset'])) {
      $animation .= ' data-wow-offset="' . $a['animation_offset'] . '"';
    }
    
    return '<a href="' . $link . '" class="' . $class . '" title="' . $title . '"' . $target . $animation . '><span class="btn-txt">' . $title . $icon . '</span></a>';
  }
  add_shortcode( 'btn', 'btn_shortcode' );

// Divider

  function divider_shortcode( $atts ) {

    $a = shortcode_atts( array(
      'width'              => '',
      'height'             => '',
      'bg_color'           => '',
      'margin_top'         => '',
      'margin_bottom'      => '',
      'margin_left'        => '',
      'margin_right'       => '',
      'class'              => 'divider',
      'animation_effect'   => '',
      'animation_duration' => '',
      'animation_delay'    => '',
      'animation_offset'   => '',
    ), $atts );

    $width         = '';
    $height        = '';
    $bg_color      = '';
    $margin_top    = '';
    $margin_bottom = '';
    $margin_left   = '';
    $margin_right  = '';
    $class         = 'divider';
    $styles        = '';
    $style         = '';
    $animation     = '';

    if (!empty($a['class'])) {
      $class .= ' ' . $a['class'];
    }

    if (!empty($a['width'])){
      $styles .= 'width:' . $a['width'] . ';';
    }

    if (!empty($a['height'])){
      $styles .= 'height:' . $a['height'] . ';';
    }

    if (!empty($a['bg_color'])){
      $styles .= 'background-color:' . $a['bg_color'] . ';';
    }

    if (!empty($a['margin_top'])){
      $styles .= 'margin-top:' . $a['margin_top'] . ';';
    }

    if (!empty($a['margin_bottom'])){
      $styles .= 'margin-bottom:' . $a['margin_bottom'] . ';';
    }

    if (!empty($a['margin_left'])){
      $styles .= 'margin-left:' . $a['margin_left'] . ';';
    }

    if (!empty($a['margin_right'])){
      $styles .= 'margin-right:' . $a['margin_right'] . ';';
    }

    if (!empty($styles)) {
      $style = ' style="' . $styles . '"';
    }

    if (!empty($a['animation_effect'])) {
      $class = ' wow ' . $a['animation_effect'];
    }

    if (!empty($a['animation_duration'])) {
      $animation .= ' data-wow-duration="' . $a['animation_duration'] . '"';
    }

    if (!empty($a['animation_delay'])) {
      $animation .= ' data-wow-delay="' . $a['animation_delay'] . '"';
    }

    if (!empty($a['animation_offset'])) {
      $animation .= ' data-wow-offset="' . $a['animation_offset'] . '"';
    }
    
    return '<div class="' . $class . '"' . $animation . $style . '></div>';
  }
  add_shortcode( 'divider', 'divider_shortcode' );

// Company Info

  function show_full_Address($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return displayfullAddress($location_number);
  }
  add_shortcode( 'full_address', 'show_full_Address' );

  function show_Address($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return displayAddress($location_number);
  }
  add_shortcode( 'address', 'show_Address' );

  function show_Address_txt($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return companyAddressTxt($location_number);
  }
  add_shortcode( 'address_txt', 'show_Address_txt' );

  function show_Contact($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return displayContactInfo($location_number);
  }
  add_shortcode( 'contact_info', 'show_Contact' );

  function show_Phone($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return displayPhone($location_number);
  }
  add_shortcode( 'phone', 'show_Phone' );

  function show_phone_txt($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return companyPhoneTxt($location_number);
  }
  add_shortcode( 'phone_txt', 'show_phone_txt' );

  function show_Email($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return displayEmail($location_number);
  }
  add_shortcode( 'email', 'show_Email' );

  function show_Email_txt($atts) {
    $a = shortcode_atts(
      array(
        'location' => '',
      ), $atts );
    $location_number = $a['location'];
    return companyEmailTxt($location_number);
  }
  add_shortcode( 'email_txt', 'show_Email_txt' );

// FBR Badges

  function show_verified_badge() {
    
    return display_verified_fbr_badge();
  }
  add_shortcode( 'fbr_verified', 'show_verified_badge' );

  function show_verified_star_badge() {
    
    return display_verified_rating_fbr_badge();
  }
  add_shortcode( 'fbr_verified_star', 'show_verified_star_badge' );

  function show_top_place() {
    
    return display_top_place_badge();
  }
  add_shortcode( 'fbr_top_place', 'show_top_place' );

  function customer_service_badge() {
    
    return display_customer_service_badge();
  }
  add_shortcode( 'fbr_customer_service', 'customer_service_badge' );

  function fbr_badges() {
    
    return '<div class="fbr-badges">' . display_top_place_badge() . display_verified_fbr_badge() . display_customer_service_badge() . '</div>';
  }
  add_shortcode( 'fbr_badges', 'fbr_badges' );

// Social

  function show_SocialProfiles($atts) {
    $a = shortcode_atts(
      array(
        'type'  => '',
        'class' => '',
      ), $atts );
    return displaySocialProfiles(array('type' => $a['type'], 'class' => $a['class']));
  }
  add_shortcode( 'social_profiles', 'show_SocialProfiles' );

  function show_SocialProfile($atts) {
    $a = shortcode_atts(
      array(
        'profiles' => '',
        'type'     => '',
        'class'    => '',
      ), $atts );
    return displaySocialProfile(array('profiles' => $a['profiles'], 'type' => $a['type'], 'class' => $a['class']));
  }
  add_shortcode( 'social_profile', 'show_SocialProfile' );

// Custom Post Type Loops

  function show_team() {
    get_template_part('templates/team-loop');
  }
  add_shortcode( 'team', 'show_team' );

  function show_positions() {
    
    get_template_part('templates/positions-loop');
  }
  add_shortcode( 'positions', 'show_positions' );

  function show_testimonials() {
    get_template_part('templates/testimonials');
  }
  add_shortcode( 'testimonials', 'show_testimonials' );

// Theme Logos

  function theme_logos($args = array()){

    $defaults = array(
      'type'      => 'default',
      'class'     => '',
      'add_link'  => 1,
      'max_width' => ''
    );

    $themesettings   = get_option( 'themesettings_');
    $options         = array_merge( $defaults, $args );
    $type            = $options['type'];
    $class           = $options['class'];
    $add_link        = $options['add_link'];
    $max_width       = $options['max_width'];
    $url             = esc_url(home_url('/'));
    $title           = get_bloginfo('name');
    $default_png_url = get_field('default_logo_png', 'option');
    $default_svg_url = get_field('default_logo_svg', 'option');
    $default_img_url = ($default_svg_url) ? $default_svg_url : $default_png_url['url'];
    $default_img     = '<img src="' . $default_img_url  . '" class="cdm-site-logo-img" alt="' . $title  . ' Logo" title="' . $title  . ' Logo" />';
    $light_img       = '';
    $dark_img        = '';
    $color_img       = '';
    $mobile_img      = '';
    $img             = '';

    if (!empty($class)) {
      $link_class = 'cdm-site-logo ' . $type . '-logo ' . $class;
    } else {
      $link_class = 'cdm-site-logo ' . $type . '-logo';
    }

    if ($add_link == 1) {
      $inner_tag_start = '<a href="' . $url  . '" title="' . $title  . '" rel="home" class="cdm-site-logo-inner">';
      $inner_tag_end = '</a>';
    } else {
      $inner_tag_start = '<div class="cdm-site-logo-inner">';
      $inner_tag_end = '</div>';
    }

    if( have_rows('logos', 'option') ){
      while ( have_rows('logos', 'option') ) {
        the_row();
        if( get_row_layout() == 'light' ){
          $light_png_url = get_sub_field('raster_image');
          $light_svg_url = get_sub_field('svg_image');
          $light_img_url = ($light_svg_url) ? $light_svg_url : $light_png_url;

          $light_img = ($light_img_url) ? '<img src="' . $light_img_url  . '" class="cdm-site-logo-img" alt="' . $title  . ' Logo" title="' . $title  . ' Logo" />' : $default_img;
        }
        elseif( get_row_layout() == 'dark' ){
          $dark_png_url = get_sub_field('raster_image');
          $dark_svg_url = get_sub_field('svg_image');
          $dark_img_url = ($dark_svg_url) ? $dark_svg_url : $dark_png_url;

          $dark_img = ($dark_img_url) ? '<img src="' . $dark_img_url  . '" class="cdm-site-logo-img" alt="' . $title  . ' Logo" title="' . $title  . ' Logo" />' : $default_img;
        }
        elseif( get_row_layout() == 'color' ){
          $color_png_url = get_sub_field('raster_image');
          $color_svg_url = get_sub_field('svg_image');
          $color_img_url = ($color_svg_url) ? $color_svg_url : $color_png_url;

          $color_img = ($color_img_url) ? '<img src="' . $color_img_url  . '" class="cdm-site-logo-img" alt="' . $title  . ' Logo" title="' . $title  . ' Logo" />' : $default_img;
        }
        elseif( get_row_layout() == 'mobile' ){
          $mobile_png_url = get_sub_field('raster_image');
          $mobile_svg_url = get_sub_field('svg_image');
          $mobile_img_url = ($mobile_svg_url) ? $mobile_svg_url : $mobile_png_url;

          $mobile_img = ($mobile_img_url) ? '<img src="' . $mobile_img_url  . '" class="cdm-site-logo-img" alt="' . $title  . ' Logo" title="' . $title  . ' Logo" />' : $default_img;
        }  
      }
    }

    if ($type === 'light') {
      $img = $light_img;
    }
    else if ($type === 'dark') {
      $img = $dark_img;
    }
    else if ($type === 'color') {
      $img = $color_img;
    }
    else if ($type === 'mobile') {
      $img = $mobile_img;
    }
    else {
      $img = '';
    }

    $logo  = '<div class="' . $link_class . '"';
    $logo .= (!empty($max_width)) ? ' style="max-width: ' . $max_width . '">' : '>';
    $logo .= $inner_tag_start;
    $logo .= $img;
    $logo .= $inner_tag_end;
    $logo .= '</div>';

    return $logo;
  }
  add_shortcode( 'logo', 'theme_logos' );
  

// Copyright

  function copyright() {
    $myoptions = get_option( 'themesettings_');
    $copyright = $myoptions['copyright_text'];
    $siteTitle = get_bloginfo( 'name' ); 
    
    $currentYear = date("Y");

    if($copyright){
      return '<div class="copyright">' . $copyright . ' &copy; ' . $currentYear . '</div>';
    } else{
      return '<div class="copyright">' . $siteTitle . ' &copy; ' . $currentYear . '</div>';
    }
  }
  add_shortcode( 'copyright', 'copyright' );

// Tagline

  function tagline() {
    $tagline = get_bloginfo( 'description' ); 

    if($tagline){
      return '<div class="tagline">' . $tagline . '</div>';
    } else{
      return '<div class="tagline">This is your site tagline</div>';
    }
  }
  add_shortcode( 'tagline', 'tagline' );

// Flex Containers

  function flex_row( $atts , $content = null ) {

    $a = shortcode_atts( array(
      'position' => 'start',
      'align' => 'start',
      'class' => '',
    ), $atts );
    
    return '<div class="row position-' . esc_attr($a['position']) . ' align-' . esc_attr($a['align']) . ' ' . esc_attr($a['class']) . '">' . do_shortcode($content) . '</div>';  
  }
  add_shortcode( 'flex_row', 'flex_row' );

  function flex_column( $atts , $content = null ) {

    $a = shortcode_atts( array(
      'width' => '12',
      'align' => 'none',
      'content_position' => 'start',
      'content_align' => 'stretch',
      'class' => '',
    ), $atts );
    
    return '<div class="col col-' . esc_attr($a['width']) . ' single-align-' . esc_attr($a['align']) . ' ' . esc_attr($a['class']) . '"><div class="col-inner position-' . esc_attr($a['content_position']) . '  align-' . esc_attr($a['content_align']) . '">' . do_shortcode($content) . '</div></div>';  
  }
  add_shortcode( 'flex_col', 'flex_column' );
