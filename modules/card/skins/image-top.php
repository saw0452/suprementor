<?php

namespace Suprementor\Modules\Card\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Image_Top extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    * @since 1.0.0
    */
    public function get_id() {
        return 'image_top';
    }

    /**
    * Get skin title.
    * @since 1.0.0
    */
    public function get_title() {
        return __( 'Image Top', 'suprementor' );
    }

    /**
    * Render the skin.
    * @access public
    */
    public function render() {

        $settings = $this->parent->process_settings( $this->parent->get_settings_for_display() );

        ?>

        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

        <div class="uk-overflow-hidden uk-position-relative">

            <?php if ( ! empty( $settings['sup_image_2'] ) ) : ?>
                <div class="<?php echo esc_attr( implode(' ', $settings['sup_image_1_classes']) ); ?>">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'sup_image_size', 'sup_image_1' ); ?>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $settings['sup_image_2'] ) ) : ?>
                <div class="<?php echo esc_attr( implode(' ', $settings['sup_image_2_classes']) ); ?>">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'sup_image_size', 'sup_image_2' ); ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="sup-card-inner">

            <div class="sup-card-title">
                <<?php echo esc_attr( $settings['sup_title_tag'] ); ?>>
                <?php echo esc_html( $settings['sup_title_text'] ); ?>
                </<?php echo esc_attr( $settings['sup_title_tag'] ); ?>>
            </div>

            <div class="sup-card-body">
                <<?php echo esc_attr( $settings['sup_body_tag'] ); ?>>
                <?php echo esc_html( $settings['sup_body_text'] ); ?>
                </<?php echo esc_attr( $settings['sup_body_tag'] ); ?>>
            </div>

            <?php if ( ! empty( $settings['sup_button_use'] ) ) : ?>
                <?php \Suprementor\Controls\Button::template( $settings ); ?>
            <?php endif; ?>

        </div>

        <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php
    }

}
