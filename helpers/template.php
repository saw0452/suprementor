<?php

namespace Suprementor\Helpers;

if( ! defined('ABSPATH') ) exit;

class Template {

    /**
    * Get Post Format Icon
    *
    * Gets an icon for the post format overlays.
    *
    * @since 1.0.0
    */
    public static function get_format_icon($post_format = false) {
        switch ($post_format) {
            case 'aside':
            return 'file-text';
            break;
            case 'gallery':
            return 'image';
            break;
            case 'link':
            return 'link';
            break;
            case 'image':
            return 'image';
            break;
            case 'quote':
            return 'comment';
            break;
            case 'status':
            return 'hashtag';
            break;
            case 'video':
            return 'play';
            break;
            case 'audio':
            return 'microphone';
            break;
            case 'chat':
            return 'commenting';
            break;
            default:
            return 'plus';
        }
    }

}
