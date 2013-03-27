<?php

defined ( '_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.model');
class ModelRegisterExport extends JModel
{
	var $_username = null;
	var $_gid = null;
	
	function __construct()
	{
		global $mainframe;
		
		parent::__construct();
		$my = $mainframe->getUser();
		$this->_gid = $my->gid;
		$this->_username = $my->username;
	}
	function getGid()
	{
		return $this->_gid;
	}
	function getUsername()
	{
		return $this->_username;
	}

}
?>