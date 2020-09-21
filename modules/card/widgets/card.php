<?php

/**
* Card Widget.
*
* Elementor widget that inserts a UI Card.
*
* @since 1.0.0
*/

namespace Suprementor\Modules\Card\Widgets;

class Card extends \Suprementor\Base\Widget_Base {

	/**
	* Get widget name.
	* @since 1.0.0
	*/
	public function get_name() {
		return 'sup_widget_card';
	}

	/**
	* Get widget title.
	* @since 1.0.0
	*/
	public function get_title() {
		return __(\Suprementor\Helpers\General::get_prefix() . 'Card',  'suprementor');
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

		$this->add_control(
			'sup_image_1',
			[
				'label' => __( 'Primary Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'sup_image_1_transition',
			[
				'label' => __( 'Primary Image Transition', 'suprementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => [
					'0' => __( '-', 'suprementor' ),
					'uk-transition-scale-up' => __( 'Scale Up', 'suprementor' ),
				]
			]
		);

		$this->add_control(
			'sup_image_2',
			[
				'label' => __( 'Secondary Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'sup_image_2_transition',
			[
				'label' => __( 'Secondary Image Transition', 'suprementor' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => \Suprementor\Helpers\UIkit::transition()
			]
		);

		$this->add_control(
			'sup_image_2_transition_opaque',
			[
				'label' => __( 'Secondary Transition Opaque', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => false,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'sup_image_size',
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);

		$this->add_control(
			'sup_title_text',
			[
				'label' => __( 'Title Text', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Browse Our Fashion Category', 'suprementor' ),
				'placeholder' => __( 'Type your text here', 'suprementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'sup_title_tag',
			[
				'label' => __( 'Title Tag', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'div',
				'options' => [
					'div'  => __( 'DIV', 'suprementor' ),
					'p' => __( 'P', 'suprementor' ),
					'h1' => __( 'H1', 'suprementor' ),
					'h2' => __( 'H2', 'suprementor' ),
					'h3' => __( 'H3', 'suprementor' ),
					'h4' => __( 'H4', 'suprementor' ),
					'h5' => __( 'H5', 'suprementor' ),
					'h6' => __( 'H6', 'suprementor' ),
				],
			]
		);

		$this->add_control(
			'sup_body_text',
			[
				'label' => __( 'Body Text', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => \Suprementor\Helpers\General::placeholder_text_medium(),
				'placeholder' => __( 'Type your text here', 'suprementor' ),
				'label_block' => true,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_top',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_bottom',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					],
				],
			]
		);

		$this->add_control(
			'sup_body_tag',
			[
				'label' => __( 'Body Tag', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'div',
				'options' => [
					'div'  => __( 'DIV', 'suprementor' ),
					'p' => __( 'P', 'suprementor' ),
					'h1' => __( 'H1', 'suprementor' ),
					'h2' => __( 'H2', 'suprementor' ),
					'h3' => __( 'H3', 'suprementor' ),
					'h4' => __( 'H4', 'suprementor' ),
					'h5' => __( 'H5', 'suprementor' ),
					'h6' => __( 'H6', 'suprementor' ),
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_top',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_bottom',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					],
				],
			]
		);

		$this->add_control(
			'sup_overlay_transition_opaque',
			[
				'label' => __( 'Overlay Transition Opaque', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'suprementor' ),
				'label_off' => __( 'No', 'suprementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [ '_skin' => 'sub_title_overlay' ]
			]
		);

		$this->add_control(
			'sup_overlay_transition',
			[
				'label' => __( 'Overlay Transition', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => \Suprementor\Helpers\UIkit::transition(),
				'condition' => [ '_skin' => 'sub_title_overlay' ]
			]
		);

		$this->add_control(
			'sup_overlay_position',
			[
				'label' => __( 'Overlay Position', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'uk-position-bottom',
				'options' => \Suprementor\Helpers\UIkit::position_top_bottom(),
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'sub_title_overlay',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					]
				]
			]
		);

		$this->end_controls_section();

		\Suprementor\Controls\Button::section_content( $this, true );

		$this->start_controls_section(
			'sup_style_general',
			[
				'label' => __( 'General', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'sup_wrapper_align',
			[
				'label' => __( 'Alignment', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'uk-text-left' => [
						'title' => __( 'Left', 'suprementor' ),
						'icon' => 'fa fa-align-left',
					],
					'uk-text-center' => [
						'title' => __( 'Center', 'suprementor' ),
						'icon' => 'fa fa-align-center',
					],
					'uk-text-right' => [
						'title' => __( 'Right', 'suprementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'uk-text-left',
				'toggle' => true,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_top',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_bottom',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sup_title_typography',
				'label' => __( 'Title Typography', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-card-title',
			]

		);

		$this->add_control(
			'sup_title_color',
			[
				'label' => __( 'Title Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sup-card-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sup_body_typography',
				'label' => __( 'Body Typography', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-card-body',
			]
		);

		$this->add_control(
			'sup_body_color',
			[
				'label' => __( 'Body Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sup-card-body' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sup_overlay_color',
			[
				'label' => __( 'Overlay Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'sub_title_overlay',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					]
				],
				'selectors' => [
					'{{WRAPPER}} .sup-overlay' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'sup_inner_padding',
			[
				'label' => __( 'Inner Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-card-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'sup_title_padding',
			[
				'label' => __( 'Title Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-card-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'sup_body_margin',
			[
				'label' => __( 'Body Margin', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'allowed_dimensions' => 'vertical',
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_top',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'image_bottom',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					]
				],
				'selectors' => [
					'{{WRAPPER}} .sup-card-body' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'sup_cover_height',
			[
				'label' => __( 'Cover Height', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 700,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover',
						],
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					]
				],
				'selectors' => [
					'{{WRAPPER}} .sup-cover-container' => 'height: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'sup_cover_margin',
			[
				'label' => __( 'Cover Margin', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => '=',
							'value' => 'cover_boxed',
						]
					]
				],
				'selectors' => [
					'{{WRAPPER}} .sup-cover-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();
		// end general

		\Suprementor\Controls\Button::section_style( $this );

		\Suprementor\Controls\Wrapper::section_style($this);

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

		$this->add_skin( new \Suprementor\Modules\Card\Skins\Sub_Title( $this ) );
		$this->add_skin( new \Suprementor\Modules\Card\Skins\Sub_Title_Overlay( $this ) );
		$this->add_skin( new \Suprementor\Modules\Card\Skins\Image_Top( $this ) );
		$this->add_skin( new \Suprementor\Modules\Card\Skins\Image_Bottom( $this ) );
		$this->add_skin( new \Suprementor\Modules\Card\Skins\Cover( $this ) );
		$this->add_skin( new \Suprementor\Modules\Card\Skins\Cover_Boxed( $this ) );

		do_action('suprementor/modules/card/skins');

	}

	/**
	* Process Settings.
	* @since 1.0.0
	*/
	public function process_settings($settings) {

		$settings['sup_wrapper_classes'][] = 'sup-wrapper-processed';
		$settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
		( empty( $settings['sup_wrapper_align'] ) ) ?: $settings['sup_wrapper_classes'][] = $settings['sup_wrapper_align'];

		$settings['sup_image_1_classes'][] = 'sup-image-1-processed';
		$settings['sup_image_1_classes'][] = 'uk-transition-opaque';
		$settings['sup_image_1_classes'][] = 'uk-overflow-hidden';
		( empty( $settings['sup_image_1_transition'] ) ) ?: $settings['sup_image_1_classes'][] = $settings['sup_image_1_transition'];

		$settings['sup_image_2_classes'][] = 'sup-image-2-processed';
		$settings['sup_image_2_classes'][] = 'uk-position-cover';
		$settings['sup_image_2_classes'][] = 'uk-overflow-hidden';
		( empty( $settings['sup_image_2_transition'] ) ) ?: $settings['sup_image_2_classes'][] = $settings['sup_image_2_transition'];
		( empty( $settings['sup_image_2_transition_opaque'] ) ) ?: $settings['sup_image_2_classes'][] = 'uk-transition-opaque';

		$settings['sup_overlay_classes'][] = 'sup-overlay-processed';
		( empty( $settings['sup_overlay_position'] ) ) ?: $settings['sup_overlay_classes'][] = $settings['sup_overlay_position'];
		( empty( $settings['sup_overlay_transition_opaque'] ) ) ?: $settings['sup_overlay_classes'][] = 'uk-transition-opaque';
		( empty( $settings['sup_overlay_transition'] ) ) ?: $settings['sup_overlay_classes'][] = $settings['sup_overlay_transition'];

		return $settings;

	}

}
