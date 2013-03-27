<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');
class RegisterViewNew extends JView
{
	function display( $tpl = null)
	{
		global $option, $mainframe;
		$model = &$this->getModel();

		// If in edit mode, get data
		$task =JRequest::getVar('task', '');
		if ( $task == 'edit') {
			$model = &$this->getModel();
			$user = $model->getUser();
			
			if (! $user) {
				$Itemid = JRequest::getVar('Itemid', 0);
				$id = JRequest::getVar('id', 0);

				// Return to the record view
				$msg = '<h3> You are not authorized to edit this user</h3>';
				// $link = 'index.php?option=' . $option . '&view=user&Itemid='. $Itemid. '&id=' . $id;
				$link = 'index.php?option=' . $option . '&view=all&Itemid='. $Itemid;
				$mainframe->redirect($link, $msg);
			}
		}

		$params 	   =& $mainframe->getParams('com_register');
		
		$this->assignRef('option', $option);
		$this->assignRef('user', $user);
		
		parent::display($tpl);
	}

}