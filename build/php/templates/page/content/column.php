<?php
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$detect = new Mobile_Detect;
$col_index = 0;

if( have_rows('columns', $item_id) ): while( have_rows('columns', $item_id) ): the_row(); 

  $col_index++;
  // Start Column Outer Tag
    $column  = '<';
    $column .= (get_sub_field('link_column', $item_id) == 1) ? 'a href="' : 'div';
    $column .= (get_sub_field('link_column', $item_id) == 1 && (get_sub_field('link_type', $item_id) === 'Internal')) ? get_permalink(get_sub_field('internal_link', $item_id)) . '"' : '';
    $column .= (get_sub_field('link_column', $item_id) == 1 && (get_sub_field('link_type', $item_id) === 'External')) ? get_sub_field('external_link', $item_id) . '" target="_blank"' : '';
    $column .= ' class="cdm-column cdm-column-wrapper column-' . $col_index;
    $column .= (get_sub_field('column_custom_class', $item_id)) ? ' ' .  get_sub_field('column_custom_class', $item_id) : '';
    $column .= ' col-' . get_sub_field('column_width', $item_id);
    $column .= get_sub_field('custom_column_alignment', $item_id) ? ' single-align-' . get_sub_field('custom_column_alignment', $item_id) : '';  
    $column .= (get_sub_field('remove_col_padding', $item_id) == 1) ? ' no-padding' : '';
    $column .= (get_sub_field('column_add_animation', $item_id)) ? ' wow' : '';
    $column .= (get_sub_field('column_animation_effect', $item_id)) ? ' ' . get_sub_field('column_animation_effect', $item_id) : '';
    $column .= '">';
  // End Column Outer Tag
  // Start Column Inner Tag
    $column .= '<div class="cdm-column-inner';
    $column .= (get_sub_field('inner_column_class', $item_id)) ? ' ' . get_sub_field('inner_column_class', $item_id) : '';
    $column .= ' direction-' . get_sub_field('content_direction', $item_id);
    $column .= (get_sub_field('content_direction', $item_id) === 'row' && get_sub_field('content_horizontal_alignment', $item_id)) ? ' align-' . get_sub_field('content_horizontal_alignment', $item_id) : '';
    $column .= (get_sub_field('content_direction', $item_id) === 'row' && get_sub_field('content_horizontal_position', $item_id)) ? ' position-' . get_sub_field('content_horizontal_position', $item_id) : '';
    $column .= (get_sub_field('content_direction', $item_id) === 'column' && get_sub_field('content_vertical_alignment', $item_id)) ? ' align-' . get_sub_field('content_vertical_alignment', $item_id) : '';
    $column .= (get_sub_field('content_direction', $item_id) === 'column' && get_sub_field('content_vertical_position', $item_id)) ? ' position-' . get_sub_field('content_vertical_position', $item_id) : '';
    $column .= (get_sub_field('column_background_image', $item_id)) ? ' bg-image' : '';
    $column .= (get_sub_field('header_class', $item_id)) ? ' has-sticky-class' : '';
    $column .= '"';
    $column .= (get_sub_field('header_class', $item_id)) ? ' data-sticky-color="' . get_sub_field('header_class', $item_id) . '"' : '';
    $column .= (get_sub_field('column_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('column_animation_delay', $item_id) . 's"' : '';
    $column .= (get_sub_field('column_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('column_animation_offset', $item_id) . '"' : '';
    $column .= (get_sub_field('column_background_image', $item_id) || get_sub_field('column_background_color', $item_id)) ? ' style="' : '';
    $column .= (get_sub_field('column_background_image', $item_id)) ? ' background-image: url(' . get_sub_field('column_background_image', $item_id) . ');' : '';
    $column .= (get_sub_field('column_background_color', $item_id) && get_sub_field('column_background_color_opacity', $item_id)) ? ' box-shadow: inset 0 0 2000px rgba(' . hex2rgb(get_sub_field('column_background_color', $item_id)) . ',' . get_sub_field('column_background_color_opacity', $item_id) . ');' : '';
    $column .= (get_sub_field('column_background_color', $item_id) && empty(get_sub_field('column_background_color_opacity', $item_id))) ? ' background-color: ' . get_sub_field('column_background_color', $item_id) . ';' : '';
    $column .= (get_sub_field('column_background_image', $item_id) || get_sub_field('column_background_color', $item_id)) ? '"' : '';
    $column .= '>';
  // End Column Inner Tag
  echo $column; 
    if( have_rows('column_content', $item_id) ) { 
      while ( have_rows('column_content', $item_id) ) {
        the_row(); 
        if ( get_row_layout() == 'text' ) { 
          get_template_part(pageitem . 'text');
        }
        else if ( get_row_layout() == 'raw_html' ) { 
          get_template_part(pageitem . 'html');
        }         
        else if ( get_row_layout() == 'button' ) { 
          get_template_part(pageitem . 'button'); 
        }
        else if ( get_row_layout() == 'single_image' ) { 
          get_template_part(pageitem . 'singleimg'); 
        } 
        else if ( get_row_layout() == 'facebook' ) { 
          get_template_part(pageitem . 'facebook'); 
        } 
        else if ( get_row_layout() == 'twitter_feed' ) { 
          get_template_part(pageitem . 'twitter'); 
        }  
        else if ( get_row_layout() == 'instagram_block' ) { 
          get_template_part(pageitem . 'instagram'); 
        } 
        else if ( get_row_layout() == 'blog_feed' ) { 
          get_template_part(pageitem . 'blogfeed'); 
        } 
        else if ( get_row_layout() == 'open_positions_grid' ) { 
          get_template_part(pageitem . 'positionsgrid'); 
        }
        else if ( get_row_layout() == 'single_position_box' ) { 
          get_template_part(pageitem . 'singleposition'); 
        } 
        else if ( get_row_layout() == 'divider' ) { 
          get_template_part(pageitem . 'divider');
        } 
        else if ( get_row_layout() == 'social_profiles' ) { 
          get_template_part(pageitem . 'socialprofiles');
        }
        else if ( get_row_layout() == 'team_grid' ) { 
          get_template_part(pageitem . 'team');
        }
        else if ( get_row_layout() == 'google_map' ) { 
          $handle = 'googleMaps';
          $list = 'enqueued';
          if (wp_script_is( $handle, $list )) {
              return;
          } else {
              wp_enqueue_script( 'googleMaps' );
          }
          get_template_part(pageitem . 'map');
        } 
        else if ( get_row_layout() == 'quote_block' ) { 
          get_template_part(pageitem . 'quoteblock');
        }
        else if ( get_row_layout() == 'flickr_feed' ) { 
          get_template_part(pageitem . 'flickr');
        }
        else if ( get_row_layout() == 'hover_box' ) { 
          get_template_part(pageitem . 'hoverbox');
        }
        else if ( get_row_layout() == 'image_gallery' ) { 
          get_template_part(pageitem . 'gallery');
        }
        else if ( get_row_layout() == 'vertical_accordion' ) { 
          get_template_part(pageitem . 'accordion');
        }
        else if ( get_row_layout() == 'tabs' ) { 
          get_template_part(pageitem . 'tabs');
        }
        else if ( get_row_layout() == 'custom_icon' ) { 
          get_template_part(pageitem . 'icon');
        }
        else if ( get_row_layout() == 'inline_svg' ) { 
          get_template_part(pageitem . 'svg');
        }
        else if ( get_row_layout() == 'custom_shortcode' ) { 
          get_template_part(pageitem . 'shortcode');
        }
        else if ( get_row_layout() == 'video' ) { 
          get_template_part(pageitem . 'video');
        }
        else if ( get_row_layout() == 'testimonials' ) { 
          get_template_part(pageitem . 'testimonials');
        }
      }
    }
  echo '</div>';
  echo (get_sub_field('link_column', $item_id) == 1) ? '</a>' : '</div>';

endwhile; endif; ?>