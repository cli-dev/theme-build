<?php 
  wp_nav_menu( array( 
    'theme_location'  => 'main-menu', 
    'container'       => 'nav',
    'container_class' => 'menu-container mobile-menu', 
    'link_before'     => '<span class="link-text">', 
    'link_after'      => '</span>'
  )); 
?>