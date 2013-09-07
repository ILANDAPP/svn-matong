<?php
/*---------------------------------------------------------------
# Package - CGrocket Framework  
# ---------------------------------------------------------------
# Author - CGrocket http://www.cgrocket.com
# Copyright (C) 2011 - 2012 CGrocket.com. All Rights Reserved.
# license - PHP files are licensed under  GNU/GPL V2
# Websites: http://www.cgrocket.com - http://www.leweb2.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
?>

<div id="sp-maincol" class="clearfix">
<?php if($this->countModules('slide1')) { /*--- slide1 position ---*/?>	
	<div id="slide1" class="sp-inner clearfix">
		<jdoc:include type="modules" name="slide1" />			
	</div>				
<?php } ?>	

<?php if($this->countModules('user-top')) { ?>
	<div id="user-top">
		<div class="sp-inner clearfix">
			<jdoc:include type="modules" name="user-top" style="sp_xhtml" />
		</div>
	</div>		
<?php } ?>
<!--Module Position content1 to content4-->
<?php if($mods= $this->getModules('content1,content2,content3,content4')) { ?>
	<div id="sp-content1" class="clearfix">
		<div class="sp-inner">
			<?php $this->renderModules($mods,'sp_xhtml');?>
		</div>					
	</div>
<?php } ?>			
<div class="clr"></div>
<?php if($this->countModules('inset1')) { ?>
	<div id="inset1">
		<div class="sp-inner clearfix">
			<jdoc:include type="modules" name="inset1" style="sp_xhtml" />
		</div>
	</div>		
<?php } ?>
<!--Component Area-->
<?php if (!$this->hideItem())  { ?>
	<div id="content">
		<div class="sp-inner clearfix">
				
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
	</div>
<?php } ?>
<?php if($this->countModules('inset2')) { ?>
	<div id="inset2">
		<div class="sp-inner clearfix">
			<jdoc:include type="modules" name="inset2" style="sp_xhtml" />
		</div>
	</div>		
<?php } ?>
<!--End Component Area-->
<div class="clr"></div>
<!--Module Position content5 to content8-->
<?php if($mods= $this->getModules('content5,content6,content7,content8')) { ?>
	<div id="sp-content2" class="clearfix">
		<div class="sp-inner">
			<?php $this->renderModules($mods,'sp_xhtml');?>
		</div>					
	</div>
<?php } ?>
<?php if($this->countModules('user-bottom')) { ?>
	<div id="user-bottom">
		<div class="sp-inner clearfix">
			<jdoc:include type="modules" name="user-bottom" style="sp_xhtml" />
		</div>
	</div>	
<?php } ?>
</div>