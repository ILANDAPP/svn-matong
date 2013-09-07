<?php
/**
 * @version		2012.06.01
 * @package VirtueMart Boh! Category Filter for Joomla 2.5 VirtueMart 2
 * @author  Fedik
 * @email	getthesite@gmail.com
 * @link    http://www.getsite.org.ua
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 *
 * mod_virtuemart_bohcatfilter
 */
//don't allow other scripts to grab and execute our file
defined('_JEXEC') or die('Get lost?');
?>
<div class="virtuemart-bohcatfilter<?php echo $class_sfx;?>">
	<div class="bohcatfilter-text before"><?php echo $text_before; ?></div>
	<?php // for save request in browser hisroty better use GET insead of POST ?>
	<form action="<?php  echo JRoute::_('index.php');?>" method="get" id="<?php echo $block_id; ?>-form" class="virtuemart-bohcatfilter-form">
		<input type="hidden" name="option" value="com_virtuemart" />
		<input type="hidden" name="view" value="category" />
		<input type="hidden" name="virtuemart_category_id" value="0" />
		<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
		<div class="bohcatfilter-select">
			<div id="<?php echo $block_id; ?>"></div>
		</div>
		<div class="bohcatfilter-button">
			<input type="submit" class="button" value="<?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?>"/>
			<input type="button" class="button clear" value="<?php echo JText::_('JLIB_FORM_BUTTON_CLEAR'); ?>"/>
		</div>
	</form>
	<div class="bohcatfilter-text after"><?php echo $text_after; ?></div>
</div>
