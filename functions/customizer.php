<?php 


/**
 * Create the section
 */
function my_custom_section( $wp_customize ) {

  // Create the "My Section" section
  $wp_customize->add_section( 'my_section', array(
    'title'    => __( 'Structural / Layout', 'translation_domain' ),
    'priority' => 12
  ) );

}
add_action( 'customize_register', 'my_custom_section' );

/**
 * Create the setting
 */
function my_custom_setting( $controls ) {

  $controls[] = array(
    'type'     => 'slider',
    'setting'  => 'grid_width',
    'label'    => __( 'Grid Width', 'textdomain' ),
    'section'  => 'my_section',
    'default'  => 960,
    'priority' => 1,
    'choices'  => array(
      'min'  => 320,
      'max'  => 1980,
      'step' => 1,
    ),
  );

  $controls[] = array(
    'type'     => 'color',
    'setting'  => 'body_text_color',
    'label'    => __( 'Body Text Color', 'textdomain' ),
    'section'  => 'my_section',
    'default'  => '#333',
    'priority' => 1,
  );

  return $controls;
}
add_filter( 'kirki/controls', 'my_custom_setting' );

function boztown_customize_register( $wp_customize ) {

  $wp_customize->add_setting( 'header_textcolor' , array(
      'default'     => '#000000',
      'transport'   => 'refresh',
  ) );

  $wp_customize->add_section( 'mytheme_new_section_name' , array(
      'title'      => __( 'Colors', 'mytheme' ),
      'priority'   => 30,
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'label'        => __( 'Header Color', 'mytheme' ),
    'section'    => 'mytheme_new_section_name',
    'settings'   => 'header_textcolor',
  ) ) );

  $wp_customize->add_setting( 'grid_width' , array(
      'default'     => '#000000',
      'transport'   => 'refresh',
  ) );

}

add_action( 'customize_register', 'boztown_customize_register' );

function mytheme_customize_css()
{
    ?>
         <style type="text/css">
             body { background-color: #<?php echo get_theme_mod('header_textcolor'); ?>; color: <?php echo get_theme_mod('body_text_color'); ?>; }
             .container { max-width: <?php echo get_theme_mod('grid_width'); ?>px;}
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');