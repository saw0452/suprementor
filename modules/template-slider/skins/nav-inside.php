<?php

namespace Suprementor\Modules\Template_Slider\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Nav_Inside extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    * @since 1.0.0
    */
    public function get_id() {
        return 'nav_inside';
    }

    /**
    * Get skin title.
    * @since 1.0.0
    */
    public function get_title() {
        return __( 'Nav Inside', 'suprementor' );
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

                <div class="sup-section-slider" uk-slider="<?php echo esc_attr( $settings['sup_slider_atts'] ); ?>">

                    <div class="uk-position-relative uk-visible-toggle">

                        <div class="uk-slider-container">

                            <ul class="uk-slider-items <?php echo esc_attr( implode( ' ', $settings['sup_slider_classes']) ); ?>" uk-grid>

                                <?php foreach ( $slide_ids as $s ) : ?>

                                    <li class="<?php echo esc_attr( implode( ' ', $settings['sup_slide_classes']) ); ?>">

                                        <?php $shortcode = do_shortcode( shortcode_unautop( '[elementor-template id="' . $s[$loop_key] . '"]' ) ); ?>

                                        <?php echo $shortcode; ?>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                            <?php if ( ! empty( $settings['sup_slidenav_show'] ) ) : ?>

                                <?php if ( $settings['sup_slidenav_position'] == 'uk-position-center' ) : ?>

                                    <span class="sup-slidenav uk-position-center-left uk-display-inline-block <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_classes']) ); ?>" href="#" uk-slidenav-previous uk-slider-item="previous"></span>
                                    <span class="sup-slidenav uk-position-center-right uk-display-inline-block <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_classes']) ); ?>" href="#" uk-slidenav-next uk-slider-item="next"></span>

                                <?php else: ?>

                                    <div class="uk-slidenav-container <?php echo esc_attr( $settings['sup_slidenav_position'] ); ?>">
                                        <span class="sup-slidenav uk-display-inline-block <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_classes']) ); ?>" uk-slidenav-previous uk-slider-item="previous"></span>
                                        <span class="sup-slidenav uk-display-inline-block <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_classes']) ); ?>" uk-slidenav-next uk-slider-item="next"></span>
                                    </div>

                                <?php endif; ?>

                            <?php endif; ?>

                        </div>

                    </div>

                    <?php if ( ! empty( $settings['sup_dotnav_show'] ) ) : ?>

                        <ul class="uk-slider-nav uk-dotnav <?php echo esc_attr( implode( ' ', $settings['sup_dotnav_classes']) ); ?>"></ul>

                    <?php endif; ?>

                </div>

            </div>

        <?php else : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-warning ', 'Please add some slides.' ); ?>

        <?php endif; ?>


        <?php

    }

}
