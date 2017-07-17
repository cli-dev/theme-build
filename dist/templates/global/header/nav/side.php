<?php 
  $myoptions = get_option( 'themesettings_');
  $menu_classes  = 'side-menu';
  $menu_classes .= ($myoptions['hide_menu'] == 1) ? ' hidden-menu' : '';
  $menu_classes .= ' ' . $myoptions['header_type'] . '-menu';
  $menu_classes .= ' ' . $myoptions['side_menu_position'] . '-menu';
  $menu_classes .= ($myoptions['top_header_position'] === 'header-overlap') ? ' top-padding-overlap' : ' top-margin-overlap';
?>
 <div id="side-menu" class="<?php echo $menu_classes; ?>">
  <div class="side-menu-inner">
    <?php if ($myoptions['show_side_menu_logo'] == 1) {get_template_part( site . 'logo');} ?>
    <?php get_template_part(menu . 'main'); ?>
    <?php if ( is_active_sidebar( 'side-menu-bottom-widget' ) ) : ?>  
      <div id="side-widget-area">  
        <?php dynamic_sidebar( 'side-menu-bottom-widget' ); ?>
      </div>
    <?php endif; ?>
  </div>   
</div>