<?php 
  wp_nav_menu(
    array( 
    'theme_location' => 'divided-right-menu', 
    'container'       => 'nav',
    'container_class' => 'menu-container right-side-menu divided-menu', 
    'link_before' => '<span class="link-text">', 
    'link_after' => '</span>',
    )
  );
?>