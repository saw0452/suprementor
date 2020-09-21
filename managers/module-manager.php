<?php

namespace Suprementor\Managers;

class Module_Manager {

    protected $modules = [];

    public function __construct() {

        $modules = [
            'Card',
            'Template_Slider',
            'Post_Box',
        ];

        foreach ( $modules as $module ) {
            $class_name = 'Suprementor' . '\\Modules\\' . $module . '\Module';
            $this->modules[ $module ] = $class_name::instance();
        }
    }
}
