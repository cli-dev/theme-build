<?php

if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'name' => 'Footer Column 1',
    'id' => 'footer-1',
    'description' => 'Footer column 1 widget area',
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
  
  register_sidebar(array(
    'name' => 'Footer Column 2',
    'id' => 'footer-2',
    'description' => 'Footer column 2 widget area',
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
  
  register_sidebar(array(
    'name' => 'Footer Column 3',
    'id' => 'footer-3',
    'description' => 'Footer column 3 widget area',
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
  
  register_sidebar(array(
    'name' => 'Footer Column 4',
    'id' => 'footer-4',
    'description' => 'Footer column 4 widget area',
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
  
  register_sidebar(array(
    'name' => 'Footer Column 5',
    'id' => 'footer-5',
    'description' => 'Footer column 5 widget area',
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'name' => 'Footer Column 6',
    'id' => 'footer-6',
    'description' => 'Footer column 6 widget area',
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
  
  register_sidebar(array(
    'name' => 'Footer Bottom',
    'id' => 'footer-bottom',
    'description' => 'Secondary footer Area',
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
  
  register_sidebar(array(
    'name' => 'Content Bottom',
    'id' => 'content-bottom',
    'description' => '',
    'before_widget' => '<div id="%1$s" class="content-bottom-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'name' => 'Side Menu Bottom Widget Area',
    'id' => 'side-menu-bottom-widget',
    'description' => '',
    'before_widget' => '<div id="%1$s" class="side-menu-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'name' => 'Header Widget Area',
    'id' => 'header-widgets',
    'description' => '',
    'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
}

// Register and load the widget
function wpb_load_widget() {
  register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget 
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('WPBeginner Widget', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( 'Hello, World!', 'wpb_widget_domain' );
echo $args['after_widget'];
}
    
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
  
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

?>