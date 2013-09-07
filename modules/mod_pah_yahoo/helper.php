<?php
/**
* Cong ty TNHH Tin Hoc Phan Anh Huy
* Website: www.phananhhuy.vn
* Hotline: 0939739539
*/
class modYahooHelper
{
    function getParameterList( &$params )
    {
		// $this->image 					= explode ( "\n", trim ( $params->get ( 'images' ) ) );
		$this->yahoo					= explode ( "\n", trim ( $params->get ( 'yahoos' ) ) );
		$this->name 					= htmlspecialchars ( trim ( $params->get ( 'names' ) ) );
		$this->name 					= explode ( "\n", $this->name );
		$this->description 				= htmlspecialchars ( trim ( $params->get ( 'descriptions' ) ) );
		$this->description 				= explode ( "\n", $this->description );
		$this->website					= trim ( $params->get ( 'website' ) );
		$this->align					= trim ( $params->get ( 'align' ) );
		$this->image					= trim ( $params->get ( 'image' ) );
		$this->vspace			= $params->get( 'vspace', 5 );
		// SlideShow Content - Loop
		for ( $i=0 ; $i < count($this->yahoo) ; $i++ ) {
			// Preparing Titles
			$this->name[$i] 				= $this->name[$i] ? ' <strong>'. $this->name[$i] .'</strong><br />' : '';
			$this->description[$i] 				= $this->description[$i] ? ' '. $this->description[$i] .'<br />' : '';
			$this->yahoo[$i] 				= $this->yahoo[$i] ? ' <a href="ymsgr:sendIM?'. $this->yahoo[$i] .'&amp;m=SupportYahoo-'.$this->website.'"><img border=0 src=http://mail.opi.yahoo.com/online?u='. $this->yahoo[$i] .'&amp;m=g&amp;t='. $this->image .' vspace='. $this->vspace .' /></a><br /> ' : '';
			$this->yahoocontent[$i] = $this->yahoo[$i].$this->name[$i].$this->description[$i];
		}
	}
}
?>