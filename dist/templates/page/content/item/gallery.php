<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'gallery';
$item_type = get_sub_field('grid_type', $item_id);
$images = get_sub_field('images', $item_id);

  if($images){

    // Start Item Outer Container

      $item = '<div';
      $item .= (get_sub_field('id', $item_id)) ? ' id="' . seoUrl(get_sub_field('id', $item_id)) . '"' : '';
      $item .= ' class="col-item cdm-' . $item_name . '-wrapper';
      $item .= (get_sub_field('class', $item_id)) ? ' ' . get_sub_field('class', $item_id) : '';
      $item .= (get_sub_field('animation', $item_id) == 1) ? ' wow' : '';
      $item .= (get_sub_field('animation_effect', $item_id)) ? ' ' . get_sub_field('animation_effect', $item_id)  : '';
      $item .= '"'; 

      // Item Animation

        $item .= (get_sub_field('animation_duration')) ? ' data-wow-duration="' . get_sub_field('animation_duration', $item_id) . 's"'  : '';
        $item .= (get_sub_field('animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('animation_delay', $item_id) . 's"'  : '';
        $item .=  (get_sub_field('animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('animation_offset', $item_id) . '"'  : '';
        $item .= (get_sub_field('add_animation', $item_id) == 1) ? $animation : '';

      $item .= '>';


    // Start Item Inner Container

      $grid_items_sml = (get_sub_field('col_m', $item_id)) ? get_sub_field('col_m', $item_id) : '1';
      $grid_items_mds = (get_sub_field('col_m', $item_id)) ? get_sub_field('col_m', $item_id) : '1';
      $grid_items_md  = (get_sub_field('col_t', $item_id)) ? get_sub_field('col_t', $item_id) : '1';
      $grid_items_mdl = (get_sub_field('col_t', $item_id)) ? get_sub_field('col_t', $item_id) : '1';
      $grid_items_lrg = (get_sub_field('col_d', $item_id)) ? get_sub_field('col_d', $item_id) : '1';

      $gutters_sml = (get_sub_field('gutters_m', $item_id)) ? get_sub_field('gutters_m', $item_id) : '0';
      $gutters_mds = (get_sub_field('gutters_m', $item_id)) ? get_sub_field('gutters_m', $item_id) : '0';
      $gutters_md  = (get_sub_field('gutters_t', $item_id)) ? get_sub_field('gutters_t', $item_id) : '0';
      $gutters_mdl = (get_sub_field('gutters_t', $item_id)) ? get_sub_field('gutters_t', $item_id) : '0';
      $gutters_lrg = (get_sub_field('gutters_d', $item_id)) ? get_sub_field('gutters_d', $item_id) : '0';

      $item .= '<div';
      $item .= ' class="col-item-inner ' . $item_name;
      switch ($item_type) {
        case 'carousel':
          $item .= ' cdm-slider"';
          $item .= ' data-slider-id="' . seoUrl(get_sub_field('id', $item_id)) . '"';
          $item .= ' data-slider-items="' . $grid_items_sml . '"';
          $item .= ' data-slider-slideby="page"';
          $item .= (get_sub_field('carousel_loop', $item_id) == 1) ? ' data-slider-loop="true"' : ' data-slider-loop="false"';
          $item .= ' data-slider-gutter="' . $gutters_sml . '"';
          $item .= ' data-slider-gutter-sml="' . $gutters_sml . '"';
          $item .= ' data-slider-gutter-mds="' . $gutters_mds . '"';
          $item .= ' data-slider-gutter-md="' . $gutters_md . '"';
          $item .= ' data-slider-gutter-mdl="' . $gutters_mdl . '"';
          $item .= ' data-slider-gutter-lrg="' . $gutters_lrg . '"';
          $item .= (get_sub_field('carousel_thumbs', $item_id) == 1) ? ' data-slider-thumbs="true" data-slider-dots="false"' : ' data-slider-thumbs="false" data-slider-dots="true"';
          $item .= (get_sub_field('carousel_nav', $item_id) == 1) ? ' data-slider-nav="true"' : ' data-slider-nav="false"';
          $item .= (get_sub_field('carousel_auto_height', $item_id) == 1) ? ' data-slider-autoheight="true"' : ' data-slider-autoheight="false"';
          $item .= (get_sub_field('carousel_autplay', $item_id) == 1) ? ' data-slider-autoplay="true"' : ' data-slider-autoplay="false"';
          $item .= ' data-slider-autoplay-timeout="0"';
          $item .= ' data-slider-items-sml="' . $grid_items_sml . '"';
          $item .= ' data-slider-items-mds="' . $grid_items_mds . '"';
          $item .= ' data-slider-items-md="' . $grid_items_md . '"';
          $item .= ' data-slider-items-mdl="' . $grid_items_mdl . '"';
          $item .= ' data-slider-items-lrg="' . $grid_items_lrg . '">';
          break;

        case 'masonry':
          $item .= ' cdm-masonry">';
          //$item .= '<div class="gutter-sizer"></div>';
          break;
        
        default:
          $item .= ' cdm-grid"';
          
          $item .= ' data-grid-items-sml="' . $grid_items_sml . '"';
          $item .= ' data-grid-items-mds="' . $grid_items_mds . '"';
          $item .= ' data-grid-items-md="' . $grid_items_md . '"';
          $item .= ' data-grid-items-mdl="' . $grid_items_mdl . '"';
          $item .= ' data-grid-items-lrg="' . $grid_items_lrg . '">';
          break;
      }

    // Start Item Content

      foreach( $images as $image ){
        $imgHeight = intval($image['sizes']['medium-height']);
        $imgWidth = intval($image['sizes']['medium-width']);       
        if ($imgWidth > $imgHeight) {
          $imgSize = 'landscape';
        } else if ($imgWidth < $imgHeight) {
          $imgSize = 'portrait';
        } else{
          $imgSize = 'square';
        }
        
        $item .= '<div class="gallery-item';
        $item .= ' sml-col-' . $grid_items_sml;
        $item .= ' mds-col-' . $grid_items_mds;
        $item .= ' md-col-' . $grid_items_md;
        $item .= ' mdl-col-' . $grid_items_mdl;
        $item .= ' lrg-col-' . $grid_items_lrg . '">';
        $item .= '<a href="' . $image['url'] . '"';
        $item .= ' data-fancybox="' . get_sub_field('id', $item_id) . '"';
        $item .= ' data-type="image"';
        $item .= ' data-srcset="' . wp_get_attachment_image_srcset($image['id'], 'full') . '"';
        $item .= (get_sub_field('add_titles_full', $item_id) == 1) ? ' title="' . $image['title'] . '"' : '';
        $item .= (get_sub_field('add_captions_full', $item_id) == 1) ? ' data-caption="' . $image['caption'] . '"' : '';
        $item .= ' class="gallery-img-link ' . $imgSize . '"';
        $item .= '>';
        $item .= '<span class="hover-panel"';
        $item .= (get_sub_field('hover_color', $item_id)) ? ' style="background-color: rgba(' . hex2rgb(get_sub_field('hover_color', $item_id)) : '';
        $item .= (get_sub_field('hover_color_opacity', $item_id)) ? ',' . get_sub_field('hover_color_opacity', $item_id) . ');"' : ',0);"';
        $item .= '><i class="img-zoom elegant-icon icon_zoom-in_alt"';
        $item .= (get_sub_field('hover_icon_color', $item_id)) ? ' style="color: ' . get_sub_field('hover_icon_color', $item_id) . '"></i></span>' : '></i></span>';
        $item .= '<img src="' . $image['sizes']['large'] . '" width="' . $image['sizes']['large-width'] . '" height="' . $image['sizes']['large-height'] . '" title="' . $image['title'] . '" alt="' . $image['alt'] . '" srcset="' . wp_get_attachment_image_srcset($image['id'], 'large') . '" class="gallery-img" />';
        $item .= '</a>';
        $item .= (get_sub_field('add_titles_grid', $item_id) == 1) ? '<h4 class="gallery-img-title">' . $image['title'] . '</h4>' : '';
        $item .= (get_sub_field('add_captions_grid', $item_id) == 1) ? '<p class="gallery-img-caption">' . $image['caption'] . '</p>' : '';
        $item .= '</div>';
        
      }

    // End Item Content

      $item .= '</div>';

      if (get_sub_field('carousel_thumbs', $item_id) == 1) {
        $item .= '<div class="cdm-slider-thumbs"';
        $item .= ' data-slider-id="' . seoUrl(get_sub_field('id', $item_id)) . '">';
        foreach( $images as $image ){
          $imgHeight = intval($image['sizes']['medium-height']);
          $imgWidth = intval($image['sizes']['medium-width']);       
          if ($imgWidth > $imgHeight) {
            $imgSize = 'landscape';
          } else if ($imgWidth < $imgHeight) {
            $imgSize = 'portrait';
          } else{
            $imgSize = 'square';
          }
          $item .= '<button class="cdm-slider-thumb"><div class="cdm-slider-img-thumb';
          $item .= ' ' . $imgSize;
          $item .= '" style="background: url(' . $image['sizes']['medium'] . ') center no-repeat; background-size: cover;"></div>';
          $item .= '</button>';
          
        }
        $item .= '</div>';
      }

    // End Item Inner Container

      $item .= '</div>';

    // End Item Outer Container

    echo $item;

  }

?>

