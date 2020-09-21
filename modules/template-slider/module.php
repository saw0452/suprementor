<?php

namespace Suprementor\Modules\Template_Slider;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Template_Slider',
		];
	}

	public function get_name() {
		return 'sup-template-slider';
	}

}
