<?php
function complete_option_defaults() {
	$defaults = array(
		'converted' => '',
		'site_layout_id' => 'site_full',
		'single_post_layout_id' => 'single_layout1',
		'header_layout_id' => 'head-type2',
		'center_width' => 83.50,
		'content_bg_color' => '#ffffff',
		'divider_icon' => 'fa-stop',
		'head_transparent' => '',
		'trans_header_color' => '#fff',
		'totop_id' => '',
		'footer_text_id' => __('<div class="left">Copyright &copy; 2019 Gravida. Theme by SKT Themes</div>
<div class="right"><a href="#">Home</a> | <a href="#">Contact Us</a> | <a href="#">Sitemap</a></div>
<div class="clear"></div>', 'sktgravida'),
		'phntp_text_id' => __('<i class="fa fa-phone"></i> 12 8888 6666', 'sktgravida'),
		'emltp_text' => __('<a href="mailto:info@sitename.com"><i class="fa fa-envelope"></i>info@sitename.com </a>', 'sktgravida'),
		'sintp_text' => __('<a href="#"><i class="fa fa-user"></i> Sign In</a>', 'sktgravida'),
		'suptp_text' => __('<a href="#"><i class="fa fa-pencil"></i>Sign Up </a>', 'sktgravida'),
		'footmenu_id' => '1',
		'copyright_center' => '',
		'custom_slider' => '',
		'slider_type_id' => 'static',
		'n_slide_time_id' => '6000',
		'slide_height' => '500px',
		'slidefont_size_id' => '36px',
		'slider_txt_hide' => '',
		
		'slide_image1' => ''.get_template_directory_uri().'/images/slides/slider1.jpg',
        'slide_title1' => 'The Next Level in WordPress Themes',
        'slide_desc1' => 'Take your website to the next level.',
        'slide_link1' => '',
        'slide_btn1' => '',
        
        'slide_image2' => ''.get_template_directory_uri().'/images/slides/slider2.jpg',
        'slide_title2' => 'Web Development Company',
        'slide_desc2' => 'We set new standards in user experience & make future happen. We are a group of experienced designers and developers.',
        'slide_link2' => '',
        'slide_btn2' => '',
        
        'slide_image3' => ''.get_template_directory_uri().'/images/slides/slider3.jpg',
        'slide_title3' => 'We Are A Unique Theme Creator',
        'slide_desc3' => 'Donec eleifend sapien ipsum',
        'slide_link3' => '',
        'slide_btn3' => '',
		
		'post_info_id' => '1',
		'post_nextprev_id' => '1',
		'post_comments_id' => '1',
		'page_header_color' => '#545556',
		'pageheader_bg_image' => ''.get_template_directory_uri().'/images/default-header-img.jpg',
		'hide_pageheader' => '0',
		'page_header_txtcolor' => '#555555',
		
		'post_header_color' => '#545556',
		'postheader_bg_image' => ''.get_template_directory_uri().'/images/default-header-img.jpg',
		'hide_postheader' => '0',		

		'blog_cat_id' => '',
		'blog_num_id' => '9',
		'blog_layout_id' => '',
		'show_blog_thumb' => '1',
		
		'recentpost_block_button' => __('Read More', 'sktgravida'),
		
		'sec_color_id' => '#0ec7ab',
		'mnbg_color_id' => '#0ec7ab',
		'submnu_textcolor_id' => '#000000',
		'submnbg_color_id' => '#c8c8c8',
		'mnshvr_color_id' => '#0ec7ab',
		'mobbg_color_id' => '#383939',
		'mobbgtop_color_id' => '#0ec7ab',
		'mobmenutxt_color_id' => '#FFFFFF',
		
		'mobtoggle_color_id' => '#e7e7e7',
		'mobtoggleinner_color_id' => '#FFFFFF',
		
		'sectxt_color_id' => '#FFFFFF',
		'content_font_id' =>  array('font-family' => 'Arimo', 'font-size' => '13px'),
		'primtxt_color_id' => '#2b2b2b',
//		'logo_image_id' => array(  'url'=>''.get_template_directory_uri().'/images/logo.png'),
		'logo_image_id' => array(  'url'=>''),
		'logo_font_id' => array('font-family' => 'Scada', 'font-size' => '38px'),
		'logo_color_id' => '#ffffff',
		'first_logo_color_id' => '#0ec7ab',
		
		'logo_image_height' => '25px;',
		'logo_image_width' => '230px;',
		'logo_margin_top' => '5px;',
		
		'tpbt_font_id' => array('font-family' => 'Lato', 'font-size' => '14px'),
		'tpbt_color_id' => '#ffffff',
		'tpbt_hvcolor_id' => '#edecec',	
		
		'sldtitle_font_id' => array('font-family' => 'Oswald', 'font-size' => '38px'),
		'slddesc_font_id' => array('font-family' => 'Oswald', 'font-size' => '18px'),
		'sldbtn_font_id' => array('font-family' => 'Oswald', 'font-size' => '14px'),
		'slider_upcase_id' => '1',
		
		'slidetitle_color_id' => '#ffffff',	
		'slidetitle_bg_color_id' => '#0ec7ab',
		'slider_bg_trans' => '1',
		'slddesc_color_id' => '#ffffff',	
		'slddesc_bg_color_id' => '#000000',	
		'sldbtntext_color_id' => '#ffffff',
		'sldbtn_color_id' => '#000000',
		'sldbtn_hvcolor_id' => '#0ec7ab',	
		
		'slide_pager_color_id' => '#ffffff',	
		'slide_active_pager_color_id' => '#000000',	
		
		'global_link_color_id' => '#0ec7ab',
		'global_link_hvcolor_id' => '#999999',		
		
		'global_h1_color_id' => '#494949',
		'global_h1_hvcolor_id' => '#0ec7ab',	
		'global_h2_color_id' => '#494949',
		'global_h2_hvcolor_id' => '#0ec7ab',
		'global_h3_color_id' => '#494949',
		'global_h3_hvcolor_id' => '#0ec7ab',
		'global_h4_color_id' => '#525252',
		'global_h4_hvcolor_id' => '#0ec7ab',
		'global_h5_color_id' => '#494949',
		'global_h5_hvcolor_id' => '#0ec7ab',
		'global_h6_color_id' => '#494949',
		'global_h6_hvcolor_id' => '#0ec7ab',	
		
		'post_meta_color_id' => '#494949',
		'team_box_color_id' => '#f7f7f7',
		
		'social_text_color_id' => '#ffffff',
		'social_icon_color_id' => '#ffffff',
		'social_hover_text_color_id' => '#0ec7ab',
		'social_hover_icon_color_id' => '#0ec7ab',
		'testimonialbox_color_id' => '#f9f9f9',		
		'testimonial_pager_color_id' => '#c6c6c6',
		'testimonial_activepager_color_id' => '#868686',
		'gallery_filter_color_id' => '#0ec7ab',
		'gallery_filtertxt_color_id' => '#494949',
		'gallery_activefiltertxt_color_id' => '#ffffff',
		'skillsbar_bgcolor_id' => '#f8f8f8',
		'skillsbar_text_color_id' => '#ffffff',								
		'global_h1_font_id' => array('font-family' => 'Oswald', 'font-size' => '30px'),
		'global_h2_font_id' => array('font-family' => 'Oswald', 'font-size' => '25px'),
		'global_h3_font_id' => array('font-family' => 'Oswald', 'font-size' => '20px'),
		'global_h4_font_id' => array('font-family' => 'Oswald', 'font-size' => '18px'),
		'global_h5_font_id' => array('font-family' => 'Oswald', 'font-size' => '15px'),
		'global_h6_font_id' => array('font-family' => 'Oswald', 'font-size' => '12px'),
		
		'contact_title' => 'Contact Gravida',
		'contact_address' => 'Donec ultricies mattis nulla Australia',
		'contact_phone' => '0789 256 321',
		'contact_email' => 'info@companyname.com',
		'contact_company_url' => 'http://demo.com',
		
		'head_bg_trans' => '1',
		'head_color_id' => '#000000',
		'header_bg_setting' => '',
		'head_info_color_id' => '#0ec7ab',
		'header_border_color' => '#dddddd',
		'menutxt_color_id' => '#e7e7e7',
		'menutxt_color_hover' => '#000000',
		'menutxt_color_active' => '#000000',
		'menu_size_id' => '15px',
		'sidebar_color_id' => '#fafafa',
		'sidebarborder_color_id' => '#eeeff5',
		'sidebar_tt_color_id' => '#0ec7ab',
		'sidebartxt_color_id' => '#999999',
		'sidebarlink_color_id' => '#373737',
		'sidebarlink_hover_color_id' => '#0ec7ab',
		'flipbg_front_color_id' => '#ffffff',
		'flipbg_back_color_id' => '#f7f7f7',
		'flipborder_front_color_id' => '#e0e0e0',
		'flipborder_back_color_id' => '#000000',
		'divider_color_id' => '#e5e5e5',
		'wgttitle_size_id' => '18px',
		'timebox_color_id' => '#ffffff',
		'timeboxborder_color_id' => '#dedede',
		'gridbox_color_id' => '#ffffff',
		'gridboxborder_color_id' => '#cccccc',		
		'foot_layout_id' => '4',
		'footer_color_id' => '#000000',
		'footwdgtxt_color_id' => '#ffffff',
		'footer_title_color' => '#ffffff',
		'ptitle_font_id' =>  array('font-family' => 'Oswald', 'subsets'=>'Latin'),
		'mnutitle_font_id' =>  array('font-family' => 'Roboto', 'subsets'=>'Latin'),
		'title_txt_color_id' => '#666666',
		'link_color_id' => '#3590ea',
		'link_color_hover' => '#1e73be',
		'txt_upcase_id' => '1',
		'mnutxt_upcase_id' => '',
		'copyright_bg_color' => '#272727',
		'copyright_txt_color' => '#6d6d6d',
		
		//Footer Column 1
		'foot_cols1_title' => __('Contact Gravida', 'sktgravida'),
		'foot_cols1_content' => '<p>If you have any questions dont hesitate to contact us </p>
	<p><i class="fa fa-map-marker"></i> &nbsp; &nbsp; &nbsp;123 Bridge Street, New York, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NY 666555</p>
	<p><i class="fa fa-phone-square"></i> &nbsp; &nbsp; 1.800.555.6789</p> 
	<p><i class="fa fa-envelope-o "></i> &nbsp; &nbsp; <a href="mailto:support@sitename.com">support@sitename.com</a></p>
	<p> <i class="fa fa-globe"></i> &nbsp; &nbsp; sktthemes.org</p>',
		//Footer Column 1	
		
		//Footer Column 2
		'foot_cols2_title' => __('Recent Tweets', 'sktgravida'),
		'foot_cols2_content' => '<a class="twitter-timeline" data-chrome="nofooter noheader noborders noscroll noscrollbar transparent" data-tweet-limit="2" data-link-color="#fff"  data-theme="dark" data-dnt="true" href="https://twitter.com/sktthemes"  data-widget-id="353086898853531648">Tweets by @sktthemes</a>',
		//Footer Column 2	
		
		//Footer Column 3
		'foot_cols3_title' => __('Recent Post', 'sktgravida'),
		'foot_cols3_content' => '[footerposts show="2"]',
		//Footer Column 3
		
		//Footer Column 4
		'foot_cols4_title' => __('Follow Us', 'sktgravida'),
		'foot_cols4_content' => '[social_area]
	[social link="#" icon="facebook"]Facebook  <br />
	[social link="#" icon="twitter"]Twitter <br />
	[social link="#" icon="google-plus"] Google-plus <br />
	[social link="#" icon="linkedin"] Linkedin <br />
	[social link="#" icon="pinterest"] Pinteress <br />
	[social link="#" icon="vimeo"] Vimeo <br />
	[/social_area]',
		//Footer Column 4																
		'social_button_style' => 'simple',
		'social_show_color' => '',
		'social_bookmark_pos' => 'footer',
		'social_bookmark_size' => 'normal',
		'social_single_id' => '1',
		'social_page_id' => '',
		
		'post_lightbox_id' => '1',
		'post_gallery_id' => '1',
		'cat_layout_id' => '4',
		'hide_mob_slide' => '',
		'hide_mob_rightsdbr' => '',
		'hide_mob_page_header' => '1',
		'custom-css' => '',
	);
	
      $options = get_option('complete',$defaults);

      //Parse defaults again - see comments
      $options = wp_parse_args( $options, $defaults );

	return $options;
}?>