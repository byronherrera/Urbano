<?php
	
	/**
	* @copyright		(C)2013 DM Digital S.r.l
	* @author 			DM Digital <support@dmjoomlaextensions.com>
	* @link				http://www.dmjoomlaextensions.com
	* @license 			GNU/LGPL http://www.gnu.org/copyleft/gpl.html
	**/
	
	defined('_JEXEC') or die('Restricted access');
	jimport('joomla.application.component.controller');
	jimport('joomla.application.component.view');
	
	if (version_compare(JVERSION, '3.0', 'ge')) {
		
		class DMController extends JControllerLegacy {
		}
		class DMView extends JViewLegacy {
		}
		
	} else {
		
		class DMController extends JController {
		}
		
		class DMView extends JView {
		}
		
	}
	
?>