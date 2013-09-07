<?php 
	$t=$_REQUEST['t'];
	$i=$_REQUEST['i'];
	if($t=='y')
	{
		if (file_get_contents("http://opi.yahoo.com/online?u=".$i."&m=1&t=1")=='00')
			echo 'off';
		else
			echo 'on';
	}
	else if($t=='s')
	{
		if(file_get_contents("http://mystatus.skype.com/".$i.".num")==1)
			echo 'off';
		else
			echo 'on';
	}
	else echo 'off';
	
?>