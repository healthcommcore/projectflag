<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');
class RegisterViewUser extends JView
{
	function display( $tpl = null)
	{
		global $option;
		global $mainframe;
		$model = &$this->getModel();
		$user = $model->getUser();

		$Itemid = JRequest::getVar('Itemid', 0);

		$params 	   =& $mainframe->getParams('com_register');
		$this->assignRef('Itemid', $Itemid);
		$this->assignRef('option', $option);
		$this->assignRef('user', $user);
		
		parent::display($tpl);
	}

}