<?php 
/**
 * Google  Map default controller
 * 
 * @package    Joomla.component
 * @subpackage Components
 * @link http://inetlanka.com
 * @license		GNU/GPL
 * @auth inetlanka web team - [ info@inetlanka.com / inetlankapvt@gmail.com ]
 */
defined('_JEXEC') or die('Restricted access');



$conArr = $this->options;

$user_lan = $conArr[0]->mapLongitude;
$user_lat = $conArr[0]->mapLatitude;
$apiKeyVal = $conArr[0]->apiKey;

$apiWidth = $conArr[0]->mapWidth;
$apiHeight = $conArr[0]->mapHeight;
$api3dWidth = $conArr[0]->map3dWidth;
$api3dHeight = $conArr[0]->map3dHeight;


$apiComName = $conArr[0]->greeting;

$map3dview = $conArr[0]->map3dview;
$mapYaw =  $conArr[0]->mapYaw;
$mapPitch =  $conArr[0]->mapPitch;

$googleVideo = $conArr[0]->companyVideoProfile;
$imgDis  = $conArr[0]->mapPointImg ;
if($imgDis == NULL)
{
	$imgDis = "";
}
else
{
	$imgDis = "<img src=".$conArr[0]->mapPointImg." width='50' height='50'/>";
}

if($conArr[0]->mapViewHeight == NULL)
{
	$mapViewHeight = "18";
}
else
{
	$mapViewHeight = $conArr[0]->mapViewHeight;
}

if($conArr[0]->mapView == NULL)
{
	$mapView = "SATELLITE";
}
else
{
	$mapView = $conArr[0]->mapView;
}

	function generateCode($characters) {
	
			$possible = '987654321AbcdEFghJkMnpqrsTvwxYz';
	
			$code = '';
	
			$i = 0;
	
			while ($i < $characters) { 
	
				$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
	
				$i++;
	
			}
			
			
			
			
			return $code;
	
		}
		
	


$spamStatus = $conArr[0]->companySpamcheck;
$randSpamCode = generateCode(4);

///new

 ?>
<div>

<script language="javascript" >

	function comGoogleFrmValidate(comfrm)
		{
			
			var errorStr='';	
			my_name = document.comGoogleForm.myName;
			my_email = document.comGoogleForm.myEmail;
			mess_heading = document.comGoogleForm.messHeading;	
			messate_txt = document.comGoogleForm.messateTxt;	
			
			
			
			if(my_name.value == '')
				{
					errorStr += "<?php echo JText::_( 'GOOGLE_JS_NAME' ); ?>\n";
					my_name.style.borderColor  = "#FF0000";

				}
				
			if(my_email.value == '')
				{
					errorStr += "<?php echo JText::_( 'GOOGLE_JS_MYEMAIL' ); ?>\n";
					my_email.style.borderColor  = "#FF0000";
				}
			if(my_email.value!='')
				{
					
					if(echeck(my_email.value) == false)
					{
						errorStr += "<?php echo JText::_( 'GOOGLE_JS_VALEMAIL' ); ?>\n";
						my_email.style.borderColor  = "#FF0000";
					}
					
				}
				
			if(mess_heading.value == '')
				{
					errorStr += "<?php echo JText::_( 'GOOGLE_JS_MAILHEAD' ); ?>\n";
					mess_heading.style.borderColor  = "#FF0000";
				}
			if(messate_txt.value == '')
				{
					errorStr += "<?php echo JText::_( 'GOOGLE_JS_MAILTEXT' ); ?>\n";
					messate_txt.style.borderColor  = "#FF0000";
				}
				
			<?php
			
			if($spamStatus == "1")
			{
			?>
			messSpam_txt = document.comGoogleForm.messSpamtxt;		
			if(messSpam_txt.value == '')
				{
					errorStr += "<?php echo JText::_( 'GOOGLE_JS_MAILSPAM' ); ?>\n";
					messSpam_txt.style.borderColor  = "#FF0000";
				}
			if(messSpam_txt.value != '')
				{
					var spamTxtsend = "<?php echo $randSpamCode; ?>";
					if(messSpam_txt.value != spamTxtsend)
					{
						errorStr += "<?php echo JText::_( 'GOOGLE_JS_SPAMVAL' ); ?>\n";
						messSpam_txt.style.borderColor  = "#FF0000";
					}
					
				}
			<?php
			}
			?>
				
		
			if(errorStr=='')
				{
					return true;
				}
			else
				{
					alert(errorStr);
					return false;
				}			  
		}
	
	
	
	function echeck(str)
	   {
	   		
			var at="@"
			var dot="."
			var lat=str.indexOf(at)
			var lstr=str.length
			var ldot=str.indexOf(dot)
			
			if (str.indexOf(at)==-1){			  
			   return false
			}
	
			if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){		   
			   return false
			}
	
			if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){		   
				return false
			}
	
			 if (str.indexOf(at,(lat+1))!=-1){				
				return false
			 }
	
			 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){				
				return false
			 }
	
			 if (str.indexOf(dot,(lat+2))==-1){			  
				return false
			 }
		
	
			 return true
	   }

</script>
	
<style>

#google_map
{
	width:<?php echo $apiWidth; ?>px;
	height:<?php echo $apiHeight; ?>px;
	border:1px solid #000;
	overflow:hidden;
	clear:both;
	border:1px #000000 solid;
}
#mapthreed
{
	width:<?php echo $api3dWidth; ?>px;
	height:<?php echo $api3dHeight; ?>px;
	border:1px solid #000;
	overflow:hidden;
	clear:both;
	border:1px #000000 solid;
	
}
</style>
 <table border="0" cellpadding="4" cellspacing="5">
 	<tr>
		<td valign="top" width="<?php echo $conArr[0]->mapWidthOfForm; ?>">
			<div align="left">
				<div>
					<h1 style="border: none;margin: 0!important;padding: 0!important;">Nhựa Gia đình HD</h1>
					<p style="line-height: 25px;">261/4E Hậu Giang, Phường 5, Quận 6, TP.Hồ Chí Minh</p>
					<p style="line-height: 25px;">Điện thoại: 0902 640 703]2 - 0975 520 602</p>
					<p style="line-height: 25px;">Email: info@yahoo.com.vn</p>
				</div>				
				<?php
				/*
				if($conArr[0]->mapTpTxtBox != '')
				{
				?>
					<p><label id="contact_emailmsg" for="contact_email">
					&nbsp;<?php echo $conArr[0]->mapTpTxtBox; ?>
					</label><?php echo $conArr[0]->mapTp; ?></p>
				<?php
				}
				if($conArr[0]->mapPhoneTxtBox != '')
				{
				?>
				
					<p><label id="contact_emailmsg" for="contact_email">
					&nbsp;<?php echo $conArr[0]->mapPhoneTxtBox; ?>
					</label> <?php echo $conArr[0]->mapPhone; ?></p>
				<?php
				}
				if($conArr[0]->mapFaxTxtBox != '')
				{
				?>	
					<p><label id="contact_emailmsg" for="contact_email">
					&nbsp;<?php echo $conArr[0]->mapFaxTxtBox; ?>
					</label><?php echo $conArr[0]->mapFax; ?></p>
				<?php
				}
				if($conArr[0]->mapEmailTxtBox != '')
				{
				?>
					<p><label id="contact_emailmsg" for="contact_email">
					&nbsp;<?php echo $conArr[0]->mapEmailTxtBox; ?>
					</label><a href="mailto:<?php echo $conArr[0]->mapEmail; ?>"> <?php echo $conArr[0]->mapEmail; ?></a></p>
				<?php
				}
				if($conArr[0]->defaultTxt != '')
				{
				?>					
					<p><?php echo nl2br($conArr[0]->defaultTxt); ?></p>
				<?php
				}
				if($conArr[0]->defaultTxtBox != '')
				{
				?>
					<p><?php echo nl2br($conArr[0]->defaultTxtBox); ?></p>
					
				<?php
				}	*/			
				?>
			</div>
		</td>
		<td>
			<form action="index.php" method="post" name="comGoogleForm" id="comGoogleForm" onsubmit="return comGoogleFrmValidate(this)">
			<div style="width: 80px;display: inline-block;">
			<label id="contact_emailmsg" for="contact_email">
				&nbsp;<?php echo $conArr[0]->mapEnterYourNameForm; ?>
			</label>
			</div>	
				<input type="text" name="myName" id="myName" style="width: 200px;" /><br />
			<div style="width: 80px;display: inline-block;">		
			<label id="contact_emailmsg" for="contact_email">
				&nbsp;<?php echo $conArr[0]->mapEnterEmailForm; ?>
			</label>
			</div>
				 <input type="text" name="myEmail" id="myEmail"  style="width: 200px;" />
				 <input type="hidden" name="ourSendEmail" id="ourSendEmail" value="<?php echo $conArr[0]->adminMailAdress; ?>"  />
				 <input type="hidden" name="ourEmail" id="ourEmail" value="<?php echo $conArr[0]->mapEmail; ?>"  />
				 <input type="hidden" name="thanksTxt" id="thanksTxt" value="<?php echo $conArr[0]->thanksTxt; ?>"  />
				  <input type="hidden" name="RedirectLinkComGoogle" id="RedirectLinkComGoogle" value="<?php echo $_SERVER['REQUEST_URI']; ?>"  /><br />
		<div style="width: 80px;display: inline-block;">
			<label for="contact_subject">
				&nbsp;<?php echo $conArr[0]->mapEnterSubForm; ?>
			</label>	
			</div>
				<input type="text" name="messHeading" id="messHeading"  style="width: 200px;" /><br />
				<div style="width: 80px;display: inline-block;vertical-align: top;margin-top: 5px;">			
			<label id="contact_textmsg" for="contact_text">
				&nbsp;<?php echo $conArr[0]->mapEnterMessForm; ?>
			</label>
			</div>
				<textarea name="messateTxt" id="messateTxt" rows="5" cols="30"></textarea>
			<?php
			
			if($spamStatus == "1")
			{
			?>	
			
				
				<?php echo "<br /><img style='margin-left:100px' src='".JURI::Base()."components/com_google/asset/captcha/captcha.php?spamCode=$randSpamCode' alt='' title='' />"; ?><br /><br />
				<label for="contact_subject">
				&nbsp;<?php echo $conArr[0]->mapEnterSpameForm; ?>
			</label>	
				<input type="text" name="messSpamtxt" id="messSpamtxt"  /><br>
			
				<br />
				
			<?php
			}
			?><br/>
                 <input type="checkbox" value="copyMail" name="copyOfmail" id="copyOfmail"  />
			
				<label for="contact_email_copy">
					<?php echo $conArr[0]->mapEnterEmailCopForm; ?>
				</label><br />
				<div align="left">
				<input type="submit" align="left" name="task_button" class="button" value="<?php echo $conArr[0]->mapEnterBtnForm; ?>" />
			
				<input type="hidden" name="option" value="com_google" />

				<input type="hidden" name="task" value="sendMail" />
				
				<input type="hidden" name="id" value="<?php echo $conArr[0]->id;?>" />
				<input type="hidden" name="Itemid" value="<?php echo $_GET['Itemid'];?>" />	</div>
				<?php echo JHTML::_( 'form.token' ); ?>
				<br>
			</form>
		</td>
	</tr>
	<tr>
	
	<td valign="top" colspan="2">
		
		<div id="google_map"><!-- --></div>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi" type="text/javascript"></script>
       
<script language="javascript" >
		function initMap()
		{
				var myLatlng = new google.maps.LatLng(<?php echo $user_lan; ?>,<?php echo $user_lat; ?>);
			    var myOptions = {
					zoom: 16,
					center: myLatlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					overviewMapControl: true
				}			
			    var map = new google.maps.Map(document.getElementById("google_map"), myOptions);
			    var image = new google.maps.MarkerImage("components/com_google/asset/img/mappin.png",
			    	new google.maps.Size(20, 32)); 
			    var marker = new google.maps.Marker({
			    	position: myLatlng, 
			    	map: map,
			    	title:"<?php echo $apiComName; ?>",
			    	icon: image
			    });		
			    	
			    var address = "<span style='font-family:Arial;font-size:11px;'><b><?php echo $apiComName; ?></b><br><?php echo nl2br($conArr[0]->mapAddress); ?><span> ";
			    var infowindow = new google.maps.InfoWindow({content:address,position:myLatlng});	
				//Add click event for the marker
				google.maps.event.addListener(marker, 'click', function() {						
					infowindow.open(map,marker);
				}); 					
				infowindow.open(map,marker);
				map.addOverlay(marker);
		}
		initMap();
	</script>
	
		</td>
	</tr>
		

 </table>
 

</div>
