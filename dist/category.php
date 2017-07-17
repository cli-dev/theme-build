<?php get_header(); ?>
  <?php get_template_part(pageheader . 'header') ; ?>
  <section class="page-content">
    <?php get_template_part(pagecontent . 'row') ; ?>
    <?php get_template_part(blog . 'loop') ; ?>
  </section>
<?php get_footer(); ?>