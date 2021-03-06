<?php

namespace Suprementor\Modules\Post_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_Card extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    *
    * Retrieve the skin ID.
    *
    * @since 1.0.0
    * @access public
    * @abstract
    */
    public function get_id() {
        return 'smart_card';
    }

    /**
    * Get skin title.
    *
    * Retrieve the skin title.
    *
    * @since 1.0.0
    * @access public
    * @abstract
    */
    public function get_title() {
        return __( 'Smart Card', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access public
    */
    public function render() {

        $settings = $this->parent->process_settings( $this->parent->get_settings_for_display() );

        $post_id = \Suprementor\Group_Controls\Get_Post::process_control( $settings, 'get_post' );

        ?>

        <?php if ( empty( $post_id ) ) : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-warning ', 'No post found.' ); ?>

        <?php else : ?>

            <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

            <?php \Suprementor\Controls\Post\Thumbnail::template( $post_id, $settings, true ); ?>

            <?php \Suprementor\Controls\Post\Meta_Inline::template( $post_id, $settings ); ?>

            <?php \Suprementor\Controls\Post\Title::template( $post_id, $settings ); ?>

            <?php \Suprementor\Controls\Post\Excerpt::template( $post_id, $settings ); ?>

            <?php \Suprementor\Controls\Button::template( $settings, $post_id ); ?>

            <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php endif; ?>

        <?php

    }

}
