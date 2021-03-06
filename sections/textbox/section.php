<?php
/*
	Section: TextBox
	Author: PageLines
	Author URI: http://www.pagelines.com
	Description: A simple box for text and HTML.
	Class Name: PageLinesTextBox
	Filter: component
	Loading: active
*/

class PageLinesTextBox extends PageLinesSection {

	function section_opts(){
		$opts = array(
			array(
				'type'		=> 'multi',
				'key'		=> 'textbox_text', 
				'span'		=> 2,
				'opts'		=> array(
					array(
						'type' 			=> 'text',
						'key'			=> 'textbox_title',
						'label' 		=> __( 'Title (Optional)', 'pagelines' ),
					),
					array(
						'type' 			=> 'textarea',
						'key'			=> 'textbox_content',
						'label' 		=> __( 'Text Content', 'pagelines' ),
					),
					
				)
			), 
			array(
				'type'		=> 'multi',
				'key'		=> 'textbox_config', 
				'opts'		=> array(
					array(
						'key'			=> 'textbox_pad',
						'type' 			=> 'text',
						'label' 	=> __( 'Padding <small>(CSS Shorthand)</small>', 'pagelines' ),
						'ref'		=> __( 'This option uses CSS padding shorthand. For example, use "15px 30px" for 15px padding top/bottom, and 30 left/right.', 'pagelines' ),
						
					),

					array(
						'label'			=> __( 'Title Wrapper', 'pagelines' ),
						'key'			=> 'textbox_title_wrapper',
						'default'		=> 'strong',
						'type'			=> 'select',
						'opts'			=> array(

						'strong'		=> array( 'name' => 'strong (default)' ),
						'em'			=> array( 'name' => 'em' ),
						'h1'			=> array( 'name' => 'h1' ),
						'h2'			=> array( 'name' => 'h2' ),
						'h3'			=> array( 'name' => 'h3' ),
						'h4'			=> array( 'name' => 'h4' ),
						'h5'			=> array( 'name' => 'h5' ),
						'h6'			=> array( 'name' => 'h6' )
												)
											),
					array(
						'key'			=> 'textbox_font_size',
						'type'			=> 'count_select',
						'count_start'	=> 10,
						'count_number'	=> 30,
						'suffix'		=> 'px',
						'title'			=> __( 'Textbox Font Size', 'pagelines' ),
						'default'		=> '', 
					),
					
					array(
						'type' 			=> 'select',
						'key'			=> 'textbox_align',
						'label' 		=> 'Alignment',
						'opts'			=> array(
							'textleft'		=> array('name' => 'Align Left (Default)'),
							'textright'		=> array('name' => 'Align Right'),
							'textcenter'	=> array('name' => 'Center'),
							'textjustify'	=> array('name' => 'Justify'),
						)
					),
					array(
						'type' 			=> 'select_animation',
						'key'			=> 'textbox_animation',
						'label' 		=> __( 'Viewport Animation', 'pagelines' ),
						'help' 			=> __( 'Optionally animate the appearance of this section on view.', 'pagelines' ),
					),
					
				)
			),
			
			
			
		);

		return $opts;

	}

	function section_template() {

		$text = $this->opt('textbox_content');

		
		
		$title = $this->opt('textbox_title');

		$title_wrapper = $this->opt('textbox_title_wrapper') ? $this->opt('textbox_title_wrapper') : 'strong';

		if( ! $text && ! $title ){
			$title = 'Textbox Section';
			$text = "Add Content!";
		}

		$text = sprintf('<div class="hentry" data-sync="textbox_content">%s</div>', do_shortcode( wpautop($text) ) );

		$title = ( $edit || $title ) ? sprintf('<%s data-sync="textbox_title">%s</%s><br />', $title_wrapper, $title, $title_wrapper) : '';

		$class = $this->opt('textbox_animation');
			
		$align = $this->opt('textbox_align');
		
		$pad = ($this->opt('textbox_pad')) ? sprintf('padding: %s;', $this->opt('textbox_pad')) : ''; 
		$size = ($this->opt('textbox_font_size')) ? sprintf('font-size: %spx;', $this->opt('textbox_font_size')) : ''; 
		
		printf('<div class="textbox-wrap pl-animation %s %s" style="%s%s">%s%s</div>', $align, $class, $pad, $size, $title, $text);

	}
}


