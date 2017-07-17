<?php 
  $post_title = get_the_title();
  $post_image_id = get_post_thumbnail_id();
  $post_image_size = (is_single()) ? 'full' : 'medium';
  $post_image_array = wp_get_attachment_image_src($post_image_id, $post_image_size, true);
  $post_image_url = $post_image_array[0];
  $post_image_width = $post_image_array[1];
  $post_image_height = $post_image_array[2];
  $post_image_thumb_array = wp_get_attachment_image_src($post_image_id, 'thumbnail', true);
  $post_image_thumb_url = $post_image_thumb_array[0];
  $post_image_srcset = wp_get_attachment_image_srcset($post_image_id, $post_image_size);
?>
<?php if ( has_post_thumbnail() ) : ?>
  <div class="post-image bg-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject" style="background-image: url(<?php echo $post_image_url; ?>)">
    <img itemprop="contentUrl" src="<?php echo $post_image_url; ?>" srcset="<?php echo $post_image_srcset; ?>"  title="<?php echo $post_title; ?>" width="<?php echo $post_image_width; ?>" height="<?php echo $post_image_height; ?>" alt="<?php echo $post_title; ?>" />
    <meta itemprop="url" content="<?php echo $post_image_url; ?>">
    <meta itemprop="thumbnail" content="<?php echo $post_image_thumb_url; ?>" />
    <meta itemprop="width" content="<?php echo $post_image_width; ?>" />
    <meta itemprop="height" content="<?php echo $post_image_height; ?>" />
  </div>
<?php endif; ?>