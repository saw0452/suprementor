<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Button {

    /**
    * @since 1.0.0
    */
    public static function section_content( $obj, $include_url = false ) {

        $obj->start_controls_section(
            'sup_content_button',
            [
                'label' => __( 'Button', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        self::content($obj, $include_url);

        $obj->end_controls_section();

    }

    /**
    * @since 1.0.0
    */
    public static function section_style($obj) {

        $obj->start_controls_section(
            'sup_style_button',
            [
                'label' => __( 'Button', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        self::style($obj);

        $obj->end_controls_section();

    }

    /**
    * @since 1.0.0
    */
    public static function content( $obj, $include_url = false ) {

        $obj->add_control(
            'sup_button_use',
            [
                'label' => __( 'Use Button', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_button_text',
            [
                'label' => __( 'Button Text', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'VIEW NOW', 'suprementor' ),
                'placeholder' => __( 'Type your text here', 'suprementor' ),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_button_use',
                            'operator' => '=',
                            'value' => 'yes',
                        ]
                    ]
                ]
            ]
        );

        $obj->add_control(
            'sup_button_transition_opaque',
            [
                'label' => __( 'Button Transition Opaque', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_button_use',
                            'operator' => '=',
                            'value' => 'yes',
                        ]
                    ]
                ]
            ]
        );

        $obj->add_control(
            'sup_button_transition',
            [
                'label' => __( 'Button Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_button_use',
                            'operator' => '=',
                            'value' => 'yes',
                        ]
                    ]
                ]
            ]
        );

        if ( ! empty( $include_link ) ) {

            $obj->add_control(
                'sup_button_link',
                [
                    'label' => __( 'Button Link', 'suprementor' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'suprementor' ),
                    'show_external' => false,
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                ]
            );
        }
    }

    /**
    * @since 1.0.0
    */
    public static function style( $obj ) {

        $obj->add_responsive_control(
            'sup_button_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_button_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-button-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_button_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-button',
            ]
        );

        $obj->start_controls_tabs(
            'sup_button_tabs'
        );

        $obj->start_controls_tab(
            'sup_button_normal_tab',
            [
                'label' => __( 'Normal', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_button_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_button_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_button_hover_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-button',
            ]
        );

        $obj->end_controls_tab();

        $obj->start_controls_tab(
            'sup_button_hover_tab',
            [
                'label' => __( 'Hover', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_button_hover_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_button_hover_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_button_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-button:hover',
            ]
        );

        $obj->end_controls_tab();

        $obj->end_controls_tabs();

    }

    /**
    * @since 1.0.0
    */
    public static function template($settings = [], $post_id = false) {

        $sup_button_classes[] = 'sup-button-processed';

        ( empty( $settings['sup_button_transition_opaque'] ) ) ?: $sup_button_classes[] = 'uk-transition-opaque';
        ( empty( $settings['sup_button_transition'] ) ) ?: $sup_button_classes[] = $settings['sup_button_transition'];

        if ( empty($post_id) ) {

            $sup_button_atts = '';

            ( empty( $settings['sup_button_link']['is_external'] ) ) ?: $sup_button_atts .=  ' target="_blank"';
            ( empty( $settings['sup_button_link']['nofollow'] ) ) ?: $sup_button_atts .=  ' rel="nofollow"';

        }

        ?>

        <?php if ( ! empty( $settings['sup_button_use']) ) : ?>

            <div class="sup-button-wrap <?php echo esc_attr( implode( ' ', $sup_button_classes ) ); ?>">

                <?php if ( empty( $post_id ) ) : ?>

                    <a class="uk-display-inline-block sup-button" href="<?php echo esc_url( $settings['sup_button_link']['url'] ); ?>" <?php echo $sup_button_atts; ?>>
                        <?php echo esc_html( $settings['sup_button_text'] ); ?>
                    </a>

                <?php else : ?>

                    <a class="uk-display-inline-block sup-button" title="<?php echo get_the_title( $post_id ); ?>" href="<?php echo get_permalink( $post_id ); ?>">
                        <?php echo esc_html( $settings['sup_button_text'] ); ?>
                    </a>

                <?php endif; ?>

            </div>

        <?php endif; ?>

    <?php }

}
