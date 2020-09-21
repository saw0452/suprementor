<?php

/**
* Post Box Widget.
*
* Elementor widget that inserts a post box.
*
* @since 1.0.0
*/

namespace Suprementor\Modules\Post_Box\Widgets;

class Post_Box extends \Suprementor\Base\Widget_Base {

	/**
	* Get widget name.
	* @since 1.0.0
	*/
	public function get_name() {
		return 'sup_widget_post_box';
	}

	/**
	* Get widget title.
	* @since 1.0.0
	*/
	public function get_title() {
		return __(\Suprementor\Helpers\General::get_prefix() . 'Post Box',  'suprementor');
	}

	/**
	* Get widget icon.
	* @since 1.0.0
	*/
	public function get_icon() {
		return 'fa fa-code';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'sup_content_general',
			[
				'label' => __( 'General', 'suprementor' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'sup_content_get_post',
			[
				'label' => __( 'Get Post', 'suprementor' ),
			]
		);

		$this->add_group_control(
			\Suprementor\Group_Controls\Get_Post::get_type(),
			[
				'name' => 'get_post',
			]
		);

		$this->end_controls_section();

		\Suprementor\Controls\Post\Thumbnail::section_content( $this );
		\Suprementor\Controls\Post\Title::section_content( $this );
		\Suprementor\Controls\Post\Excerpt::section_content( $this );
		\Suprementor\Controls\Post\Meta_Inline::section_content( $this );
		\Suprementor\Controls\Post\Categories::section_content( $this );
		\Suprementor\Controls\Post\Author::section_content( $this );
		\Suprementor\Controls\Post\Date_Mini::section_content( $this );
		\Suprementor\Controls\Button::section_content( $this );
		\Suprementor\Controls\Doublet::section_content( $this );

		\Suprementor\Controls\Post\Title::section_style( $this );
		\Suprementor\Controls\Post\Excerpt::section_style( $this );
		\Suprementor\Controls\Post\Meta_Inline::section_style( $this );
		\Suprementor\Controls\Post\Categories::section_style( $this );
		\Suprementor\Controls\Post\Author::section_style( $this );
		\Suprementor\Controls\Post\Date_Mini::section_style( $this );
		\Suprementor\Controls\Button::section_style( $this );
		\Suprementor\Controls\Wrapper::section_style( $this );

		$this->update_controls();

	}

	/**
	* Requires Skins.
	* @since 1.0.0
	*/
	protected $_has_template_content = false;

	/**
	* Adds Skins.
	* @since 1.0.0
	*/
	protected function _register_skins() {

		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Card( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Card_Mini( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_List( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Card( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Card_Mini( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_List( $this ) );

		do_action('suprementor/modules/post-box/skins');

	}

	/**
	* Process Settings.
	* @since 1.0.0
	*/
	public function process_settings( $settings ) {

		$settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
		$settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';

		if ( $settings['_skin'] == 'smart_list' || $settings['_skin'] == 'bold_list' ) {
			$settings['sup_thumbnail_inner_classes'][] = 'uk-position-cover';
		}

		return $settings;

	}

	/**
	* Update Controls.
	* @since 1.0.0
	*/
	public function update_controls() {

		/*
		* Meta Inline
		*/

		$this->update_control(
			'sup_content_meta_inline',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_card',
								'smart_card_mini',
								'smart_list',
								'smart_list_mini',
							]
						]
					]
				]
			]
		);

		$this->update_control(
			'sup_style_meta_inline',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_card',
								'smart_card_mini',
								'smart_list',
								'smart_list_mini',
							]
						]
					]
				]
			]
		);

		/*
		* Excerpt
		*/

		$this->update_control(
			'sup_content_excerpt',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_card',
								'smart_list',
								'bold_card',
								'bold_list'
							]
						]
					]
				]
			]
		);

		$this->update_control(
			'sup_style_excerpt',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_card',
								'smart_list',
								'bold_card',
								'bold_list'
							]
						]
					]
				]
			]
		);

		/*
		* Categories
		*/

		$this->update_control(
			'sup_content_categories',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'bold_card',
								'bold_list',
								'bold_card_mini',
							]
						]
					]
				]
			]
		);

		$this->update_control(
			'sup_style_categories',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'bold_card',
								'bold_list',
								'bold_card_mini',
							]
						]
					]
				]
			]
		);

		/*
		* Date Mini
		*/

		$this->update_control(
			'sup_content_date_mini',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'bold_card',
								'bold_card_mini',
							]
						]
					]
				]
			]
		);

		$this->update_control(
			'sup_style_date_mini',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'bold_card',
								'bold_card_mini',
							]
						]
					]
				]
			]
		);

		/*
		* Author
		*/

		$this->update_control(
			'sup_content_author',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'bold_card',
								'bold_list',
							]
						]
					]
				]
			]
		);

		$this->update_control(
			'sup_style_author',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'bold_card',
								'bold_list'
							]
						]
					]
				]
			]
		);

		/*
		* Button
		*/

		$this->update_control(
			'sup_content_button',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_card',
								'smart_list',
								'bold_card',
								'bold_list'
							]
						]
					]
				]
			]
		);

		$this->update_control(
			'sup_style_button',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_card',
								'smart_list',
								'bold_card',
								'bold_list'
							]
						]
					]
				]
			]
		);

		/*
		* Doublet
		*/

		$this->update_control(
			'sup_content_doublet',
			[
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_list',
								'smart_list_mini',
								'bold_list',
							]
						]
					]
				]
			]
		);

	}

}
