<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.model');
class ModelRegisterAll extends JModel
{
	var $_users = null;
	var $_interval = 10;
	var $_limitstart = null;
	var $_total = null;
	var $_where = null;
	var $_searchid = 0;
	
	function __construct()
	{
		global $mainframe;
		
		parent::__construct();
		// First check if an ID has been set up as a parameter
		$params = $mainframe->getParams('com_register');
		// $this->_limitstart = $params->get('limitstart', 0);
		$conf =& JFactory::getConfig();
		// $query = "SELECT * FROM #__register";
		//  a query without limits to get total
		// $this->_total = count($this->_getList( $query, 0, 0));
		
	}
	function getList()
	{
		global $mainframe;
		if (!$this->_users)
		
		{
		
			// Registration list
			
			// Get the page/component configuration
			$params = $mainframe->getParams('com_register');
			// $this->_limitstart = $params->get('limitstart', 0);
			$this->_limitstart = JRequest::getVar( 'limitstart', 0);
			$this->_searchid = JRequest::getVar( 'search', '');
			
			$this->_where = 'WHERE 1 ';
			
			if ($this->_searchid > 0 ) {
				$this->_where = $this->_where. "AND id = $this->_searchid";
			}

			$conf =& JFactory::getConfig();
			$my = $mainframe->getUser();
			if ($my->gid < 24) {
				if ($my->username == 'mskcc') {
					$this->_where = $this->_where. ' AND currentpatient = "Yes, I\'m a patient at Memorial Sloan-Kettering Cancer Center"';
				
				}
				else if ($my->username == 'mdanderson') {
					$this->_where = $this->_where. 'AND currentpatient = "Yes, I\'m a patient at MD Anderson Cancer Center"';
				}
				// IF neither, ERROR do not return any data
				else return NULL;
							
			}
			

			if ($this->_limitstart)
		
			$query = "SELECT * FROM #__register $this->_where ORDER BY registerDate DESC LIMIT $this->_limitstart, $this->_interval";
			
			else
			$query = "SELECT * FROM #__register $this->_where ORDER BY registerDate DESC LIMIT $this->_interval";
				
			$this->_users = $this->_getList( $query, 0, 0);	
		}
		return $this->_users;
	}
	
	function getTotal()
	{
		$query = "SELECT * FROM #__register $this->_where";
		//  a query without limits to get total
		$this->_total = count($this->_getList( $query, 0, 0));
		return $this->_total;
	}
	function getInterval()
	{
		return $this->_interval;
	}
	function getSearchID()
	{
		return $this->_searchid;
	}

}
?>