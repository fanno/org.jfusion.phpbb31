<?php
/**
*
* @package phpBB Extension - JFusion phpBB Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jfusion\extension\acp;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang('acp/common');
		$user->add_lang('common', false, false, 'jfusion/extension');
		$this->tpl_name = 'extension_body';
		$this->page_title = $user->lang('ACP_JFUSION_EXTENSION_TITLE');
		add_form_key('jfusion/extension');

		if ($request->is_set_post('submit')) {
			if (!check_form_key('jfusion/extension')) {
				trigger_error('FORM_INVALID');
			}

			$config->set('jfusion_extension_redirect', $request->variable('jfusion_extension_redirect', 0));
			$config->set('jfusion_extension_redirect_url', $request->variable('jfusion_extension_redirect_url', ''));
			$config->set('jfusion_extension_redirect_id', $request->variable('jfusion_extension_redirect_id', 0));

			$config->set('jfusion_extension_direct_access', $request->variable('jfusion_extension_direct_access', 0));
			$config->set('jfusion_extension_direct_access_groups', $request->variable('jfusion_extension_direct_access_groups', ''));

			$config->set('jfusion_extension_jname', $request->variable('jfusion_extension_jname', ''));

			$config->set('jfusion_extension_apipath', $request->variable('jfusion_extension_apipath', ''));

			$config->set('jfusion_extension_redirect_login', $request->variable('jfusion_extension_redirect_login', 0));
			$config->set('jfusion_extension_redirect_logout', $request->variable('jfusion_extension_redirect_logout', 0));

			trigger_error($user->lang('ACP_JFUSION_EXTENSION_SETTING_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'				=> $this->u_action,
			'JFUSION_EXTENSION_REDIRECT'		=> $config['jfusion_extension_redirect'],

			'JFUSION_EXTENSION_REDIRECT_URL'		=> $config['jfusion_extension_redirect_url'],
			'JFUSION_EXTENSION_REDIRECT_ID'		=> $config['jfusion_extension_redirect_id'],

			'JFUSION_EXTENSION_DIRECT_ACCESS'		=> $config['jfusion_extension_direct_access'],
			'JFUSION_EXTENSION_DIRECT_ACCESS_GROUPS'		=> $config['jfusion_extension_direct_access_groups'],

			'JFUSION_EXTENSION_JNAME'		=> $config['jfusion_extension_jname'],

			'JFUSION_EXTENSION_APIPATH'		=> $config['jfusion_extension_apipath'],

			'JFUSION_EXTENSION_REDIRECT_LOGIN'		=> $config['jfusion_extension_redirect_login'],
			'JFUSION_EXTENSION_REDIRECT_LOGOUT'		=> $config['jfusion_extension_redirect_logout'],
		));
	}
}
