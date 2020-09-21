<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Elementor controls and template for creating two column layouts.
 * @since 1.0.0
 */
class Doublet {

    /**
    * Adds a standardised section of content tab controls to a widget.
    *
    * @since 1.0.0
    *
    * @param object $obj The widget object to add the controls on.
    */
    public static function section_content( $obj ) {

        $obj->start_controls_section(
            'sup_content_doublet',
            [
                'label' => __( 'Doublet Columns', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        self::content( $obj );

        $obj->end_controls_section();

    }

    /**
    * Adds a standardised set of controls to a started widget controls section.
    *
    * @since 1.0.0
    *
    * @param object $obj The widget object to add the controls on.
    */
    public static function content( $obj ) {

        $obj->add_control(
            'sup_doublet_first_column_width_mobile',
            [
                'label' => __( 'First Column Mobile', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4',
                'options' => \Suprementor\Helpers\UIkit::width(),
            ]
        );

        $obj->add_control(
            'sup_doublet_first_column_width_tablet',
            [
                'label' => __( 'First Column Tablet', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4@s',
                'options' => \Suprementor\Helpers\UIkit::width_s(),
            ]
        );

        $obj->add_control(
            'sup_doublet_first_column_width_desktop',
            [
                'label' => __( 'First Column Desktop', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4@m',
                'options' => \Suprementor\Helpers\UIkit::width_m(),
            ]
        );

        $obj->add_control(
            'sup_doublet_column_min_height',
            [
                'label' => __( 'Column Min Height', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sup-doublet-first-column, {{WRAPPER}} .sup-doublet-second-column' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

    }

    /**
    * Opens the HTML template.
    *
    * @since 1.0.0
    *
    * @param array $settings The widgets settings for display array.
    * @param array $classes Additional CSS classes to add to the html.
    */
    public static function open( $settings = [], $classes = [] ) {

        $classes[] = 'sup-doublet';
        $classes[] = 'uk-grid-collapse';

        echo '<div class="' . esc_attr( implode(' ', $classes ) ) . '" uk-grid>';

    }

    /**
    * Opens the first of two columns.
    *
    * @since 1.0.0
    *
    * @param array $settings The widgets settings for display array.
    * @param array $classes Additional CSS classes to add to the html.
    */
    public static function first_column( $settings = [], $classes = [] ) {

        $classes[] = 'sup-doublet-first-column';
        $classes[] = $settings['sup_doublet_first_column_width_mobile'];
        $classes[] = $settings['sup_doublet_first_column_width_tablet'];
        $classes[] = $settings['sup_doublet_first_column_width_desktop'];

        echo '<div class="' . esc_attr( implode(' ', $classes ) ) . '">';

    }

    /**
    * Closes the First of Two Columns.
    *
    * @since 1.0.0
    */
    public static function first_column_close() {

        echo '</div>';

    }

    /**
    * Opens the second column.
    *
    * @since 1.0.0
    */
    public static function second_column() {

        echo '<div class="sup-doublet-second-column uk-width-expand">';

    }

    /**
    * Closes the Second Column.
    *
    * @since 1.0.0
    */
    public static function second_column_close() {

        echo '</div>';

    }

    /**
    * Closes the HTML template.
    *
    * @since 1.0.0
    */
    public static function close() {

        echo '</div>';

    }

}
