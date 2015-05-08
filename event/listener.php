<?php
/**
*
* @package phpBB Extension - No White Pages
* @copyright (c) 2015 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace sheer\nowhitepages\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
/**
* Assign functions defined in this class to event listeners in the core
*
* @return array
* @static
* @access public
*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.common'	=> 'fatal_error_handler',
		);
	}

	/** @var string phpEx */
	protected $php_ext;

	//** @var string phpbb_root_path */
	protected $phpbb_root_path;

	/**
	* Constructor
	*/
	public function __construct($phpbb_root_path, $php_ext)
	{
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	public function fatal_error_handler()
	{
		require($this->phpbb_root_path . 'ext/sheer/nowhitepages/includes/fatal_error_handler.' . $this->php_ext);
	}
}
