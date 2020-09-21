<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Meta_Inline {

    /**
    * Section Content
    * @since 1.0.0
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_meta_inline',
            [
                'label' => __( 'Meta Inline', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        self::content( $obj );

        $obj->end_controls_section();

    }

    /**
    * Section
    * @since 1.0.0
    */
    public static function section_style( $obj ) {

        $obj->start_controls_section(
            'sup_style_meta_inline',
            [
                'label' => __( 'Meta Inline', 'suprementor' ),
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
            'sup_meta_inline_show',
            [
                'label' => __( 'Show Meta', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_meta_inline_show_categories',
            [
                'label' => __( 'Show Categories', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_meta_inline_show_date',
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
            'sup_meta_inline_date_format',
            [
                'label' => __( 'Date Format', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'd.m.Y',
            ]
        );

        $obj->add_control(
            'sup_meta_inline_separator',
            [
                'label' => __( 'Separator', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '/',
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
                'name' => 'sup_meta_inline_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-meta-inline',
            ]
        );

        $obj->add_control(
            'sup_meta_inline_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-meta-inline' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_meta_inline_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-meta-inline a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_meta_inline_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-meta-inline a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_meta_inline_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-meta-inline' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_meta_inline_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-meta-inline-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_meta_inline_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-meta-inline-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_meta_inline_separator_margin',
            [
                'label' => __( 'Separator Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'horizontal',
                'selectors' => [
                    '{{WRAPPER}} .sup-meta-inline-separator' => 'margin: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
                ],
            ]
        );



    }

    /**
    * Template
    * @since 1.0.0
    */
    public static function template( $post_id, $settings ) { ?>

        <?php if ( ! empty( $settings['sup_meta_inline_show']) ) : ?>

            <?php

            $post_categories = wp_get_post_categories( $post_id );

            $cats = [];

            foreach( $post_categories as $c ){

                $cats[] = array( 'name' => get_category( $c )->name, 'link' => get_category_link( $c ) );

            }

            ?>

            <div class="sup-meta-inline-wrap">

                <div class="sup-meta-inline">

                    <?php if ( ! empty( $settings['sup_meta_inline_show_categories']) ) : ?>

                        <div class="uk-display-inline-block sup-meta-inline-categories">

                            <?php foreach($cats as $ck => $cv): ?>

                                <a title="<?php echo esc_attr($cv['name']); ?>" href="<?php echo esc_url($cv['link']); ?>"><?php echo esc_html($cv['name']); ?></a><?php if (next($cats)) echo ', '; ?>
                                
                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $settings['sup_meta_inline_show_categories'] ) && ! empty( $settings['sup_meta_inline_show_date'] ) ) : ?>

                        <div class="uk-display-inline-block sup-meta-inline-separator">
                            <?php echo $settings['sup_meta_inline_separator']; ?>
                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $settings['sup_meta_inline_show_date']) ) : ?>

                        <div class="uk-display-inline-block sup-meta-inline-date">
                            <?php echo get_the_date( $settings['sup_meta_inline_date_format'], $post_id ); ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        <?php endif; ?>

    <?php }

}
