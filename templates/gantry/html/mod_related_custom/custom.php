<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_related_items
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

function limit_words($string, $word_limit)
{
	$words = explode(" ",$string);
  	return implode(" ",array_splice($words,0,$word_limit));
}

?>
<ul class="relateditems<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :	?>
<li>
	<div class="related-header-item">
	<a href="<?php echo $item->route; ?>">
		<?php if ($showDate) echo JHTML::_('date', $item->created, JText::_('DATE_FORMAT_LC4')). " - "; ?>
		<?php echo $item->title; ?></a>
        <!--personalizado-->
        <span class="related-icon">&nbsp;</span>
    </div>
        <?php echo limit_words($item->introtext,10).' ...';?>
</li>
<?php endforeach; ?>
</ul>