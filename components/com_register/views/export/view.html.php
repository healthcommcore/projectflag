<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');
class RegisterViewExport extends JView
{
	function display( $tpl = null)
	{
		global $option, $mainframe;
		$model = &$this->getModel();
		
		$this->assignRef('option', $option);
		$my = $mainframe->getUser();
		// print_r($my);
		$this->assignRef('username', $model->getUsername());
		$this->assignRef('gid', $model->getGid());
				
		parent::display($tpl);
	}

}