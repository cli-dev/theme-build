<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'location';

// Start Item Outer Container

  $item = '<div';
  $item .= ' class="cdm-item-wrapper ' . $item_name . '-wrapper';
  $item .= '"'; 
  $item .= '>';

// Start Item Inner Container

  $item .= '<div class="cdm-item ' . $item_name . '">';

// Start Item Content
  
  $location = (!empty(get_sub_field('location', $item_id))) ? explode( ',', get_sub_field('location', $item_id), 2 ) : '';
  $location_address = (!empty(get_sub_field('location', $item_id))) ? '<p class="location-address"><span class="address-line-1">' . $location[0] . '</span><span class="address-line-2">' . $location[0] . '</span></p>' : '';
  
  $item .= '<div class="location-title-wrapper">';
  $item .= (get_sub_field('company_logo', $item_id)) ? '<div class="location-logo" style="background: url(' . get_sub_field('company_logo', $item_id) . ') center no-repeat; background-size: contain;"></div>' : '';
  $item .= (get_sub_field('title', $item_id)) ? '<h4 class="location-title">' . get_sub_field('title', $item_id) . '</h4>' : '';
  $item .= '</div>';
  $item .= $location_address;
  $item .= (get_sub_field('phone', $item_id)) ? '<p class="location-phone">' . get_sub_field('phone', $item_id) . '</p>' : '';
  $item .= (get_sub_field('phone', $item_id)) ? '<p class="location-website"><a href="' . get_sub_field('website', $item_id) . '" target="_blank">' . get_sub_field('website', $item_id) . '</a></p>' : '';

// End Item Content

  $item .= '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>