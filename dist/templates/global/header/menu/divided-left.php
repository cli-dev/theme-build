<?php 
  wp_nav_menu(
    array( 
    'theme_location' => 'divided-left-menu', 
    'container'       => 'nav',
    'container_class' => 'menu-container left-side-menu divided-menu', 
    'link_before' => '<span class="link-text">', 
    'link_after' => '</span>',
    )
  ); 
?>