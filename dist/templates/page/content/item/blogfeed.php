<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'blog';
$item_type = get_sub_field('blog_type', $item_id);
$item_num = (get_sub_field('blog_posts', $item_id)) ? intval(get_sub_field('blog_posts', $item_id)) : '1';
$blogArgs = array('posts_per_page' => $item_num);
if (get_sub_field('blog_category', $item_id)) {
  $category = get_sub_field('blog_category', $item_id);
  // $cat_ids = '';
  // foreach ($categories as $category) {
  //   $cat_ids .= $category . ',';
  // }
  // $category_ids .= rtrim($cat_ids, ',');
  $blogArgs += [ 'cat' => $category ];
}
if (get_sub_field('post_offset', $item_id)) {
  $offset = intval(get_sub_field('post_offset', $item_id));
  $blogArgs += ['offset' => $offset];
}
$blogGridQuery = new WP_Query( $blogArgs );

if ( $blogGridQuery->have_posts() ) {

  // Start Item Outer Container

    $item = '<div';
    $item .= (get_sub_field('blog_id', $item_id)) ? ' id="' . seoUrl(get_sub_field('blog_id', $item_id)) . '"' : ' id="blog-grid"';
    $item .= ' class="cdm-item-wrapper ' . $item_name . '-wrapper';
    $item .= (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
    $item .= (get_sub_field('animation', $item_id) == 1) ? ' wow' : '';
    $item .= (get_sub_field('animation_effect', $item_id)) ? ' ' . get_sub_field('animation_effect', $item_id)  : '';
    $item .= '"'; 

    // Item Animation
      $animation = '';
      $animation .= (get_sub_field('animation_duration')) ? ' data-wow-duration="' . get_sub_field('animation_duration', $item_id) . 's"'  : '';
      $animation .= (get_sub_field('animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('animation_delay', $item_id) . 's"'  : '';
      $animation .= (get_sub_field('animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('animation_offset', $item_id) . '"'  : '';
      $animation .= (get_sub_field('animation', $item_id) == 1) ? $animation : '';

      $item .= '>';


    // Start Item Inner Container

      $grid_items_sml = (get_sub_field('columns_on_mobile', $item_id)) ? get_sub_field('columns_on_mobile', $item_id) : '1';
      $grid_items_mds = (get_sub_field('columns_on_mobile', $item_id)) ? get_sub_field('columns_on_mobile', $item_id) : '1';
      $grid_items_md  = (get_sub_field('columns_on_tablet', $item_id)) ? get_sub_field('columns_on_tablet', $item_id) : '1';
      $grid_items_mdl = (get_sub_field('columns_on_tablet', $item_id)) ? get_sub_field('columns_on_tablet', $item_id) : '1';
      $grid_items_lrg = (get_sub_field('columns_on_desktop', $item_id)) ? get_sub_field('columns_on_desktop', $item_id) : '1';

      $gutters_sml = (get_sub_field('gutters_on_mobile', $item_id)) ? get_sub_field('gutters_on_mobile', $item_id) : '0';
      $gutters_mds = (get_sub_field('gutters_on_mobile', $item_id)) ? get_sub_field('gutters_on_mobile', $item_id) : '0';
      $gutters_md  = (get_sub_field('gutters_on_tablet', $item_id)) ? get_sub_field('gutters_on_tablet', $item_id) : '0';
      $gutters_mdl = (get_sub_field('gutters_on_tablet', $item_id)) ? get_sub_field('gutters_on_tablet', $item_id) : '0';
      $gutters_lrg = (get_sub_field('gutters_on_desktop', $item_id)) ? get_sub_field('gutters_on_desktop', $item_id) : '0';

      $item .= '<div';
      $item .= ' class="cdm-item ' . $item_name;

      

      switch ($item_type) {
        case 'carousel':
          $item .= ($item_num !== 1) ? ' cdm-slider"' : '"';
          $item .= ($item_num !== 1) ? ' data-slider-items="' . $grid_items_sml . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-slideby="page"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-loop="false"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-gutter="' . $gutters_sml . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-gutter-sml="' . $gutters_sml . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-gutter-mds="' . $gutters_mds . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-gutter-md="' . $gutters_md . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-gutter-mdl="' . $gutters_mdl . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-gutter-lrg="' . $gutters_lrg . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-nav="true"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-autoheight="false"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-autoplay="false"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-autoplay-timeout="0"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-items-sml="' . $grid_items_sml . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-items-mds="' . $grid_items_mds . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-items-md="' . $grid_items_md . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-items-mdl="' . $grid_items_mdl . '"' : '';
          $item .= ($item_num !== 1) ? ' data-slider-items-lrg="' . $grid_items_lrg . '"' : '';
          break;

        case 'masonry':
          $item .= ($item_num !== 1) ? ' cdm-masonry"' : '"';
          $item .= ($item_num !== 1) ? ' data-grid-items-sml="' . $grid_items_sml . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-mds="' . $grid_items_mds . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-md="' . $grid_items_md . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-mdl="' . $grid_items_mdl . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-lrg="' . $grid_items_lrg . '"' : '';
          break;
        
        default:
          $item .= ' cdm-grid"';
          $item .= ($item_num !== 1) ? ' data-grid-items-sml="' . $grid_items_sml . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-mds="' . $grid_items_mds . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-md="' . $grid_items_md . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-mdl="' . $grid_items_mdl . '"' : '';
          $item .= ($item_num !== 1) ? ' data-grid-items-lrg="' . $grid_items_lrg . '"' : '';
          break;
      }
      $item .= '>';

      echo $item;

      // Start Item Content

        while ( $blogGridQuery->have_posts() ) { 
          $blogGridQuery->the_post();
          get_template_part(bloglayout . 'layout-' . get_sub_field('post_layout', $item_id)); 
        }

      // End Item Content

      echo '</div>';

    // End Item Inner Container

      echo '</div>';

  // End Item Outer Container
}

wp_reset_postdata();

?>

