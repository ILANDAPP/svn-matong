<?php
/*------------------------------------------------------------------------
# mod_fb_fan_page_widget_by_tickwidget - Facebook Fan Page Widget by TickWidget
# ------------------------------------------------------------------------
# author    TickWidget Team
# copyright Copyright (C) 2012 mortal.bumpin.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.mortal.bumpin.com
# Technical Support:  Forum - http://socialbar.ticketmy.com/help
-------------------------------------------------------------------------*/
//don't allow other scripts to grab and execute our file
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
//$bumpin_id = $params->get('bumpin_id');
//echo $bumpin_id

		if(($params->get('tickwidget_id')))
		{
			$bumpin_user_id= $params->get('tickwidget_id');
		}
		else{
			$bumpin_user_id=24890;
		}
		$bumpin_code = '<script src="http://mortal.bumpin.com/files/u_' .$bumpin_user_id. '.js" type="text/javascript" ></script>
		<div id="ipw-fb_fan_page">
		  <div id="bsb-app-fb_fan_page" class="b-sb-ipw"></div>
		  <div class="bsb-link-div" style="width: 100%; font-size: 8px; text-align: right; left: -5px; top: 0px; position: relative; background: transparent; direction: ltr; background-color: transparent; font-family : arial,tahoma,\'lucida grande\',verdana,sans-serif; opacity: 1; ">Get this
		  <a  class="bsb-link-text" href="http://www.ticketmy.com/widgets/fb_fan_page.php" style="color:#2d2d2d; direction: ltr; font-size :10px; bold; background-color: transparent; background: transparent;" target="_blank">  Facebook Fan Page </a> Widget
		</div>
		</div>';

		echo $bumpin_code;
?>
