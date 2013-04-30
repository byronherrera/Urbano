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

/**
 * Radio List Element
 *
 * @since      Class available since Release 1.2.0
 */
class JFormFieldJSConditionalGroup extends JFormField
{
    /**
     * Element name
     *
     * @access	protected
     * @var		string
     */
    protected $type = 'JSConditionalGroup';

    /**
     *
     * process input params
     * @return string element param
     */
    protected function getInput()
    {
		$uri = str_replace(DS, "/", str_replace(JPATH_SITE, JURI::base(), dirname(__FILE__)));
		$uri = str_replace("/administrator", "", $uri);
		JHTML::script($uri . '/assets/js/jsconditionalgroup.js');

		$func = (string) $this->element['function'] ? (string) $this->element['function'] : '';
        $value = $this->value ? $this->value : (string) $this->element['default'];

        if (substr($func, 0, 1) == '@') {
            $func = substr($func, 1);
            if (method_exists($this, $func)) {
                return $this->$func();
            }
        } else {
            $subtype = (isset($this->element['subtype'])) ? trim($this->element['subtype']) : '';
            if (method_exists($this, $subtype)) {
                return $this->$subtype();
            }
        }
        return;
    }

    /**
     *
     * Get Label of element param
     * @return string label
     */
    function getLabel()
    {
        $func = (string) $this->element['function'] ? (string) $this->element['function'] : '';
        if (substr($func, 0, 1) == '@' || !isset($this->label) || !$this->label)
            return;
        else
            return parent::getLabel();
    }

    /**
     * render js to control setting form.
     * @param	string	$name The name of element param
     * @param	string	$value	The value of element
     * @param	object	$node The node of element
     * @param	string	$control_name
     * @return	string  group param
     */
    function group()
    {
        preg_match_all('/jform\\[([^\]]*)\\]/', $this->name, $matches);

        ?>
<script type="text/javascript">
			<?php
        foreach ($this->element->children() as $option) {
            ?>
				<?php
            $str_els = trim((string) $option);
            ?>
				<?php
            $str_els = str_replace("\n", '', $str_els)?>
				<?php
            $hideRow = isset($option['hideRow']) ? '' . $option['hideRow'] . '' : 1;
            ?>
				japh_addgroup ('<?php
            echo $option['for'];
            ?>', { val: '<?php
            echo $option['value'];
            ?>', els_str: '<?php
            echo $str_els?>', group:'jform[<?php
            echo @$matches[1][0]?>]', hideRow: <?php
            echo $hideRow?>});
			<?php
        }
        ;
        ?>
		</script>
<?php
        return;
    }
}