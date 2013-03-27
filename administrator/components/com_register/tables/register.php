<?php

defined ( '_JEXEC') or die ('Restricted access');

class TableRegister extends JTable

{
	var $id = null;
	var $firstname = null;
	var $lastname = null;
	var $username = null;
	var $email = null;
	var $address = null;
	var $addresstwo = null;
	var $city = null;
	var $state = null;
	var $zip = null;
	var $country = null;
	var $dob = null;
	var $phonetype = null;
	var $phoneno = null;
	var $howlearned = null;
	var $foundusother = null;
	var $currentpatient = null;
	var $relatedyn = null;
	var $yesrelated = null;
	var $registerDate = null;
	
	function __construct (&$db)
	{
		parent::__construct ( '#__register', 'id', $db);
	}
}
?>