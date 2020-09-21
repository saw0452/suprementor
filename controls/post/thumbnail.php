<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Thumbnail {

    /**
    * Section Content
    * @since 1.0.0
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_thumbnail',
            [
                'label' => __( 'Thumbnail', 'suprementor' ),
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
            'sup_style_thumbnail',
            [
                'label' => __( 'Thumbnail', 'suprementor' ),
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
            'sup_thumbnail_use',
            [
                'label' => __( 'Use Thumbnail', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'sup_thumbnail_size',
                'exclude' => [ 'custom' ],
                'include' => [],
                'default' => 'large',
            ]
        );

        $obj->add_control(
            'sup_thumbnail_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [
                    '0'=>  __( '-', 'suprementor' ),
                    'uk-transition-scale-up' => __( 'Scale Up', 'suprementor' )
                ]
            ]
        );

    }

    /**
    * Title Style
    * @since 1.0.0
    */
    public static function style( $obj ) {

    }

    /**
    * Process
    * @since 1.0.0
    */
    public static function process( $settings ) {

        $settings['sup_thumbnail_inner_classes'][] = 'sup-post-thumbnail-inner-processed';
        ( empty( $settings['sup_thumbnail_transition'] ) ) ?: $settings['sup_thumbnail_inner_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_thumbnail_transition'] ) ) ?: $settings['sup_thumbnail_inner_classes'][] = $settings['sup_thumbnail_transition'];

        return $settings;

    }

    /**
    * Template
    * @since 1.0.0
    */
    public static function template( $post_id, $settings, $as_link = false, $atts = [] ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_thumbnail_use'] ) ) : ?>

                <div class="sup-post-thumbnail-wrap uk-overflow-hidden">

                    <?php if ( ! empty( $as_link) ) : ?>

                        <a href="<?php echo get_permalink( $post_id ); ?>" title="<?php echo get_the_title( $post_id ); ?>">
                        <?php endif; ?>

                        <div class="sup-post-thumbnail-inner <?php echo esc_attr( implode( ' ', $settings['sup_thumbnail_inner_classes'] ) ); ?>">
                            <?php echo get_the_post_thumbnail( $post_id, $settings['sup_thumbnail_size_size'], $atts ); ?>
                        </div>

                        <?php if ( ! empty( $as_link) ) : ?>
                        </a>

                    <?php endif; ?>

                </div>

        <?php endif; ?>

    <?php }

}
