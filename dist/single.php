<?php 
  get_header(); 
  $myoptions = get_option( 'themesettings_');
  $top_header_type = $myoptions['top_header_position'];
  $content_classes = 'in-grid main-article';
  if($top_header_type === "header-overlap" && $myoptions['news_header'] == 0) {
    $content_classes .= ' top-padding-overlap';
  } else if ($top_header_type === "header-no-overlap" && $myoptions['news_header'] == 0) {
    $content_classes .= ' top-margin-overlap';
  }
?>
  <?php ($myoptions['news_header'] == 1) ? get_template_part(pageheader . 'header') : '';?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class($content_classes); ?> itemprop="mainEntity" itemscope itemtype="http://schema.org/BlogPosting">
    <meta itemprop='isFamilyFriendly' content='True'/>
    <?php get_template_part( blog . 'image' ); ?>
    <?php get_template_part( blog . 'header' ); ?>
    <section itemprop="mainEntityOfPage" class="post-content-wrapper">
      <?php get_template_part( blog . 'content' ); ?>
      <?php get_template_part( blog . 'footer' ); ?>
    </section>
  </article>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>