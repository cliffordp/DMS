<?php



class EditorCode{

	function __construct( ){

		add_filter( 'pl_toolbar_config',		array(&$this, 'toolbar'));
		
		add_action( 'pagelines_editor_scripts',	array(&$this, 'scripts'));
		add_action( 'pagelines_head_last',		array(&$this, 'draw_custom_scripts' ) );

		$this->url = PL_PARENT_URL . '/editor';
	}
	
	function scripts(){

		
		wp_enqueue_style( 'css3colorpicker',	PL_JS . '/colorpicker/colorpicker.css');

		pl_enqueue_codemirror();

		// PageLines Specific JS @Code Stuff
		wp_enqueue_script( 'pl-less-parser',	PL_JS . '/utils.less.js', array( 'jquery' ), PL_CORE_VERSION, true );
		wp_enqueue_script( 'pl-js-code',		$this->url . '/js/pl.code.js', array( 'jquery', 'codemirror', 'pl-less-parser' ), PL_CORE_VERSION, true );
		
		// less.js
		$lessjs_config = array('env' => is_pl_debug() ? 'development' : 'production');
		wp_localize_script( 'pl-less-parser', 'less', $lessjs_config );

		
	}

	function toolbar( $toolbar ){
		$toolbar['pl-design'] = array(
				'name'	=> 'Custom Code',
				'icon'	=> 'icon-code',
				'form'	=> true,
				'pos'	=> 40,
				'panel'	=> array(
					'heading'	=> "Custom Design",

					'user_less'	=> array(
						'name'	=> 'Custom LESS/CSS',
						'call'	=> array(&$this, 'custom_less'),
						'icon'	=> 'icon-circle'
					),
					'user_scripts'	=> array(
						'name'	=> 'Custom Scripts',
						'call'	=> array(&$this, 'custom_scripts'),
						'flag'	=> 'custom-scripts',
						'icon'	=> 'icon-circle-blank'
					),
				)
			);

		return $toolbar;
	}

	function draw_custom_scripts(){
		echo stripslashes( pl_setting('custom_scripts') );
	}


	function custom_less(){
		?>
		<div class="opt codetext">
			<div class="opt-name">
				Custom LESS/CSS
			</div>
			<div class="opt-box">
				<div class="codetext-meta fix">
					<label class="codetext-label">Custom LESS/CSS</label>
					<span class="codetext-help help-block"><span class="label label-info">Tip</span> Hit [Cmd&#8984;+Return] or [Ctrl+Return] to Preview Live</span>
				</div>
				<form class="code-form"><textarea id="custom_less" class="custom-less" name="settings[custom_less]" placeholder=""><?php echo pl_setting('custom_less'); ?></textarea></form>
			</div>
		</div>

		<?php
	}

	function custom_scripts(){
		?>
		<div class="opt codetext">
			<div class="opt-name">
				Custom Scripts
			</div>
			<div class="opt-box">
				<div class="codetext-meta fix">
					<label class="codetext-label">Custom Javascript or Header HTML</label>
				</div>
				<form class="code-form"><textarea id="custom_scripts" class="custom-scripts" name="settings[custom_scripts]" placeholder=""><?php echo stripslashes( pl_setting( 'custom_scripts' ) ); ?></textarea></form>
			</div>
		</div>

		<?php
	}


}