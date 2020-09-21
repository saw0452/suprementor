<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Categories {

    /**
    * Section Content
    * @since 1.0.0
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_categories',
            [
                'label' => __( 'Categories', 'suprementor' ),
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
            'sup_style_categories',
            [
                'label' => __( 'Categories', 'suprementor' ),
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
            'sup_categories_show',
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
            'sup_categories_transition_opaque',
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
            'sup_categories_transition',
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
                'name' => 'sup_categories_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-categories',
            ]
        );

        $obj->add_control(
            'sup_categories_alignment',
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
            ]
        );

        $obj->add_responsive_control(
            'sup_categories_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-categories' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_categories_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-categories' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_categories_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-categories, {{WRAPPER}} .sup-categories a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_categories_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-categories a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_categories_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-categories' => 'background-color: {{VALUE}}',
                ],
            ]
        );

    }

    /**
    * Process
    * @since 1.0.0
    */
    public static function process( $settings ) {

        $settings['sup_categories_wrap_classes'][] = 'sup-categories-processed';
        ( empty( $settings['sup_categories_transition_opaque'] ) ) ?: $settings['sup_categories_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_categories_transition'] ) ) ?: $settings['sup_categories_wrap_classes'][] = $settings['sup_categories_transition'];
        ( empty( $settings['sup_categories_alignment'] ) ) ?: $settings['sup_categories_wrap_classes'][] = $settings['sup_categories_alignment'];

        return $settings;

    }

    /**
    * Template
    * @since 1.0.0
    */
    public static function template( $post_id, $settings ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( !empty($settings['sup_categories_show']) ) : ?>

            <?php

            $post_categories = wp_get_post_categories( $post_id );
            $cats = array();

            foreach($post_categories as $c){
                $cats[] = array('name' => get_category($c)->name, 'link' => get_category_link($c));
            }

            ?>

            <div class="sup-categories-wrap <?php echo esc_attr(implode(' ', $settings['sup_categories_wrap_classes'])); ?>">
                <div class="sup-categories uk-display-inline-block">
                    <?php foreach($cats as $k => $v): ?>
                        <a class="uk-display-inline-block" href="<?php echo esc_url($v['link']); ?>"><?php echo esc_html($v['name']); ?></a><?php if (next($cats)) echo ', '; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif; ?>

    <?php }

}
