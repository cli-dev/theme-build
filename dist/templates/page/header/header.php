<?php 
  $myoptions = get_option( 'themesettings_');
  $detect = new Mobile_Detect;
  $item_id = (is_blog()) ? get_option( 'page_for_posts' ) : get_the_ID();
  $bg_type = get_field('header_bg_type', $item_id);
  $bg_img = get_field('header_bg_img', $item_id);
  $animation = get_field('add_animation', $item_id);
  $has_bg_img = '';
  if ($bg_type === 'image' ||$bg_type === 'video' || $bg_type === 'parallax' ) {
    $has_bg_img = $bg_img;
  }
  if (get_field('hide_page_header', $item_id) != 1){
    
    $page_header_wrapper  = '<header';
    $page_header_wrapper .= ' class="page-header';
    $page_header_wrapper .= (get_field('header_class', $item_id)) ? ' ' . get_field('header_class', $item_id) : '';
    $page_header_wrapper .= ($myoptions['top_header_position'] === 'header-overlap') ? ' top-padding-overlap' : ' top-margin-overlap';
    $page_header_wrapper .= (!empty($bg_type)) ? ' bg-' . $bg_type : '';
    $page_header_wrapper .= ($animation == 1) ? ' wow' : '';
    $page_header_wrapper .= ($animation == 1) ? ' ' . get_field('animation_effect', $item_id)  : '';
    $page_header_wrapper .= (get_field('site_header_bg_type', $item_id)) ? ' has-sticky-class' : '';
    $page_header_wrapper .= '"';
    $page_header_wrapper .= (!empty($bg_type)) ? ' style="' : '';
    $page_header_wrapper .= (!empty($has_bg_img)) ? ' background-image: url(' . $bg_img . ');' : '';
    $page_header_wrapper .= (!empty($has_bg_img)) ? ' background-position:' . get_field('header_bg_h_position', $item_id) . ' ' . get_field('header_bg_v_position', $item_id) . ';' : '';
    $page_header_wrapper .= ($bg_type === 'parallax' && !$detect->isMobile()) ? ' background-attachment: fixed;' : '';
    $page_header_wrapper .= (!empty($bg_type)) ? '"' : '';
    $page_header_wrapper .= (get_field('site_header_bg_type', $item_id)) ? ' data-sticky-color="' . get_field('site_header_bg_type', $item_id) . '"' : ' data-sticky-color="default"';
    $header_animation = '';
    $header_animation .= (get_field('animation_duration', $item_id)) ? ' data-wow-duration="' . get_field('animation_duration', $item_id) . 's"'  : '';
    $header_animation .= (get_field('animation_delay', $item_id)) ? ' data-wow-delay="' . get_field('animation_delay', $item_id) . 's"'  : '';
    $page_header_wrapper .= ($animation == 1) ? $header_animation : '';
     $page_header_wrapper .= '>';
     echo $page_header_wrapper;

      if($bg_type === 'slider'){
        echo do_shortcode(get_field('slider_shortcode', $item_id));
      } 
      else{
        if ($bg_type === 'video') {
          $video = '<div class="header-bg-video bg-video-inner"';
          $video .= (get_sub_field('header_bg_type', $item_id) === 'video') ? '<div class="header-bg-video bg-video-inner"' : '';
          $video .= (get_field('video_mp4', $item_id)) ? ' data-video-mp4="' . get_field('video_mp4', $item_id) . '"' : '';
          $video .= (get_field('video_ogv', $item_id)) ? ' data-video-ogv="' . get_field('video_ogv', $item_id) . '"' : '';
          $video .= (get_field('video_webm', $item_id)) ? ' data-video-webm="' . get_field('video_webm', $item_id) . '"' : '';
          $video .= '></div>';
          echo $video;
        }
        $page_header_inner  = '<div class="page-header-inner"';
        $page_header_inner .= (!empty($bg_type) && get_field('header_color', $item_id)) ? ' style="background-color: rgba(' . hex2rgb(get_field('header_color', $item_id)) : '';
        $page_header_inner .= (get_field('header_color', $item_id) && get_field('header_bg_overlay_opacity', $item_id)) ? ', ' . get_field('header_bg_overlay_opacity', $item_id) . ');"' : '';
        $page_header_inner .= (!empty($bg_type) && get_field('header_color', $item_id) && empty(get_field('header_bg_overlay_opacity', $item_id))) ? ', 1);"' : '';
        $page_header_inner .= '>';
        echo $page_header_inner;
          $page_header_content = '<div class="page-header-content in-grid direction-' . get_field('header_item_direction', $item_id);
          if(get_field('header_item_direction', $item_id) === 'row'){
            $page_header_content .= ' position-' . get_field('header_item_horizontal_distribution', $item_id);
            $page_header_content .= ' align-' . get_field('header_item_horizontal_alignment', $item_id);
          }
          else{
            $page_header_content .= ' position-' . get_field('header_item_vertical_distribution', $item_id);
            $page_header_content .= ' align-' . get_field('header_item_vertical_alignment', $item_id);
          }
          $page_header_content .= '">';
          echo $page_header_content;
            
            if ((is_single() && $myoptions['news_title'] == 1) || is_page() || is_home()){ 
              get_template_part(pageheader . 'content'); 
            }
          // End .page-header-content
          echo '</div>';
        // End .page-header-inner
        echo '</div>';
      }

    // End .page-header
    echo '</header>';
  }
?>