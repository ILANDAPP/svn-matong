<?php 
/*------------------------------------------------------------------------
# mod_ho_tro_yahoo 
# ------------------------------------------------------------------------
# Author:    Trung Tam Tin Hoc
# copyright: Copyright (C) 2012 www.trungtamtinhoc.edu.vn. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.trungtamtinhoc.edu.vn
# Technical Support:  http://www.trungtamtinhoc.edu.vn/
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');
?>
<div style="text-align:<?php echo $this->align;?>">
<?php for ( $i=0 ; $i < count($this->yahoonick) ; $i++ ) 
{
echo '<div style="padding-top:5px; padding-bottom:5px; text-align:'.$this->align.'">'.$this->yahoocontent[$i].'</div>';
} 
?>
	<p>
		<a href="http://www.quanaosi.com/">Quan Ao SI</a>
	</p>
</div>