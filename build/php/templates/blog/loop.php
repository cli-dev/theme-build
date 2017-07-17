<?php 
$themesettings = get_option( 'themesettings_'); 
$item_name = 'blog';
$item_type = $themesettings['blog_type'];

// Start Blog Row Outer Container

  $item = '<div';
  $item .= ' class="cdm-row-wrapper blog-row blog-loop cdm-' . $item_name . '-wrapper';
  $item .= ($themesettings['custom_blog_class']) ? ' ' . $themesettings['custom_blog_class'] : '';
  $item .= ($themesettings['animate_blog_section'] == 1) ? ' wow' : '';
  $item .= (isset($themesettings['blog_animation_effect'])) ? ' ' . $themesettings['blog_animation_effect']  : '';
  $item .= '"'; 

  // Blog Row Animation

    $item .= (isset($themesettings['blog_animation_delay'])) ? ' data-wow-delay="' . $themesettings['blog_animation_delay'] . 's"'  : '';
    $item .= (isset($themesettings['blog_animation_offset'])) ? ' data-wow-offset="' . $themesettings['blog_animation_offset'] . '"'  : '';
    $item .= ($themesettings['animate_blog_section'] == 1) ? $animation : '';

  $item .= '>';

  // Start Blog Row Inner

    $item .= '<div class="cdm-row-inner ' . $item_type . '"><div class="cdm-row-content in-grid">';  

    $grid_items_sml = ($themesettings['columns_on_mobile']) ? $themesettings['columns_on_mobile'] : '1';
    $grid_items_mds = ($themesettings['columns_on_mobile']) ? $themesettings['columns_on_mobile'] : '1';
    $grid_items_md  = ($themesettings['columns_on_tablet']) ? $themesettings['columns_on_tablet'] : '1';
    $grid_items_mdl = ($themesettings['columns_on_tablet']) ? $themesettings['columns_on_tablet'] : '1';
    $grid_items_lrg = ($themesettings['columns_on_desktop']) ? $themesettings['columns_on_desktop'] : '1';

    $gutters_sml = ($themesettings['gutters_on_mobile']) ? $themesettings['gutters_on_mobile'] : '0';
    $gutters_mds = ($themesettings['gutters_on_mobile']) ? $themesettings['gutters_on_mobile'] : '0';
    $gutters_md  = ($themesettings['gutters_on_tablet']) ? $themesettings['gutters_on_tablet'] : '0';
    $gutters_mdl = ($themesettings['gutters_on_tablet']) ? $themesettings['gutters_on_tablet'] : '0';
    $gutters_lrg = ($themesettings['gutters_on_desktop']) ? $themesettings['gutters_on_desktop'] : '0';

    $blog_wrapper = '<div class="blog-posts';

    switch ($item_type) {
      case 'carousel':
        $blog_wrapper .= ' cdm-slider"';
        $blog_wrapper .= ' data-slider-items="' . $grid_items_sml . '"';
        $blog_wrapper .= ' data-slider-slideby="page"';
        $blog_wrapper .= ' data-slider-loop="false"';
        $blog_wrapper .= ' data-slider-gutter="' . $gutters_sml . '"';
        $blog_wrapper .= ' data-slider-gutter-sml="' . $gutters_sml . '"';
        $blog_wrapper .= ' data-slider-gutter-mds="' . $gutters_mds . '"';
        $blog_wrapper .= ' data-slider-gutter-md="' . $gutters_md . '"';
        $blog_wrapper .= ' data-slider-gutter-mdl="' . $gutters_mdl . '"';
        $blog_wrapper .= ' data-slider-gutter-lrg="' . $gutters_lrg . '"';
        $blog_wrapper .= ' data-slider-nav="true"';
        $blog_wrapper .= ' data-slider-autoheight="false"';
        $blog_wrapper .= ' data-slider-autoplay="false"';
        $blog_wrapper .= ' data-slider-autoplay-timeout="0"';
        $blog_wrapper .= ' data-slider-items-sml="' . $grid_items_sml . '"';
        $blog_wrapper .= ' data-slider-items-mds="' . $grid_items_mds . '"';
        $blog_wrapper .= ' data-slider-items-md="' . $grid_items_md . '"';
        $blog_wrapper .= ' data-slider-items-mdl="' . $grid_items_mdl . '"';
        $blog_wrapper .= ' data-slider-items-lrg="' . $grid_items_lrg . '"';
        break;

      case 'masonry':
        $blog_wrapper .= ' cdm-masonry"';
        $blog_wrapper .= ' data-grid-items-sml="' . $grid_items_sml . '"';
        $blog_wrapper .= ' data-grid-items-mds="' . $grid_items_mds . '"';
        $blog_wrapper .= ' data-grid-items-md="' . $grid_items_md . '"';
        $blog_wrapper .= ' data-grid-items-mdl="' . $grid_items_mdl . '"';
        $blog_wrapper .= ' data-grid-items-lrg="' . $grid_items_lrg . '"';
        break;
      
      default:
        $blog_wrapper .= ' cdm-grid"';
        $blog_wrapper .= ' data-grid-items-sml="' . $grid_items_sml . '"';
        $blog_wrapper .= ' data-grid-items-mds="' . $grid_items_mds . '"';
        $blog_wrapper .= ' data-grid-items-md="' . $grid_items_md . '"';
        $blog_wrapper .= ' data-grid-items-mdl="' . $grid_items_mdl . '"';
        $blog_wrapper.= ' data-grid-items-lrg="' . $grid_items_lrg . '"';
        break;
    }
    $blog_wrapper .= '>';

    echo $item;

    // Blog Loop

      $layout = ($themesettings['blog_post_layout']) ? $themesettings['blog_post_layout'] : '1';

      if ( have_posts() ) :
        echo $blog_wrapper;
        while ( have_posts() ) : the_post();
          get_template_part( bloglayout . 'layout-' . $layout);  
        endwhile;
        echo '</div>';
        get_template_part( site . 'pagination' );
      endif;

    // End Blog Loop

    echo '</div>';

    // End Blog Row Inner

    echo '</div></div>';

  // End Blog Row Outer