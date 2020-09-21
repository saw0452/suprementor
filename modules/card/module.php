<?php

namespace Suprementor\Modules\Card;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Card',
		];
	}

	public function get_name() {
		return 'sup-card';
	}

}
