<?php
//----------------------Header LAYOUT SECTION----------------------------------

// Add the heder layout setting.
$wp_customize->add_setting('complete[header_layout_id]', array(
		'type' => 'option',
		'default'           => 'header_layout2',
		'sanitize_callback' => 'sanitize_key',
	)
);

// Add the heaeder layout control.
$wp_customize->add_control('header_layout_id',array(
			'type' => 'select',
			'label'    => esc_html__( 'Header Layout *', 'sktgravida' ),
			'section'  => 'headlayout_section',
			'settings' => 'complete[header_layout_id]',
			'choices'  => array(
				'header_layout2' => __('Header Layout 2', 'sktgravida'),
		  )
  ) );
 
//============================HEADER - LOGO SECTION=================================


// Site Title Font Family
$wp_customize->add_setting( 'complete[logo_font_id][font-family]', array(
	'type' => 'option',
	'default' => 'Scada',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_font_family', array(
					'type' => 'select',
					'label' => __('Family','sktgravida'),
					'section' => 'headlogo_section',
					'settings' => 'complete[logo_font_id][font-family]',
					'choices' => customizer_library_get_font_choices(),
			) );

// Site Title Font Subsets
$wp_customize->add_setting( 'complete[logo_font_id][subsets]', array(
	'type' => 'option',
	'default' => 'latin',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_font_subsets', array(
					'type' => 'select',
					'label' => __('Subsets','sktgravida'),
					'section' => 'headlogo_section',
					'settings' => 'complete[logo_font_id][subsets]',
					'choices' => customizer_library_get_google_font_subsets(),
			) );


//Site Title Font Size
$wp_customize->add_setting('complete[logo_font_id][font-size]', array(
	'type' => 'option',
	'default' => '38px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_font_size', array(
				'type' => 'text',
				'label' => __('Site Title Font Size','sktgravida'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_font_id][font-size]',
						'input_attrs'	=> array(
							'class'	=> 'mini_control',
						)
			) );

//Site Title Text Color
$wp_customize->add_setting( 'complete[logo_color_id]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color_id', array(
				'label' => __('Site Title Color','sktgravida'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_color_id]',
			) ) );
			
//First Letter Site Title Text Color
$wp_customize->add_setting( 'complete[first_logo_color_id]', array(
	'type' => 'option',
	'default' => '#0ec7ab',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'first_logo_color_id', array(
				'label' => __('Site Title Color First Letter','sktgravida'),
				'section' => 'headlogo_section',
				'settings' => 'complete[first_logo_color_id]',
			) ) );
			

//LOGO UPLOAD FIELD
$wp_customize->add_setting( 'complete[logo_image_id][url]',array( 
	'type' => 'option',
//	'default' => ''. get_template_directory_uri().'/images/logo.png',
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image_id',array(
					'label'       => __( 'Logo Image *', 'sktgravida' ),
					'section'     => 'headlogo_section',
					'settings'    => 'complete[logo_image_id][url]',
						)
					)
			);
			
// Logo Image Height
$wp_customize->add_setting('complete[logo_image_height]', array(
	'type' => 'option',
	'default' => '25px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_image_height', array(
				'type' => 'text',
				'label' => __('Image Height','sktgravida'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_image_height]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );
			
// Logo Image Width
$wp_customize->add_setting('complete[logo_image_width]', array(
	'type' => 'option',
	'default' => '230px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_image_width', array(
				'type' => 'text',
				'label' => __('Image Width','sktgravida'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_image_width]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );	
			
// Logo Margin Top
$wp_customize->add_setting('complete[logo_margin_top]', array(
	'type' => 'option',
	'default' => '5px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_margin_top', array(
				'type' => 'text',
				'label' => __('Logo Margin Top','sktgravida'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_margin_top]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );							
//============================HEADER - TOP BAR SECTION=============================				
//HEADER BACKGROUND COLOR
$wp_customize->add_setting( 'complete[head_color_id]', array(
	'type' => 'option',
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_color_id', array(
				'label' => __('Header Background Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[head_color_id]',
			) ) );

// Header Background Image
$wp_customize->add_setting( 'complete[header_bg_setting]',array( 
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_bg_setting',array(
					'label'       => __( 'header Background Image', 'sktgravida' ),
					'section'     => 'headheader_section',
					'settings'    => 'complete[header_bg_setting]'
						)
					)
			);
//============================HEADER - MENU SECTION================================
//MENU TEXT COLOR
$wp_customize->add_setting( 'complete[menutxt_color_id]', array(
	'type' => 'option',
	'default' => '#e7e7e7',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menutxt_color_id', array(
				'label' => __('Menu Text Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[menutxt_color_id]',
			) ) );

//MENU HOVER TEXT COLOR
$wp_customize->add_setting( 'complete[menutxt_color_hover]', array(
	'type' => 'option',
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menutxt_color_hover', array(
				'label' => __('Menu Hover Text Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[menutxt_color_hover]',
			) ) );

//MENU ACTIVE TEXT COLOR
$wp_customize->add_setting( 'complete[menutxt_color_active]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menutxt_color_active', array(
				'label' => __('Menu Active Text Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[menutxt_color_active]',
			) ) );
			
//MENU BACKGROUND COLOR
$wp_customize->add_setting( 'complete[mnbg_color_id]', array(
	'type' => 'option',
	'default' => '#0ec7ab',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnbg_color_id', array(
				'label' => __('Menu Background Hover Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mnbg_color_id]',
			) ) );
			
//SUBMENU TEXT COLOR
$wp_customize->add_setting( 'complete[submnu_textcolor_id]', array(
	'type' => 'option',
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submnu_textcolor_id', array(
				'label' => __('Sub Menu Text Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[submnu_textcolor_id]',
			) ) );			
			
			
//SUBMENU BACKGROUND COLOR
$wp_customize->add_setting( 'complete[submnbg_color_id]', array(
	'type' => 'option',
	'default' => '#0ec7ab',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submnbg_color_id', array(
				'label' => __('Sub Menu Background Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[submnbg_color_id]',
			) ) );			
			
//SUBMENU HOVER BACKGROUND COLOR
$wp_customize->add_setting( 'complete[mnshvr_color_id]', array(
	'type' => 'option',
	'default' => '#c8c8c8',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnshvr_color_id', array(
				'label' => __('Sub Menu Hover Background Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mnshvr_color_id]',
			) ) );	
			
			
//MOBILE MENU BACKGROUND COLOR
$wp_customize->add_setting( 'complete[mobbg_color_id]', array(
	'type' => 'option',
	'default' => '#383939',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobbg_color_id', array(
				'label' => __('Mobile Menu Background Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mobbg_color_id]',
			) ) );	
			
//MOBILE MENU TOP BAR BACKGROUND COLOR
$wp_customize->add_setting( 'complete[mobbgtop_color_id]', array(
	'type' => 'option',
	'default' => '#0ec7ab',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobbgtop_color_id', array(
				'label' => __('Mobile Top Bar Background Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mobbgtop_color_id]',
			) ) );	
			
//MOBILE MENU TEXT COLOR
$wp_customize->add_setting( 'complete[mobmenutxt_color_id]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobmenutxt_color_id', array(
				'label' => __('Mobile Menu Text Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mobmenutxt_color_id]',
			) ) );	
			
			
//MOBILE MENU TOGGLE COLOR
$wp_customize->add_setting( 'complete[mobtoggle_color_id]', array(
	'type' => 'option',
	'default' => '#e7e7e7',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobtoggle_color_id', array(
				'label' => __('Mobile Outer Toggle Bar Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mobtoggle_color_id]',
			) ) );	
			
//MOBILE MENU INNER TOGGLE COLOR
$wp_customize->add_setting( 'complete[mobtoggleinner_color_id]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobtoggleinner_color_id', array(
				'label' => __('Mobile Inner Toggle Bar Color','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mobtoggleinner_color_id]',
			) ) );											
								
			
//MENU FONT FAMILY
$wp_customize->add_setting( 'complete[mnutitle_font_id][font-family]', array(
	'type' => 'option',
	'default' => 'Roboto',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('mnutitle_font_family', array(
					'type' => 'select',
					'label' => __('Family','sktgravida'),
					'section' => 'headheader_section',
					'settings' => 'complete[mnutitle_font_id][font-family]',
					'choices' => customizer_library_get_font_choices(),
			) );

////MENU FONT SUBSETS
$wp_customize->add_setting( 'complete[mnutitle_font_id][subsets]', array(
	'type' => 'option',
	'default' => 'latin',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('mnutitle_font_subsets', array(
					'type' => 'select',
					'label' => __('Subsets','sktgravida'),
					'section' => 'headheader_section',
					'settings' => 'complete[mnutitle_font_id][subsets]',
					'choices' => customizer_library_get_google_font_subsets(),
			) );

//MENU TEXT SIZE
$wp_customize->add_setting('complete[menu_size_id]', array(
	'type' => 'option',
	'default' => '14px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('menu_size_id', array(
				'type' => 'text',
				'label' => __('Menu Font Size','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[menu_size_id]',
						'input_attrs'	=> array(
							'class'	=> 'mini_control',
						)
			) );
			
//TRANSPARENT HEADER FIELD
$wp_customize->add_setting('complete[head_transparent]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'complete_sanitize_checkbox',
) );
 
			$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'head_transparent', array(
				'label' => __('Transparent Header on Frontpage *','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[head_transparent]',
			)) );
			
//BACKGROUND TRANSPARENCY
$wp_customize->add_setting( 'complete[head_bg_trans]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );

	$wp_customize->add_control('head_bg_trans', array(
		'type' => 'text',
		'label' => __('Background Transparency (Must On Above Transparent Header Option)','sktgravida'),
		'section' => 'headheader_section',
		'settings' => 'complete[head_bg_trans]',
				'input_attrs'	=> array(
					'class'	=> 'mini_control',
				)
	) );			
			
//Turn Menu Text &amp; All Headings to Uppercase
$wp_customize->add_setting('complete[mnutxt_upcase_id]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'complete_sanitize_checkbox',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'mnutxt_upcase_id', array(
				'label' => __('Turn Menu Text to Uppercase','sktgravida'),
				'section' => 'headheader_section',
				'settings' => 'complete[mnutxt_upcase_id]',
			)) );			