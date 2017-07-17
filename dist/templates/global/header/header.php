<?php
  
  $myoptions = get_option( 'themesettings_');

  $header_classes  = 'site-header';
  $header_classes .= ($myoptions['hide_menu'] == 1) ? ' has-hidden-menu' : '';
  $header_classes .= ($myoptions['header_type'] === 'side') ? ' has-side-menu' : '';
  $header_classes .= ($myoptions['sticky_header'] == 1) ? ' sticky-header' : '';
  $header_classes .= ($myoptions['top_header_position'] === "header-overlap") ? ' header-overlap' : '';

  $content_classes = 'main-content';
  $content_classes .= ($myoptions['header_type'] === 'side' && $myoptions['hide_menu'] == 0 && $myoptions['side_menu_position'] === 'right') ? ' has-right-menu' : '';
  $content_classes .= ($myoptions['header_type'] === 'side' && $myoptions['hide_menu'] == 0 && $myoptions['side_menu_position'] === 'left') ? ' has-left-menu' : '';


?>
<?php 
  if ($myoptions['header_type'] === 'side'){
    get_template_part(nav . 'side');
  } 
?>
<div id="content-wrapper" class="<?php echo $content_classes; ?>">
  <header class="<?php echo $header_classes; ?>" data-sticky="default" role="banner">
    <?php get_template_part(header . 'widgets'); ?>
    <?php 
      if($myoptions['header_type'] === 'top') {
        get_template_part(nav . 'top');
      } 
    ?>
  </header>

