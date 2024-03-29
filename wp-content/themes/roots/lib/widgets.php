<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="sr-only">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="sr-only">',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');
