<?php

namespace Suprementor\Modules\Card\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Cover extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    * @since 1.0.0
    */
    public function get_id() {
        return 'cover';
    }

    /**
    * Get skin title.
    * @since 1.0.0
    */
    public function get_title() {
        return __( 'Cover'  . \Suprementor\Helpers\General::get_upgrade_tag(), 'suprementor' );
    }

    /**
    * Render the skin.
    * @access public
    */
    public function render() {

        echo \Suprementor\Helpers\General::upgrade_skin_advert();

    }

}
