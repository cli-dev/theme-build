<?php get_header(); ?>
<section id="content" role="main" class="blog-page">
  <?php get_template_part(pageheader . 'header') ; ?>
  <section class="entry-content">
    <?php get_template_part(pagecontent . 'row') ; ?>
    <?php get_template_part(blog . 'loop'); ?>
  </section>
</section>
<?php get_footer(); ?>