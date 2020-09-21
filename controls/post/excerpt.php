<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Excerpt {

    /**
    * Section Content
    * @since 1.0.0
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_excerpt',
            [
                'label' => __( 'Excerpt', 'suprementor' ),
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
            'sup_style_excerpt',
            [
                'label' => __( 'Excerpt', 'suprementor' ),
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
            'sup_excerpt_show',
            [
                'label' => __( 'Show Excerpt', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_excerpt_length',
            [
                'label' => __( 'Max Length', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 55,
                'step' => 1,
                'default' => 25,
            ]
        );

        $obj->add_control(
            'sup_excerpt_transition_opaque',
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
            'sup_excerpt_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

    }

    /**
    * excerpt Style
    * @since 1.0.0
    */
    public static function style( $obj ) {

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_excerpt_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-excerpt-wrap',
            ]
        );

        $obj->add_responsive_control(
            'sup_excerpt_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_excerpt_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-excerpt-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_excerpt_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-excerpt-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

    }

    /**
    * Process
    * @since 1.0.0
    */
    public static function process( $settings ) {

        $settings['sup_excerpt_wrap_classes'][] = 'sup-excerpt-wrap-processed';
        ( empty( $settings['sup_excerpt_transition_opaque'] ) ) ?: $settings['sup_excerpt_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_excerpt_transition'] ) ) ?: $settings['sup_excerpt_wrap_classes'][] = $settings['sup_excerpt_transition'];

        return $settings;

    }

    /**
    * Template
    * @since 1.0.0
    */
    public static function template( $post_id, $settings ) {

        $settings = self::process( $settings );

        $the_post = get_post( $post_id );

        if ( ! empty( $the_post->post_excerpt ) ) {

            $content = wp_trim_words( wp_strip_all_tags( $the_post->post_excerpt ), $settings['sup_excerpt_length'] );

        } else {

            $content = wp_trim_words( wp_strip_all_tags( $the_post->post_content ), $settings['sup_excerpt_length'] );

        }

        ?>

        <?php if ( ! empty( $settings['sup_excerpt_show'] ) ) : ?>
            <div class="sup-excerpt-wrap <?php echo esc_attr( implode( ' ', $settings['sup_excerpt_wrap_classes'] ) ); ?>">
                <?php echo esc_html( $content ); ?>
            </div>
        <?php endif; ?>

    <?php }

}
