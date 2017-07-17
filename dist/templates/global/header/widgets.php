<?php $myoptions = get_option( 'themesettings_'); ?> 
<?php if ($myoptions['header_type'] === 'side') { ?>
  <div class="header-widgets">  
    <div class="header-widgets-inner in-grid">
      <?php if ( is_active_sidebar( 'header-widgets' ) ) { dynamic_sidebar( 'header-widgets' ); } ?>
      <?php get_template_part( site . 'logo'); ?>
      <?php get_template_part( menu . 'button'); ?>
    </div>
  </div>
<?php } elseif ($myoptions['header_type'] === 'top') { ?>
  <?php if ( is_active_sidebar( 'header-widgets' ) ) { ?>
    <div class="header-widgets">  
      <div class="header-widgets-inner in-grid">
        <?php dynamic_sidebar( 'header-widgets' ); ?>
      </div>
    </div>
  <?php } ?>
<?php } ?>