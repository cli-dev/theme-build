<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'hover-box';

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

  $item_link  = '<a href="';
  $item_link .= (get_sub_field('link_type', $item_id) === 'Internal') ? get_permalink( get_sub_field('site_link', $item_id)) . '"' : get_sub_field('external_link', $item_id) . '"';
  $item_link .= (get_sub_field('link_type', $item_id) === 'External') ? 'target="_blank"' : '';

  $item .= (get_sub_field('link_box', $item_id) == 1) ? $item_link : '<div';
  $item .= ' class="cdm-item ' . $item_name;
  $item .= ' effect-' . get_sub_field('hover_effect', $item_id) . '"';
  $item .= (get_sub_field('minimum_height', $item_id)) ? ' style="min-height: ' . get_sub_field('minimum_height', $item_id) . 'px;"' : '';
  $item .= '>';

// Start Item Content

  $item_bg_color = (get_sub_field('background_color', $item_id)) ? ' background-color: ' . get_sub_field('background_color', $item_id) . '; ' : '';

  $item_bg_image = (get_sub_field('box_image', $item_id)) ? ' background-image: url(' . get_sub_field('box_image', $item_id) . ');' : '';

  $item .= ($item_bg_color || $item_bg_image) ? '<div class="box-img" style="' . $item_bg_color . $item_bg_image .'"></div>' : '';

  $item .= '<div class="box-content">';
  $item .= '<div class="box-title">';
  $item .= '<div class="box-title-inner">';
  $item .= get_sub_field('box_title', $item_id);
  $item .= '</div>';
  $item .= '</div>';
  $item .= '<div class="box-txt">';
  $item .= '<div class="box-txt-inner">';
  $item .= get_sub_field('box_content', $item_id);
  $item .= '</div>';
  $item .= '</div>';
  $item .= '</div>';

// End Item Content

  $item .= (get_sub_field('link_box', $item_id) == 1) ? '</a>' : '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>