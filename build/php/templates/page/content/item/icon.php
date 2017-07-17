<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'icon';

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

  $item .= '<div class="cdm-item ' . $item_name . '">';

// Start Item Content

  $item .= '<i class="';
  $item .= get_sub_field('icon_family', $item_id);
  $item .= (get_sub_field('icon_family', $item_id) === 'fa') ? ' ' . get_sub_field('font_awesome_icon', $item_id) : '';
  $item .= (get_sub_field('icon_family', $item_id) === 'elegant-icon') ? ' ' . get_sub_field('elegant_icon', $item_id) : '';
  $item .= (get_sub_field('icon_family', $item_id) === 'cli') ? ' ' . get_sub_field('theme_icon', $item_id) : '';
  $item .= (get_sub_field('icon_family', $item_id) === 'custom') ? ' ' . get_sub_field('custom_icon_class', $item_id) : '';
  $item .= '"></i>';

// End Item Content

  $item .= '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>