<?php

namespace Suprementor\Modules\Template_Slider\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Dots_Nav_Top extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    * @since 1.0.0
    */
    public function get_id() {
        return 'dots_nav_top';
    }

    /**
    * Get skin title.
    * @since 1.0.0
    */
    public function get_title() {
        return __( 'Dots Nav Top', 'suprementor' );
    }

    /**
    * Render the skin.
    * @access public
    */
    public function render() {

        $settings = $this->parent->process_settings( $this->parent->get_settings_for_display() );

        if ( $settings['sup_slides_source'] == 'widget' ) {

            $slide_ids = $settings['sup_widgets'];

            $loop_key = 'sup_widget';

        }

        if ( $settings['sup_slides_source'] == 'section' ) {

            $slide_ids = $settings['sup_sections'];

            $loop_key = 'sup_section';

        }

        ?>

        <?php if (  ( $settings['sup_slides_source'] == 'section' && ! empty( $settings['sup_sections'][0]['sup_section'] ) ) ||  (  $settings['sup_slides_source'] == 'widget' && ! empty( $settings['sup_widgets'][0]['sup_widget'] ) ) ) : ?>

            <div class="sup-slider-wrap">

                <div uk-slider="<?php echo esc_attr( $settings['sup_slider_atts'] ); ?>">

                    <div class="uk-position-relative uk-visible-toggle">

                        <div class="uk-flex uk-flex-middle uk-flex-between sup-nav-control-wrap">

                            <?php if ( ! empty( $settings['sup_dotnav_show'] ) ) : ?>

                                <div class="uk-width-exapnd <?php echo esc_attr( implode( ' ', $settings['sup_dotnav_wrap_classes']) ); ?>">

                                    <ul class="uk-slider-nav uk-dotnav <?php echo esc_attr( implode( ' ', $settings['sup_dotnav_classes']) ); ?>"></ul>

                                </div>

                            <?php endif; ?>

                            <?php if ( ! empty( $settings['sup_slidenav_show'] ) ) : ?>

                                <div class="uk-width-auto <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_wrap_classes']) ); ?>">

                                    <div class="uk-slidenav-container">
                                        <span class="sup-slidenav uk-display-inline-block <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_classes']) ); ?>" uk-slidenav-previous uk-slider-item="previous"></span>
                                        <span class="sup-slidenav uk-display-inline-block <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_classes']) ); ?>" uk-slidenav-next uk-slider-item="next"></span>
                                    </div>

                                </div>

                            <?php endif; ?>

                        </div>

                        <div class="uk-slider-container">

                            <ul class="uk-slider-items <?php echo esc_attr( implode( ' ', $settings['sup_slider_classes']) ); ?>" uk-grid>

                                <?php foreach ( $slide_ids as $s ) : ?>

                                    <li class="<?php echo esc_attr( implode( ' ', $settings['sup_slide_classes']) ); ?>">

                                        <?php $shortcode = do_shortcode( shortcode_unautop( '[elementor-template id="' . $s[$loop_key] . '"]' ) ); ?>

                                        <?php echo $shortcode; ?>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        <?php else : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-warning ', 'Please add some slides.' ); ?>

        <?php endif; ?>

        <?php

    }

}
