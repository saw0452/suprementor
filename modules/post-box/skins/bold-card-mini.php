<?php

namespace Suprementor\Modules\Post_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Bold_Card_Mini extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    * @since 1.0.0
    */
    public function get_id() {
        return 'bold_card_mini';
    }

    /**
    * Get skin title.
    * @since 1.0.0
    */
    public function get_title() {
        return __( 'Bold Card Mini', 'suprementor' );
    }

    /**
    * Render the skin.
    * @access public
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert();

    }

}
