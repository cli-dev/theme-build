<?php
  $prev_post = get_previous_post();
  $next_post = get_next_post();
  $blog_ID = get_option( 'page_for_posts' );
  $postType = get_post_type();
?>
<nav class="single-item-nav" role="navigation">
  <?php if ($postType === 'post'): ?>
    <div class="nav-item back-to-blog">
      <a href="<?php echo get_permalink( $blog_ID ); ?>">
        <i class="cdm cdm-angle-double-left"></i> 
        <span class="nav-txt">Back to Blog</span>
      </a>
    </div>
  <?php endif ?>
  <?php if (!empty( $prev_post )) { ?>
    <div class="nav-item prev-item">
      <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
        <i class="cdm cdm-angle-left"></i>
        <span class="nav-txt">Prev <?php echo $postType; ?></span>
      </a>
    </div>
  <?php } ?>
  <?php if (!empty( $next_post )) { ?>
    <div class="nav-item next-item">
      <a href="<?php echo get_permalink( $next_post->ID ); ?>">
        <span class="nav-txt">Next <?php echo $postType; ?></span> 
        <i class="cdm cdm-angle-right"></i>
      </a>
    </div>
  <?php } ?>
</nav>