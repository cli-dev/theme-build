<article id="post-<?php the_ID(); ?>" <?php post_class('post-block post-layout-3'); ?> itemscope itemtype="http://schema.org/BlogPosting">
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-block-link" itemprop="url" rel="bookmark" >
    <?php get_template_part( blog . 'image' ); ?>
    <div class="post-block-content">
      <?php get_template_part( blog . 'title' ); ?>
    </div>
  </a>
</article>