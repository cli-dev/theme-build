<?php 
  // Bottom Content
  if ( is_active_sidebar( 'content-bottom' ) ) {
    echo '<div id="content-bottom"><div class="content-bottom-inner in-grid">';
    dynamic_sidebar( 'content-bottom' );
    echo '</div></div>';
  }
?>