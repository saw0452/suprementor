<?php

namespace Suprementor\Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

abstract class Module_Base {

	private $reflection;

	protected static $_instances = [];

	public static function class_name() {
		return get_called_class();
	}

	public static function instance() {

        if ( empty( static::$_instances[ static::class_name() ] ) ) {
			static::$_instances[ static::class_name() ] = new static();
		}

		return static::$_instances[ static::class_name() ];
	}

	public function __construct() {

		$this->reflection = new \ReflectionClass( $this );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

	}

	public function init_widgets() {

		$widget_manager = \Elementor\Plugin::instance()->widgets_manager;

		foreach ( $this->get_widgets() as $widget ) {

			$class_name = $this->reflection->getNamespaceName() . '\Widgets\\' . $widget;

			$widget_manager->register_widget_type( new $class_name() );

		}
	}

}
