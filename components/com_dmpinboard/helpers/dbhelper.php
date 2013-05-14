<?php

	/**
	* @copyright		(C)2013 DM Digital S.r.l
	* @author 			DM Digital <support@dmjoomlaextensions.com>
	* @link				http://www.dmjoomlaextensions.com
	* @license 			GNU/LGPL http://www.gnu.org/copyleft/gpl.html
	**/
	
	defined('_JEXEC') or die('Restricted access');

class DMHData {
	
	function query($myQuery) {
		
		$db =& JFactory::getDBO();
		$db->setQuery( $myQuery );
		$db->query();
		if (strpos(' '.$myQuery,'INSERT') > 0) {
			return $db->insertid();
		}
	}
	
	function loadObject($myQuery) {
		
		$db =& JFactory::getDBO();
		$db->setQuery( $myQuery );
		return $db->loadObject();
	}
	
	function loadObjectList($myQuery) {
		
		$db =& JFactory::getDBO();
		$db->setQuery( $myQuery );
		return $db->loadObjectList();
	}
	
	function loadResult($myQuery) {
		
		$db =& JFactory::getDBO();
		$db->setQuery( $myQuery );
		return $db->loadResult();
	}
	
}

?>