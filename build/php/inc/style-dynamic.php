<?php

if( function_exists('get_field') ) {

  // Responsive Widths

    $sml   = '360px';
    $mds   = '480px';
    $md    = '768px';
    $mdl   = '1024px';
    $lrg   = '1280px';
    $xlrg  = '1440px';
    $xxlrg = '1600px';

  $themesettings = get_option( 'themesettings_');
  $content_background_color = $themesettings['content_background_color'];

  if ($content_background_color) {
    echo '#wrapper{background-color: ' . $content_background_color . ';}';
  }

  // Header Styles

    // Header Top Bar

      $header_widget_bg_color = ($themesettings['header_widget_bg_color']) ? 'background-color: ' . $themesettings['header_widget_bg_color'] . ';' : '';
      $header_widget_txt_color = ($themesettings['header_widget_txt_color']) ? 'color: ' . $themesettings['header_widget_txt_color'] . ';' : '';
      $header_widget_link_color = ($themesettings['header_widget_link_color']) ? 'color: ' . $themesettings['header_widget_link_color'] . ';' : '';
      $header_widget_link_hover_color = ($themesettings['header_widget_link_hover_color']) ? 'color: ' . $themesettings['header_widget_link_hover_color'] . ';' : '';

      if ($themesettings['header_widget_bg_color']) {
        echo '.header-widgets{background-color: ' . $themesettings['header_widget_bg_color']. '}';
      }
      if ($themesettings['header_widget_txt_color']) {
        echo '.header-widgets p, .header-widgets li, .header-widgets span, .header-widgets div, .header-widgets input, .header-widgets textarea, .header-widgets label, .header-widgets .widget-title, .header-widgets h1, .header-widgets h2, .header-widgets h3, .header-widgets h4, .header-widgets h5, .header-widgets h6{color: ' . $themesettings['header_widget_txt_color']. '}';
      }
      if ($themesettings['header_widget_link_color']) {
        echo '.header-widgets a, .header-widgets a span{color: ' . $themesettings['header_widget_link_color']. '}';
      }
      if ($themesettings['header_widget_link_hover_color']) {
        echo '.header-widgets .menu li.current-menu-item > a, .header-widgets .menu li.current_page_parent > a, .header-widgets a:hover, .header-widgets a:hover span{color: ' . $themesettings['header_widget_link_hover_color']. '}';
      }

  // Logos

      $default_png_url = $themesettings['default_logo_png'];
      $default_svg_url = $themesettings['default_logo_svg'];
      $default_img_url = ($default_svg_url) ? $default_svg_url : $default_png_url['url'];

      echo '.cdm-site-logo.default-logo .cdm-site-logo-inner{background-image: url(' . $default_img_url . ');}';

      if( have_rows('logos', 'option') ){
        while ( have_rows('logos', 'option') ) { the_row();
          if( get_row_layout() == 'light' ){ 
            $light_png_url = get_sub_field('raster_image');
            $light_svg_url = get_sub_field('svg_image');
            $light_img_url = ($light_svg_url) ? $light_svg_url : $light_png_url;
            $light_max_width_m = (get_sub_field('max_width_on_mobile')) ? get_sub_field('max_width_on_mobile') : '';
            $light_max_width_t = (get_sub_field('max_width_on_tablet')) ? get_sub_field('max_width_on_tablet') : '';
            $light_max_width_d = (get_sub_field('max_width_on_desktop')) ? get_sub_field('max_width_on_desktop') : '';

            echo '.cdm-site-logo.light-logo .cdm-site-logo-inner{background-image: url(' . $light_img_url . ');}';

            if ($light_max_width_m) {
              echo '.cdm-site-logo.light-logo,.site-header-logo.light-logo{max-width: ' . $light_max_width_m . 'vw;}';
            }
            if ($light_max_width_t) {
              echo '@media screen and (min-width: ' . $md . '){.cdm-site-logo.light-logo,.site-header-logo.light-logo{max-width: ' . $light_max_width_t . 'vw;}}';
            }
            if ($light_max_width_d) {
              echo '@media screen and (min-width: ' . $mdl . '){.cdm-site-logo.light-logo,.site-header-logo.light-logo{max-width: ' . $light_max_width_d . 'vw;}.light-logo-bar .cdm-site-menu.divided-menu{width: calc(50% - ' . ($light_max_width_d/2) . 'vw);}}';
            }
          }
          else if( get_row_layout() == 'dark' ){ 
            $dark_png_url = get_sub_field('raster_image');
            $dark_svg_url = get_sub_field('svg_image');
            $dark_img_url = ($dark_svg_url) ? $dark_svg_url : $dark_png_url;
            $dark_max_width_m = (get_sub_field('max_width_on_mobile')) ? get_sub_field('max_width_on_mobile') : '';
            $dark_max_width_t = (get_sub_field('max_width_on_tablet')) ? get_sub_field('max_width_on_tablet') : '';
            $dark_max_width_d = (get_sub_field('max_width_on_desktop')) ? get_sub_field('max_width_on_desktop') : '';

            echo '.cdm-site-logo.dark-logo .cdm-site-logo-inner{background-image: url(' . $dark_img_url . ');}';

            if ($dark_max_width_m) {
              echo '.cdm-site-logo.dark-logo,.site-header-logo.dark-logo{max-width: ' . $dark_max_width_m . 'vw;}';
            }
            if ($dark_max_width_t) {
              echo '@media screen and (min-width: ' . $md . '){.cdm-site-logo.dark-logo,.site-header-logo.dark-logo{max-width: ' . $dark_max_width_t . 'vw;}}';
            }
            if ($dark_max_width_d) {
              echo '@media screen and (min-width: ' . $mdl . '){.cdm-site-logo.dark-logo,.site-header-logo.dark-logo{max-width: ' . $dark_max_width_d . 'vw;}.dark .divided-menu{width: calc(50% - ' . ($dark_max_width_d/2) . 'vw);}}';
            }
          }
          else if( get_row_layout() == 'color' ){ 
            $color_png_url = get_sub_field('raster_image');
            $color_svg_url = get_sub_field('svg_image');
            $color_img_url = ($color_svg_url) ? $color_svg_url : $color_png_url;
            $color_max_width_m = (get_sub_field('max_width_on_mobile')) ? get_sub_field('max_width_on_mobile') : '';
            $color_max_width_t = (get_sub_field('max_width_on_tablet')) ? get_sub_field('max_width_on_tablet') : '';
            $color_max_width_d = (get_sub_field('max_width_on_desktop')) ? get_sub_field('max_width_on_desktop') : '';

            echo '.cdm-site-logo.color-logo .cdm-site-logo-inner{background-image: url(' . $color_img_url . ');}';

            if ($color_max_width_m) {
              echo '.cdm-site-logo.color-logo{max-width: ' . $color_max_width_m . 'vw;}';
            }
            if ($color_max_width_t) {
              echo '@media screen and (min-width: ' . $md . '){.cdm-site-logo.color-logo{max-width: ' . $color_max_width_t . 'vw;}}';
            }
            if ($color_max_width_d) {
              echo '@media screen and (min-width: ' . $mdl . '){.cdm-site-logo.color-logo{max-width: ' . $color_max_width_d . 'vw;}.divided-menu{width: calc(50% - ' . ($color_max_width_d/2) . 'vw);}}';
            }
          }
          else if( get_row_layout() == 'mobile' ){ 
            $mobile_png_url = get_sub_field('raster_image');
            $mobile_svg_url = get_sub_field('svg_image');
            $mobile_img_url = ($mobile_svg_url) ? $mobile_svg_url : $mobile_png_url;
            $mobile_max_width_m = (get_sub_field('max_width_on_mobile')) ? get_sub_field('max_width_on_mobile') : '';
            $mobile_max_width_t = (get_sub_field('max_width_on_tablet')) ? get_sub_field('max_width_on_tablet') : '';
            $mobile_max_width_d = (get_sub_field('max_width_on_desktop')) ? get_sub_field('max_width_on_desktop') : '';

            echo '.cdm-site-logo.mobile-logo .cdm-site-logo-inner{background-image: url(' . $mobile_img_url . ');}';

            if ($mobile_max_width_m) {
              echo '.cdm-site-logo.mobile-logo{max-width: ' . $mobile_max_width_m . 'vw;}';
            }
            if ($mobile_max_width_t) {
              echo '@media screen and (min-width: ' . $md . '){.cdm-site-logo.mobile-logo{max-width: ' . $mobile_max_width_t . 'vw;}}';
            }
          }
        }
      }

  // Menus

    // Global

      $menu_dropdown_bg_color = $themesettings['sub_menu_bg_color'];
      $menu_link_color = ($themesettings['menu_link_color']) ? 'color: ' . $themesettings['menu_link_color'] . ';' : '';
      $menu_line_height = ($themesettings['menu_line_height']) ? 'line-height: ' . $themesettings['menu_line_height'] . 'px;' : '';
      $menu_font_size = ($themesettings['menu_font_size']) ? 'font-size: ' . $themesettings['menu_font_size'] . 'px;' : '';
      $menu_font_family = ($themesettings['menu_font_family']) ? 'font-family: ' . $themesettings['menu_font_family'] . ';' : '';
      $menu_link_active_color = ($themesettings['menu_link_active_color']) ? 'color: ' . $themesettings['menu_link_active_color'] . ';' : '';

      if ($themesettings['sub_menu_bg_color']) {
        echo '@media screen and (min-width: ' . $mdl . '){.sub-menu{ background-color: ' . $themesettings['sub_menu_bg_color']. ';}}';
      }

      if ($themesettings['menu_bg_color']) {
        echo '.top-menu, .side-menu, .mobile-menu{ background-color: ' . $themesettings['menu_bg_color']. ';}';
      }

      echo '.menu-container li a span{' . $menu_link_color . $menu_line_height . $menu_font_size . $menu_font_family . '}';

      if($menu_link_active_color){
        echo '.menu-container li a:hover, .menu-container li.current-menu-item > a span, .menu-container li.current_page_parent > a span{' . $menu_link_active_color . '}';
      }


    // Mobile Menu

      if ($themesettings['menu_icon_color']) {
        echo '.menu-button span::before, .menu-button span, .menu-button span::after{ background-color: ' . $themesettings['menu_icon_color'] . ';}';
      }
      if ($themesettings['active_menu_icon_color']) {
        echo '.menu-button.active span::before, .menu-button.active span::after{ background-color: ' . $themesettings['active_menu_icon_color'] . ';}';
      }

    // Sticky Header Styles

  // Text Styles

    $default_font_family = ($themesettings['default_font_family']) ? 'font-family: ' . $themesettings['default_font_family'] . ';' : '';
    $default_font_color = ($themesettings['main_font_color']) ? 'color: ' . $themesettings['main_font_color'] . ';' : '';
    $text_highlight_color = $themesettings['text_highlight_color'];
    $link_text_color = ($themesettings['link_text_color']) ? 'color: ' . $themesettings['link_text_color'] . ';' : '';
    $link_text_hover_color = ($themesettings['link_text_hover_color']) ? 'color: ' . $themesettings['link_text_hover_color'] . ';' : '';

    $headings_font_family = ($themesettings['headings_font_family']) ? 'font-family: ' . $themesettings['headings_font_family'] . ';' : '';
    $headings_font_color = ($themesettings['headings_font_color']) ? 'color: ' . $themesettings['headings_font_color'] . ';' : '';
    $headings_text_transform = ($themesettings['headings_text_transform']) ? 'text-transform: ' . $themesettings['headings_text_transform'] . ';' : '';
    $headings_line_height = ($themesettings['headings_line_height']) ? 'line-height: ' . $themesettings['headings_line_height'] . ';' : '';
    $headings_font_weight = ($themesettings['headings_font_weight']) ? 'font-weight: ' . $themesettings['headings_font_weight'] . ';' : '';

    $paragraph_font_family = ($themesettings['paragraph_font_family']) ? 'font-family: ' . $themesettings['paragraph_font_family'] . ';' : '';
    $paragraph_font_color = ($themesettings['paragraph_font_color']) ? 'color: ' . $themesettings['paragraph_font_color'] . ';' : '';
    $paragraph_text_transform = ($themesettings['paragraph_text_transform']) ? 'text-transform: ' . $themesettings['paragraph_text_transform'] . ';' : '';
    $paragraph_line_height = ($themesettings['paragraph_line_height']) ? 'line-height: ' . $themesettings['paragraph_line_height'] . ';' : '';
    $paragraph_font_weight = ($themesettings['paragraph_font_weight']) ? 'font-weight: ' . $themesettings['paragraph_font_weight'] . ';' : '';

    // Global Text

      echo 'body, .select2-container--default span[class^="select2-selection"] .select2-selection__rendered, .select2-selection__arrow, input, textarea, label, div.uploader span.filename, div.uploader span.action, .select2-container--default .select2-selection--multiple .select2-selection__choice{' . $default_font_family . $default_font_color . '}';

      if ($text_highlight_color) {
        echo '::-moz-selection{background:' . $text_highlight_color . '; color: #FFF;}::selection{background:' . $text_highlight_color . '; color: #FFF;}.select2-container--default .select2-results__option--highlighted[aria-selected]{background-color:' . $text_highlight_color . '; color: #FFF;} input:focus{outline-color:' . $text_highlight_color . '}.select2-container--default .select2-selection--multiple .select2-selection__choice{background-color:' . $text_highlight_color . '; color: #FFF;}';
      }

    // Links

      echo 'a{' . $link_text_color . '} ';

      echo 'a:hover{' . $link_text_hover_color . ';} ';

    // Headings

      echo 'h1,h2,h3,h4,h5,h6{' . $headings_font_family . $headings_font_color . $headings_text_transform . $headings_line_height . $headings_font_weight . '}';

    // Body Text

      echo 'p, li, label, input, textarea, a, button{' . $paragraph_font_family . $paragraph_font_color . $paragraph_text_transform . $paragraph_line_height . $paragraph_font_weight . '}';

      echo '::-webkit-input-placeholder{' . $paragraph_font_family . $paragraph_font_color . $paragraph_text_transform . $paragraph_line_height . $paragraph_font_weight . '}';
      echo ':-moz-placeholder{' . $paragraph_font_family . $paragraph_font_color . $paragraph_text_transform . $paragraph_line_height . $paragraph_font_weight . '}';
      echo '::-moz-placeholder{' . $paragraph_font_family . $paragraph_font_color . $paragraph_text_transform . $paragraph_line_height . $paragraph_font_weight . '}';
      echo ':-ms-input-placeholder{' . $paragraph_font_family . $paragraph_font_color . $paragraph_text_transform . $paragraph_line_height . $paragraph_font_weight . '}';

  // Footer Styles

    // Footer Top

    $footer_top_background_color = ($themesettings['footer_top_background_color']) ? 'background-color: ' . $themesettings['footer_top_background_color'] . ';' : '';
    $footer_top_text_color = ($themesettings['footer_top_text_color']) ? 'color: ' . $themesettings['footer_top_text_color'] . ';' : '';
    $footer_top_link_color = ($themesettings['footer_top_link_color']) ? 'color: ' . $themesettings['footer_top_link_color'] . ';' : '';
    $footer_top_link_hover_color = ($themesettings['footer_top_link_hover_color']) ? 'color: ' . $themesettings['footer_top_link_hover_color'] . ';' : '';

    echo '.top-footer{' . $footer_top_background_color . '} top-footer p, .top-footer li, .top-footer span, .top-footer div, .top-footer input, .top-footer textarea, .top-footer label, .top-footer .widget-title, .top-footer h1, .top-footer h2, .top-footer h3, .top-footer h4, .top-footer h5, .top-footer h6{' . $footer_top_text_color . '}.top-footer a, .top-footer a span{' . $footer_top_link_color . '}.top-footer a:hover, .top-footer a:hover span, .top-footer .menu li.current-menu-item > a, .top-footer .menu li.current_page_parent > a{' . $footer_top_link_hover_color . ';}';

    $footer_bottom_background_color = ($themesettings['footer_bottom_background_color']) ? 'background-color: ' . $themesettings['footer_bottom_background_color'] . ';' : '';
    $footer_bottom_text_color = ($themesettings['footer_bottom_text_color']) ? 'color: ' . $themesettings['footer_bottom_text_color'] . ';' : '';
    $footer_bottom_link_color = ($themesettings['footer_bottom_link_color']) ? 'color: ' . $themesettings['footer_bottom_link_color'] . ';' : '';
    $footer_bottom_link_hover_color = ($themesettings['footer_bottom_link_hover_color']) ? 'color: ' . $themesettings['footer_bottom_link_hover_color'] . ';' : '';

    echo '.bottom-footer{' . $footer_bottom_background_color . '} .bottom-footer p, .bottom-footer li, .bottom-footer span, .bottom-footer div, .bottom-footer input, .bottom-footer textarea, .bottom-footer label, .bottom-footer .widget-title, .bottom-footer h1, .bottom-footer h2, .bottom-footer h3, .bottom-footer h4, .bottom-footer h5, .bottom-footer h6{' . $footer_bottom_text_color . '}.bottom-footer a, .bottom-footer a span{' . $footer_bottom_link_color . '}.bottom-footer a:hover, .bottom-footer a:hover span, .bottom-footer .menu li.current-menu-item > a, .bottom-footer .menu li.current_page_parent > a{' . $footer_bottom_link_hover_color . ';}';

  // Blog Styles

    // Blog feeds
      $blog_type = $themesettings['blog_type'];
      $mobile_cols     = intval($themesettings['columns_on_mobile']);
      $tablet_cols     = intval($themesettings['columns_on_tablet']);
      $desktop_cols    = intval($themesettings['columns_on_desktop']);
      $mobile_gutters  = intval($themesettings['gutters_on_mobile']);
      $tablet_gutters  = intval($themesettings['gutters_on_tablet']);
      $desktop_gutters = intval($themesettings['gutters_on_desktop']);

      if ($blog_type === "standard") {
        echo '.blog-posts.standard{width: calc(100% + ' . $mobile_gutters . 'px);margin-right: -' . $mobile_gutters . 'px;margin-bottom: -' . $mobile_gutters . 'px;}';
        echo '.blog-posts.standard .post-block{width: calc(' . abs(1/$mobile_cols * 100) . '% - ' . $mobile_gutters . 'px);margin-right: ' . $mobile_gutters . 'px;margin-bottom: ' . $mobile_gutters . 'px;}';
        echo '@media screen and (min-width: 768px){';
          echo '.blog-posts.standard{width: calc(100% + ' . $tablet_gutters . 'px);margin-right: -' . $tablet_gutters . 'px;margin-bottom: -' . $tablet_gutters . 'px;}';
          echo '.blog-posts.standard .post-block{width: calc(' . abs(1/$tablet_cols * 100) . '% - ' . $tablet_gutters . 'px);margin-right: ' . $tablet_gutters . 'px;margin-bottom: ' . $tablet_gutters . 'px;}';
        echo '}';
        echo '@media screen and (min-width: 1024px){';
          echo '.blog-posts.standard{width: calc(100% + ' . $desktop_gutters . 'px);margin-right: -' . $desktop_gutters . 'px;margin-bottom: -' . $desktop_gutters . 'px;}';
          echo '.blog-posts.standard .post-block{width: calc(' . abs(1/$desktop_cols * 100) . '% - ' . $desktop_gutters . 'px);margin-right: ' . $desktop_gutters . 'px;margin-bottom: ' . $desktop_gutters . 'px;}';
        echo '}';
      } elseif ($blog_type === "masonry") {
        echo '.blog-posts.masonry{width: calc(100% + ' . $mobile_gutters . 'px);margin-right: -' . $mobile_gutters . 'px;margin-bottom: -' . $mobile_gutters . 'px;}';
        echo '.blog-posts.masonry .post-block{width: calc(' . abs(1/$mobile_cols * 100) . '% - ' . $mobile_gutters . 'px);margin-bottom: ' . $mobile_gutters . 'px;}';
        echo '.blog-posts.masonry .gutter-sizer{width:' . $mobile_gutters . 'px;}';
        echo '@media screen and (min-width: 768px){';
          echo '.blog-posts.masonry{width: calc(100% + ' . $tablet_gutters . 'px);margin-right: -' . $tablet_gutters . 'px;margin-bottom: -' . $tablet_gutters . 'px;}';
          echo '.blog-posts.masonry .post-block{width: calc(' . abs(1/$tablet_cols * 100) . '% - ' . $tablet_gutters . 'px);margin-bottom: ' . $tablet_gutters . 'px;}';
          echo '.blog-posts.masonry .gutter-sizer{width:' . $tablet_gutters . 'px;}';
        echo '}';
        echo '@media screen and (min-width: 1024px){';
          echo '.blog-posts.masonry{width: calc(100% + ' . $desktop_gutters . 'px);margin-right: -' . $desktop_gutters . 'px;margin-bottom: -' . $desktop_gutters . 'px;}';
          echo '.blog-posts.masonry .post-block{width: calc(' . abs(1/$desktop_cols * 100) . '% - ' . $desktop_gutters . 'px);margin-bottom: ' . $desktop_gutters . 'px;}';
          echo '.blog-posts.masonry .gutter-sizer{width:' . $desktop_gutters . 'px;}';
        echo '}';
      }

    // Pagination 

      $pagination_item_background_color = $themesettings['pagination_item_background_color'];
      $pagination_item_text_color = $themesettings['pagination_item_text_color'];
      $pagination_current_background_color = $themesettings['pagination_current_background_color'];
      $pagination_current_text_color = $themesettings['pagination_current_text_color'];

      echo '.cdm-pagination-current, a.cdm-pagination-item:hover{ background-color: ' . $pagination_current_background_color . '; color: ' . $pagination_current_text_color . ';}a.cdm-pagination-item{background-color: ' . $pagination_item_background_color . '; color: ' . $pagination_item_text_color . ';}';

  // Hover Box Styles

    // Sadie Style Hover

      $sadie_effect_gradient_top_color = $themesettings['sadie_effect_gradient_top_color'];
      $sadie_effect_gradient_top_color_opacity = $themesettings['sadie_effect_gradient_top_color_opacity'];
      $sadie_effect_gradient_top = 'rgba(' . hex2rgb($sadie_effect_gradient_top_color) . ', ' . $sadie_effect_gradient_top_color_opacity . ')';
      $sadie_effect_gradient_bottom_color = $themesettings['sadie_effect_gradient_bottom_color'];
      $sadie_effect_gradient_bottom_color_opacity = $themesettings['sadie_effect_gradient_bottom_color_opacity'];
      $sadie_effect_gradient_bottom = 'rgba(' . hex2rgb($sadie_effect_gradient_bottom_color) . ', ' . $sadie_effect_gradient_bottom_color_opacity . ')';

      if ($sadie_effect_gradient_top_color) {
        echo '.effect-sadie .box-content:before{background: -webkit-linear-gradient(top,' . $sadie_effect_gradient_top . ' 0%, ' . $sadie_effect_gradient_bottom . ' 75%); background: linear-gradient(to bottom, ' . $sadie_effect_gradient_bottom . ' 75%);}';
      }

  // Global Classes

    if( have_rows('theme_colors', 'option') ): while( have_rows('theme_colors', 'option') ): the_row(); 

      $color = get_sub_field('color', 'option');
      $color_class_name = get_sub_field('color_class_name', 'option');

      echo '.'. $color_class_name .'-border{ border-color:' . $color . ';  }';
      echo '.'. $color_class_name .'-bg{ background-color:' . $color . ';  }';
      echo '.'. $color_class_name .'-txt{ color:' . $color . ';  }';
      echo '.btn.'. $color_class_name .'.outline{ background: none; color:' . $color . ';  border: solid 2px ' . $color . ';}';
      echo '.btn.'. $color_class_name .'.outline span{color:' . $color . ';}';
      echo '.btn.'. $color_class_name .'.outline:hover{ color: #FFF; background: ' . $color . ';}';
      echo '.btn.'. $color_class_name .'.solid{ color: #FFF; background: ' . $color . ';}';
      echo '.btn.'. $color_class_name .'-hover:hover{ color: #FFF; background: ' . $color . ' !important;}';
      echo '.btn.'. $color_class_name .'-hvr-txt:hover, .btn.'. $color_class_name .'-hvr-txt:hover span, .'. $color_class_name .'-hvr-txt .btn:hover span{ color: ' . $color . ' !important;}';
      echo '*[class*="hvr"].'. $color_class_name .':before{ background:' . $color . '; border-color:' . $color . ';}';
      
    endwhile; endif;

  // Dynamic CSS

    if (isset($themesettings['global_css'])) { echo $global_css; }

    if (isset($themesettings['tablet_portrait_css'])) { echo '@media screen and (min-width: 700px) and (orientation: portrait){' . $tablet_portrait_css . '}'; }

    if (isset($themesettings['tablet_landscape_css'])) { echo '@media screen and (min-width: 700px) and (orientation: landscape){' . $tablet_landscape_css . '}'; }

    if (isset($themesettings['desktop_css'])) { echo '@media screen and (min-width: 1100px){' . $desktop_css . '}'; }

} ?>