<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Title {

    /**
    * Section Content
    * @since 1.0.0
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_title',
            [
                'label' => __( 'Title', 'suprementor' ),
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
            'sup_style_title',
            [
                'label' => __( 'Title', 'suprementor' ),
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
            'sup_title_show',
            [
                'label' => __( 'Show Title', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_title_length',
            [
                'label' => __( 'Max Length', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'default' => 250,
            ]
        );

        $obj->add_control(
            'sup_title_transition_opaque',
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
            'sup_title_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

    }

    /**
    * Title Style
    * @since 1.0.0
    */
    public static function style( $obj ) {

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_title_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-title',
            ]
        );

        $obj->add_control(
            'sup_title_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_title_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title:hover, .sup-post-title:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_title_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_title_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    }

    /**
    * Process
    * @since 1.0.0
    */
    public static function process( $settings ) {

        $settings['sup_title_wrap_classes'][] = 'sup-title-processed';
        ( empty( $settings['sup_title_transition_opaque'] ) ) ?: $settings['sup_title_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_title_transition'] ) ) ?: $settings['sup_title_wrap_classes'][] = $settings['sup_title_transition'];

        return $settings;

    }

    /**
    * Template
    * @since 1.0.0
    */
    public static function template( $post_id, $settings ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_title_show'] ) ) : ?>

            <div class="sup-post-title-wrap <?php echo esc_attr( implode( ' ', $settings['sup_title_wrap_classes'] ) ); ?>">
                <a class="sup-post-title" href="<?php echo get_permalink( $post_id ); ?>" title="<?php echo get_the_title( $post_id ); ?>">
                    <?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_title( $post_id ) ), $settings['sup_title_length'] ) ); ?>
                </a>
            </div>

        <?php endif; ?>

    <?php }

}
