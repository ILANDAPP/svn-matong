<?php
/**
*
* Description
*
* @package	VirtueMart
* @subpackage UpdatesMigration
* @author Max Milbers
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @version $Id: default.php 4075 2011-09-11 19:56:38Z Milbo $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
AdminUIHelper::startAdminArea();
?>



<?php // Loading Templates in Tabs
AdminUIHelper::buildTabs ( array (	'tools' 	=> 	'COM_VIRTUEMART_UPDATE_TOOLS_TAB',
									'migrator' 	=> 	'COM_VIRTUEMART_MIGRATION_TAB'
									 ) );
?>


<?php AdminUIHelper::endAdminArea(); ?>