<article id="post-<?php the_ID(); ?>" <?php post_class('search-result'); ?> itemscope itemtype="http://schema.org/BlogPosting">
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-block-link" itemprop="url" rel="bookmark" >
    <?php get_template_part( blog . 'title' ); ?>
    <?php get_template_part( blog . 'meta' ); ?>
  </a>
</article>