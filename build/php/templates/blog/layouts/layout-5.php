<article id="post-<?php the_ID(); ?>" <?php post_class('post-block post-layout-5'); ?> itemscope itemtype="http://schema.org/BlogPosting">
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-block-link" itemprop="url" rel="bookmark" >
    <div class="post-block-content">
      <?php get_template_part( blog . 'meta' ); ?>
      <?php get_template_part( blog . 'title' ); ?>
    </div>
  </a>
</article>