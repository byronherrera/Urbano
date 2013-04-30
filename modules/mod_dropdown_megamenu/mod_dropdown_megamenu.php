<?php
/**
 * @version		$Id$
 * @author		Joomseller!
 * @package		Joomla.Site
 * @subpackage	mode_dropdown_megamenu
 * @copyright	Copyright (C) 2008 - 2012 by Joomseller Solutions. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl.html GNU/GPL version 3
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__).DS.'mobile_device_detect.php');
$mobile = mobile_device_detect();
require_once (dirname(__FILE__).DS.'helper.php');

JHTML::_('behavior.mootools');

$menutype 	= $params->get('menutype', 'mainmenu');

//Main navigation
$params->def('menutype',            $menutype);
//$params->def('vertical_submenu_direction',			$vertical_submenu_direction);

$params->def('menu_images',            $params->get('menu_images', 1));
//$params->def('menu_iphone',			$params->get('menu_iphone', 1));
$params->def('menu_images_align',	'left');
$params->def('menupath',			'modules/mod_dropdown_megamenu');
$params->def('menu_title',			0);

$hozorver    = $params->get('hozorver',        'horizontal');
$menu_iphone	= $params->get('menu_iphone',		'1');
if($hozorver == 'horizontal') {
	$menuStyle	= $params->get('horizontal_menustyle',		'left');
} else {
	$menuStyle	= 'vertical';
	if($params->get('vertical_submenu_direction',		'lefttoright') == 'righttoleft') {
		$menuStyle	.= '_right';
	}
}

$document = &JFactory::getDocument();
$layout        = $params->get('layout', 'default');

if($mobile && $menu_iphone){
    $document->addScript('modules/mod_dropdown_megamenu/assets/js/dropdown_menu_mobile.js');
    $document->addStyleSheet("modules/mod_dropdown_megamenu/assets/css/dropdown_menu_mobile_left.css");
    $document->addStyleSheet("modules/mod_dropdown_megamenu/assets/css/dropdown_menu_mobile_iphone.css");
    $document->addStyleSheet('modules/mod_dropdown_megamenu/assets/css/'.$layout.'/style.css'); 
}
else{
	$document->addScript('modules/mod_dropdown_megamenu/assets/js/dropdown_menu.js');
	$document->addStyleSheet("modules/mod_dropdown_megamenu/assets/css/dropdown_menu_$menuStyle.css");
	if($menu_iphone){
		$document->addStyleSheet("modules/mod_dropdown_megamenu/assets/css/dropdown_menu_iphone.css");
	}
	$document->addStyleSheet('modules/mod_dropdown_megamenu/assets/css/'.$layout.'/style.css');
}

$dropdownmenu	= new Mod_DropDown_MegaMenu($params);
require(JModuleHelper::getLayoutPath('mod_dropdown_megamenu'));
