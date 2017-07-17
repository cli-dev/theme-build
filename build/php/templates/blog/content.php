<?php if (is_single()): ?>
  <div itemprop="articleBody" class="post-content">
    <?php the_content(); ?>
  </div>
<?php else : ?>
  <section itemprop="description" class="post-content">
    <?php the_excerpt(); ?>
  </section>
<?php endif ?>