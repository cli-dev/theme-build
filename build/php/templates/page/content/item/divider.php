<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'divider';

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

  $item .= '<div class="cdm-item ' . $item_name . '" style="';
  $item .= (get_sub_field('width_percentage', $item_id)) ? ' width: ' . get_sub_field('width_percentage', $item_id) . '%;' : ' width: ' . get_sub_field('width_pixels', $item_id) . 'px;';
  $item .= (get_sub_field('color', $item_id)) ? ' background-color: ' . get_sub_field('color', $item_id) . ';' : '';
  $item .= (get_sub_field('height', $item_id)) ? ' height: ' . get_sub_field('height', $item_id) . 'px;' : '';
  $item .= (get_sub_field('margin_top', $item_id)) ? ' margin-top: ' . get_sub_field('margin_top', $item_id) . 'px;' : '';
  $item .= (get_sub_field('margin_bottom', $item_id)) ? ' margin-bottom: ' . get_sub_field('margin_bottom', $item_id) . 'px;' : '';
  $item .= (get_sub_field('center_divider', $item_id)) ? ' margin-left: auto; margin-right: auto;' : '';
  $item .= (get_sub_field('margin_left', $item_id)) ? ' margin-left: ' . get_sub_field('margin_left', $item_id) . 'px;' : '';
  $item .= (get_sub_field('margin_right', $item_id)) ? ' margin-right: ' . get_sub_field('margin_right', $item_id) . 'px;' : '';
  $item .= '"></div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>