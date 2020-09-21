<?php

namespace Suprementor\Modules\Post_Box;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Post_Box',
		];
	}

	public function get_name() {
		return 'sup-post-box';
	}

}
