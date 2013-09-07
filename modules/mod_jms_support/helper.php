<?php
/**
* Author: Joommasters.com
*Mail: joommasters@gmail.com
*URL:www.joommasters.com
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modJms_JmsSupportHelper
{
	function parseSupport($row,$display) {
		global $mainframe;
		if ($display) {
			if ($row->msn <> "") {
				$row->msn = "<span style=\"padding-left:20px;\"><a rel=\"{handler: 'iframe', size: {x: 400, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=msn&msn=".urlencode($row->msn)."&user=".urlencode($row->name)."\" class=\"modal\"><img border=\"0\" alt=\"Send a message via MSN to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_msn.gif\" title=\"Send a message via MSN to $row->name\"/> $row->msn</a></span>";
			}
			if ($row->icq <> "") {
				$row->icq = "<span style=\"padding-left:20px;\"><a rel=\"{handler: 'iframe', size: {x: 500, y: 530}}\" href=\"http://www.icq.com/people/webmsg.php?to=".urlencode($row->icq)."&from=".urlencode($row->name)."&fromemail=".urlencode($row->email)."\" class=\"modal\">
				<img border=\"0\" alt=\"Send a message via ICQ to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_icq.gif\" title=\"Send a message via ICQ to $row->name\"/> $row->icq</a></span>";
			}
			if ($row->skype <> "") {
				$row->skype = "<span style=\"padding-left:20px;\">
				<a rel=\"{handler: 'iframe', size: {x: 400, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=skype&user=".urlencode($row->name)."&skype=".urlencode($row->skype)."\" class=\"modal\">				
				<img border=\"0\" alt=\"Send a message via Skype to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_skype.gif\" title=\"Send a message via Skype to $row->name\"/> $row->skype</a></span>";
			}
			if ($row->aim <> "") {
				$row->aim = "<span style=\"padding-left:20px;\">
				<a rel=\"{handler: 'iframe', size: {x: 450, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=aim&user=".urlencode($row->name)."&aim=".urlencode($row->aim)."\" class=\"modal\">				
				<img border=\"0\" alt=\"Send a message via AIM to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_aim.gif\" title=\"Send a message via AIM to $row->name\"/> $row->aim</a></span>";
			}
			if ($row->yahoo <> "") {
				$row->yahoo = "<span style=\"padding-left:20px;\">				
				<a rel=\"{handler: 'iframe', size: {x: 450, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=yahoo&yahoo=".urlencode($row->yahoo)."&user=".urlencode($row->name)."\" class=\"modal\"><img border=\"0\" alt=\"Send a message via Yahoo to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_yahoo.gif\" title=\"Send a message via Yahoo to $row->name\"/> $row->yahoo</a>
				</span>";
			}
			if ($row->tel <> "") {
				$row->tel = "<span style=\"padding-left:20px;\"><img border=\"0\" alt=\"Telephone number of $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/telephone.png\" title=\"Telephone number\"/> $row->tel</span>";
			}
			if ($row->email <> "") {
				$row->email = "<span style=\"padding-left:20px;\"><img src=\"".JURI::root()."modules/mod_jms_support/images/email.jpg\" border=0 alt=\"Email\" title=\"Email\"> ".str_replace("@","<img border=\"0\" src=\"".JURI::root()."modules/mod_jms_support/images/at.gif\"/>",$row->email)."</span>";
			}
		}else {
			if ($row->msn <> "") {
				$row->msn = "<span style=\"padding-left:10px;\"><a rel=\"{handler: 'iframe', size: {x: 400, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=msn&msn=".urlencode($row->msn)."&user=".urlencode($row->name)."\" class=\"modal\"><img border=\"0\" alt=\"Send a message via MSN to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_msn.gif\" title=\"Send a message via MSN to $row->name\"/></a></span>";
			}
			if ($row->icq <> "") {
				$row->icq = "<span style=\"padding-left:10px;\"><a rel=\"{handler: 'iframe', size: {x: 500, y: 530}}\" href=\"http://www.icq.com/people/webmsg.php?to=".urlencode($row->icq)."&from=".urlencode($row->name)."&fromemail=".urlencode($row->email)."\" class=\"modal\">
				<img border=\"0\" alt=\"Send a message via ICQ to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_icq.gif\" title=\"Send a message via ICQ to $row->name\"/></a></span>";
			}
			if ($row->skype <> "") {
				$row->skype = "<span style=\"padding-left:10px;\">
				<a rel=\"{handler: 'iframe', size: {x: 400, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=skype&user=".urlencode($row->name)."&skype=".urlencode($row->skype)."\" class=\"modal\">				
				<img border=\"0\" alt=\"Send a message via Skype to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_skype.gif\" title=\"Send a message via Skype to $row->name\"/></a></span>";
			}
			if ($row->aim <> "") {
				$row->aim = "<span style=\"padding-left:10px;\">
				<a rel=\"{handler: 'iframe', size: {x: 450, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=aim&user=".urlencode($row->name)."&aim=".urlencode($row->aim)."\" class=\"modal\">				
				<img border=\"0\" alt=\"Send a message via AIM to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_aim.gif\" title=\"Send a message via AIM to $row->name\"/></a></span>";
			}
			if ($row->yahoo <> "") {
				$row->yahoo = "<span style=\"padding-left:10px;\">				
				<a rel=\"{handler: 'iframe', size: {x: 450, y: 300}}\" href=\"".JURI::root()."modules/mod_jms_support/sendmessage.php?type=yahoo&yahoo=".urlencode($row->yahoo)."&user=".urlencode($row->name)."\" class=\"modal\"><img border=\"0\" alt=\"Send a message via Yahoo to $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/im_yahoo.gif\" title=\"Send a message via Yahoo to $row->name\"/></a>
				</span>";
			}
			if ($row->tel <> "") {
				$row->tel = "<span style=\"padding-left:20px;\"><img border=\"0\" alt=\"Telephone number of $row->name\" src=\"".JURI::root()."modules/mod_jms_support/images/telephone.png\" title=\"Telephone number\"/> $row->tel</span>";
			}
			if ($row->email <> "") {
				$row->email = "<span style=\"padding-left:20px;\"><img src=\"".JURI::root()."modules/mod_jms_support/images/email.jpg\" border=0 alt=\"Email\" title=\"Email\"> ".str_replace("@","<img border=\"0\" src=\"".JURI::root()."modules/mod_jms_support/images/at.gif\"/>",$row->email)."</span>";
			}
		}
		return $row;
	}
	
}
