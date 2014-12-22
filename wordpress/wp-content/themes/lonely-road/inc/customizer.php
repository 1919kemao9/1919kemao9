<?php
/**
 * Lonely Road Theme Customizer
 *
 * @package Lonely Road
 */
 
 $lonely_road_social_order = 1;

 /**
 * Add social urls customization
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @param String $network network name (facebook, twitter, ...)
 * @param String $title Name of the network
 */
 function lonely_road_add_social( $wp_customize, $network, $title ) {
 	global $lonely_road_social_order;
	 $wp_customize->add_setting( 'lonely_road_social_' . $network , array(
    	'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
    new WP_Customize_Control(
	        $wp_customize,
	        'lonely_road_' . $network,
	        array(
	            'label'          => $title,
	            'section'        => 'lonely_road_social',
	            'settings'       => 'lonely_road_social_' . $network,
	            'type'           => 'text',
	            'priority'		 => $lonely_road_social_order
	        )
	    )
	);
	$lonely_road_social_order++;
 }

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lonely_road_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Color 1
	$wp_customize->add_setting( 'lonely_road_color1' , array(
    	'default'     => '#484d4f',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lonely_road_color1', array(
		'label'        => __( 'Color 1', 'lonely-road' ),
		'section'    => 'colors',
		'settings'   => 'lonely_road_color1'
	) ) );
	
	// Color 2
	$wp_customize->add_setting( 'lonely_road_color2' , array(
    	'default'     => '#808083',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lonely_road_color2', array(
		'label'        => __( 'Color 2', 'lonely-road' ),
		'section'    => 'colors',
		'settings'   => 'lonely_road_color2'
	) ) );
	
	// Social Icons
	$wp_customize->add_section( 'lonely_road_social' , array(
	    'title'      => __( 'Social Icons', 'lonely-road' ),
	    'priority'   => 100
	) );
	lonely_road_add_social( $wp_customize, 'facebook', 'Facebook URL');
	lonely_road_add_social( $wp_customize, 'twitter', 'Twitter URL');
	lonely_road_add_social( $wp_customize, 'gplus', 'Google Plus URL');
	lonely_road_add_social( $wp_customize, 'pinterest', 'Pinterest URL');
	lonely_road_add_social( $wp_customize, 'linkedin', 'LinkedIn URL');
	lonely_road_add_social( $wp_customize, 'instagram', 'Instagram URL');
	lonely_road_add_social( $wp_customize, 'behance', 'Behance URL');
	lonely_road_add_social( $wp_customize, 'github', 'GitHub URL');
	lonely_road_add_social( $wp_customize, 'vimeo', 'Vimeo URL');
	lonely_road_add_social( $wp_customize, 'tumblr', 'Tumblr URL');
	lonely_road_add_social( $wp_customize, 'soundcloud', 'SoundCloud URL');
	lonely_road_add_social( $wp_customize, 'spotify', 'Spotify URL');
	lonely_road_add_social( $wp_customize, 'flickr', 'Flickr URL');
	lonely_road_add_social( $wp_customize, 'lastfm', 'Last.fm URL');
	lonely_road_add_social( $wp_customize, 'rdio', 'Rdio URL');
	lonely_road_add_social( $wp_customize, 'skype', 'Skype URL');
	// RSS
	$wp_customize->add_setting( 'lonely_road_social_rss' , array(
    	'default'     => 'yes',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'lonely_road_rss',
	        array(
	            'label'          => __( 'Show RSS', 'lonely-road' ),
	            'section'        => 'lonely_road_social',
	            'settings'       => 'lonely_road_social_rss',
	            'type'           => 'select',
	            'choices'		 => array(
	            	'yes'	=> __('Yes', 'lonely-road'),
	            	'no'	=> __('No', 'lonely-road')
	            ),
	            'priority'		 => 100
	        )
	    )
	);
	
	// Font
	$wp_customize->add_section( 'lonely_road_font' , array(
	    'title'      => __( 'Font', 'lonely-road' ),
	    'priority'   => 100
	) );
	$wp_customize->add_setting( 'lonely_road_main_font' , array(
    	'default'     => 'Open+Sans',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control(
    new WP_Customize_Control(
	        $wp_customize,
	        'lonely_road_main_font',
	        array(
	            'label'          => __( 'Main Font', 'lonely-road' ),
	            'section'        => 'lonely_road_font',
	            'settings'       => 'lonely_road_main_font',
	            'type'           => 'select',
	            'choices'		 => array(
	            	'Open+Sans'	=> 'Open Sans',
	            	'Roboto'	=> 'Roboto',
	            	'Lato'		=> 'Lato',
	            	'PT+Sans'	=> 'PT Sans',
	            	'Source+Sans+Pro'	=> 'Source Sans Pro',
	            	'Exo+2'		=> 'Exo 2',
	            	'Ubuntu'	=> 'Ubuntu',
	            	'Istok+Web'	=> 'Istok Web',
	            	'Nobile'	=> 'Nobile'
	            )
	        )
	    )
	);

	// Logo
	$wp_customize->add_section( 'lonely_road_logo' , array(
	    'title'      => __( 'Logo', 'lonely-road' ),
	    'priority'   => 100
	) );
	$wp_customize->add_setting( 'lonely_road_logo' , array(
    	'default'     => '',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'lonely_road_logo',
           array(
               'label'      => __( 'Upload a logo', 'lonely-road' ),
               'section'    => 'lonely_road_logo',
               'settings'   => 'lonely_road_logo',
			   'sanitize_callback' => 'esc_url_raw'
           )
       )
   );

}
add_action( 'customize_register', 'lonely_road_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lonely_road_customize_preview_js() {
	wp_enqueue_script( 'lonely_road_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20141021', true );
}
add_action( 'customize_preview_init', 'lonely_road_customize_preview_js' );


function lonely_road_customize_css()
{
    ?>
         <style type="text/css">
         	 /* Main Font */
         	 body, button, input, select, textarea {
         	 	font-family: '<?php echo str_replace('+',' ',esc_attr( get_theme_mod( 'lonely_road_main_font', 'Open Sans' ) ) ); ?>', sans-serif;
         	 }
         	 
             /* color 1 */
             .header-wrapper, .main-navigation ul ul li, #secondary, .entry-content .date {
	             background-color: <?php echo esc_attr( get_theme_mod( 'lonely_road_color1', '#484d4f' ) ); ?>;
             }
             .sticky {
	             border: 3px solid <?php echo esc_attr( get_theme_mod( 'lonely_road_color1', '#484d4f' ) ); ?>;
             }
             
             /* color 2 */
             .navigation-wrapper {
	             background-color: <?php echo esc_attr( get_theme_mod( 'lonely_road_color2', '#808083' ) ); ?>;
             }
             
             .social li a {
	             color: <?php echo esc_attr( get_theme_mod( 'lonely_road_color2', '#808083' ) ); ?>;
             }
         </style>
    <?php
}
add_action( 'wp_head', 'lonely_road_customize_css');
