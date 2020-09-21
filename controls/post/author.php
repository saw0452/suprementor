<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Author {

    /**
    * Section Content
    * @since 1.0.0
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_author',
            [
                'label' => __( 'Author', 'suprementor' ),
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
            'sup_style_author',
            [
                'label' => __( 'Author', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        self::style($obj);

        $obj->end_controls_section();

    }

    /**
    * Content
    * @since 1.0.0
    */
    public static function content( $obj ) {

        $obj->add_control(
            'sup_author_show',
            [
                'label' => __( 'Show Author', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_transition_opaque',
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
            'sup_author_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->add_control(
            'sup_author_label',
            [
                'label' => __( 'Label', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'By',
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
                'name' => 'sup_author_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-author-wrap, {{WRAPPER}} .sup-post-author-link',
            ]
        );

        $obj->add_control(
            'sup_author_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->start_controls_tabs(
            'sup_author_tabs'
        );

        $obj->start_controls_tab(
            'sup_author_normal_tab',
            [
                'label' => __( 'Normal', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_author_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->end_controls_tab();

        $obj->start_controls_tab(
            'sup_author_hover_tab',
            [
                'label' => __( 'Hover', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_author_hover_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-link:hover, .sup-post-title:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->end_controls_tab();

        $obj->end_controls_tabs();

    }

    /**
    * Process
    * @since 1.0.0
    */
    public static function process( $settings ) {

        $settings['sup_author_wrap_classes'][] = 'sup-post-author-wrap-processed';
        ( empty( $settings['sup_author_transition_opaque'] ) ) ?: $settings['sup_author_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_author_transition'] ) ) ?: $settings['sup_author_wrap_classes'][] = $settings['sup_author_transition'];

        return $settings;

    }

    /**
    * Template
    * @since 1.0.0
    */
    public static function template( $post_id, $settings ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_author_show'] ) ) : ?>

            <div class="sup-post-author-wrap <?php echo esc_attr( implode( ' ', $settings['sup_author_wrap_classes'] ) ); ?>">

                <?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>

                <?php echo esc_html($settings['sup_author_label']); ?>
                <a class="sup-post-author-link" href="<?php echo get_author_posts_url( $post_author_id ); ?>">
                    <?php echo get_the_author_meta( 'display_name', $post_author_id ); ?>
                </a>

            </div>

        <?php endif; ?>

    <?php }

}
