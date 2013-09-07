<?php
/*---------------------------------------------------------------
# Package - Joomla Template based on Helix Framework   
# ---------------------------------------------------------------
# Template Name - Shaper Helix
# Template Version 1.6.0
# ---------------------------------------------------------------
# Author - JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
# license - PHP files are licensed under  GNU/GPL V2
# license - CSS  - JS - IMAGE files  are Copyrighted material 
# Websites: http://www.joomshaper.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
require_once(dirname(__FILE__).DS.'lib'.DS.'helix.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language;?>" >
<head>
	<?php
		$helix->loadHead();
		$helix->addCSS('template.css,joomla.css,custom.css,modules.css,typography.css,css3.css');
		if (JRequest::getVar('option')=='com_virtuemart') $helix->addCSS('vm.css');//virtuemart css
		if ($helix->isRTL()) $helix->addCSS('template_rtl.css');
		$helix->getStyle();
	?>
</head>
<?php $helix->addFeatures('ie6warn'); ?>
<body class="bg clearfix">
<div class='header'>
<div id="header" class="clearfix">
<div class='logo-hds'>

			<jdoc:include type="modules" name="logo" /></div>
            <?php $helix->addModules("cart") ?>			
			<?php $helix->addModules("search") ?>
		</div>	
</div>
<div class='menus'>
<?php $helix->addFeatures('hornav') //Main navigation ?>	
</div>		
	 <div class="sp-wrap top-main clearfix">
		<?php $helix->addFeatures('toppanel'); ?>
			
		
		<?php if($helix->countModules('breadcrumbs')) { ?>
			<div id="breadcrumbs" class="sp-inner clearfix">
				<jdoc:include type="modules" name="breadcrumbs" />
				<?php $helix->addModules("social") ?>
			</div>	
		<?php } ?>
		</div>
	<div class="sp-wrap main-bg clearfix">
		<?php $helix->addModules("slides") //position slides ?>
	
	
		<?php $helix->addModules('user1, user2, user3, user4, user5, user6', 'sp_flat', 'sp-userpos'); //positions user1-user6 ?>
	
		<div class="clearfix">
			<?php $helix->loadLayout(); //mainbody ?>
		</div>
<?php $helix->addModules('scroller', 'sp_xhtml') //position slides ?>
		
		<?php $helix->addModules('bottom1, bottom2, bottom3, bottom4, bottom5, bottom6', 'sp_flat', 'sp-bottom', '',true) //positions bottom1-bottom6 ?>
		
		<div id="sp-footer" class="clearfix">
			<div class="sp-inner">
				<?php $helix->addFeatures('helixlogo'); /*--- Helix logo ---*/?>	
				<div class="cp">
					<jdoc:include type="modules" name="footer" />
					</div>
				<?php $helix->addModules("footer-nav") ?>	
<?php $helix->addFeatures('totop') ?>				
			</div>
		</div>
	</div>
	
	<?php $helix->addFeatures('analytics,jquery,ieonly'); /*--- analytics, jquery and ieonly features ---*/?>
	<?php $helix->compress(); /* --- Compress CSS and JS files --- */ ?>	
	<?php $helix->getFonts() /*--- Standard and Google Fonts ---*/?>
	<jdoc:include type="modules" name="debug" />
	
</body>
</html>
