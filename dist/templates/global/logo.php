<?php $site_header_logo = get_field('site_header_logo', 'option'); ?>
<div class="site-header-logo">
  <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo-link" title="<?php echo get_bloginfo('name'); ?>" rel="home">
    <?php 
      echo theme_logos(array('type' => 'mobile', 'add_link' => 0, 'class' => 'active-logo'));
      if ($site_header_logo === 'light') {
        echo theme_logos(array('type' => 'dark', 'add_link' => 0, 'class' => 'desktop-logo'));
        echo theme_logos(array('type' => 'color', 'add_link' => 0, 'class' => 'desktop-logo'));
      } 
      elseif ($site_header_logo === 'dark') {
        echo theme_logos(array('type' => 'light', 'add_link' => 0, 'class' => 'desktop-logo'));
        echo theme_logos(array('type' => 'color', 'add_link' => 0, 'class' => 'desktop-logo'));
      }
      elseif ($site_header_logo === 'color') {
        echo theme_logos(array('type' => 'dark', 'add_link' => 0, 'class' => 'desktop-logo'));
        echo theme_logos(array('type' => 'light', 'add_link' => 0, 'class' => 'desktop-logo'));
      }
      echo theme_logos(array('type' => $site_header_logo, 'add_link' => 0, 'class' => 'desktop-logo default-logo active-logo'));
    ?>
  </a>
</div>