<?php
/**
*
* @package phpBB Extension - No White Pages
* @copyright (c) 2015 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
function fatal_error_handler()
{
	if(function_exists('error_get_last'))
	{
		if($last_error = error_get_last())
		{
			$error_level = array(E_ERROR => 'Fatal error', E_WARNING => 'Runtime Error', E_PARSE => 'Parse error', E_NOTICE => 'Notice', );
			switch ($last_error['type'])
			{
				case E_ERROR:
				case E_PARSE:
				case E_CORE_ERROR:
				case E_COMPILE_ERROR:
				case E_USER_ERROR:
				case E_RECOVERABLE_ERROR:
				{
					echo '<html><head></head><body><b style="color:#F00">Error: ' . $error_level[$last_error['type']] . ': ' . $last_error['message'] . ' at file ' . $last_error['file'] . ' line ' . $last_error['line'] . '</b><br /><br /></body></html>';
					break;
				}
				default:
				{
					break;
				}
			}
		}
	}
}

register_shutdown_function('fatal_error_handler');
?>
