<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'accordion';

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

  $open_icon = get_sub_field('open_tab_icon', $item_id);
  $close_icon = get_sub_field('close_tab_icon', $item_id);

  $item .= '<div class="cdm-item ' . $item_name . '" data-open-icon="' . $open_icon . '" data-close-icon="' . $close_icon . '">';

// Start Item Content

  if( have_rows('accordion', $item_id) ) { 
    while( have_rows('accordion', $item_id) ){
      the_row(); 
      $item .= '<div class="accordion-section';
      $item .= (get_sub_field('custom_class')) ? ' ' . get_sub_field('custom_class') : '';
      $item .= (get_sub_field('open_by_default') == 1) ? ' default-open-tab active-tab' : '';
      $item .= '">';
      $item .= '<div class="accordion-section-header">';
      $item .= (get_sub_field('accordion_tab_title')) ? '<div class="section-title">' . get_sub_field('accordion_tab_title') . '</div>' : '';
      $item .= '<div class="accordion-icon"><i class="';
      $item .= (get_sub_field('open_by_default') == 1) ? ' ' . $close_icon : ' ' . $open_icon;
      $item .= '"></i></div></div>';
      $item .= '<div class="accordion-section-content"';
      $item .= (get_sub_field('open_by_default') == 1) ? ' style="display: block;">' : ' style="display: none;">';

      $item .= (get_sub_field('accordion_tab_content')) ? get_sub_field('accordion_tab_content') : '';
      $item .= '</div>';
      $item .= '</div>';
    }   
  }

// End Item Content

  $item .= '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>