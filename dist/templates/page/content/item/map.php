<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'map';

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

  $default_marker = get_sub_field('map_marker', $item_id);

  echo $item;

  if( have_rows('locations', $item_id) ){

    $locations = '<div class="map-markers">';

    while ( have_rows('locations', $item_id) ) { 
      the_row();
  
      $location = get_sub_field('location', $item_id); 

      $locations .= '<div class="map-marker" data-lat="' . $location['lat'] . '" data-lng="' . $location['lng'] . '"';
      $locations .= (isset($location['custom_marker'])) ? ' data-icon="' . $location['custom_marker'] . '"' : ' data-icon="' . $default_marker . '"';
      $locations .= '>';

      echo $locations;

      get_template_part('templates/rowlayout', 'location');
      
      echo '</div>';

    }

    echo '</div>';

  }

// End Item Content

  echo '</div>';

// End Item Inner Container

  echo '</div>';

// End Item Outer Container


?>