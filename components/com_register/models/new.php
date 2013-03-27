<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.model');
class ModelRegisterNew extends JModel
{
	var $_recipe = null;
	var $_icons = null;
	var $_id = null;
	
	var $__user = null;
	
	function __construct()
	{
		global $mainframe;
		parent::__construct();
		// First check if an ID has been set up as a parameter
		$params = $mainframe->getParams('com_register');
	}
	
	// Edit mode
	// 	Verify permissions here
	// 	Return null if not permitted
	function getUser()
	{
		global $mainframe;
		$my = $mainframe->getUser();
		if (!$this->_user)
		{

			$this->_id = JRequest::getVar('id', 0);
		
			
			// $params = $mainframe->getParams('com_register');
			// $conf =& JFactory::getConfig();
		
			$query = "SELECT * FROM #__register  WHERE id = $this->_id";
			$this->_db->setQuery( $query);

			// Can only edit assigned users
			
			$user = $this->_db->loadObject();
			
			if ($my->gid < 24) {
			if ( ($my->username == 'mskcc') && ($user->currentpatient == "Yes, I'm a patient at Memorial Sloan-Kettering Cancer Center")) {
				$this->_user = $user;
				
			} else 
				if	 ( ($my->username == 'mdanderson') && ($user->currentpatient == "Yes, I'm a patient at MD Anderson Cancer Center")) {
					$this->_user = $user;
				}
				// IF neither, ERROR do not return any data
				else {
					$this->_user = NULL;
				}			
			}
			else $this->_user = $user;	// admin level account, ok



		}
		// print_r($this->_user);
		return $this->_user;
	}
	
}
?>