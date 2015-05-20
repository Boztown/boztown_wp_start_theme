<?php 


/**
 * Create the section
 */
function boztown_theme_sections( $wp_customize ) {


  $wp_customize->add_section( 'boztown_structural_section', array(
    'title'    => __( 'Structural / Layout', 'translation_domain' ),
    'priority' => 12
  ) );


  $wp_customize->add_section( 'boztown_color_section', array(
    'title'    => __( 'Colors', 'translation_domain' ),
    'priority' => 16
  ) );

}
add_action( 'customize_register', 'boztown_theme_sections' );

/**
 * Create the setting
 */
function boztown_theme_settings( $controls ) {

  $controls[] = array(
    'type'     => 'slider',
    'setting'  => 'grid_width',
    'label'    => __( 'Grid Width', 'textdomain' ),
    'section'  => 'boztown_structural_section',
    'default'  => 960,
    'priority' => 1,
    'choices'  => array(
      'min'  => 320,
      'max'  => 1980,
      'step' => 1,
    ),
  );

  $controls[] = array(
    'type'     => 'slider',
    'setting'  => 'grid_padding',
    'label'    => __( 'Grid Padding', 'textdomain' ),
    'section'  => 'boztown_structural_section',
    'default'  => 4,
    'priority' => 1,
    'choices'  => array(
      'min'  => 0,
      'max'  => 100,
      'step' => 1,
    ),
  );

  $controls[] = array(
    'type'     => 'color',
    'setting'  => 'body_text_color',
    'label'    => __( 'Body Text Color', 'textdomain' ),
    'section'  => 'boztown_color_section',
    'default'  => '#333',
    'priority' => 1,
  );

  return $controls;
}

add_filter( 'kirki/controls', 'boztown_theme_settings' );


function boztown_customize_css()
{
    ?>
     <style type="text/css">
         body { background-color: #<?php echo get_theme_mod('header_textcolor'); ?>; color: <?php echo get_theme_mod('body_text_color'); ?>; }
         .container { max-width: <?php echo get_theme_mod('grid_width'); ?>px;}
        .container .column,
        .container .columns {
         margin-left: <?php echo get_theme_mod('grid_padding'); ?>%; }
     </style>
    <?php
}

// how about putting these in the footer so devs can override using CSS in the actual stylesheets?
//add_action( 'wp_footer', 'boztown_customize_css');