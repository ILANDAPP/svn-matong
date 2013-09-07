<script type="text/javascript">
/**
* Sends an MSN message
*
* @param string Target MSN handle
*
* @return boolean false
*/
var userAgent = navigator.userAgent.toLowerCase();
var is_opera = ((userAgent.indexOf('opera') != -1) || (typeof(window.opera) != 'undefined'));
var is_saf = ((userAgent.indexOf('applewebkit') != -1) || (navigator.vendor == 'Apple Computer, Inc.'));
var is_webtv = (userAgent.indexOf('webtv') != -1);
var is_ie = ((userAgent.indexOf('msie') != -1) && (!is_opera) && (!is_saf) && (!is_webtv));
function SendMSNMessage(name)
{
 if (!is_ie)
 {
 alert("The MSN functions only work when launched from Internet Explorer (MSIE)");
 return false;
 }
 else
 {
 MsgrObj.InstantMessage(name);
 return false;
 }
}

/**
* Adds an MSN Contact (requires MSN)
*
* @param string MSN handle
*
* @return boolean false
*/
function AddMSNContact(name)
{
 if (!is_ie)
 {
 alert("The MSN functions only work when launched from Internet Explorer (MSIE)");
 return false;
 }
 else
 {
 MsgrObj.AddContact(0, name);
 return false;
 }
}
</script>
<?php
$type = $_GET["type"];
switch ($type) {
	case "yahoo":
		yahoo();
		break;
	case "aim":	
		aim();
		break;
	case "icq":
		icq();
		break;
	case "skype":
		skype();
		break;
	case "msn":
		msn();
		break;
}
function yahoo() {
//	ymsgr:sendIM?leanhtuanart81
	$username = $_GET["user"];
	$yahoo = $_GET["yahoo"];
	?>
	<table width="100%" cellspacing="1" cellpadding="6" border="0" align="center" class="tborder">
<tbody>
<tr>
	<td align="center" class="panelsurround">
	<div class="panel">
		<div align="left">
		<div class="fieldset">
			<span style="float: right;"><img border="0" alt="Online Status" src="http://opi.yahoo.com/online?u=<?php echo $yahoo?>&m=g&t=2"/></span>
			<img alt="" src="images/im_yahoo.gif"/>
			Send Message Via Yahoo! to <a target="_blank" href="profile.php?u=<?php echo $username?>"><strong><?php echo $username?></strong></a> (<strong dir="ltr"><?php echo $yahoo?></strong>)
		</div>
		
		<div class="fieldset"><a onclick="window.close(); return true;" target="_blank" href="http://members.yahoo.com/interests?.oc=t&.kw=<?php echo $yahoo?>&.sb=1">View the profile of <span dir="ltr"><?php echo $yahoo?></span></a></div>
		
		<div class="fieldset"><a href="ymsgr:sendIM?<?php echo $yahoo?>">Send <span dir="ltr"><?php echo $yahoo?></span> a message</a></div>
		
		</div>
	</div>
	</td>
</tr>
</tbody></table>
	<?php
}

function skype() {
	$username = $_GET["user"];
	$skype = $_GET["skype"];	
	?>
	<table width="100%" cellspacing="1" cellpadding="6" border="0" align="center" class="tborder">
<tbody>
<tr>
	<td align="center" class="panelsurround">
	<div class="panel">
		<div align="left">

		<table cellspacing="6" cellpadding="0" border="0">
		<tbody><tr>
			<td><img alt="Skype™" class="inlineimg" src="images/im_skype.gif"/></td>
			<td style="padding: 0px;" class="fieldset" colspan="3">Send Message Via Skype to <a target="_blank" href="profile.php?u=<?php echo $username?>"><strong><?php echo $username?></strong></a> (<strong dir="ltr"><?php echo $skype?></strong>)</td>
		</tr>
		<tr>
			<td style="border: 1px inset ; color: black; background-color: white; text-align: center;" colspan="4">
				<a target="_blank" href="http://www.skype.com"><img border="0" alt="Online Status" src="http://mystatus.skype.com/<?php echo $skype?>.png"/></a>
			</td>
		</tr>
		<tr valign="bottom">
			<td><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?userinfo"><img border="0" alt="View Skype profile" src="images/skype/skype_info.gif"/></a></td>
			<td class="smallfont"><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?userinfo">View Skype profile</a></td>
			<td><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?add"><img border="0" alt="Add to Skype contact list" src="images/skype/skype_addcontact.gif"/></a></td>
			<td class="smallfont"><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?add">Add to Skype contact list</a></td>
		</tr>
		<tr valign="bottom">
			<td><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?call"><img border="0" alt="Start Skype voice call" src="images/skype/skype_callstart.gif"/></a></td>
			<td class="smallfont"><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?call">Start Skype voice call</a></td>
			<td><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?chat"><img border="0" alt="Start Skype text chat" src="images/skype/skype_message.gif"/></a></td>
			<td class="smallfont"><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?chat">Start Skype text chat</a></td>
		</tr>
		<tr valign="bottom">
			<td><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?voicemail"><img border="0" alt="Leave voicemail using Skype" src="images/skype/skype_voicemail.gif"/></a></td>
			<td class="smallfont"><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?voicemail">Leave voicemail using Skype</a></td>
			<td><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?sendfile"><img border="0" alt="Send a file using Skype" src="images/skype/skype_fileupload.gif"/></a></td>
			<td class="smallfont"><a onclick="return skypeCheck();" href="skype:<?php echo $skype?>?sendfile">Send a file using Skype</a></td>
		</tr>
		<tr>
			<td class="fieldset" colspan="4">These functions require <a target="_blank" href="http://www.skype.com">Skype™</a> to be installed.</td>
		</tr>
		</tbody></table>
				
		</div>
	</div>
	</td>
</tr>
</tbody></table>
	<?php
}

function msn() {
	$username = $_GET["user"];
	$msn = $_GET["msn"];
	?>
	<table width="100%" cellspacing="1" cellpadding="6" border="0" align="center" class="tborder">
<tbody>
<tr>
	<td align="center" class="panelsurround">
	<object id="MsgrObj" height="0" width="0" codetype="application/x-oleobject" classid="clsid:B69003B3-C55E-4B48-836C-BC5946FC3B28"/></object>
	<div class="panel">
		<div align="left">
		
		<div class="fieldset">
			<img alt="" src="images/im_msn.gif"/>
			Send Message Via MSN to <a target="_blank" href="profile.php?u=<?php echo $username?>"><strong><?php echo $username?></strong></a> <span style="white-space: nowrap;">(<strong dir="ltr"><?php echo $msn?></strong>)</span>
		</div>
		
		<div class="fieldset"><a onclick="AddMSNContact('<?php echo $msn?>'); return false;" href="#">Add <span dir="ltr"><?php echo $msn?></span> to your contact list</a></div>
		
		<div class="fieldset"><a onclick="SendMSNMessage('<?php echo $msn?>'); return false;" href="#">Send <span dir="ltr"><?php echo $msn?></span> a message</a></div>
		
		<div class="fieldset">
			Please note that these functions require that you be logged into either MSN Messenger or Windows Messenger. You will not be able to send messages to the email address that you are logged into MSN/Windows Messenger with.
		</div>
				
		</div>
	</div>
	</td>
</tr>
</tbody></table>
	<?php
}

function aim() {
	$username = $_GET["user"];
	$aim = $_GET["aim"];
	?>
<table width="100%" cellspacing="1" cellpadding="6" border="0" align="center" class="tborder">
<tbody>
<tr>
	<td align="center" class="panelsurround">
	<div class="panel">
		<div align="left">
		
		<div class="fieldset">
			<img alt="" src="images/im_aim.gif"/>
			Send Message Via AIM to <a target="_blank" href="profile.php?u=<?php echo $username?>"><strong><?php echo $username?></strong></a> (<strong dir="ltr"><?php echo $aim?></strong>)
		</div>
		
		<div class="fieldset"><a href="aim:addbuddy?screenname=<?php echo $aim?>">Add <span dir="ltr"><?php echo $aim?></span> to your contact list</a></div>
		
		<div class="fieldset"><a href="aim:goim?screenname=<?php echo $aim?>&message=Hi.+Are+you+there?">Send <span dir="ltr"><?php echo $aim?></span> a message</a></div>
		
		<div class="fieldset">
			Please note that these functions require that you actually have the AOL Instant Messenger application installed on your computer.
		</div>
		
		</div>
	</div>
	</td>
</tr>
</tbody></table>
	<?php
}
?>