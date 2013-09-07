<?php
/*---------------------------------------------------------------
# Package - Helix Framework  
# Helix Version 1.9.0
# ---------------------------------------------------------------
# Author - JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
# license - PHP files are licensed under  GNU/GPL V2
# license - CSS  - JS - IMAGE files  are Copyrighted material 
# Websites: http://www.joomshaper.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');

jimport( 'joomla.event.plugin' );
jimport( 'joomla.filesystem.file' );
jimport( 'joomla.filesystem.folder' );

class  plgSystemHelix extends JPlugin
{
	function onContentPrepareForm($form, $data)
	{
		if ($form->getName()=='com_menus.item')//Add Helix menu params to the menu item
		{
			JHtml::_('behavior.framework', true);
			$doc = JFactory::getDocument();
			JForm::addFormPath(JPATH_PLUGINS.DS.'system'.DS.'helix'.DS.'elements');
			$form->loadFile('params', false);
			
			//Load js
			$plg_path = JURI::root(true).'/plugins/system/helix/elements/menuscript.js';
			$doc->addScript($plg_path, "text/javascript");
		}
		
		if ($form->getName()=='com_modules.module') {//Add Module positions :)
			JHtml::_('behavior.framework', true);
			$doc = JFactory::getDocument();
			echo $this->getPositions();
			$plg_path = JURI::root(true).'/plugins/system/helix/elements/positions.js';
			$doc->addScript($plg_path, "text/javascript");
		}
	}	
	
	function getPositions () {//Get all templates position
		$templates = $this->getTemplates();
		$output = '<select id="sp_pos" style="min-width:160px;display:none;">';
		foreach ($templates as $tmpl) {
			$output .= $this->genPos($tmpl);
		}
		$output .= '</select>';
		return $output; 
	}
	
	function genPos ($tmpl) {//Get all positions if an individual template
		$file = JPATH_ROOT.DS.'templates'.DS.$tmpl.DS.'templateDetails.xml';
		$output='';
		$xml = JFactory::getXMLParser('Simple');
		$xml->loadFile($file);
		$positions = $xml->document->positions[0]->children();		
		foreach ($positions as $position) {
			$output .= '<option value="' . $position->data() . '">' . $position->data() . '</option>';
		}		
		return $output;
	}
	
	
	function getTemplates () {//Get the list of templates
		$lists = array(); 
		$path		= JPATH_ROOT.DS.'templates';
		$folders	= JFolder::folders($path);
		foreach ($folders as $folder) {
			if ($folder != 'system' && JFile::exists(JPATH_ROOT.DS.'templates'.DS.$folder.DS.'templateDetails.xml')) {//bypass system template name
				$lists[] = $folder;	
			}
		}		
		return $lists; 		
	}

}
?>