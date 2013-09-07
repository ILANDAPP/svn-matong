<?php
/*------------------------------------------------------------------------
# mod_ho_tro_yahoo
# ------------------------------------------------------------------------
# Author:    Trung Tam Tin Hoc
# copyright: Copyright (C) 2012 www.trungtamtinhoc.edu.vn. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.trungtamtinhoc.edu.vn
# Technical Support:  http://www.trungtamtinhoc.edu.vn/
-------------------------------------------------------------------------*/class modtructuyenyahooHelper
{
    function getParameterList(&$params)
    {
		$this->yahoonick				= explode ("\n", trim ($params->get ('yahoos')));
		$this->name 					= explode ("\n",htmlspecialchars (trim ($params->get ('names'))));
		$this->description 				= explode ("\n",htmlspecialchars (trim ($params->get ('descriptions'))));
		$this->align					= trim ($params->get ('align'));
		$this->image					= trim ($params->get ('image'));
		for ($i=0 ; $i < count($this->yahoonick) ; $i++) {
			$this->name[$i] 				= $this->name[$i] ? ' <strong>'. $this->name[$i] .'</strong><br />' : '';
			$this->description[$i] 			= $this->description[$i] ? ' '. $this->description[$i] .'<br />' : '';
			$this->yahoonick[$i] 				= $this->yahoonick[$i] ? ' <a href="ymsgr:sendIM?'. $this->yahoonick[$i] .'&amp;"><img border=0 src=http://mail.opi.yahoo.com/online?u='. $this->yahoonick[$i] .'&amp;m=g&amp;t='. $this->image .' vspace="5"/></a><br /> ' : '';
			$this->yahoocontent[$i] = $this->yahoonick[$i].$this->name[$i].$this->description[$i];
		}
	}
}
?>