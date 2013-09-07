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

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$doc = JFactory::getDocument();
//get settings
$class_sfx	= htmlspecialchars($params->get('class_sfx'));
$text_before = $params->get('text_before');
$text_after	= $params->get('text_after');
$root_catid	= $params->get('root_catid', 0);
//get labels
$labels = trim(htmlspecialchars($params->get('labels'), ENT_QUOTES));
if($labels){
	$labels = explode(',', $labels);
	$labels = '\'' . implode('\',\'', $labels) . '\'';
}

//for assign result for menu item
$Itemid = $params->get('assign_menu') ? $params->get('menu_item') : JRequest::getInt('Itemid');

$active_category_id = JRequest::getInt('virtuemart_category_id', 0);

//$block_id = 'virtuemart_bohcatfilter_list';
$block_id = 'virtuemart-bohcatfilter-list-' . $module->id;
$select_text = JText::_('MOD_VIRTUEMART_BOHCATFILTER_MAKE_CHOOSE');

//get categories
$categoryModel = VmModel::getModel('Category');
//$category_tree = $categoryModel->getCategoryTree(); //returns not full tree
//$categoties = $categoryModel->getCategories(true, 0); //returns not all caregories
$category_tree = modVirtuemartBohCatFilterHelper::getCategoriesTree();

//get categories as js object
$cat_first_lvl_js = modVirtuemartBohCatFilterHelper::getFirstLvlJSON($category_tree, $root_catid);
$cat_tree_js = modVirtuemartBohCatFilterHelper::getCatTreeJSON($category_tree);
$active_categories = modVirtuemartBohCatFilterHelper::getActiveCatsString($categoryModel->getParentsList($active_category_id));

$js_config = <<<JS
try{
 bohCatFilterItems.push({
  treeRoot: {$cat_first_lvl_js},
  tree: {$cat_tree_js},
  element: '{$block_id}',
  options: {choose: '{$select_text}',labels:[{$labels}], preselect: [{$active_categories}]}
 });
}catch(e){console.error(e)};
JS;
//load js and css
if ($params->get('use_def_css', 1)){
	$doc->addStyleSheet(JURI::root(true).'/modules/mod_virtuemart_bohcatfilter/css/bohcatfilter.css');
}
$doc->addScript(JURI::root(true).'/modules/mod_virtuemart_bohcatfilter/js/mooOptionTree.js');
$doc->addScript(JURI::root(true).'/modules/mod_virtuemart_bohcatfilter/js/bohcatfilter.js');
$doc->addScriptDeclaration($js_config);
//get template
require JModuleHelper::getLayoutPath('mod_virtuemart_bohcatfilter', $params->get('layout', 'default'));

