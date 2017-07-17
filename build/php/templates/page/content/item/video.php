<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'video';

// Start Item Outer Container

  $item = '<div';
  $item .= ' class="cdm-item-wrapper ' . $item_name . '-wrapper';
  $item .= (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
  $item .= (get_sub_field('animation', $item_id) == 1) ? ' wow' : '';
  $item .= (get_sub_field('animation_effect', $item_id)) ? ' ' . get_sub_field('animation_effect', $item_id)  : '';
  $item .= '"'; 

  // Item Animation

    $animation  = (get_sub_field('animation_duration')) ? ' data-wow-duration="' . get_sub_field('animation_duration', $item_id) . 's"'  : '';
    $animation .= (get_sub_field('animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('animation_delay', $item_id) . 's"'  : '';
    $animation .=  (get_sub_field('animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('animation_offset', $item_id) . '"'  : '';
    $item .= (get_sub_field('animation', $item_id) == 1) ? $animation : '';

  $item .= '>';

// Start Item Inner Container

  $item .= '<div class="cdm-item ' . $item_name . ' embedded-item"';

// Start Item Content
  
  $item .= (get_sub_field('link_type', $item_id) === 'internal' && !empty(get_sub_field('video_mp4', $item_id))) ? ' data-video-mp4="' . get_sub_field('video_mp4', $item_id) . '"' : '';
  $item .= (get_sub_field('link_type', $item_id) === 'internal' && !empty(get_sub_field('video_ogv', $item_id))) ? ' data-video-ogv="' . get_sub_field('video_ogv', $item_id) . '"' : '';
  $item .= (get_sub_field('link_type', $item_id) === 'internal' && !empty(get_sub_field('video_webm', $item_id))) ? ' data-video-webm="' . get_sub_field('video_webm', $item_id) . '"' : '';
  $item .= '>';
  $item .= (get_sub_field('link_type', $item_id) === 'external' && !empty(get_sub_field('item_external_video', $item_id))) ? get_sub_field('item_external_video', $item_id) : '';

// End Item Content

  $item .= '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>