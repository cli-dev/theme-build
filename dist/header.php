<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if (is_page()) {echo 'itemscope itemtype="http://schema.org/WebSite"';} else { echo 'itemscope itemtype="http://schema.org/Blog"';} ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<?php get_template_part(site . 'icons'); ?>
<?php
  wp_head();
  echo add_typekit();
  $detect = new Mobile_Detect;
  $bodyClasses  = '';
  $bodyClasses .= (!is_blog()) ? the_slug() . '-page' : '';
  $bodyClasses .= ($detect->isMobile()) ? ' mobile-device' : ' desktop-device';
?>

</head>
<body <?php body_class($bodyClasses); ?>>
  <?php get_template_part(site . 'loader'); ?>
  <div id="wrapper" class="hfeed">
    <?php get_template_part(header . 'header'); ?>
    <section id="content" role="main" class="<?php echo content_class(); ?>">