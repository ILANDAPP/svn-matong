/**
 * @version		2012.06.01
 * @package VirtueMart Boh! Category Filter for Joomla 2.5 VirtueMart 2
 * @author  Fedik
 * @link    http://www.getsite.org.ua
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 *
 * mod_virtuemart_bohcatfilter
 */
var bohCatFilterItems = new Array();

bohCatFilterInit = function () {
	//execute each stored settings
	Array.each(bohCatFilterItems, function(o){
		//set some common options
		o.options.empty_value = '0';
		o.options.instant_init = false;
		//get optiontree
		var tree = new mooOptionTree(o.element, o.options, o.treeRoot, o.tree);

		//for set selected category id
		var catInput = document.id(o.element + '-form').getElement('input[name=virtuemart_category_id]');
		tree.addEvent('changed',function(changed){
			if(changed){
				var id = changed.get('value');
				catInput.set('value', id);
			}
		});

		//init optiontree
		tree.init();

		//clear button
		var clearBt = document.id(o.element + '-form').getElement('.clear');
		if(clearBt){
			clearBt.addEvent('click',function(){tree.resetTree(true);});
		}
	});

};

//init
window.addEvent('domready',function(){
	bohCatFilterInit();
});
