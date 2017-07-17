<?php 
  $post_id = get_next_post()->ID; 
  $post_class = get_post_class('post-block single-nav-item next-post', $post_id);
  $post_link = get_permalink($post_id);
  $post_title = get_the_title($post_id);
  $post_image_id = get_post_thumbnail_id($post_id);
  $post_image_size = 'medium';
  $post_image_array = wp_get_attachment_image_src($post_image_id, $post_image_size, true);
  $post_image_url = $post_image_array[0];
  $post_image_width = $post_image_array[1];
  $post_image_height = $post_image_array[2];
  $post_image_thumb_array = wp_get_attachment_image_src($post_image_id, 'thumbnail', true);
  $post_image_thumb_url = $post_image_thumb_array[0];
  $post_image_srcset = wp_get_attachment_image_srcset($post_image_id, $post_image_size);
  $post_categories = get_the_category($post_id);
  $post_date = get_the_date(get_option('date_format'), $post_id); 
  $post_date_published = get_the_date('c', $post_id);
  $post_date_modified = get_the_modified_date( 'c', $post_id); 
  $post_excerpt = get_the_excerpt($post_id);
  $myoptions = get_option( 'themesettings_');
  $company_name = get_bloginfo('name');
  $site_url = get_bloginfo('url');
  $logo_img = $myoptions['default_logo_png'];
  $logo_img_url = $logo_img['url'];
  $logo_img_width = $logo_img['width'];
  $logo_img_height = $logo_img['height'];
?>

<article id="post-<?php echo $post_id; ?>" <?php echo $post_class; ?> itemscope itemtype="http://schema.org/BlogPosting">
  <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>" class="post-block-link" itemprop="url" rel="bookmark" >
    <?php if (has_post_thumbnail($post_id)) : ?>
      <div class="post-image bg-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject" style="background-image: url(<?php echo $post_image_url; ?>)">
        <img itemprop="contentUrl" src="<?php echo $post_image_url; ?>" srcset="<?php echo $post_image_srcset; ?>"  title="<?php echo $post_title; ?>" width="<?php echo $post_image_width; ?>" height="<?php echo $post_image_height; ?>" alt="<?php echo $post_title; ?>" />
        <meta itemprop="url" content="<?php echo $post_image_url; ?>">
        <meta itemprop="thumbnail" content="<?php echo $post_image_thumb_url; ?>" />
        <meta itemprop="width" content="<?php echo $post_image_width; ?>" />
        <meta itemprop="height" content="<?php echo $post_image_height; ?>" />
      </div>
    <?php endif; ?>
    <div class="post-block-content">
      <div class="post-meta">
        <h3 class="post-section-title">Next Post</h3>
        <div class="post-categories">
          <?php
            foreach( $post_categories as $category ) {
              echo '<span class="entry-cat ' . $category->slug . '" >' . $category->name . '</span>';
            } 
          ?>
        </div>
        <div class="post-meta-divider">|</div>
        <time datetime="<?php echo $post_date_published; ?>" itemprop="datePublished" class="post-date published"><?php echo $post_date; ?></time>
        <time datetime="<?php echo $post_date_modified; ?>" itemprop="dateModified" class="post-date modified"></time>
        <div itemscope itemprop="publisher author" itemtype="http://schema.org/Organization" class="post-author">
          <span itemprop="name"><?php echo $company_name; ?></span>
          <meta itemprop='url' content='<?php echo $site_url; ?>'/>
          <div itemprop="image logo" itemscope itemtype="http://schema.org/ImageObject">
            <img itemprop="url" src="<?php echo $logo_img_url; ?>" title="<?php echo $company_name; ?> Logo" alt="<?php echo $company_name; ?> Logo" class="publisher-logo" />
            <meta itemprop="width" content="<?php echo $logo_img_width; ?>" />
            <meta itemprop="height" content="<?php echo $logo_img_height; ?>" />
          </div>
        </div>
      </div>
      <h4 class="post-title" itemprop="name headline"><?php echo $post_title; ?></h4>
      <section itemprop="description" class="post-content">
        <?php echo $post_excerpt; ?>
      </section>
      <div class="read-more btn">Read More</div>
    </div>
  </a>
</article>