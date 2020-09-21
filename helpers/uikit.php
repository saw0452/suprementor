<?php

namespace Suprementor\Helpers;

if( ! defined('ABSPATH') ) exit;

class UIkit {

    /**
    * Text Align
    * @since 1.0.0
    */
    public static function text_align() {
        return array(
            '0' => __('-', 'suprementor'),
            'uk-text-left' => __('Left', 'suprementor'),
            'uk-text-center' => __('Center', 'suprementor'),
            'uk-text-right' => __('Right', 'suprementor'),
        );
    }

    /**
    * Positon
    * @since 1.0.0
    */
    public static function position() {
        return array(
            'uk-position-top' => __('Top', 'suprementor'),
            'uk-position-bottom' => __('Bottom', 'suprementor'),
            'uk-position-left' => __('Left', 'suprementor'),
            'uk-position-right' => __('Right', 'suprementor'),
            'uk-position-top-left' => __('Top Left', 'suprementor'),
            'uk-position-top-right' => __('Top Right', 'suprementor'),
            'uk-position-bottom-left' => __('Bottom Left', 'suprementor'),
            'uk-position-bottom-right' => __('Bottom Right', 'suprementor'),
            'uk-position-center' => __('Center', 'suprementor'),
        );
    }

    /**
    * Positon Corners
    * @since 1.0.0
    */
    public static function position_corners() {
        return array(
            'uk-position-top-left' => __('Top Left', 'suprementor'),
            'uk-position-top-right' => __('Top Right', 'suprementor'),
            'uk-position-bottom-left' => __('Bottom Left', 'suprementor'),
            'uk-position-bottom-right' => __('Bottom Right', 'suprementor'),
        );
    }

    /**
    * Positon Corners Center
    * @since 1.0.0
    */
    public static function position_corners_center() {
        return array(
            'uk-position-center' => __('Center', 'suprementor'),
            'uk-position-top-left' => __('Top Left', 'suprementor'),
            'uk-position-top-right' => __('Top Right', 'suprementor'),
            'uk-position-bottom-left' => __('Bottom Left', 'suprementor'),
            'uk-position-bottom-right' => __('Bottom Right', 'suprementor'),
        );
    }


    /**
    * Positon Top Bottom
    * @since 1.0.0
    */
    public static function position_top_bottom() {
        return array(
            'uk-position-top' => __('Top', 'suprementor'),
            'uk-position-bottom' => __('Bottom', 'suprementor'),
        );
    }

    /**
    * Transition
    * @since 1.0.0
    */
    public static function transition() {
        return array(
            '0' => __('-', 'echelon-so'),
            'uk-transition-fade' => __('Fade', 'echelon-so'),
            'uk-transition-scale-up' => __('Scale Up', 'echelon-so'),
            'uk-transition-scale-down' => __('Scale Down', 'echelon-so'),
            'uk-transition-slide-top' => __('Slide Top', 'echelon-so'),
            'uk-transition-slide-bottom' => __('Slide Bottom', 'echelon-so'),
            'uk-transition-slide-left' => __('Slide Left', 'echelon-so'),
            'uk-transition-slide-right' => __('Slide Right', 'echelon-so'),
            'uk-transition-slide-top-small' => __('Slide Top Small', 'echelon-so'),
            'uk-transition-slide-bottom-small' => __('Slide Bottom Small', 'echelon-so'),
            'uk-transition-slide-left-small' => __('Slide Left Small', 'echelon-so'),
            'uk-transition-slide-right-small' => __('Slide Right Small', 'echelon-so'),
            'uk-transition-slide-top-medium' => __('Slide Top Medium', 'echelon-so'),
            'uk-transition-slide-bottom-medium' => __('Slide Bottom Medium', 'echelon-so'),
            'uk-transition-slide-left-medium' => __('Slide Left Medium', 'echelon-so'),
            'uk-transition-slide-right-medium' => __('Slide Right Medium', 'echelon-so'),
        );
    }

    /**
    * Text Align
    * @since 1.0.0
    */
    public static function align() {
        return array(
            '0' => __('-', 'echelon-so'),
            'uk-text-left' => __('Left', 'echelon-so'),
            'uk-text-center' => __('Center', 'echelon-so'),
            'uk-text-right' => __('Right', 'echelon-so'),
        );
    }

    /**
    * Width
    * @since 1.0.0
    */
    public static function width() {
        return array(
            '0' => __('-', 'suprementor'),
            'uk-width-1-1' => __('Full', 'suprementor'),
            'uk-width-1-2' => __('Half', 'suprementor'),
            'uk-width-1-3' => __('One Third', 'suprementor'),
            'uk-width-2-3' => __('Two Thirds', 'suprementor'),
            'uk-width-1-4' => __('One Fourth', 'suprementor'),
            'uk-width-2-4' => __('Two Fourths', 'suprementor'),
            'uk-width-3-4' => __('Three Fourths', 'suprementor'),
            'uk-width-1-5' => __('One Fifth', 'suprementor'),
            'uk-width-2-5' => __('Two Fifths', 'suprementor'),
            'uk-width-3-5' => __('Three Fifths', 'suprementor'),
            'uk-width-4-5' => __('Four Fifths', 'suprementor'),
            'uk-width-1-6' => __('One Sixth', 'suprementor'),
            'uk-width-2-6' => __('Two Sixths', 'suprementor'),
            'uk-width-3-6' => __('Three Sixths', 'suprementor'),
            'uk-width-4-6' => __('Four Sixths', 'suprementor'),
            'uk-width-5-6' => __('Five Sixths', 'suprementor'),
            'uk-width-auto' => __('Auto', 'suprementor'),
            'uk-width-expand' => __('Expand', 'suprementor'),
        );
    }

    /**
    * Width Fixed
    * @since 1.0.0
    */
    public static function width_fixed() {
        return array(
            '0' => __('-', 'suprementor'),
            'uk-width-1-1' => __('Full', 'suprementor'),
            'uk-width-1-2' => __('Half', 'suprementor'),
            'uk-width-1-3' => __('One Third', 'suprementor'),
            'uk-width-2-3' => __('Two Thirds', 'suprementor'),
            'uk-width-1-4' => __('One Fourth', 'suprementor'),
            'uk-width-2-4' => __('Two Fourths', 'suprementor'),
            'uk-width-3-4' => __('Three Fourths', 'suprementor'),
            'uk-width-1-5' => __('One Fifth', 'suprementor'),
            'uk-width-2-5' => __('Two Fifths', 'suprementor'),
            'uk-width-3-5' => __('Three Fifths', 'suprementor'),
            'uk-width-4-5' => __('Four Fifths', 'suprementor'),
            'uk-width-1-6' => __('One Sixth', 'suprementor'),
            'uk-width-2-6' => __('Two Sixths', 'suprementor'),
            'uk-width-3-6' => __('Three Sixths', 'suprementor'),
            'uk-width-4-6' => __('Four Sixths', 'suprementor'),
            'uk-width-5-6' => __('Five Sixths', 'suprementor'),
        );
    }

    /**
    * Width @s
    * @since 1.0.0
    */
    public static function width_s() {
        return array(
            '0' => __('-', 'suprementor'),
            'uk-width-1-1@s' => __('Full', 'suprementor'),
            'uk-width-1-2@s' => __('Half', 'suprementor'),
            'uk-width-1-3@s' => __('One Third', 'suprementor'),
            'uk-width-2-3@s' => __('Two Thirds', 'suprementor'),
            'uk-width-1-4@s' => __('One Fourth', 'suprementor'),
            'uk-width-2-4@s' => __('Two Fourths', 'suprementor'),
            'uk-width-3-4@s' => __('Three Fourths', 'suprementor'),
            'uk-width-1-5@s' => __('One Fifth', 'suprementor'),
            'uk-width-2-5@s' => __('Two Fifths', 'suprementor'),
            'uk-width-3-5@s' => __('Three Fifths', 'suprementor'),
            'uk-width-4-5@s' => __('Four Fifths', 'suprementor'),
            'uk-width-1-6@s' => __('One Sixth', 'suprementor'),
            'uk-width-2-6@s' => __('Two Sixths', 'suprementor'),
            'uk-width-3-6@s' => __('Three Sixths', 'suprementor'),
            'uk-width-4-6@s' => __('Four Sixths', 'suprementor'),
            'uk-width-5-6@s' => __('Five Sixths', 'suprementor'),
        );
    }

    /**
    * Width @m
    * @since 1.0.0
    */
    public static function width_m() {
        return array(
            '0' => __('-', 'suprementor'),
            'uk-width-1-1@m' => __('Full', 'suprementor'),
            'uk-width-1-2@m' => __('Half', 'suprementor'),
            'uk-width-1-3@m' => __('One Third', 'suprementor'),
            'uk-width-2-3@m' => __('Two Thirds', 'suprementor'),
            'uk-width-1-4@m' => __('One Fourth', 'suprementor'),
            'uk-width-2-4@m' => __('Two Fourths', 'suprementor'),
            'uk-width-3-4@m' => __('Three Fourths', 'suprementor'),
            'uk-width-1-5@m' => __('One Fifth', 'suprementor'),
            'uk-width-2-5@m' => __('Two Fifths', 'suprementor'),
            'uk-width-3-5@m' => __('Three Fifths', 'suprementor'),
            'uk-width-4-5@m' => __('Four Fifths', 'suprementor'),
            'uk-width-1-6@m' => __('One Sixth', 'suprementor'),
            'uk-width-2-6@m' => __('Two Sixths', 'suprementor'),
            'uk-width-3-6@m' => __('Three Sixths', 'suprementor'),
            'uk-width-4-6@m' => __('Four Sixths', 'suprementor'),
            'uk-width-5-6@m' => __('Five Sixths', 'suprementor'),
        );
    }

    /**
    * Width @l
    * @since 1.0.0
    */
    public static function width_l() {
        return array(
            '0' => __('-', 'suprementor'),
            'uk-width-1-1@l' => __('Full', 'suprementor'),
            'uk-width-1-2@l' => __('Half', 'suprementor'),
            'uk-width-1-3@l' => __('One Third', 'suprementor'),
            'uk-width-2-3@l' => __('Two Thirds', 'suprementor'),
            'uk-width-1-4@l' => __('One Fourth', 'suprementor'),
            'uk-width-2-4@l' => __('Two Fourths', 'suprementor'),
            'uk-width-3-4@l' => __('Three Fourths', 'suprementor'),
            'uk-width-1-5@l' => __('One Fifth', 'suprementor'),
            'uk-width-2-5@l' => __('Two Fifths', 'suprementor'),
            'uk-width-3-5@l' => __('Three Fifths', 'suprementor'),
            'uk-width-4-5@l' => __('Four Fifths', 'suprementor'),
            'uk-width-1-6@l' => __('One Sixth', 'suprementor'),
            'uk-width-2-6@l' => __('Two Sixths', 'suprementor'),
            'uk-width-3-6@l' => __('Three Sixths', 'suprementor'),
            'uk-width-4-6@l' => __('Four Sixths', 'suprementor'),
            'uk-width-5-6@l' => __('Five Sixths', 'suprementor'),
        );
    }

    /**
    * Width @xl
    * @since 1.0.0
    */
    public static function width_xl() {
        return array(
            '0' => __('-', 'suprementor'),
            'uk-width-1-1@xl' => __('Full', 'suprementor'),
            'uk-width-1-2@xl' => __('Half', 'suprementor'),
            'uk-width-1-3@xl' => __('One Third', 'suprementor'),
            'uk-width-2-3@xl' => __('Two Thirds', 'suprementor'),
            'uk-width-1-4@xl' => __('One Fourth', 'suprementor'),
            'uk-width-2-4@xl' => __('Two Fourths', 'suprementor'),
            'uk-width-3-4@xl' => __('Three Fourths', 'suprementor'),
            'uk-width-1-5@xl' => __('One Fifth', 'suprementor'),
            'uk-width-2-5@xl' => __('Two Fifths', 'suprementor'),
            'uk-width-3-5@xl' => __('Three Fifths', 'suprementor'),
            'uk-width-4-5@xl' => __('Four Fifths', 'suprementor'),
            'uk-width-1-6@xl' => __('One Sixth', 'suprementor'),
            'uk-width-2-6@xl' => __('Two Sixths', 'suprementor'),
            'uk-width-3-6@xl' => __('Three Sixths', 'suprementor'),
            'uk-width-4-6@xl' => __('Four Sixths', 'suprementor'),
            'uk-width-5-6@xl' => __('Five Sixths', 'suprementor'),
        );
    }

    /**
    * Child Width
    * @since 1.0.0
    */
    public static function child_width() {
        return array(
            'uk-child-width-1-1' => __('1', 'suprementor'),
            'uk-child-width-1-2' => __('2', 'suprementor'),
            'uk-child-width-1-3' => __('3', 'suprementor'),
            'uk-child-width-1-4' => __('4', 'suprementor'),
            'uk-child-width-1-5' => __('5', 'suprementor'),
            'uk-child-width-1-6' => __('5', 'suprementor'),
        );
    }

    /**
    * Slides Mobile
    * @since 1.0.0
    */
    public static function slides_mobile() {
        return array(
            'uk-child-width-1-1' => __('1', 'suprementor'),
            'uk-child-width-1-2' => __('2', 'suprementor'),
            'uk-child-width-1-3' => __('3', 'suprementor'),
            'uk-child-width-1-4' => __('4', 'suprementor'),
            'uk-child-width-1-5' => __('5', 'suprementor'),
            'uk-child-width-1-6' => __('6', 'suprementor'),
        );
    }

    /**
    * Slides Tablet
    * @since 1.0.0
    */
    public static function slides_tablet() {
        return array(
            'uk-child-width-1-1@s' => __('1', 'suprementor'),
            'uk-child-width-1-2@s' => __('2', 'suprementor'),
            'uk-child-width-1-3@s' => __('3', 'suprementor'),
            'uk-child-width-1-4@s' => __('4', 'suprementor'),
            'uk-child-width-1-5@s' => __('5', 'suprementor'),
            'uk-child-width-1-6@s' => __('6', 'suprementor'),
        );
    }

    /**
    * Slides Desktop
    * @since 1.0.0
    */
    public static function slides_desktop() {
        return array(
            'uk-child-width-1-1@m' => __('1', 'suprementor'),
            'uk-child-width-1-2@m' => __('2', 'suprementor'),
            'uk-child-width-1-3@m' => __('3', 'suprementor'),
            'uk-child-width-1-4@m' => __('4', 'suprementor'),
            'uk-child-width-1-5@m' => __('5', 'suprementor'),
            'uk-child-width-1-6@m' => __('6', 'suprementor'),
        );
    }

    /**
    * Grid
    * @since 1.0.0
    */
    public static function grid() {
        return array(
            'uk-grid-small' => __('Small', 'suprementor'),
            'uk-grid-medium' => __('Medium', 'suprementor'),
            'uk-grid-large' => __('Large', 'suprementor'),
            'uk-grid-collapse' => __('Collapse', 'suprementor'),
        );
    }

    /**
    * Background Blend
    * @since 1.0.0
    */
    public static function background_blend() {
        return array(
            'uk-background-blend-multiply' => __('Multiply', 'suprementor'),
            'uk-background-blend-screen' => __('Screen', 'suprementor'),
            'uk-background-blend-overlay' => __('Overlay', 'suprementor'),
            'uk-background-blend-darken' => __('Darken', 'suprementor'),
            'uk-background-blend-lighten' => __('Lighten', 'suprementor'),
            'uk-background-blend-color-dodge' => __('Color Dodge', 'suprementor'),
            'uk-background-blend-color-burn' => __('Color Burn', 'suprementor'),
            'uk-background-blend-hard-light' => __('Hard Light', 'suprementor'),
            'uk-background-blend-soft-light' => __('Soft Light', 'suprementor'),
            'uk-background-blend-difference' => __('Difference', 'suprementor'),
            'uk-background-blend-exclusion' => __('Exclusion', 'suprementor'),
            'uk-background-blend-hue' => __('Hue', 'suprementor'),
            'uk-background-blend-saturation' => __('Saturation', 'suprementor'),
            'uk-background-blend-color' => __('Color', 'suprementor'),
            'uk-background-blend-luminosity' => __('Luminosity', 'suprementor'),
        );
    }

    /**
    * Slideshow Animation
    * @since 1.0.0
    */
    public static function slideshow_animation() {
        return array(
            'fade' => __('Fade', 'suprementor'),
            'slide' => __('Slide', 'suprementor'),
            'scale' => __('Scale', 'suprementor'),
            'pull' => __('Pull', 'suprementor'),
            'push' => __('Push', 'suprementor'),
        );
    }

}
