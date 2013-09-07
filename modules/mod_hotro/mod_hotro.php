<?php
/**
* @package Author
* @author thongdd
* @website http://i-land.vn
* @email thongdd@i-land.vn
* @copyright 2013
* @license 
**/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div>
	<div id="skype_ct" style="width: 20%;height: 42px;padding-left: 6px;float:left;margin-right: 8px;">
		<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
		<a href="skype:<?php echo "Skype: ".$params->get('skype',"danh_thong")?>?call"><img src="<?php echo JURI::base()."modules/mod_hotro/skype.png"?>" style="border: none;" width="43" height="42" alt="<?php echo "Liên hệ : ".$params->get('skype',"danh_thong")?>" /></a>
	</div>
	<div id="phone-htt" style="width: 70%;float: left;line-height: 60px;font-size: 20px;color: red;font-weight: bold;height: 42px;">
		<img src="<?php echo JURI::base()."modules/mod_hotro/phone.png"?>" style="border: none;float:left" width="43" height="42" alt="Hỗ trợ trực tuyến" />
		<span style="float: left;line-height: 50px;font-size: 17px;color: red;font-weight: bold;height: 42px;padding-left: 10px;"><?php echo $params->get('phone',"0909 902 116")?></span>
	</div>
</div>
<div class="clear"></div>