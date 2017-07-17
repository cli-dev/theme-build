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
      echo '<div class="header-block title-404"><h1 id="page-not-found-title"><span>404</span><span>Page not found</span></h1></div><div class="header-block title-404"><p>We\'re sorry, but it appears the page you are looking for cannot be found. Try a search instead?</p>';
      get_search_form();
      echo '</div>';
    echo '</div>';
  // End .page-header-inner
  
  echo '</div>';

  // End .page-header
  echo '</header>';

get_footer(); ?>