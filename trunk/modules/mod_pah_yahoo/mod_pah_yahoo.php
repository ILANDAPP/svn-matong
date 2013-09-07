<?php
/**
* Cong ty TNHH Tin Hoc Phan Anh Huy
* Website: www.phananhhuy.vn
* Hotline: 0939739539
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$preparing = modyahooHelper::getParameterList($params);

$path = JModuleHelper::getLayoutPath('mod_pah_yahoo', 'default');
if (file_exists($path)) {
	require($path);
}