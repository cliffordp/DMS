<?php
/**
 * 
 *
 *  PageLines Default/Standard Options Lib
 *
 *
 *  @package PageLines Framework
 *  @since 3.0.0
 *  
 *
 */
class EditorSettings {

	public $settings = array( );


	function __construct(){
		$this->settings['basic_settings'] = array(
			'name' 	=> 'Site Images', 
			'icon'	=> 'icon-picture',
			'opts' 	=> $this->basic()
		);
		
		$this->settings['layout'] = array(
			'name' 	=> 'Layout Handling', 
			'icon' 	=> 'icon-fullscreen', 
			'opts' 	=> $this->layout()
		);
		$this->settings['color_control'] = array(
			'name' 	=> 'Color Control', 
			'icon'	=> 'icon-tint',
			'opts' 	=> $this->color()
		);
		
		$this->settings['typography'] = array(
			'name' 	=> 'Typography', 
			'icon'	=> 'icon-font',
			'opts' 	=> $this->type()
		);
		
		$this->settings['social_media'] = array(
			'name' 	=> 'Social Media', 
			'icon'	=> 'icon-comments',
			'opts' 	=> $this->social()
		);	
		
		$this->settings['advanced'] = array(
			'name' 	=> 'Advanced', 
			'icon'	=> 'icon-wrench',
			'opts' 	=> $this->advanced()
		);
	}
	
	function get_set( $panel = 'site' ){
		return $this->settings;
	}
	
	function basic(){
		
		$settings = array(
		
			array(
				'key'			=> 'pagelines_favicon',
				'label'			=> 'Upload Favicon (16px by 16px)',
				'type' 			=> 	'image_upload',
				'size' 			=> 	'16',
				'title' 		=> 	__( 'Favicon Image', 'pagelines' ),						
				'help' 			=> 	__( 'Enter the full URL location of your custom <strong>favicon</strong> which is visible in browser favorites and tabs.<br/> <strong>Must be .png or .ico file - 32px by 32px</strong>.', 'pagelines' )
			),		
			
			
			array(
				'key'			=> 'pl_login_image',
				'type' 			=> 	'image_upload',
				'label'			=> 'Upload Icon (80px Height)',
				'size' 			=> 	'60',
				'title' 		=> __( 'Login Page Image', 'pagelines' ),						
				'help'			=> __( 'This image will be used on the login page to your admin. Use an image that is approximately <strong>80px</strong> in height.', 'pagelines' )
			),
			
			array(
				'key'			=> 'pagelines_touchicon',
				'label'			=> 'Upload Icon (57px by 57px)',
				'type' 			=> 	'image_upload',
				'size' 			=> 	'60',
				'title' 		=> __( 'Mobile Touch Image', 'pagelines' ),	
				'help'			=> __( 'Enter the full URL location of your Apple Touch Icon which is visible when your users set your site as a <strong>webclip</strong> in Apple Iphone and Touch Products. It is an image approximately 57px by 57px in either .jpg, .gif or .png format.', 'pagelines' )
			), 
			
			array(
				'type' 	=> 	'multi',
				'title' 		=> __( 'Website Watermark', 'pagelines' ),						
				'help' 		=> __( 'Configure your website watermark (in footer)', 'pagelines' ),
				'opts'	=> array(
					array(
						'key'			=> 'watermark_image',
						'type' 			=> 'image_upload', 
						'label' 		=> 'Watermark Image', 
					), 
					array(
						'key'			=> 'watermark_link',
						'type' 			=> 'text', 
						'label'			=> 'Watermark Link (Blank for None)', 
						'default' 		=> 'http://www.pagelines.com'
					),
					array(
						'key'			=> 'watermark_alt',
						'type' 			=> 'text', 
						'label' 		=> 'Watermark Link alt text', 
						'default' 		=> 'Build a website with PageLines' 
					),
					array(
						'key'			=> 'watermark_hide',
						'type' 			=> 'check', 
						'label'		 	=> "Hide Watermark"
					)
				),
				
			),
		);
			
		return $settings;
		
	}
	
	function layout(){
		
		
		
		$settings = array(
			array(
				'key'		=> 'disable_responsive',
				'type' 		=> 'check',
				'label' 	=> __( 'Disable Responsive Layout?', 'pagelines' ),
				'title' 	=> __( 'Disable Responsive Layout', 'pagelines' ),
				'help'	 	=> __( 'Check this option if you want to disable responsive/mobile layout on your website', 'pagelines' )
			),
			array(
				'key'		=> 'layout_mode',
				'type' 		=> 'select',
				'label' 	=> __( 'Select Layout Mode', 'pagelines' ),
				'title' 	=> __( 'Layout Mode', 'pagelines' ),
				'opts' 		=> array(
					'pixel' 	=> array('name' => 'Pixel Width Based Layout'),
					'percent' 	=> array('name' => 'Percentage Width Based Layout')
				),
				
				'help'	 	=> __( '', 'pagelines' )
			),


		);
	
			
		return $settings;
		
	}
	
	function social(){
		
		
		
		$settings = array(
			array(
				'key'		=> 'twittername', 
				'type' 		=> 'text',
				'label' 	=> __( 'Your Twitter Username', 'pagelines' ),
				'title' 	=> __( 'Twitter Integration', 'pagelines' ),
				'help' 		=> __( 'This places your Twitter feed on the site. Leave blank if you want to hide or not use.', 'pagelines' )
			),
			array(
				'key'		=> 'site-hashtag',
				'type' 		=> 'text',
				'label' 	=> __( 'Your Website Hashtag', 'pagelines' ),
				'title' 	=> __( 'Website Hashtag', 'pagelines' ),
				'help'	 	=> __( 'This hashtag will be used in social media (e.g. Twitter) and elsewhere to create feeds.', 'pagelines' )
			),


		);
	
			
		return $settings;
		
	}
	
	function type(){
		
		$settings = array(
			array(
				'type' 	=> 	'multi',
				'title' 		=> __( 'Header Element Typography', 'pagelines' ),						
				'help' 		=> __( 'Configure the typography for the text headers across your site. The base font size is a reference for &lt;H6&gt; that all text headers will use as a basis.', 'pagelines' ),
				'opts'	=> array(
					array(
						'key'			=> 'font_headers',
						'type' 			=> 'type', 
						'label' 		=> 'Header Font', 
						'default'	=> 'helvetica'
					), 
					array(
						'key'			=> 'font_headers_weight',
						'type' 			=> 'select', 
						'label'			=> 'Font Weight', 
						'opts'			=> array(
							'normal'	=> array('name' => 'Normal'),
							'bold'		=> array('name' => 'Bold (not supported for all fonts)')
						),
						'default' 		=> 'bold'
					),
					array(
						'key'			=> 'font_headers_size',
						'type' 			=> 'count_select', 
						'label'			=> 'Header Base Size', 
						'count_start'	=> 10, 
						'count_number'	=> 30,
						'default' 		=> 14
					)
				),
				
			),
			array(
				'type' 	=> 	'multi',
				'title' 		=> __( 'Primary Text Typography', 'pagelines' ),						
				'help' 		=> __( 'Configure the typography for the text headers across your site. The base font size is a reference that will be scaled and used throughout the site.', 'pagelines' ),
				'opts'	=> array(
					array(
						'key'			=> 'font_primary',
						'type' 			=> 'type', 
						'label' 		=> 'Header Font', 
						'default'	=> 'helvetica'
					), 
					array(
						'key'			=> 'font_primary_weight',
						'type' 			=> 'select', 
						'label'			=> 'Font Weight', 
						'opts'			=> array(
							'normal'	=> array('name' => 'Normal'),
							'bold'		=> array('name' => 'Bold (not supported for all fonts)')
						),
						'default' 		=> 'bold'
					),
					array(
						'key'			=> 'font_primary_size',
						'type' 			=> 'count_select', 
						'label'			=> 'Header Base Size', 
						'count_start'	=> 10, 
						'count_number'	=> 30,
						'default' 		=> 14
					)
				),
				
			),
			array(
				'type' 	=> 	'multi',
				'title' 		=> __( 'Primary Text Typography', 'pagelines' ),						
				'help' 		=> __( 'Configure the typography for secondary text throughout your site. This font may be used in sub headers, or other various elements to add contrast.', 'pagelines' ),
				'opts'	=> array(
					array(
						'key'			=> 'font_secondary',
						'type' 			=> 'type', 
						'label' 		=> 'Header Font', 
						'default'	=> 'helvetica'
					), 
					array(
						'key'			=> 'font_secondary_weight',
						'type' 			=> 'select', 
						'label'			=> 'Font Weight', 
						'opts'			=> array(
							'normal'	=> array('name' => 'Normal'),
							'bold'		=> array('name' => 'Bold (not supported for all fonts)')
						),
						'default' 		=> 'bold'
					),
					array(
						'key'			=> 'font_secondary_size',
						'type' 			=> 'count_select', 
						'label'			=> 'Header Base Size', 
						'count_start'	=> 10, 
						'count_number'	=> 30,
						'default' 		=> 14
					)
				),
				
			),
			
		);
	
			
		return $settings;
		
	}
	
	function color(){
		
		$settings = array(
			array(
				'key'		=> 'canvas_colors', 
				'type' 		=> 'multi',
				'label' 	=> __( 'Page Background Colors', 'pagelines' ),
				'title' 	=> __( 'Page Background Colors', 'pagelines' ),
				'help' 		=> __( 'Configure the basic background colors for your site', 'pagelines' ), 
				'opts'		=> array(
					array(	
						'key'			=> 'bodybg',
						'type'			=> 'color',			
						'label' 		=> __( 'Body Background', 'pagelines' ),
					),
					array(	
						'key'			=> 'pagebg',
						'type'			=> 'color',		
						'label' 		=> __( 'Page Background (Optional)', 'pagelines' ),
						),
					array(		
						'key'			=> 'contentbg',
						'type'			=> 'color',
						'label' 		=> __( 'Content Background (Optional)', 'pagelines' ),
					)
				)		
			),
			array(
				'key'		=> 'text_colors', 
				'type' 		=> 'multi',
				'label' 	=> __( 'Site Text Colors', 'pagelines' ),
				'title' 	=> __( 'Site Text Colors', 'pagelines' ),
				'help' 		=> __( 'Configure the basic text colors for your site', 'pagelines' ), 
				'opts'		=> array(
					array(	
						'key'			=> 'text_primary',
						'type'			=> 'color',			
						'label' 		=> __( 'Main Text Color', 'pagelines' ),
					),
					array(	
						'key'			=> 'headercolor',
						'type'			=> 'color',		
						'label' 		=> __( 'Text Header Color', 'pagelines' ),
						),
					array(		
						'key'			=> 'linkcolor',
						'type'			=> 'color',
						'label' 		=> __( 'Primary Link Color', 'pagelines' ),
					)
				)		
			)


		);
	
			
		return $settings;
		
	}
	
	function advanced(){
		
		$settings = array(
			array(
					'key'		=> 'load_prettify_libs',
					'type'		=> 'check',
					'label'		=> __( 'Enable Code Prettify?', 'pagelines' ),
					'title'		=> __( 'Google Prettify Code', 'pagelines' ),
					'help'		=> __( "Add a class of 'prettyprint' to code or pre tags, or optionally use the [pl_codebox] shortcode. Wrap the codebox shortcode using [pl_raw] if Wordpress inserts line breaks.", 'pagelines' )
			),
			array(
					'key'		=> 'partner_link',
					'type'		=> 'text',
					'label'		=> __( 'Enter Partner Link', 'pagelines' ),
					'title'		=> __( 'PageLines Affiliate/Partner Link', 'pagelines' ),
					'help'		=> __( "If you are a <a target='_blank' href='http://www.pagelines.com'>PageLines Partner</a> enter your link here and the footer link will become a partner or affiliate link.", 'pagelines' )
			),
			array(
					'key'		=> 'special_body_class',
					'type'		=> 'text',
					'label'		=> __( 'Install Class', 'pagelines' ),
					'title'		=> __( 'Current Install Class', 'pagelines' ),
					'help'		=> __( "Use this option to add a class to the &gt;body&lt; element of the website. This can be useful when using the same child theme on several installations or sub domains and can be used to control CSS customizations.", 'pagelines' )
			)
		);	
		return $settings;
	}

}