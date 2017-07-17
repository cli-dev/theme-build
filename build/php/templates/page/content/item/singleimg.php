<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'image';

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

  $item .= '<div class="cdm-item ' . $item_name;
  $item .= (get_sub_field('display_title', $item_id) == 1) ? ' ' . get_sub_field('title_position', $item_id) : ' no-title';
  $item .= '">';

  echo $item;

// Start Item Content

  $image = get_sub_field('single_image', $item_id);
  $size = get_sub_field('single_image_size', $item_id);
  
  echo wp_get_attachment_image($image['id'], $size);
  echo (get_sub_field('display_title', $item_id) == 1) ? '<div class="cdm-' . $item_name . '-title">' . $image['title'] . '</div>' : '';

// End Item Content

  echo '</div>';

// End Item Inner Container

  echo '</div>';

// End Item Outer Container

?>