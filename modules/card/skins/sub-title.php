<?php

namespace Suprementor\Modules\Card\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Sub_Title extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    * @since 1.0.0
    */
    public function get_id() {
        return 'sub_title';
    }

    /**
    * Get skin title.
    * @since 1.0.0
    */
    public function get_title() {
        return __( 'Sub Title', 'suprementor' );
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
                    <?php add_filter( 'elementor/image_size/get_attachment_image_html', array( 'Suprementor\Helpers\General', 'add_cover_to_elementor_image'), 10, 4 ); ?>
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'sup_image_size', 'sup_image_2' ); ?>
                    <?php remove_filter( 'elementor/image_size/get_attachment_image_html', array( 'Suprementor\Helpers\General', 'add_cover_to_elementor_image') ); ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="uk-flex uk-flex-middle sup-card-inner">

            <div class="uk-width-expand">
                <div class="sup-card-title">
                    <<?php echo esc_attr( $settings['sup_title_tag'] ); ?>>
                    <?php echo esc_html( $settings['sup_title_text'] ); ?>
                    </<?php echo esc_attr( $settings['sup_title_tag'] ); ?>>
                </div>
            </div>

            <?php if ( ! empty( $settings['sup_button_use'] ) ) : ?>
                <div class="uk-width-auto">
                    <?php \Suprementor\Controls\Button::template( $settings ); ?>
                </div>
            <?php endif; ?>

        </div>

        <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php

    }

}
