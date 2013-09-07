<?php
/*---------------------------------------------------------------
# SP Facebook - All in one facebook module for joomla
# ---------------------------------------------------------------
# Author - JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
# license - PHP files are licensed under  GNU/GPL V2
# Websites: http://www.joomshaper.com
-----------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');

echo '<div id="fb-root"></div>';
echo '<fb:like-box href="'.$likebox_url.'" width="'.$likebox_width.'" colorscheme="'.$likebox_colorscheme.'" show_faces="'.$likebox_showfaces.'" stream="'.$likebox_stream.'" header="'.$likebox_header.'" height="'.$likebox_height.'"></fb:like-box>'; 
?>
