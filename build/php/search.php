<?php 
get_header(); 

  $myoptions = get_option( 'themesettings_');
  $page_header_wrapper  = '<header';
  $page_header_wrapper .= ' class="page-header error-page';
  $page_header_wrapper .= ($myoptions['top_header_position']) ? ' top-padding-overlap' : ' top-margin-overlap';
  $page_header_wrapper .= '" style="';
  $page_header_wrapper .= ($myoptions['404_header_image']) ? 'background: url(' . $myoptions['404_header_image'] . ') center no-repeat; background-size: cover;"' : '';
  $page_header_wrapper .= ' data-sticky-color="default"';
  $page_header_wrapper .= '>';
  echo $page_header_wrapper; 
  $page_header_inner  = '<div class="page-header-inner">';
  echo $page_header_inner;
    echo '<div class="page-header-content in-grid direction-column position-center align-center">';
      echo '<div class="header-block title-404"><h1 id="page-not-found-title"><span>Search:</span>';
      printf( __( '<span>%s</span>', 'cdm_theme' ), get_search_query() );
      echo '</h1></div></div>';
  // End .page-header-inner
  
  echo '</div>';

  // End .page-header
  echo '</header>';
?>
<article id="post-0" class="page not-found">
  <section class="page-content">
    <div class="row-wrapper error-row-1">
      <div class="row direction-row position-center align-start nowrap in-grid">
        <div class="col col-12"> 
          <div class="col-inner  direction-column"> 
            <?php if ( have_posts() ) : ?>
              <div class="search-results">
                <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'templates/post-layouts/search-item'); ?>
                <?php endwhile; ?>
                <?php get_template_part( 'nav', 'below' ); ?>
              </div>
            <?php else : ?>
              <div class="col-item text-box">
                <div class="text-block">
                  <p style="text-align:center"><?php _e( 'Sorry, nothing matched your search. Try again?', 'cdm_theme' ); ?></p>
                  <?php get_search_form(); ?>
                </div>
              </div>
            <?php endif; ?> 
          </div>  
        </div>
      </div>
    </div>
  </section>
</article>
<?php get_footer(); ?>