<?php
/* @package Fmc LikeBox for Joomla!  
 * @link       http://www.js.fmcwebdesign.com/ 
 * @copyright (C) 2012- Jonathan Karipios 
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html 
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once (dirname(__FILE__).DS.'helper.php');

$input = mod_fmcbox::getinput($params);

require(JModuleHelper::getLayoutPath('mod_fmcbox'));
