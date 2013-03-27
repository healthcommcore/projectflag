<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.model');
class ModelRegisterUser extends JModel
{
	var $_user = null;
	var $_id = null;
	
	function __construct()
	{
		global $mainframe;
		
		parent::__construct();
		// First check if an ID has been set up as a parameter
		$params = $mainframe->getParams('com_register');
		$id = $params->get('id', 0);
		
		if (! $id) {
		
			$id = JRequest::getVar('id', 0);
		}
		$this->_id = $id;
	}
	function getUser()
	{
		global $mainframe;
		if (!$this->_user)
		{
			
					// Get the page/component configuration
			$params = $mainframe->getParams('com_register');
			$conf =& JFactory::getConfig();
		
			$query = "SELECT * FROM #__register  WHERE id = $this->_id";
			$this->_db->setQuery( $query);
			
			$user = $this->_db->loadObject();
			
			// Verify permissions here as well
			$user = $this->_db->loadObject();

			$my = $mainframe->getUser();
			
			if ($my->gid < 24) {
			if ( ($my->username == 'mskcc') && ($user->currentpatient == "Yes, I'm a patient at Memorial Sloan-Kettering Cancer Center")) {
				$this->_user = $user;
				
			} else 
				if	 ( ($my->username == 'mdanderson') && ($user->currentpatient == "Yes, I'm a patient at MD Anderson Cancer Center")) {
					$this->_user = $user;
				}
				// IF neither,  do not return any data
				else {
					$this->_user = NULL;
				}			
			}
			else $this->_user = $user;	// admin level account, ok

		}
		return $this->_user;
	}

}
?>