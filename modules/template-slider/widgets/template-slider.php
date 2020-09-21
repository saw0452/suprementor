<?php

/**
* Post Box Widget.
*
* Elementor widget that inserts a post box.
*
* @since 1.0.0
*/

namespace Suprementor\Modules\Template_Slider\Widgets;

class Template_Slider extends \Suprementor\Base\Widget_Base {

    /**
    * Get widget name.
    * @since 1.0.0
    */
    public function get_name() {
        return 'sup_widget_template_slider';
    }

    /**
    * Get widget title.
    * @since 1.0.0
    */
    public function get_title() {
        return __(\Suprementor\Helpers\General::get_prefix() . ' Template Slider',  'suprementor');
    }

    /**
    * Get widget icon.
    * @since 1.0.0
    */
    public function get_icon() {
        return 'fa fa-code';
    }

    protected function _register_controls() {

        // general content section
        $this->start_controls_section(
            'sup_content_general',
            [
                'label' => __( 'General', 'blog-supreme' ),
            ]
        );

        $this->add_control(
            'sup_slides_source',
            [
                'label' => __( 'Source', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'widget',
                'options' => [
                    'widget' => __( 'Global Widget', 'suprementor' ),
                    'section' => __( 'Section', 'suprementor' )
                ]
            ]
        );

        $sections_options = \Suprementor\Helpers\General::get_saved_template_sections();

        $sections = new \Elementor\Repeater();

        $sections->add_control(
            'sup_section', [
                'label' => __( 'Choose Section', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => $sections_options,
            ]
        );

        $this->add_control(
            'sup_sections',
            [
                'label' => __( 'Sections', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sections->get_controls(),
                'title_field' => 'Section',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_slides_source',
                            'operator' => '=',
                            'value' => 'section',
                        ]
                    ]
                ]
            ]
        );

        $widgets_options = \Suprementor\Helpers\General::get_saved_global_widgets();

        $widgets = new \Elementor\Repeater();

        $widgets->add_control(
            'sup_widget', [
                'label' => __( 'Choose Widget', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => $widgets_options,
            ]
        );

        $this->add_control(
            'sup_widgets',
            [
                'label' => __( 'Widgets', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sections->get_controls(),
                'title_field' => 'Widget',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_slides_source',
                            'operator' => '=',
                            'value' => 'widget',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slides_mode',
            [
                'label' => __( 'Slides Mode', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'even',
                'options' => [
                    'even' => __( 'Even', 'suprementor' ),
                    'offset' => __( 'Offset', 'suprementor' ),
                    'center' => __( 'Center', 'suprementor' ),
                ]
            ]
        );

        $this->add_control(
            'sup_slides_mobile',
            [
                'label' => __( 'Slides on Mobile', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-child-width-1-1',
                'options' => \Suprementor\Helpers\UIkit::slides_mobile(),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_slides_mode',
                            'operator' => '=',
                            'value' => 'even',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slides_tablet',
            [
                'label' => __( 'Slides on Tablet', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-child-width-1-2@s',
                'options' => \Suprementor\Helpers\UIkit::slides_tablet(),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_slides_mode',
                            'operator' => '=',
                            'value' => 'even',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slides_desktop',
            [
                'label' => __( 'Slides on Desktop', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-child-width-1-3@m',
                'options' => \Suprementor\Helpers\UIkit::slides_desktop(),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_slides_mode',
                            'operator' => '=',
                            'value' => 'even',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slidenav_show',
            [
                'label' => __( 'Show Slidenav', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sup_slidenav_hidden_hover',
            [
                'label' => __( 'Slidenav Hidden Hover', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'sup_slidenav_show',
                            'operator' => '=',
                            'value' => 'yes',
                        ],
                        [
                            'name' => '_skin',
                            'operator' => '=',
                            'value' => 'nav_inside',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slidenav_hidden_touch',
            [
                'label' => __( 'Slidenav Hidden Touch', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'sup_slidenav_show',
                            'operator' => '=',
                            'value' => 'yes',
                        ],
                        [
                            'name' => '_skin',
                            'operator' => '=',
                            'value' => 'nav_inside',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slidenav_position',
            [
                'label' => __( 'Slidenav Position', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-position-center',
                'options' => \Suprementor\Helpers\UIkit::position_corners_center(),
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'sup_slidenav_show',
                            'operator' => '=',
                            'value' => 'yes',
                        ],
                        [
                            'name' => '_skin',
                            'operator' => '=',
                            'value' => 'nav_inside',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_dotnav_show',
            [
                'label' => __( 'Show Dotnav', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sup_first_item',
            [
                'label' => __( 'First Nav Item', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'dotnav',
                'options' => [
                    'dotnav' => __( 'Dotnav', 'suprementor' ),
                    'slidenav' => __( 'Slidenav', 'suprementor' )
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => '=',
                            'value' => 'dots_nav_top',
                        ],
                        [
                            'name' => '_skin',
                            'operator' => '=',
                            'value' => 'dots_nav_bottom',
                        ]
                    ]
                ]
            ]
        );


        $this->add_control(
            'sup_autoplay',
            [
                'label' => __( 'Autoplay', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $this->add_control(
            'sup_autoplay_interval',
            [
                'label' => __( 'Autoplay Interval', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 5,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_autoplay',
                            'operator' => '=',
                            'value' => 'yes',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_autoplay_pause_on_hover',
            [
                'label' => __( 'Pause on Hover', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_autoplay',
                            'operator' => '=',
                            'value' => 'yes',
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_content_transitions',
            [
                'label' => __( 'Content Transitions', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $this->add_control(
            'sup_sets',
            [
                'label' => __( 'Sets', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $this->add_control(
            'sup_velocity',
            [
                'label' => __( 'Velocity', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
                'default' => 1
            ]
        );

        $this->end_controls_section();
        // end general

        $this->start_controls_section(
            'sup_style_general',
            [
                'label' => __( 'Slides', 'blog-supreme' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_gap',
            [
                'label' => __( 'Gap', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-grid-small',
                'options' => \Suprementor\Helpers\UIkit::grid()
            ]
        );

        $this->add_control(
            'sup_slides_inner_margin',
            [
                'label' => __( 'Inner Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uk-slider-items > li > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_nav_control_wrap_background_color',
            [
                'label' => __( 'Control Wrap Background', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => '=',
                            'value' => 'dots_nav_top',
                        ],
                        [
                            'name' => '_skin',
                            'operator' => '=',
                            'value' => 'dots_nav_bottom',
                        ]
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .sup-nav-control-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sup_style_dotnav',
            [
                'label' => __( 'Dotnav', 'blog-supreme' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_dotnav_size',
            [
                'label' => __( 'Size', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 50,
                'step' => 1,
                'default' => 15,
                'selectors' => [
                    '{{WRAPPER}} .uk-slider-nav li a' => 'width: {{UNIT}}px; height: {{UNIT}}px;',
                ],
            ]
        );

        $this->add_control(
            'sup_dotnav_align',
            [
                'label' => __( 'Alignment', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'uk-flex-left' => [
                        'title' => __( 'Left', 'suprementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'uk-flex-center' => [
                        'title' => __( 'Center', 'suprementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'uk-flex-right' => [
                        'title' => __( 'Right', 'suprementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'uk-flex-center',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'sup_dotnav_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uk-slider-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_dotnav_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uk-slider-nav li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_dotnav_active_color',
            [
                'label' => __( 'Active Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uk-slider-nav li.uk-active a, {{WRAPPER}} .uk-slider-nav li.uk-active a:hover, {{WRAPPER}} .uk-slider-nav li.uk-active a:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_dotnav_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uk-slider-nav li a:hover, {{WRAPPER}} .uk-slider-nav li a:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sup_style_slidenav',
            [
                'label' => __( 'Slidenav', 'blog-supreme' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_slidenav_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_slidenav_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav:hover, {{WRAPPER}} .sup-slidenav:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_slidenav_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_slidenav_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_slidenav_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_slidenav_container_padding',
            [
                'label' => __( 'Container Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uk-slidenav-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_slidenav_container_margin',
            [
                'label' => __( 'Container Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uk-slidenav-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sup_style_slider_wrap',
            [
                'label' => __( 'Wrapper', 'blog-supreme' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sup_slider_wrap_background',
				'label' => __( 'Background', 'suprementor' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .sup-slider-wrap',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sup_slider_wrap_box_shadow',
				'label' => __( 'Box Shadow', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-slider-wrap',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'sup_slider_wrap_border',
				'label' => __( 'Border', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-slider-wrap',
			]
		);

        $this->add_control(
			'sup_slider_wrap_radius',
			[
				'label' => __( 'Border Radius', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-slider-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'sup_slider_wrap_margin',
			[
				'label' => __( 'Margin', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-slider-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'sup_slider_wrap_padding',
			[
				'label' => __( 'Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-slider-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

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

        $this->add_skin( new \Suprementor\Modules\Template_Slider\Skins\Nav_Inside( $this ) );
        $this->add_skin( new \Suprementor\Modules\Template_Slider\Skins\Nav_Outside( $this ) );
        $this->add_skin( new \Suprementor\Modules\Template_Slider\Skins\Dots_Nav_Top( $this ) );
        $this->add_skin( new \Suprementor\Modules\Template_Slider\Skins\Dots_Nav_Bottom( $this ) );

        do_action('suprementor/modules/template-slider/skins');

    }

    /**
    * Process Settings.
    * @since 1.0.0
    */
    public function process_settings($settings) {

        $settings['sup_slider_classes'][] = 'sup-slider-processed';
        $settings['sup_slide_classes'][] = 'sup-slide-processed';

        if ( $settings['sup_slides_mode'] == 'center' ) {
            $settings['sup_slide_classes'][] = 'uk-width-3-4';
        }

        if ( $settings['sup_slides_mode'] == 'offset' ) {
            $settings['sup_slide_classes'][] = 'uk-width-3-4';
        }

        if ( $settings['sup_slides_mode'] == 'even' ) {
            ( empty( $settings['sup_slides_mobile'] ) ) ?: $settings['sup_slider_classes'][] = $settings['sup_slides_mobile'];
            ( empty( $settings['sup_slides_tablet'] ) ) ?: $settings['sup_slider_classes'][] = $settings['sup_slides_tablet'];
            ( empty( $settings['sup_slides_desktop'] ) ) ?: $settings['sup_slider_classes'][] = $settings['sup_slides_desktop'];
        }

        ( empty( $settings['sup_gap'] ) ) ?: $settings['sup_slider_classes'][] = $settings['sup_gap'];

        $settings['sup_dotnav_classes'][] = 'sup-dotnav-processed';
        ( empty( $settings['sup_dotnav_align'] ) ) ?: $settings['sup_dotnav_classes'][] = $settings['sup_dotnav_align'];

        $settings['sup_dotnav_wrap_classes'][] = 'sup-dotnav-wrap-processed';
        $settings['sup_slidenav_wrap_classes'][] = 'sup-slidenav-wrap-processed';

        if ( $settings['sup_first_item'] == 'dotnav' ) {
            $settings['sup_dotnav_wrap_classes'][] = 'uk-flex-first';
        } else {
            $settings['sup_slidenav_wrap_classes'][] = 'uk-flex-first';
        }

        $settings['sup_slidenav_classes'][] = 'sup-slidenav-processed';
        ( empty( $settings['sup_slidenav_hidden_hover'] ) ) ?: $settings['sup_slidenav_classes'][] = 'uk-hidden-hover';
        ( empty( $settings['sup_slidenav_hidden_touch'] ) ) ?: $settings['sup_slidenav_classes'][] = 'uk-hidden-touch';

        $settings['sup_slidenav_container_classes'][] = 'sup-slidenav-container-processed';
        ( empty( $settings['sup_slidenav_hidden_hover'] ) ) ?: $settings['sup_slidenav_container_classes'][] = 'uk-hidden-hover';
        ( empty( $settings['sup_slidenav_hidden_touch'] ) ) ?: $settings['sup_slidenav_container_classes'][] = 'uk-hidden-touch';

        /*
        * Build attribute string based on settings
        */

        $settings['sup_slider_atts'] = '';

        if (  ! empty( $settings['sup_autoplay'] ) ) {
            $settings['sup_slider_atts'] .= 'autoplay: true;';
            $settings['sup_slider_atts'] .= 'autoplay-interval: ' . absint($settings['sup_autoplay_interval']) * 1000 . ';';
            if (  ! empty( $settings['sup_autoplay_pause_on_hover'] ) ) {
                $settings['sup_slider_atts'] .= 'pause-on-hover: true;';
            } else {
                $settings['sup_slider_atts'] .= 'pause-on-hover: false;';
            }
        }

        if (  ! empty( $settings['sup_content_transitions'] ) ) {
            $settings['sup_slider_atts'] .= 'clsActivated: uk-transition-active;';
        }

        if (  ! empty( $settings['sup_sets'] ) ) {
            $settings['sup_slider_atts'] .= 'sets: true;';
        }

        if (  ! empty( $settings['sup_velocity'] ) ) {
            $settings['sup_slider_atts'] .= 'velocity: ' . absint($settings['sup_velocity']) . ';';
        }

        if (  $settings['sup_slides_mode'] == 'center' ) {
            $settings['sup_slider_atts'] .= 'center: true;';
        }

        if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
            $settings['sup_slider_atts'] .= 'draggable: false;';
        }

        /*
        * Done processing the control
        */

        return $settings;

    }

}
