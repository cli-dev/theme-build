<?php 
  $myoptions = get_option( 'themesettings_');
  $detect = new Mobile_Detect;
  $wrapper_classes  = 'top-menu';
  $wrapper_classes .= ($detect->isMobile()) ? ' mobile-menu' : '';
  $wrapper_classes .= ' menu-' . $myoptions['logo_position'];
  $wrapper_classes .= ($myoptions['center_logo_menu_type'] === 'divided' && $myoptions['logo_position'] === 'center') ? ' divided-menu-wrapper' : '';
?>
<div class="<?php echo $wrapper_classes; ?>">
  <div class="top-menu-inner in-grid ">   
    <?php get_template_part(site . 'logo'); ?>
    <?php get_template_part(menu . 'button'); ?>
    <?php get_template_part(menu . 'main'); ?> 
    <?php if($myoptions['center_logo_menu_type'] === 'divided' && $myoptions['logo_position'] === 'center'){ ?>
      <?php get_template_part(menu . 'divided-left'); ?>
      <?php get_template_part(menu . 'divided-right'); ?>
    <?php } ?>
  </div>
</div>