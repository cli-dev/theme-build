<?php
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$detect = new Mobile_Detect;
$row_index = 0;

if( have_rows('row', $item_id) ){

  while( have_rows('row', $item_id) ) {

    the_row(); 
    $row_index++;

    $bg_type = get_sub_field('row_bg_type', $item_id);
    $bg_img = get_sub_field('row_bg_img', $item_id);
    $bg_color = get_sub_field('row_bg_color', $item_id);

    // start .row-wrapper
      $row  = '<div';
      $row .= (get_sub_field('row_id', $item_id)) ? ' id="' .  get_sub_field('row_id', $item_id) . '"' : '';
      $row .= ' class="cdm-row-wrapper';
      $row .= (is_blog()) ? ' blog' : ' ' . the_slug($item_id);
      $row .= '-row-' . $row_index;
      $row .= (get_sub_field('row_outer_class', $item_id)) ? ' ' .  get_sub_field('row_outer_class', $item_id) : '';
      $row .= (get_sub_field('remove_row_padding', $item_id) == 1) ? ' no-padding' : '';
      $row .= (get_sub_field('row_add_animation', $item_id)) ? ' wow' : '';
      $row .= (get_sub_field('row_animation_effect', $item_id)) ? ' ' . get_sub_field('row_animation_effect', $item_id) : '';
      $row .= ($bg_type) ? ' bg-' . $bg_type : '';
      $row .= '"';
      $row .= (get_sub_field('row_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('row_animation_delay', $item_id) . 's"' : '';
      $row .= (get_sub_field('row_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('row_animation_offset', $item_id) . '"' : '';
      $row .= (get_sub_field('row_animation_duration', $item_id)) ? ' data-wow-duration="' . get_sub_field('row_animation_duration', $item_id) . '"' : '';
      if ($bg_type === 'video' || $bg_type === 'parallax' || $bg_type === 'image') {
        $row .= ' style="';
        $row .= ($bg_img) ? ' background-image: url(' . $bg_img . ');' : '';
        $row .= ($bg_img) ? ' background-position:' : '';
        $row .= ($bg_img) ? ' ' . get_sub_field('row_bg_h_position', $item_id) . ' ' . get_sub_field('row_bg_v_position', $item_id) . ';' : '';
        $row .= ($bg_type === 'parallax' && !$detect->isMobile()) ? ' background-attachment: fixed;' : '';
        $row .= '">';
        
      } else {
        $row .= '>';
      }
      if ($bg_type === 'video') {
        $row .= '<div class="row-bg-video bg-video"';
        $row .= (get_field('video_mp4', $item_id)) ? ' data-video-mp4="' . get_field('video_mp4', $item_id) . '"' : '';
        $row .= (get_field('video_ogv', $item_id)) ? ' data-video-ogv="' . get_field('video_ogv', $item_id) . '"' : '';
        $row .= (get_field('video_webm', $item_id)) ? ' data-video-webm="' . get_field('video_webm', $item_id) . '"' : '';
        $row .= '></div>';
      }
      // start .row-inner
        $row .= '<div class="cdm-row-inner"';
        if ($bg_color) {
          $row .= ' style="background-color: rgba(';
          $row .= hex2rgb($bg_color);
          $row .= (get_sub_field('row_bg_color_opacity', $item_id)) ? ', ' . get_sub_field('row_bg_color_opacity', $item_id) . ');' : ', 1);';
        }
        $row .= '>';
        $row .= '<div class="cdm-row-content-wrapper';
        $row .= (get_sub_field('row_inner_class', $item_id)) ? ' ' . get_sub_field('row_inner_class', $item_id) : '';
        $row .= (get_sub_field('add_row_gutters', $item_id) == 1) ? ' has-col-gutters' : '';
        $row .= (get_sub_field('is_in_grid', $item_id) == 1) ? ' in-grid' : '';
        $row .= '"';
        $row .= '>';
          // start .row-content
            $row .= '<div class="cdm-row-content-inner';
            $row .= ' direction-' . get_sub_field('column_direction', $item_id);
            $row .= (get_sub_field('add_row_gutters', $item_id) == 1) ? ' col-gutters' : '';
            $row .= (get_sub_field('column_direction', $item_id) === 'row' && get_sub_field('horizontal_alignment', $item_id)) ? ' align-' . get_sub_field('horizontal_alignment', $item_id) : '';
            $row .= (get_sub_field('column_direction', $item_id) === 'row' && get_sub_field('horizontal_position', $item_id)) ? ' position-' . get_sub_field('horizontal_position', $item_id) : '';
            $row .= (get_sub_field('column_direction', $item_id) === 'column' && get_sub_field('vertical_alignment', $item_id)) ? ' align-' . get_sub_field('vertical_alignment', $item_id) : '';
            $row .= (get_sub_field('column_direction', $item_id) === 'column' && get_sub_field('vertical_position', $item_id)) ? ' position-' . get_sub_field('vertical_position', $item_id) : '';
            $row .= '"';
            $row .= '>';
            echo $row; 
            get_template_part(pagecontent . 'column');
            echo '</div>';
          // end .row-content
        echo '</div>';
        echo '</div>';
      // end .row-inner
      echo '</div>';
    // end .row-wrapper
  }
}

?>