<?php

namespace Suprementor\Helpers;

if( ! defined('ABSPATH') ) exit;

class General {

    /**
    * Get Prefix
    *
    * When whitelabeling the plugin.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string
    */
    public static function get_prefix(){

        return apply_filters( 'suprementor/helpers/general/get_prefix', 'Suprementor ' );

    }

    /**
    * Get Pro URL
    *
    * @since 1.0.0
    * @access public
    *
    * @return string
    */
    public static function get_store_url() {

        return 'https://suprementor.com/';

    }

    /**
    * Get Post Options
    *
    * Provides a list of available posts.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array
    */
    public static function get_post_options() {

        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $posts = get_posts( $args );

        $options = array();

        if ( ! empty( $posts ) && ! is_wp_error( $posts ) ) {
            foreach ( $posts as $p ) {
                $options[ $p->ID ] = $p->post_title;
            }
        }

        return $options;

    }

    /**
    * Get Post Category Options
    *
    * Provides a list of available post categories.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array
    */
    public static function get_post_categoy_options() {

        $args = array(
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 0,
        );

        $categories = get_categories( $args );

        $options = [];

        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
            foreach ( $categories as $c ) {
                $options[$c->term_id] = $c->name;
            }
        }

        return $options;

    }

    /**
    * Get Post Tag Options
    *
    * Provides a list of available post tags.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array
    */
    public static function get_post_tag_options() {

        $args = array(
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 0,
        );

        $tags = get_tags( $args );

        $options = [];

        if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
            foreach ( $tags as $t ) {
                $options[$t->term_id] = $t->name;
            }
        }

        return $options;

    }

    /**
    * Get Author Options
    *
    * Provides a list of authors.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array
    */
    public static function get_author_options() {

        $users = get_users( [ 'role__in' => [ 'super_admin', 'administrator', 'editor', 'author' ] ] );

        $options = [];

        if ( ! empty( $users ) && ! is_wp_error( $users ) ){
            foreach ( $users as $user ) {
                $options[ $user->ID ] = $user->display_name;
            }
        }

        return $options;

    }

    /**
    * Placeholder Text Medium.
    *
    * The used in widget default that require medium length text.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array
    */
    public static function placeholder_text_medium() {

        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua minim veniam.';

    }

    /**
    * Get Upgrade Tag
    *
    * @since 1.0.0
    * @access public
    *
    * @return string
    */
    public static function get_upgrade_tag() {

        return ' (Upgrade)';

    }

    /**
    * Upgrade Skin Advert
    *
    * Displays the upgrade advert when a skin is not available.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array
    */
    public static function upgrade_skin_advert() {

        ?>

        <div style="background: #7d1179; padding: 20px;">
            <h3 style="color: #fff;">UPGRADE REQUIRED</h3>
            <p style="color: #fff;">This skin and more is available in the Suprementor store. <a style="color: #fff;" href="<?php echo self::get_store_url(); ?>">suprementor.com</a></p>
        </div>

        <?php

    }

    /**
    * Alert
    * @since 1.0.0
    */
    public static function alert($class, $content) {

        ?>

        <div class="uk-alert <?php echo $class; ?> uk-margin-remove">
            <?php echo __( $content, 'suprementor' ); ?>
        </div>

        <?php

    }

    /**
    * Get Saved Templae Sections
    * @since 1.0.0
    */
    public static function get_saved_template_sections() {

        $sections = get_posts(
            [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'elementor_library_type',
                        'field' => 'name',
                        'terms' => 'section',
                    )
                )
            ]
        );

        $options = [];

        if ( ! empty( $sections ) && ! is_wp_error( $sections ) ) {
            foreach ( $sections as $s ) {
                $options[$s->ID] = $s->post_title;
            }
        }

        return $options;

    }

    /**
    * Get Saved Templae Sections
    * @since 1.0.0
    */
    public static function get_saved_global_widgets() {

        $widgets = get_posts(
            [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'elementor_library_type',
                        'field' => 'name',
                        'terms' => 'widget',
                    )
                )
            ]
        );

        $options = [];

        if ( ! empty( $widgets ) && ! is_wp_error( $widgets ) ) {
            foreach ( $widgets as $w ) {
                $options[$w->ID] = $w->post_title;
            }
        }

        return $options;

    }

    /**
    * Add Cover to Elementor Image
    * @since 1.0.0
    */
    public static function add_cover_to_elementor_image( $html, $settings, $image_size_key, $image_key ) {
        $html = str_replace( '<img ', '<img uk-cover ', $html );
        return $html;
    }

}
