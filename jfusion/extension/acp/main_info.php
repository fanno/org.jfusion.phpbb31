<?php
/**
*
* @package phpBB Extension - JFusion phpBB Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jfusion\extension\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\jfusion\extension\acp\main_module',
			'title'		=> 'ACP_JFUSION_EXTENSION_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_JFUSION_EXTENSION',
					'auth' => 'ext_jfusion/extension && acl_a_board',
					'cat' => array('ACP_JFUSION_EXTENSION_TITLE')),
			),
		);
	}
}
