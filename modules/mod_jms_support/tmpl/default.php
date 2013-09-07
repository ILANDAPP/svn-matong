<?php // no direct access
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.modal', 'a.modal');
JHTML::stylesheet('jms_support.css','modules/mod_jms_support/tmpl/');
if ($display) {
	for ($i=1;$i<=5;$i++) {
		if ($support[$i]->name <> "") {
			echo "<div class='supporter'>";
			if ($supportername) {
				echo "<div class=\"supportname\">".$support[$i]->name."</div>";
			}
			if ($msn) {
				echo "<div class=\"msn\">".$support[$i]->msn."</div>";
			}
			if ($yahoo) {
				echo "<div class=\"yahoo\">".$support[$i]->yahoo."</div>";
			}
			if ($skype) {
				echo "<div class=\"skype\">".$support[$i]->skype."</div>";
			}
			if ($icq) {
				echo "<div class=\"icq\">".$support[$i]->icq."</div>";
			}
			if ($aim) {
				echo "<div class=\"aim\">".$support[$i]->aim."</div>";
			}		
			if ($tel) {
				echo "<div class=\"tel\">".$support[$i]->tel."</div>";
			}
			if ($email) {
				echo "<div class=\"email\">".$support[$i]->email."</div>";
			}
			echo "</div>";
		}
	}
}else {
	for ($i=1;$i<=5;$i++) {
		if ($support[$i]->name <> "") {
			echo "<div class='supporter'>";
			if ($supportername) {
				echo "<div class=\"supportname\">".$support[$i]->name."</div>";
			}
			if ($msn) {
				echo "<div class=\"contact\">".$support[$i]->msn;
			}
			if ($yahoo) {
				echo $support[$i]->yahoo;
			}
			if ($skype) {
				echo $support[$i]->skype;
			}
			if ($icq) {
				echo $support[$i]->icq;
			}
			if ($aim) {
				echo $support[$i]->aim."</div>";
			}		
			if ($tel) {
				echo "<div class=\"tel\">".$support[$i]->tel."</div>";
			}
			if ($email) {
				echo "<div class=\"email\">".$support[$i]->email."</div>";
			}
			echo "</div>";
		}
	}
}
?>