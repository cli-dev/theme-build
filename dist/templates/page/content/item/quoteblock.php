<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'quote';

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

  $item .= '<div';
  $item .= ' class="cdm-item ' . $item_name;
  $item .= '">';

// Start Item Content

  $item .= (get_sub_field('quote_block_title', $item_id)) ? '<h3 class="quote-title"' : '';
  $item .= (get_sub_field('quote_block_title', $item_id) && get_sub_field('quote_block_title_color', $item_id)) ? 'style="color: ' . get_sub_field('quote_block_title_color', $item_id) . ';">' : '';
  $item .= (get_sub_field('quote_block_title', $item_id)) ? '>' . get_sub_field('quote_block_title', $item_id) . '</h3>' : '';
  $item .= '<p class="quote-text"';
  $item .= (get_sub_field('quote_block_text_color', $item_id)) ? 'style="color: ' . get_sub_field('quote_block_text_color', $item_id) . ';">' : '>';
  $item .= get_sub_field('quote_block_text', $item_id);
  $item .= '</p>';
  $item .= (get_sub_field('quote_block_author', $item_id)) ? '<p class="quote-author"' : '';
  $item .= (get_sub_field('quote_block_author', $item_id) && get_sub_field('quote_block_author_color', $item_id)) ? 'style="color: ' . get_sub_field('quote_block_author_color', $item_id) . ';">' : '';
  $item .= (get_sub_field('quote_block_author', $item_id)) ? '>' . get_sub_field('quote_block_author', $item_id) . '</p>' : '';

// End Item Content

  $item .= '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>