<?php 

  $theme_settings  = get_option( 'themesettings_');
  $favicon         = $theme_settings['favicon'];
  $favicon_57      = $theme_settings['favicon_57'];
  $favicon_60      = $theme_settings['favicon_60'];
  $favicon_72      = $theme_settings['favicon_72'];
  $favicon_76      = $theme_settings['favicon_76'];
  $favicon_114     = $theme_settings['favicon_114'];
  $favicon_120     = $theme_settings['favicon_120'];
  $favicon_144     = $theme_settings['favicon_144'];
  $favicon_152     = $theme_settings['favicon_152'];
  $favicon_180     = $theme_settings['favicon_180'];
  $favicon_16      = $theme_settings['favicon_16'];
  $favicon_32      = $theme_settings['favicon_32'];
  $favicon_96      = $theme_settings['favicon_96'];
  $favicon_192     = $theme_settings['favicon_192'];
  $favicon_70      = $theme_settings['favicon_70'];
  $favicon_150     = $theme_settings['favicon_150'];
  $favicon_310_150 = $theme_settings['favicon_310_150'];
  $favicon_310     = $theme_settings['favicon_310'];

?>

<?php if (!empty($favicon)) : ?>
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
<?php endif; ?>
<?php if (!empty($favicon_57)) : ?>
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $favicon_57; ?>">
<?php endif; ?>
<?php if (!empty($favicon_60)) : ?>
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $favicon_60; ?>">
<?php endif; ?>
<?php if (!empty($favicon_72)) : ?>
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon_72; ?>">
<?php endif; ?>
<?php if (!empty($favicon_76)) : ?>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $favicon_76; ?>">
<?php endif; ?>
<?php if (!empty($favicon_114)) : ?>
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon_114; ?>">
<?php endif; ?>
<?php if (!empty($favicon_120)) : ?>
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon_120; ?>">
<?php endif; ?>
<?php if (!empty($favicon_144)) : ?>
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $favicon_144; ?>">
<?php endif; ?>
<?php if (!empty($favicon_152)) : ?>
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $favicon_152; ?>">
<?php endif; ?>
<?php if (!empty($favicon_180)) : ?>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_180; ?>">
<?php endif; ?>
<?php if (!empty($favicon_16)) : ?>
  <link rel="icon" type="image/png" href="<?php echo $favicon_16; ?>" sizes="16x16">
<?php endif; ?>
<?php if (!empty($favicon_32)) : ?>
  <link rel="icon" type="image/png" href="<?php echo $favicon_32; ?>" sizes="32x32">
<?php endif; ?>
<?php if (!empty($favicon_96)) : ?>
  <link rel="icon" type="image/png" href="<?php echo $favicon_96; ?>" sizes="96x96">
<?php endif; ?>
<?php if (!empty($favicon_192)) : ?>
  <link rel="icon" type="image/png" href="<?php echo $favicon_192; ?>" sizes="192x192">
<?php endif; ?>
<?php if (!empty($favicon_70)) : ?>
  <meta name="msapplication-square70x70logo" content="<?php echo $favicon_70; ?>" />
<?php endif; ?>
<?php if (!empty($favicon_150)) : ?>
  <meta name="msapplication-square150x150logo" content="<?php echo $favicon_150; ?>" />
<?php endif; ?>
<?php if (!empty($favicon_310_150)) : ?>
  <meta name="msapplication-wide310x150logo" content="<?php echo $favicon_57; ?>" />
<?php endif; ?>
<?php if (!empty($favicon_310)) : ?>
  <meta name="msapplication-square310x310logo" content="<?php echo $favicon_57; ?>" />
<?php endif; ?>