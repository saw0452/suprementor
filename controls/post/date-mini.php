<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Date_Mini {

    /**
    * Section Content
    * @since 1.0.0
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_date_mini',
            [
                'label' => __( 'Date Mini', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        self::content( $obj );

        $obj->end_controls_section();

    }

    /**
    * Section Style
    * @since 1.0.0
    */
    public static function section_style( $obj ) {

        $obj->start_controls_section(
            'sup_style_date_mini',
            [
                'label' => __( 'Date Mini', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        self::style( $obj );

        $obj->end_controls_section();

    }

    /**
    * Content
    * @since 1.0.0
    */
    public static function content( $obj ) {

        $obj->add_control(
            'sup_date_mini_show',
            [
                'label' => __( 'Show Date', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_date_mini_transition_opaque',
            [
                'label' => __( 'Transition Opaque', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_date_mini_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

    }

    /**
    * Style
    * @since 1.0.0
    */
    public static function style( $obj ) {

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_date_mini_typography_day',
                'label' => __( 'Typography Day', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-date-mini-day',
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_date_mini_typography_month',
                'label' => __( 'Typography Month', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-date-mini-month',
            ]
        );

        $obj->add_control(
            'sup_date_mini_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-date-mini-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_date_mini_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-date-mini-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_date_mini_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-date-mini-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_date_mini_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-date-mini-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_date_mini_position',
            [
                'label' => __( 'Position', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-position-top-left',
                'options' => \Suprementor\Helpers\UIkit::position_corners(),
            ]
        );

    }

    /**
    * Process
    * @since 1.0.0
    */
    public static function process( $settings ) {

        $settings['sup_date_mini_wrap_classes'][] = 'sup-date-mini-wrap-processed';
        ( empty( $settings['sup_date_mini_transition_opaque'] ) ) ?: $settings['sup_date_mini_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_date_mini_transition'] ) ) ?: $settings['sup_date_mini_wrap_classes'][] = $settings['sup_date_mini_transition'];
        ( empty( $settings['sup_date_mini_position'] ) ) ?: $settings['sup_date_mini_wrap_classes'][] = $settings['sup_date_mini_position'];
        return $settings;

    }

    /**
    * Template
    * @since 1.0.0
    */
    public static function template( $post_id, $settings ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( !empty($settings['sup_date_mini_show'])) : ?>
            <div class="sup-date-mini-wrap uk-text-center <?php echo esc_attr(implode(' ', $settings['sup_date_mini_wrap_classes'])); ?>">
                <div class="sup-date-mini-day"><?php echo get_the_date( 'd', $post_id ); ?></div>
                <div class="sup-date-mini-month"><?php echo get_the_date( 'M', $post_id ); ?></div>
            </div>
        <?php endif; ?>

    <?php }

}
