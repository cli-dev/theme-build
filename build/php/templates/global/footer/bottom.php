<?php 
if ( is_active_sidebar('footer-bottom') ) {
  echo '<div id="bottom-footer" class="bottom-footer footer-row"><div class="footer-inner in-grid">';
  dynamic_sidebar('footer-bottom');
  echo '</div></div>';
}
?>