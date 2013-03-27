<?php

defined ( '_JEXEC') or die ('Restricted access');
// jimport('joomla.application.helper');

jimport('joomla.application.helper');
// require_once( JapplicationHelper::getPath('html') );

require_once( JPATH_COMPONENT.DS.'controller.php' );
JTable::addIncludePath (JPATH_ADMINISTRATOR.DS.'components'.DS.$option.DS.'tables');


$controller = new RegisterController();
$controller->execute(JRequest::getVar('task'));
$controller->redirect();
?>