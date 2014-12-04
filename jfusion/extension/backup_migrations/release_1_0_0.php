<?php
/**
*
* @package phpBB Extension - JFusion phpBB Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jfusion\extension\migrations;

/**
 * Class release_1_0_0
 * @package jfusion\extension\migrations
 */
class release_1_0_0 extends \phpbb\db\migration\migration
{
	/**
	 * Allows you to check if the migration is effectively installed (entirely optional)
	 *
	 * This is checked when a migration is installed. If true is returned, the migration will be set as
	 * installed without performing the database changes.
	 * This function is intended to help moving to migrations from a previous database updater, where some
	 * migrations may have been installed already even though they are not yet listed in the migrations table.
	 *
	 * @return bool True if this migration is installed, False if this migration is not installed (checked on install)
	 */
	public function effectively_installed()
	{
		return isset($this->config['jfusion_extension_redirect']);
	}

	/**
	 * Defines other migrations to be applied first
	 *
	 * @return array An array of migration class names
	 */
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}

	/**
	 * Updates data by returning a list of instructions to be executed
	 *
	 * @return array Array of data update instructions
	 */
	public function update_data()
	{
		return array(
			array('config.add', array('jfusion_extension_redirect', 0)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_EXTENSION_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_EXTENSION_TITLE',
				array(
					'module_basename'	=> '\jfusion\extension\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
