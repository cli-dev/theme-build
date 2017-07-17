<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article id="page-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="mainEntity" itemscope itemtype="http://schema.org/WebPage">
    <?php get_template_part(pageheader . 'header'); ?>
    <section itemprop="mainEntityOfPage" class="page-content">
      <?php get_template_part(pagecontent . 'row'); ?>
    </section>
  </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>