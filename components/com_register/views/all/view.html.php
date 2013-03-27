<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');
class RegisterViewAll extends JView
{
	function display( $tpl = null)
	{
		global $option;
		global $mainframe;
		$model = &$this->getModel();
		$users = $model->getList();
		$total = $model->getTotal();
		$limit = $model->getInterval();


		// $recipe = $model->getRecipe();
		$limitstart = JRequest::getVar( 'limitstart', 0);
		//$params 	   =& $mainframe->getParams('com_register');
		// $limitstart = $params->get('limitstart', 0);
		$this->assignRef('option', $option);
		$this->assignRef('users', $users);
		$this->assignRef('total', $total);
		$this->assignRef('limitstart', $limitstart);
		$this->assignRef('limit', $limit);
		$this->assignRef('searchid', $model->getSearchID());
		
		parent::display($tpl);
	}

}