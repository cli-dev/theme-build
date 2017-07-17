<?php 
  $myoptions = get_option( 'themesettings_');
  $item_id = (is_blog()) ? get_option( 'page_for_posts' ) : get_the_ID();
?>

<?php if( have_rows('header_content', $item_id) ): while ( have_rows('header_content', $item_id) ) : the_row(); ?>
  <?php if( get_row_layout() == 'header_text' ) {?>
    <?php $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : ''; ?>  
    <div class="header-block<?php echo $custom_class; ?>"> 
      <?php the_sub_field('header_text', $item_id); ?>
    </div>
  <?php } ?>
  
  <?php if( get_row_layout() == 'image' ) { $image = get_sub_field('header_image', $item_id);?>
    <?php $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : ''; $img_srcset = wp_get_attachment_image_srcset($image['id'], 'full');?>  
    <div class="header-block<?php echo $custom_class; ?>"> 
      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" srcset="<?php echo $img_srcset; ?>" class="single-image" />
    </div>
  <?php } ?>
<?php endwhile; endif; ?>  