<?php
function complete_customizer_register( $wp_customize ) {
	
require(get_template_directory() . '/customizer/includes/control-toggle.php');
require(get_template_directory() . '/customizer/includes/control-info.php');
require(get_template_directory() . '/customizer/includes/control-editor.php');
require(get_template_directory() . '/customizer/includes/control-multicheck.php');
require(get_template_directory() . '/customizer/includes/control-radioimg.php');
require(get_template_directory() . '/customizer/includes/helpers.php');

//========================= ADD PANELS==============================
	$wp_customize->add_panel( 'basic_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Basic', 'sktgravida' ),
	) );
	
	$wp_customize->add_panel( 'header_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Header', 'sktgravida' ),
	) );

	
	$wp_customize->add_panel( 'front_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Front Page', 'sktgravida' ),
	) );
	
	$wp_customize->add_panel( 'footer_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Footer', 'sktgravida' ),
	) );
//========================= ADD SECTIONS==============================

        $wp_customize->add_section( 'layout_section', array(
            'title'       => __( 'Site Layout', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
        $wp_customize->add_section( 'general_color_section', array(
            'title'       => __( 'Colors Options', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
        $wp_customize->add_section( 'basic_typography', array(
            'title'       => __( 'Fonts Typography', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
        $wp_customize->add_section( 'customcode_section', array(
            'title'       => __( 'Custom CSS', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );		
		
        $wp_customize->add_section( 'basic_sidebar_section', array(
            'title'       => __( 'Create Sidebars', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
        $wp_customize->add_section( 'headtopbar_section', array(
            'title'       => __( 'Topbar', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
        $wp_customize->add_section( 'headheader_section', array(
            'title'       => __( 'Header', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
        $wp_customize->add_section( 'headlogo_section', array(
            'title'       => __( 'Site Title & Logo', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
		$wp_customize->add_section( 'headlayout_section', array(
            'title'       => __( 'Header Layout ', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
        $wp_customize->add_section( 'buttons_section', array(
            'title'       => __( 'Section Blocks Button', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'buttons_panel',
        ) );		

        $wp_customize->add_section( 'slider_section', array(
            'title'       => __( 'Slider', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );
		
		
		$wp_customize->add_section( 'home_welcome', array(
            'title'       => __( 'Home Welcome Content', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );	
		
        $wp_customize->add_section( 'home_blocks', array(
            'title'       => __( 'Home Featured Blocks', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );	

		
        $wp_customize->add_section( 'home_sections1', array(
            'title'       => __( 'Home Section 1', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );
		
        $wp_customize->add_section( 'home_sections2', array(
            'title'       => __( 'Home Section 2', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );
		
        $wp_customize->add_section( 'home_sections3', array(
            'title'       => __( 'Home Section 3', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );	
		
        $wp_customize->add_section( 'home_sections4', array(
            'title'       => __( 'Home Section 4', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );
		
        $wp_customize->add_section( 'home_sections5', array(
            'title'       => __( 'Home Section 5', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );	
		
        $wp_customize->add_section( 'home_sections6', array(
            'title'       => __( 'Home Section 6', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );
		
        $wp_customize->add_section( 'home_sections7', array(
            'title'       => __( 'Home Section 7', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );				
		
        $wp_customize->add_section( 'home_sections8', array(
            'title'       => __( 'Home Section 8', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );	
		
        $wp_customize->add_section( 'home_sections9', array(
            'title'       => __( 'Home Section 9', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );		
		
        $wp_customize->add_section( 'home_sections10', array(
            'title'       => __( 'Home Section 10', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );			
		
        $wp_customize->add_section( 'home_sections11', array(
            'title'       => __( 'Home Section 11', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );																
				
        $wp_customize->add_section( 'frontpage_section', array(
            'title'       => __( 'Front Page Settings', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );

        $wp_customize->add_section( 'footercolors_section', array(
            'title'       => __( 'Footer Style', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'footer_panel',
        ) );
		
        $wp_customize->add_section( 'footer_columns_section', array(
            'title'       => __( 'Footer Columns', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'footer_panel',
        ) );		

        $wp_customize->add_section( 'copyright_section', array(
            'title'       => __( 'Copyright Area', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'footer_panel',
        ) );
		
        $wp_customize->add_section( 'miscmedia_section', array(
            'title'       => __( 'Media Settings', 'sktgravida' ),
            'priority'    => 10,
            'panel'       => 'misc_panel',
			'description' => __( 'Meida Settings', 'sktgravida' ),
        ) );

$wp_customize->remove_section( 'background_image' );
$wp_customize->get_control( 'background_color'  )->section	= 'general_color_section';
$wp_customize->get_control( 'background_image'  )->section	= 'general_color_section';
$wp_customize->get_control( 'background_color' )->label = __('Site Background Color','complete');
$wp_customize->get_control( 'background_image' )->label = __('Site Background Image','complete');
$wp_customize->get_control( 'background_color' )->description = __('Does not affect the front page if the Site Layout is set to Full-Width.','complete');
$wp_customize->get_control( 'background_image' )->description = __('Does not affect the front page if the Site Layout is set to Full-Width.','complete');
$wp_customize->get_section( 'title_tagline'  )->panel		= 'basic_panel';

if($wp_customize->get_section( 'static_front_page'  )){
	$wp_customize->get_section( 'static_front_page'  )->panel	= 'front_panel';
}
if($wp_customize->get_section( 'color'  )){
	$wp_customize->get_section( 'color'  )->panel		= 'basic_panel';
}

$wp_customize->get_control( 'blogname' )->section	= 'headlogo_section';
$wp_customize->get_control( 'blogdescription' )->section	= 'headlogo_section';
$wp_customize->get_setting( 'blogname' )->transport	= 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport	= 'postMessage';


//Wordpress 4.7+ Remove Wordpress's own custom css 
$wp_customize->remove_section( 'custom_css' );

//Integer
function complete_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//--------------------INCLUDE CONTROLS
require(get_template_directory() . '/customizer/controls/settings-basic.php');
require(get_template_directory() . '/customizer/controls/settings-header.php');
require(get_template_directory() . '/customizer/controls/settings-frontpage.php');
require(get_template_directory() . '/customizer/controls/settings-postpage.php');
require(get_template_directory() . '/customizer/controls/settings-footer.php');
require(get_template_directory() . '/customizer/controls/settings-misc.php');
require(get_template_directory() . '/customizer/controls/settings-shortcodes.php');
require(get_template_directory() . '/customizer/controls/settings-sectionbuttons.php');
require(get_template_directory() . '/customizer/controls/settings-code.php');
}
add_action( 'customize_register', 'complete_customizer_register' );
 
//==========================ENQEUE CSS & JS FILES===============================

function complete_live_preview()
{
	wp_enqueue_script(  'complete-live', get_template_directory_uri().'/customizer/assets/live.js',array( 'jquery','customize-preview' ),true);
}
add_action( 'customize_preview_init', 'complete_live_preview' );



function enqueue_customizer_scripts(){
	wp_enqueue_script( 'jquery-ui-tooltip' );
	wp_enqueue_script( 'hoverIntent' );
    wp_enqueue_style( 'complete-customizer-css', get_template_directory_uri().'/customizer/assets/customizer.css', 'customizer-css');
	wp_enqueue_script('complete-customizer-js',get_template_directory_uri().'/customizer/assets/customizer.js', array('customize-controls'), true);
	
	//Wordpress 4.7 FIXES
	if ( function_exists( 'wp_update_custom_css_post' ) ) {  $wp4_7 = 'wp4_7';  }else{  $wp4_7 = '';  }	
	
	wp_localize_script( 'complete-customizer-js', 'objectL10n', array(
		'sitettfont' => __( 'Site Title Font', 'complete' ),
		'tpbarfont' => __( 'Topbar Font', 'complete' ),
		'sldefont' => __( 'Slider Font Typography & Colors', 'complete' ),
		'menufont' => __( 'Headings and Post Titles Font', 'complete' ),
		'mnufont' => __( 'Menu Font', 'complete' ),
		'logofont' => __( 'Site Content Font', 'complete' ),
		'globalh1' => __( 'For H1', 'complete' ),
		'globalh2' => __( 'For H2', 'complete' ),
		'globalh3' => __( 'For H3', 'complete' ),
		'globalh4' => __( 'For H4', 'complete' ),
		'globalh5' => __( 'For H5', 'complete' ),
		'globalh6' => __( 'For H6', 'complete' ),
		'image' => __( 'Image', 'complete' ),
		'button1' => __( 'Button 1', 'complete' ),
		'button2' => __( 'Button 2', 'complete' ),
		'slideshow' => __( 'Slideshow', 'complete' ),
		'video' => __( 'Video', 'complete' ),
		'switchtheme' => __( 'Switch Theme', 'complete' ),
		'widgetareas' => __( 'Your Sidebars', 'complete' ),
		'statictitle' => __( 'Static Slide Settings', 'complete' ),
		'nivotitle' => __( 'Nivo / Accordion Slider Settings', 'complete' ),
		'wp4_7' => $wp4_7,
) );
}
add_action( 'customize_controls_enqueue_scripts', 'enqueue_customizer_scripts' );

include_once(get_template_directory() . '/customizer/extra.php');