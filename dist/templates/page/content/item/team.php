<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'team';
$item_type = get_sub_field('grid_type', $item_id);
$team_category_ids = '';
$categories = (get_sub_field('category', $item_id)) ? get_sub_field('category', $item_id) : '';
if ($categories) {
  $terms = array();
  foreach ($categories as $category) {
    array_push($terms, $category);
  }
  $team_category_ids = array(
    array(
      'taxonomy' => 'team_cat',
      'field' => 'term_id',
      'terms' => $terms,
    )
  );
}

$teamArgs = array (
  'post_type' => array( 'team_member' ),
  'posts_per_page' => '-1',
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'tax_query' => $team_category_ids,
);
$teamGridQuery = new WP_Query( $teamArgs );

  if ( $teamGridQuery->have_posts() ) {

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
      $item .= ' info-position-' . get_sub_field('info_location', $item_id);
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

      while ( $teamGridQuery->have_posts() ) { 
        $teamGridQuery->the_post();
        $position = get_field('position');
        $bio = get_field('bio');
        $member_info  = '<div class="team-member-info">';
        $member_info .= '<h4 class="team-member-title">' . get_the_title() . '</h4>';
        $member_info .= ($position) ? '<p class="team-member-position">' . $position . '</p>' : '';
        $member_info .= '</div>';
        $btn_classes  = (get_sub_field('btn_classes', $item_id)) ? ' ' . get_sub_field('btn_classes', $item_id) : '';
        $img_id = get_post_thumbnail_id();
        $img_size = 'large';
        $img_array = wp_get_attachment_image_src($img_id, $img_size, true);
        $img_url = $img_array[0];
        $img_width = $img_array[1];
        $img_height = $img_array[2];
        $img_srcset = wp_get_attachment_image_srcset($img_id, $img_size);
        $imgHeight = intval($img_height);
        $imgWidth = intval($img_width);       
        if ($imgWidth > $imgHeight) {
          $imgSize = 'landscape';
        } else if ($imgWidth < $imgHeight) {
          $imgSize = 'portrait';
        } else{
          $imgSize = 'square';
        }


        $item .= '<div class="team-member';
        $item .= ' sml-col-' . $grid_items_sml;
        $item .= ' mds-col-' . $grid_items_mds;
        $item .= ' md-col-' . $grid_items_md;
        $item .= ' mdl-col-' . $grid_items_mdl;
        $item .= ' lrg-col-' . $grid_items_lrg . '">';
        $item .= ($bio) ? '<a href="javascript:;" data-src="#' . seoUrl(get_the_title()) . '"' : '<div';
        $item .= ($bio) ? ' data-fancybox="' . seoUrl(get_sub_field('id', $item_id)) . '"' : '';
        $item .= ($bio) ? ' data-type="inline"' : '';
        $item .= ' class="team-member-img-wrapper ' . $imgSize . '"';
        $item .= '>';
        $item .= '<span class="hover-panel"';
        $item .= (get_sub_field('hover_color', $item_id)) ? ' style="background-color: rgba(' . hex2rgb(get_sub_field('hover_color', $item_id)) : '';
        $item .= (get_sub_field('hover_color_opacity', $item_id)) ? ',' . get_sub_field('hover_color_opacity', $item_id) . ');"' : ',0);"';
        $item .= '><span class="hover-panel-inner">';
        $item .= (get_sub_field('info_location', $item_id) === 'hover') ? $member_info : '';
        $item .= ($bio) ? '<span class="bio-btn btn' . $btn_classes . '">View Bio</span>' : '';
        $item .= '</span></span>';
        $item .= (has_post_thumbnail()) ?'<img src="' . $img_url . '" width="' . $img_width . '" height="' . $img_height . '" title="' . get_the_title() . '" alt="' . get_the_title() . '" srcset="' .$img_srcset . '" class="team-member-img" />' : '';
        $item .= ($bio) ? '</a>' : '</div>';
        $item .= (get_sub_field('info_location', $item_id) !== 'hover') ? $member_info : '';
        $item .= '</div>';

      }
      

    // End Item Content

      $item .= '</div>';

      $teamGridQuery->rewind_posts();

      if (get_sub_field('carousel_thumbs', $item_id) == 1) {
        while ( $teamGridQuery->have_posts() ) {
          $teamGridQuery->the_post();
          $item .= '<div class="cdm-slider-thumbs"';
          $item .= ' data-slider-id="' . seoUrl(get_sub_field('id', $item_id)) . '">';
          if ($imgWidth > $imgHeight) {
            $imgSize = 'landscape';
          } else if ($imgWidth < $imgHeight) {
            $imgSize = 'portrait';
          } else{
            $imgSize = 'square';
          }
          $item .= '<button class="cdm-slider-thumb"><div class="cdm-slider-img-thumb';
          $item .= ' ' . $imgSize;
          $item .= '" style="background: url(' . $img_url . ') center no-repeat; background-size: cover;"></div>';
          $item .= '</button>';
          $item .= '</div>';
        }
      }

    // End Item Inner Container 

    echo $item;

  }

  $teamGridQuery->rewind_posts();

  if ( $teamGridQuery->have_posts() ) {

    $team_bios = '<div class="team-bios">';

    while ( $teamGridQuery->have_posts() ) {
      $teamGridQuery->the_post();
      $position  = get_field('position');
      $bio       = get_field('bio');
      $img_id = get_post_thumbnail_id();
      $img_size = 'large_thumb';
      $img_array = wp_get_attachment_image_src($img_id, $img_size, true);
      $img_url = $img_array[0];
      $img_width = $img_array[1];
      $img_height = $img_array[2];
      $img_srcset = wp_get_attachment_image_srcset($img_id, $img_size);
      
      if ($bio) {
        $team_bios .= '<div id="' . seoUrl(get_the_title()) . '" class="team-bio">';
        $team_bios .= '<img src="' . $img_url . '" width="' . $img_width . '" height="' . $img_height . '" title="' . get_the_title() . '" alt="' . get_the_title() . '" srcset="' .$img_srcset . '" class="team-member-img bio-popup" />';
        $team_bios .= '<div class="team-member-info bio-popup">';
        $team_bios .= '<h4 class="team-member-title bio-popup">' . get_the_title() . '</h4>';
        $team_bios .= ($position) ? '<p class="team-member-position bio-popup">' . $position . '</p>' : '';
        $team_bios .= $bio;
        $team_bios .= '</div>';
        $team_bios .= '</div>';
      }
      
    }
    $team_bios   .= '</div>';

    echo $team_bios;

  }

  wp_reset_postdata();

  echo '</div>';
  // End Item Outer Container

?>

