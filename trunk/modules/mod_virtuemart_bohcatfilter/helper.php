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

//load VM classes
if (!class_exists( 'VmConfig' )) require(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
$config = VmConfig::loadConfig();
if (!class_exists('TableCategories')) require(JPATH_VM_ADMINISTRATOR.DS.'tables'.DS.'categories.php');
if (!class_exists( 'VirtueMartModelCategory' )) require(JPATH_VM_ADMINISTRATOR.DS.'models'.DS.'category.php');

// module class helper
class modVirtuemartBohCatFilterHelper {

	function getCategoriesTree(){
		//using VmModel::getModel('Category') was bad idea

		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		$query->from('#__virtuemart_categories_'.VMLANG.' AS l');

		$query->join('INNER', '#__virtuemart_categories AS c using (virtuemart_category_id)');
		$query->join('LEFT', '#__virtuemart_category_categories AS cx ON l.virtuemart_category_id = cx.category_child_id ');

		$query->select('c.virtuemart_category_id,  l.category_name, c.ordering, c.published, cx.category_child_id, cx.category_parent_id');

		$query->where('c.published = 1');
		//$query->order('c.ordering');
		//echo $query->dump();
		$db->setQuery($query);

		return $db->loadObjectList();
	}

	/**
	 * return categories in firs level
	 * { 1: "Option 1",  2: "Option 2" }
	 */
	public function getFirstLvlJSON($categoty_tree, $root_id = 0){
		$js = self::getJSONForChildrens($categoty_tree, $root_id);
		return empty($js) ? '{}' : $js;
	}

	/**
	* return full tree list
	* { 1: { 3: "Option 3",  4: "Option 4" }, 3: {5: "Some 5", 6: "Some 6"} }
	*/
	public function getCatTreeJSON($categoty_tree){
		$js_arr = array();
		foreach ($categoty_tree as $cat){
			$js_cat = self::getJSONForChildrens($categoty_tree, $cat->virtuemart_category_id);
			if($js_cat){
				$js_arr[] = $cat->virtuemart_category_id.':'.$js_cat;
			}
		}
		return empty($js_arr) ? '{}' : '{'.implode(',', $js_arr).'}';
	}

	/**
	* return categories for level
	* { 1: "Option 1",  2: "Option 2" }
	*/
	public function getJSONForChildrens($categoty_tree, $parent){

		$cats = self::getChildrens($categoty_tree, $parent);

		if (!empty($cats)){
			foreach ($cats as $id => $cat){
				$js_arr[] = $cat->virtuemart_category_id.':"'. htmlspecialchars($cat->category_name, ENT_QUOTES) .'"';
			}
			return '{'.implode(',', $js_arr).'}';
		} else {
			return null;
		}
	}
	/**
	* return js array with active categories
	*/
	public function getActiveCatsString($categories) {
		$cat_ids = array();

		if (!empty($categories)) {
			foreach ($categories as $cat) {
				$cat_ids[] = '\'' . $cat->virtuemart_category_id . '\'';
			}
			return implode(',', $cat_ids);
		}

		return '\'0\'';
	}

	/**
	 * sort categories by parent and return childrens
	 */
	public function getChildrens ($categoty_tree, $parent){
		static $cats_by_parent;

		if (empty($categoty_tree)) return array();

		if(!$cats_by_parent || empty($cats_by_parent[$parent])) {
			$cats_by_parent = array();

			foreach ($categoty_tree as $cat) {
				$cats_by_parent[$cat->category_parent_id][$cat->virtuemart_category_id] = $cat;
			}

		}
		return empty($cats_by_parent[$parent]) ? array() : $cats_by_parent[$parent]; //return empty array if no childrens

	}

}