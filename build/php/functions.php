<?php

define('CDM_ROOT', get_template_directory_uri());
define('MAPS_API', 'AIzaSyDyuuBcM7QDSI4cLILUQIhPmouVoObekJk');
define('site', 'templates/global/');
define('header', 'templates/global/header/');
define('nav', 'templates/global/header/nav/');
define('menu', 'templates/global/header/menu/');
define('footer', 'templates/global/footer/');
define('pagecontent', 'templates/page/content/');
define('pageitem', 'templates/page/content/item/');
define('pageheader', 'templates/page/header/');
define('blog', 'templates/blog/');
define('bloglayout', 'templates/blog/layouts/');


// Theme setup
  function cdm_theme_setup(){
  	load_theme_textdomain( 'cdm_theme', get_template_directory() . '/languages' );
  	add_theme_support( 'automatic-feed-links' );
  	add_theme_support( 'post-thumbnails' );
  	global $content_width;
  	if ( ! isset( $content_width ) ) 
  		$content_width = 640;
    register_nav_menus(
     array( 'mobile-menu' => __( 'Mobile Menu', 'cdm_theme' ) )
     );
  }
  add_action( 'after_setup_theme', 'cdm_theme_setup' );

// Add main stylesheet
  function main_stylesheet() {
    wp_register_style( 'main-css', CDM_ROOT . '/css/style.min.css', false, false, 'all' );
    wp_enqueue_style( 'main-css' );
  }
  add_action( 'wp_enqueue_scripts', 'main_stylesheet' );

// Combine theme options into one mySQL row
  function combine_theme_options() {
    $fields = get_fields('option');
    $field_values = array();
    if( $fields ){
      foreach( $fields as $field_name => $value ){
        if (!is_object($value)){ // checking for value is not an post object
          $field_values[$field_name]=$value; // storing data to array
        }
      }
      $field_values_fordb = serialize($field_values); //serializing our array
      update_option('themesettings_',$field_values); //trying to store our values to db using ADD method
    }
  }
  add_action( 'acf/save_post', 'combine_theme_options', 20 );

// Create dynamic stylesheet

  function generate_dynamic_css() {
    $css_dir = dirname(__FILE__) . '/css/';
    ob_start(); 
    require(dirname(__FILE__) . '/inc/style-dynamic.php'); 
    $css = ob_get_clean(); 
    file_put_contents($css_dir . 'dynamic-styles.css', $css, LOCK_EX); 
  }
  add_action( 'acf/save_post', 'generate_dynamic_css' );

  // Add dynamic stylesheet to head of wordpress
  function add_dynamic_css(){
    wp_enqueue_style("dynamic-css", CDM_ROOT . "/css/dynamic-styles.css", array(), filemtime(dirname(__FILE__) ."/css/dynamic-styles.css"));
  }
  add_action( 'wp_enqueue_scripts', 'add_dynamic_css', 50 );

// Add jQuery 
  function load_jquery() {
    wp_enqueue_script( 'jquery' );
  }
  add_action( 'wp_enqueue_scripts', 'load_jquery' );

// Comment functions
  function enqueue_comment_reply_script(){
    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
  }
  add_action( 'comment_form_before', 'enqueue_comment_reply_script' );

// Ping functions
  function cdm_theme_custom_pings( $comment ){
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php }

    add_filter( 'get_comments_number', 'cdm_theme_comments_number' );
    function cdm_theme_comments_number( $count ){
     if ( !is_admin() ) {
      global $id;
      $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
      return count( $comments_by_type['comment'] );
    } else {
      return $count;
    }
  }

function content_class(){
  if (is_single()) {
    $content_class = 'post-page';
  } 
  else if(is_page()){
    $content_class = 'static-page';
  }
  else if(is_singular()){
    $content_class = get_post_type() . '-page';
  }
  else if (is_archive() || is_author() || is_category() || is_home() || is_tag()) {
    $content_class = 'archive-page';
  } 
  else if (is_404()) {
    $content_class = 'error-page';
  } 
  else if(is_search()){
    $content_class = 'search-page';
  }
  return $content_class;
}

// Add a symbol if there is no post title
  function cdm_theme_title( $title ) {
     if ( $title == '' ) {
      return '&rarr;';
    } else {
      return $title;
    }
  }
  add_filter( 'the_title', 'cdm_theme_title' );

// Add website name
  function cdm_theme_filter_wp_title( $title ){
  	return $title . esc_attr( get_bloginfo( 'name' ) );
  }
  add_filter( 'wp_title', 'cdm_theme_filter_wp_title' );

// Add Favicon
  function add_favicon() {
    $myoptions = get_option( 'themesettings_');
    $favicon = $myoptions['favicon'];
    if ($favicon) {
      echo '<link rel="shortcut icon" href="' . $favicon . '" type="image/x-icon" />';
    }
  }
  add_action('login_head', 'add_favicon');
  add_action('admin_head', 'add_favicon');

// Create variable length excerpt
  function bac_variable_length_excerpt($text, $length, $finish_sentence){
    $myoptions = get_option( 'themesettings_');

    $length = $myoptions['excerpt_length'];

    $finish_sentence = $myoptions['finish_sentence'];

    $tokens = array();
    $out = '';
    $word = 0;

    //Divide the string into tokens; HTML tags, or words, followed by any whitespace.
    $regex = '/(<[^>]+>|[^<>\s]+)\s*/u';
    preg_match_all($regex, $text, $tokens);
    foreach ($tokens[0] as $t){ 
      //Parse each token
      if ($word >= $length && !$finish_sentence){ 
      //Limit reached
        break;
      }
      if ($t[0] != '<'){ 
      //Token is not a tag. 
      //Regular expression that checks for the end of the sentence: '.', '?' or '!'
        $regex1 = '/[\?\.\!]\s*$/uS';
        if ($word >= $length && $finish_sentence && preg_match($regex1, $t) == 1){ 
        //Limit reached, continue until ? . or ! occur to reach the end of the sentence.
          $out .= trim($t);
          break;
        }   
        $word++;
      }
      //Append what's left of the token.
      $out .= $t;     
    }
    //Add the excerpt ending as a link.
    $excerpt_end = ' [&hellip;]';

    //Add the excerpt ending as a non-linked ellipsis with brackets.
    //$excerpt_end = ' [&hellip;]';

    //Append the excerpt ending to the token. 
    $out .= $excerpt_end;

    return trim(force_balance_tags($out)); 
  }

  function bac_excerpt_filter($text){
    //Get the full content and filter it.
    $finish_sentence = 1;

    $length = 15;

    $text = get_the_content('');
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);

    $text = str_replace(']]>', ']]&gt;', $text);

    /**By default the code allows all HTML tags in the excerpt**/
    //Control what HTML tags to allow: If you want to allow ALL HTML tags in the excerpt, then do NOT touch.

    //If you want to Allow SOME tags: THEN Uncomment the next line + Line 80.
    $allowed_tags = '<p>'; /* Here I am allowing p, a, strong tags. Separate tags by comma. */

    //If you want to Disallow ALL HTML tags: THEN Uncomment the next line + Line 80, 
    //$allowed_tags = ''; /* To disallow all HTML tags, keep it empty. The Excerpt will be unformated but newlines are preserved. */
    $text = strip_tags($text, $allowed_tags); /* Line 80 */

    //Create the excerpt.
    $text = bac_variable_length_excerpt($text, $length, $finish_sentence);  
    return $text;
  }
  add_filter('get_the_excerpt','bac_excerpt_filter',5);

// Allow shortcode in text widgets
  
  add_filter('widget_text', 'do_shortcode');

// Add Typekit

  function add_typekit(){
    $theme_settings = get_option( 'themesettings_');
    $typekit = '';
    if($theme_settings['add_typekit_fonts'] == '1'){  
      $typekit ='<script src="https://use.typekit.net/' . $theme_settings['typekit_id'] . '.js"></script><script>try{Typekit.load({ async: true });}catch(e){}</script>';
    }

    return $typekit;
  }

// Get page ID with page slugs
  function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
      return $page->ID;
    } else {
      return null;
    }
  }

// Turn hex values into rgb values
  function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    
    if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    
    //return $rgb; // returns an array with the rgb values
    
    $Final_Rgb_color = implode(", ", $rgb);
    
    return $Final_Rgb_color;
  }

// Function to see if the current page is a posts page
  function is_blog () {
    global  $post;
    $posttype = get_post_type($post );
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
  }

// Add custom theme image sizes
  add_image_size( 'theme_icon_preview', 16, 16, array( 'center', 'center' ), true);
  add_image_size( 'theme_image_preview', 100, 100, true);
  add_image_size( 'post-image', 1200, 800, array( 'center', 'center' ), true );
  add_image_size( 'post-thumb', 300, 200, array( 'center', 'center' ), true );

// Display list of available fonts

  function theme_font_choice_labels( $field ) {
    $myoptions = get_option( 'themesettings_');
    $theme_fonts = $myoptions['theme_fonts'];

    $fonts = array();
    
    if($theme_fonts){  
      foreach($theme_fonts as $theme_font){
        $display_name = $theme_font['display_name'];
        $css_name = $theme_font['css_name'];
        $font_type = $theme_font['font_type'];
        $font_value = "'" . $css_name . "', " . $font_type;

        $fonts += [ $font_value => $display_name ];
      }
    }
    
    $field['choices'] = $fonts;
    return $field;

  }
  add_filter('acf/load_field/name=default_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=menu_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=headings_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=paragraph_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=mobile_menu_font_family', 'theme_font_choice_labels');

// Add list of logos

  function theme_logo_options( $field ) {
    $logos = array();

    $logos += [ 'default' => 'Default Logo' ];

    if( have_rows('logos', 'option') ){
      while ( have_rows('logos', 'option') ) {
        the_row();
        if( get_row_layout() == 'color' ){
          $logos += [ 'color' => 'Color Logo' ];
        }
        elseif( get_row_layout() == 'light' ){
          $logos += [ 'light' => 'Light Logo' ];
        }
        elseif( get_row_layout() == 'dark' ){
          $logos += [ 'dark' => 'Dark Logo' ];
        }
        elseif( get_row_layout() == 'mobile' ){
          $logos += ['mobile' => 'Mobile Logo'];
        }  
      }
    }

    $field['choices'] = $logos;
    return $field;

  }
  add_filter('acf/load_field/name=site_header_logo', 'theme_logo_options');

// Display list of available team categories

  function team_category_options( $field ) {

    $team_categories = array();

    $args = array( 'hide_empty=0' );
 
    $terms = get_terms( 'team_cat', $args );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
          $id = $term->term_id;
          $display_name = $term->name;

          $team_categories += [ $id => $display_name ];
        }
    }
    
    $field['choices'] = $team_categories;
    return $field;

  }
  add_filter('acf/load_field/key=field_team_cat', 'team_category_options');

// Display list of available blog categories

  function blog_category_options( $field ) {

    $blog_categories = array();

    $args = array( 'hide_empty=0' );
 
    $terms = get_terms( 'category', $args );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
          $id = $term->term_id;
          $display_name = $term->name;

          $blog_categories += [ $id => $display_name ];
        }
    }
    
    $field['choices'] = $blog_categories;
    return $field;

  }
  add_filter('acf/load_field/name=blog_category', 'blog_category_options');

// Add Google Font url

  $myoptions = get_option( 'themesettings_');
  $add_google_fonts = $myoptions['add_google_fonts'];

  if ($add_google_fonts == 1) {
    function add_google_fonts_css() {

      $myoptions = get_option( 'themesettings_');
      $google_fonts_url = $myoptions['google_fonts_url'];

      wp_register_style( 'googleFonts', $google_fonts_url, false, false );
      wp_enqueue_style( 'googleFonts' );
      
    }
    add_action( 'wp_enqueue_scripts', 'add_google_fonts_css' );
  } 

// Available Animations

  function animation_options( $field ) {
    $animations = array (
      'bounce' => 'Bounce',
      'flash' => 'Flash',
      'pulse' => 'Pulse',
      'rubberBand' => 'Rubber Band',
      'shake' => 'Shake',
      'swing' => 'Swing',
      'tada' => 'Ta Da',
      'wobble' => 'Wobble',
      'jello' => 'Jello',
      'bounceIn' => 'Bounce In',
      'bounceInDown' => 'Bounce In Down',
      'bounceInLeft' => 'Bounce In Left',
      'bounceInRight' => 'Bounce In Right',
      'bounceInUp' => 'Bounce In Up',
      'bounceOut' => 'Bounce Out',
      'bounceOutDown' => 'Bounce Out Down',
      'bounceOutLeft' => 'Bounce Out Left',
      'bounceOutRight' => 'Bounce Out Right',
      'bounceOutUp' => 'Bounce Out Up',
      'fadeIn' => 'Fade In',
      'fadeInDown' => 'Fade In Down',
      'fadeInDownBig' => 'Fade In Down Big',
      'fadeInLeft' => 'Fade In Left',
      'fadeInLeftBig' => 'Fade In Left Big',
      'fadeInRight' => 'Fade In Right',
      'fadeInRightBig' => 'Fade In Right Big',
      'fadeInUp' => 'Fade In Up',
      'fadeInUpBig' => 'Fade In Up Big',
      'fadeOut' => 'Fade Out',
      'fadeOutDown' => 'Fade Out Down',
      'fadeOutDownBig' => 'Fade Out Down Big',
      'fadeOutLeft' => 'Fade Out Left',
      'fadeOutLeftBig' => 'Fade Out Left Big',
      'fadeOutRight' => 'Fade Out Right',
      'fadeOutRightBig' => 'Fade Out Right Big',
      'fadeOutUp' => 'Fade Out Up',
      'fadeOutUpBig' => 'Fade Out Up Big',
      'flipInX' => 'Flip In X Axis',
      'flipInY' => 'Flip In Y Axis',
      'flipOutX' => 'Flip Out X Axis',
      'flipOutY' => 'Flip Out Y Axis',
      'lightSpeedIn' => 'Light Speed In',
      'lightSpeedOut' => 'Light Speed Out',
      'rotateIn' => 'Rotate In',
      'rotateInDownLeft' => 'Rotate In Down Left',
      'rotateInDownRight' => 'Rotate In Down Right',
      'rotateInUpLeft' => 'Rotate In Up Left',
      'rotateInUpRight' => 'Rotate In Up Right',
      'rotateOut' => 'Rotate Out',
      'rotateOutDownLeft' => 'Rotate Out Down Left',
      'rotateOutDownRight' => 'Rotate Out Down Right',
      'rotateOutUpLeft' => 'Rotate Out Up Left',
      'rotateOutUpRight' => 'Rotate Out Up Right',
      'hinge' => 'Hinge',
      'rollIn' => 'Roll In',
      'rollOut' => 'Roll Out',
      'zoomIn' => 'Zoom In',
      'zoomInDown' => 'Zoom In Down',
      'zoomInLeft' => 'Zoom In Left',
      'zoomInRight' => 'Zoom In Right',
      'zoomInUp' => 'Zoom In Up',
      'zoomOut' => 'Zoom Out',
      'zoomOutDown' => 'Zoom Out Down',
      'zoomOutLeft' => 'Zoom Out Left',
      'zoomOutRight' => 'Zoom Out Right',
      'zoomOutUp' => 'Zoom Out Up',
      'slideInDown' => 'Slide In Down',
      'slideInLeft' => 'Slide In Left',
      'slideInRight' => 'Slide In Right',
      'slideInUp' => 'Slide In Up',
      'slideOutDown' => 'Slide Out Down',
      'slideOutLeft' => 'Slide Out Left',
      'slideOutRight' => 'Slide Out Right',
      'slideOutUp' => 'Slide Out Up',
    );
    $field['choices'] = $animations;
    return $field;
  }
  add_filter('acf/load_field/name=animation_effect', 'animation_options');

// Get the colors repeater and use it as choices for button colors
  function theme_button_choices( $field ) {
    $myoptions = get_option( 'themesettings_');
    $color_choices = array();

    if($myoptions['theme_colors']){
      $colors = $myoptions['theme_colors'];
      foreach($colors as $color){
        $color_choices += [ $color['color_class_name'] => $color['color_class_name'] ];
      }
    }
    $field['choices'] = $color_choices;
    return $field;
  }
  add_filter('acf/load_field/name=solid_initial_state', 'theme_button_choices');
  add_filter('acf/load_field/name=solid_hover_state', 'theme_button_choices');
  add_filter('acf/load_field/name=outline_type', 'theme_button_choices');

// Add nav menus based on choice in theme settings
  function custom_navigation_menus() {
    $myoptions = get_option( 'themesettings_');
    $logo_position = $myoptions['logo_position'];

    $center_logo_menu_type = '';

    if ($logo_position === 'center') {
      $center_logo_menu_type = $myoptions['center_logo_menu_type'];
    }
    

    $locations = '';

    if($logo_position === 'center' && $center_logo_menu_type === 'divided'){
      $locations = array(
        'divided-right-menu' => __( 'Divided menu right side', 'cli_theme' ),
        'divided-left-menu' => __( 'Divided menu left side', 'cli_theme' ),
        );
    } else {
      $locations = array(
        'main-menu' => __( 'Main Menu', 'cli_theme' ),
        );
    }
    register_nav_menus( $locations );

  }
  add_action( 'init', 'custom_navigation_menus' );

// SVG Arrows

  function add_arrow($direction, $double){
    $arrow = '';
    $type = '';
    if ($double == 1) {
      $type = '-double';
    }
    if (!empty($direction)) {
      $arrow = file_get_contents(CDM_ROOT . '/imgs/arrow-' . $direction . $type . '.svg');
    }
    
    return $arrow;
  }

// Add custom pagination
  function pagination($pages = '', $range = 1){  
    $showitems = ($range * 2)+1;  
    
    global $paged;
    if(empty($paged)) $paged = 1;
    
    if($pages == ''){
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages){
        $pages = 1;
      }
    }   
    if(1 != $pages){
      echo '<div class="cdm-pagination">';
      if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.get_pagenum_link(1).'" class="cdm-pagination-item cdm-pagination-link"><span class="cdm-pagination-icon first"></span></a>';
      if($paged > 1 && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged - 1).'" class="cdm-pagination-item cdm-pagination-link"><span class="cdm-pagination-icon prev"></span></a>';
      for ($i=1; $i <= $pages; $i++){
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
          echo ($paged == $i)? '<span class="cdm-pagination-item cdm-pagination-current"><span class="cdm-pagination-txt">'.$i.'</span></span>':'<a href="'.get_pagenum_link($i).'"  class="cdm-pagination-item cdm-pagination-link"><span class="cdm-pagination-txt">'.$i.'</span></a>';
        }
      }
      if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'" class="cdm-pagination-item cdm-pagination-link"><span class="cdm-pagination-icon next"></span></a>';  
      if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($pages).'" class="cdm-pagination-item cdm-pagination-link"><span class="cdm-pagination-icon last"></span></a>';
      echo '</div>';
    }
  }

// Update the default wordpress search form
  function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input type="search" value="' . get_search_query() . '" name="s" placeholder="Search" id="s" />
    <span class="search-btn-wrapper"><input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" class="btn" /></span></form>';

    return $form;
  }
  add_filter( 'get_search_form', 'my_search_form' );

// remove wp version param from any enqueued scripts
  function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
    return $src;
  }
  add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
  add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

// Allow svg uploads to wordpress media library
  function custom_upload_mimes ( $existing_mimes=array() ) {
    $existing_mimes['svg'] = 'mime/type';
    return $existing_mimes;
  }
  add_filter('upload_mimes', 'custom_upload_mimes');

// Load theme scripts

  function add_footer_scripts() {
    $myoptions = get_option( 'themesettings_');
    
    wp_register_script( 'footerJS', CDM_ROOT . '/js/scripts.min.js', array('jquery'),'', true);
    wp_enqueue_script( 'footerJS' );
    wp_register_script( 'googleMaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=' . MAPS_API, false,'', true);

  }
   
  add_action( 'wp_enqueue_scripts', 'add_footer_scripts');

// Load backend styles
  function load_admin_style() {
    wp_register_style( 'acfStyles', CDM_ROOT . '/css/admin.min.css', false, false );
    wp_enqueue_style( 'acfStyles' );

    wp_register_script( 'acfScripts', CDM_ROOT . '/js/admin.min.js', array( 'jquery' ), false, false);
    wp_enqueue_script( 'acfScripts' );
  }
  add_action( 'admin_enqueue_scripts', 'load_admin_style', 999 );

// Time Elapsed Function

    function time_elapsed_string($datetime, $full = false) {
      $now = new DateTime;
      $ago = new DateTime($datetime);
      $diff = $now->diff($ago);

      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;

      $string = array(
          'y' => 'year',
          'm' => 'month',
          'w' => 'week',
          'd' => 'day',
          'h' => 'hour',
          'i' => 'minute',
          's' => 'second',
      );
      foreach ($string as $k => &$v) {
          if ($diff->$k) {
              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
          } else {
              unset($string[$k]);
          }
      }

      if (!$full) $string = array_slice($string, 0, 1);
      return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

// UTF-8 String Replace

    function utf8_substr_replace($original, $replacement, $position, $length){
      $startString = mb_substr($original, 0, $position, "UTF-8");
      $endString = mb_substr($original, $position + $length, mb_strlen($original), "UTF-8");

      $out = $startString . $replacement . $endString;

      return $out;
    }

// Function to easily add the current post slug to anything
  function the_slug() {
    if (is_singular()) {
      global $post;
      $slug = $post->post_name;
      return $slug;
    }
  }

// Function to Sanatize String for CSS Class use

  function seoUrl($string) {
      //Lower case everything
      $string = strtolower($string);
      //Make alphanumeric (removes all other characters)
      $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
      //Clean up multiple dashes or whitespaces
      $string = preg_replace("/[\s-]+/", " ", $string);
      //Convert whitespaces and underscore to dash
      $string = preg_replace("/[\s_]/", "-", $string);
      return $string;
  }

// Google Maps API

  function my_acf_init() {
  
    acf_update_setting('google_api_key', MAPS_API);
  }

  add_action('acf/init', 'my_acf_init');

require_once('inc/mobile-detect.php');
require_once('inc/company-info.php');
require_once('inc/custom-post-types.php');
require_once('inc/social.php');
require_once('inc/shortcodes.php');
require_once('inc/widgets.php');
require_once('inc/acf/page-builder.php');
require_once('inc/acf/site-options.php');
require_once('inc/acf/custom-post-types.php');
