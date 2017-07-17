<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'button';

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

  $item .= '<a href="';
  $item .= (get_sub_field('link_type', $item_id) === 'internal') ? get_permalink(get_sub_field('internal_link', $item_id)) . '"' : '';
  $item .= (get_sub_field('link_type', $item_id) === 'external') ? get_sub_field('external_link', $item_id) . '" target="_blank"' : '';
  $item .= ' class="btn';
  $item .= ' ' . get_sub_field('button_type', $item_id);
  $item .= (get_sub_field('solid_initial_state', $item_id)) ? ' ' . get_sub_field('solid_initial_state', $item_id) : '';
  $item .= (get_sub_field('solid_hover_state', $item_id)) ? ' ' . get_sub_field('solid_hover_state', $item_id) . '-hover' : '';
  $item .= (get_sub_field('outline_type', $item_id)) ? ' ' . get_sub_field('outline_type', $item_id) : '';
  $item .= '">';
  $item .= (get_sub_field('text', $item_id)) ? '<span class="btn-txt">' . get_sub_field('text', $item_id) . '</span>' : '<span class="btn-txt">Link Text</span>';
  $item .= '</a>';

// End Item Content

  $item .= '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>