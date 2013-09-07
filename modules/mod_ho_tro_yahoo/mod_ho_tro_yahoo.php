<?php
/*------------------------------------------------------------------------
# mod_ho_tro_yahoo 
# ------------------------------------------------------------------------
# Author:    Trung Tam Tin Hoc
# copyright: Copyright (C) 2012 www.trungtamtinhoc.edu.vn. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.trungtamtinhoc.edu.vn
# Technical Support:  http://www.trungtamtinhoc.edu.vn/
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$preparing = modtructuyenyahooHelper::getParameterList($params);

$path = JModuleHelper::getLayoutPath('mod_ho_tro_yahoo', 'default');
if (file_exists($path)) {
	require($path);
}