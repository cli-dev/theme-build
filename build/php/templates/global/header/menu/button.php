<?php 
  $myoptions = get_option( 'themesettings_');
  $button_classes  = 'menu-button-area';
  $button_classes .= ($myoptions['header_type'] === 'Right Side Menu') ? ' right-menu-btn' : ' left-menu-btn';
  $button_classes .= ($myoptions['hide_menu'] == 0) ? ' hidden-button' : '';
?>

<div class="<?php echo $button_classes ?>">
  <div class="menu-button">
    <span class="menu-bar bar-1"></span>
    <span class="menu-bar bar-2"></span>
    <span class="menu-bar bar-3"></span>
    <span class="menu-bar bar-4"></span>
  </div>
</div>