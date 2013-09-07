<?php
/** 
* Author: NickSon
* Email: nicksonpro@gmail.com
* Website: www.joomdesign.net - - www.dungson.com
* @license GNU/GPL, see LICENSE.txt
**/
// no direct access
defined('_JEXEC') or die('Restricted access');

$yahooid1        = trim($params->def( 'yahooid1', '-1' )) ;
$yahooid2        = trim($params->def( 'yahooid2', '-1' )) ;
$yahooid3        = trim($params->def( 'yahooid3', '-1' )) ;
$ytext1  = trim($params->def( 'yahootext1', 'Chat with ' . $yahooid1 )) ;
$ytext2  = trim($params->def( 'yahootext2', 'Chat with ' . $yahooid2 )) ;
$ytext3  = trim($params->def( 'yahootext3', 'Chat with ' . $yahooid3 )) ;
$ytype =  $params->def( 'yahootype', '-1' ) ;
$skypeid = trim($params->def( 'skypeid', 'cuemkid' )) ;
$skypetype = $params->def( 'skypetype', '0' );

if ($ytype != '-1') {
$yahoo_url = "http://mail.opi.yahoo.com/online?u={$yahooid1}&m=a&t=1";
$yahoo = file_get_contents($yahoo_url);
$yahoo = trim($yahoo);
if ($yahoo=="01")
         echo '<a title="' . $ytext1 . '" href="ymsgr:sendim?' . $yahooid1 . '"><div style="text-align:center"><img src="'.JURI::base().'/modules/mod_chat_support/images/yahoo1.jpg"></div></a>';
else
       echo '<a title="' . $ytext1 . '" href="ymsgr:sendim?' . $yahooid1 . '"><div style="text-align:center"><img src="'.JURI::base().'/modules/mod_chat_support/images/yahoooffline1.jpg"></div></a>';

echo '&nbsp;';
if ($yahooid2!='-1') {
$yahoo_url = "http://mail.opi.yahoo.com/online?u={$yahooid2}&m=a&t=1";
$yahoo = file_get_contents($yahoo_url);
$yahoo = trim($yahoo);
if ($yahoo=="01")
         echo '<a title="' . $ytext2 . '" href="ymsgr:sendim?' . $yahooid2 . '"><div style="text-align:center"><img src="'.JURI::base().'/modules/mod_chat_support/images/yahoo2.jpg"></div></a>';
else
        echo '<a title="' . $ytext2 . '" href="ymsgr:sendim?' . $yahooid2 . '"><div style="text-align:center"><img src="'.JURI::base().'/modules/mod_chat_support/images/yahoooffline2.jpg"></a>';
        }
echo '<p>';
if ($yahooid3!='-1') {
$yahoo_url = "http://mail.opi.yahoo.com/online?u={$yahooid3}&m=a&t=1";
$yahoo = file_get_contents($yahoo_url);
$yahoo = trim($yahoo);
if ($yahoo=="01")
         echo '<a title="' . $ytext3 . '" href="ymsgr:sendim?' . $yahooid3 . '"><div style="text-align:center"><img src="'.JURI::base().'/modules/mod_chat_support/images/yahoo3.jpg"></div></a>';
else
       echo '<a title="' . $ytext3 . '" href="ymsgr:sendim?' . $yahooid3 . '"><div style="text-align:center"><img src="'.JURI::base().'/modules/mod_chat_support/images/yahoooffline3.jpg"></a>';
        }
}
if ($skypetype != '0'){
switch ($skypetype) {
        case '1':
                echo '<table><tr><td><a title="Skype chat with ' . $skypeid . '" href="skype:' . $skypeid . '?chat"><img src="http://mystatus.skype.com/balloon/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '2':
                echo '<table><tr><td><a title="Call to ' . $skypeid . '" href="skype:' . $skypeid . '?call"><img src="http://mystatus.skype.com/balloon/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '3':
                echo '<table><tr><td><a title="Skype chat with ' . $skypeid . '" href="skype:' . $skypeid . '?chat"><img src="http://mystatus.skype.com/bigclassic/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '4':
                echo '<table><tr><td><a title="Call to ' . $skypeid . '" href="skype:' . $skypeid . '?call"><img src="http://mystatus.skype.com/bigclassic/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '5':
                echo '<table><tr><td><a title="Skype chat with ' . $skypeid . '" href="skype:' . $skypeid . '?chat"><img src="http://mystatus.skype.com/smallclassic/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '6':
                echo '<table><tr><td><a title="Call to ' . $skypeid . '" href="skype:' . $skypeid . '?call"><img src="http://mystatus.skype.com/smallclassic/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '7':
                echo '<table><tr><td><a title="Skype chat with ' . $skypeid . '" href="skype:' . $skypeid . '?chat"><img src="http://mystatus.skype.com/smallicon/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '8':
                echo '<table><tr><td><a title="Call to ' . $skypeid . '" href="skype:' . $skypeid . '?call"><img src="http://mystatus.skype.com/smallicon/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '9':
                echo '<table><tr><td><a title="Skype chat with ' . $skypeid . '" href="skype:' . $skypeid . '?chat"><img src="http://mystatus.skype.com/mediumicon/' . $skypeid . '" /></a></td></tr></table>';
                break;
        case '10':
                echo '<table><tr><td><a title="Call to ' . $skypeid . '" href="skype:' . $skypeid . '?call"><img src="http://mystatus.skype.com/mediumicon/' . $skypeid . '" /></a></td></tr></table>';
                break;

}
}

?>
