<?php

namespace Suprementor\Modules\Card\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Image_Bottom extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    * @since 1.0.0
    */
    public function get_id() {
        return 'image_bottom';
    }

    /**
    * Get skin title.
    * @since 1.0.0
    */
    public function get_title() {
        return __( 'Image Bottom' . \Suprementor\Helpers\General::get_upgrade_tag(), 'suprementor' );
    }

    /**
    * Render the skin.
    * @access public
    */
    public function render() {

        echo \Suprementor\Helpers\General::upgrade_skin_advert();
        
    }

}
