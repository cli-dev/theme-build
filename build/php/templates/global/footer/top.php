<?php 

if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') || is_active_sidebar('footer-5') || is_active_sidebar('footer-6') ) {
  echo '<div id="top-footer" class="top-footer footer-row"><div class="footer-inner in-grid">';
  if (is_active_sidebar('footer-1')) {
    echo '<div id="footer-1" class="footer-column">';
    dynamic_sidebar('footer-1');
    echo '</div>';
  }
  if (is_active_sidebar('footer-2')) {
    echo '<div id="footer-2" class="footer-column">';
    dynamic_sidebar('footer-2');
    echo '</div>';
  }
  if (is_active_sidebar('footer-3')) {
    echo '<div id="footer-3" class="footer-column">';
    dynamic_sidebar('footer-3');
    echo '</div>';
  }
  if (is_active_sidebar('footer-4')) {
    echo '<div id="footer-4" class="footer-column">';
    dynamic_sidebar('footer-4');
    echo '</div>';
  }
  if (is_active_sidebar('footer-5')) {
    echo '<div id="footer-5" class="footer-column">';
    dynamic_sidebar('footer-5');
    echo '</div>';
  }
  if (is_active_sidebar('footer-6')) {
    echo '<div id="footer-6" class="footer-column">';
    dynamic_sidebar('footer-6');
    echo '</div>';
  }
  echo '</div></div>';
}

?>