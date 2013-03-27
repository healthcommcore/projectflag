<?php

defined ( '_JEXEC') or die ('Restricted access');
jimport('joomla.application.component.controller');

// Note: we are sending one email at a time.
// Email both new user and administrators

global $emailnotification;
global $emailadmins;
$emailadmins = array(
	 'DFCI' => array('dave_rothfarb@dfci.harvard.edu')
	// 'MSKCC' => array('balistrl@mskcc.org')
	//'DFCI' => array('elizabeth_root@dfci.harvard.edu','dave_rothfarb@dfci.harvard.edu'),
	//'MSKCC' => array('Lisa_Digianni@dfci.harvard.edu','therese_lung@dfci.harvard.edu')
);

$emailnotification = array(
'Admin' => array('Families Learning about GIST (Gastrointestinal Stromal Tumors) - New User Registration',
	"Hello %s,

A new user (id = %d) has registered at https://projectflag.org.
You can log in to the site to retrieve their details.

- Please do not respond to this message as it is automatically generated and is for information purposes only
"),
'User' => array('Welcome to Project FLAG',
				"Hello %s,

Thank you for your interest in Project FLAG! Please expect to receive either an enrollment packet in the mail or a telephone call from us within 2 weeks. If you have any questions before then, do not hesitate to call us at 1 (800) 828-6622, option #1.

Kind Regards,
Project FLAG Team
"
));


function sendemail( $email, $subject, $messagetext) {
$fromEmail = 'do-not-reply@projectflag.org';
// $emailtmp = 'therese_lung@dfci.harvard.edu';	// TEST
	
	// $status = mail( $email, $subject, $messagetext, "From: $fromEmail", "-f".$fromEmail );
	// $status = mail( $emailtmp, $subject, $messagetext . 'sent to '. $email, "From: $fromEmail", "-f".$fromEmail );

}





class RegisterController extends JController
{
	// display() function called by default
	function __construct ( $default = array())
	{
		parent::__construct ( $default );
		// To override default task -> function naming convention
		$this->registerTask ( 'update', 'add');
	}

	function display()
	{
		$document =& JFactory::getDocument();
		// echo 'display';
		
		// Requested view - default 'featured'
		$viewName = JRequest::getVar( 'view', 'new');
		
		// Multiple document type - default 'HTML'. Others may be RSS
		// -> run-time error on Mac OSX, ok on Ubuntu
		//$viewType = $document::getType();	
		// $view = &$this->getView($viewName, $viewType);
		$view = &$this->getView($viewName,'html');
		// echo 'before model';
		$model =& $this->getModel($viewName, 'ModelRegister');
		
		// Check that model exists
		if (!JError::isError( $model)) {
			$view->setModel( $model, true);
		}
		

			$view->setLayout('default');
			$view->display();
		
	}
	function add()
	{
			global $option, $mainframe;
			global $mainframe;
			global $emailnotification, $emailadmins;
			
			$row =& JTable::getInstance('register', 'Table');
	
			if (!$row->bind(JRequest::get('post')))
			{
				echo "<script>alert('".$row->getError(). "');
					
						window.history.go(-1); </script>\n<br />\n";
				exit();
			}
			
			$row->firstname  = JRequest::getVar('firstname','','post', 'string', JREQUEST_ALLOWRAW);
			$row->lastname  = JRequest::getVar('lastname','','post', 'string', JREQUEST_ALLOWRAW);
			$row->email  = JRequest::getVar('email','','post', 'string', JREQUEST_ALLOWRAW);
			$row->address  = JRequest::getVar('address','','post', 'string', JREQUEST_ALLOWRAW);
			$row->addresstwo  = JRequest::getVar('addresstwo','','post', 'string', JREQUEST_ALLOWRAW);
			$row->city  = JRequest::getVar('city','','post', 'string', JREQUEST_ALLOWRAW);
			$row->state  = JRequest::getVar('state','','post', 'string', JREQUEST_ALLOWRAW);
			$row->zip  = JRequest::getVar('zip','','post', 'string', JREQUEST_ALLOWRAW);
			$row->country  = JRequest::getVar('country','','post', 'string', JREQUEST_ALLOWRAW);

			$year  = JRequest::getVar('year','','post', 'string', JREQUEST_ALLOWRAW);
			$month  = JRequest::getVar('month','','post', 'string', JREQUEST_ALLOWRAW);
			$day  = JRequest::getVar('day','','post', 'string', JREQUEST_ALLOWRAW);
			
			$row->dob  = $year.'-'. $month .'-'.$day;
			
			$row->phonetype  = JRequest::getVar('phonetype','','post', 'string', JREQUEST_ALLOWRAW);
			$row->phoneno  = JRequest::getVar('phoneno','','post', 'string', JREQUEST_ALLOWRAW);
			$row->howlearned  = JRequest::getVar('howlearned','','post', 'string', JREQUEST_ALLOWRAW);
			$row->foundusother  = JRequest::getVar('foundusother','','post', 'string', JREQUEST_ALLOWRAW);
			$row->currentpatient  = JRequest::getVar('currentpatient','','post', 'string', JREQUEST_ALLOWRAW);
			$row->relatedyn  = JRequest::getVar('relatedyn','','post', 'string', JREQUEST_ALLOWRAW);
			$row->yesrelated  = JRequest::getVar('yesrelated','','post', 'string', JREQUEST_ALLOWRAW);
			$row->registerDate  = date('Y:m:d H:i:s');
			
			/* Check for valid inputs */
			if ( ( empty( $row->firstname))  || ( empty( $row->lastname)) || ( empty( $row->email)) 
				|| ( empty( $row->address))  || ( empty( $row->city)) || ( empty( $row->state))
				|| ( empty( $year)) || ($month == 0) || ( empty( $day)) || ( empty( $row->phoneno))
				|| ( empty( $row->howlearned))  || ( empty( $row->currentpatient)) || ( empty( $row->relatedyn))
				
				|| ($row->phonetype == 'Select') )
				{
				echo "<script>alert('Please fill in all the required fields in the form');
						window.history.go(-1); </script>\n<br />\n";
				exit();
			
			}
			if( (!is_numeric($year)) ||  ( !is_numeric( $day)) )
			{
				echo "<script>alert('Please provide a valid birth date in the form');
						window.history.go(-1); </script>\n<br />\n";
				exit();
			
			}
			if( ( $year < 1900) || ( $day < 1) || ( $day > 31) )
			{
				echo "<script>alert('Please provide a valid birth date in the form');
						window.history.go(-1); </script>\n<br />\n";
				exit();
			
			}
			if (( $row->howlearned == 'Other')  && ( empty( $row->foundusother)) )
				{
				echo "<script>alert('Please fill in all the required fields in the form');
						window.history.go(-1); </script>\n<br />\n";
				exit();
			
			}
		
			
			// print_r($row);
			if (! $row->store())
			{
				echo $row->getError();
				echo "<script>alert('".$row->getError(). "');
					
						window.history.go(-1); </script>\n<br />\n";
				exit();
			
			}
			if ($this->_task == 'update')
			{
				// Return to the record view
				$msg = '<h3> Changes to the Registration record saved</h3>';
				$link = 'index.php?option=' . $option . '&view=user&Itemid='. $this->Itemid. '&id=' . $row->id;
				$this->setRedirect($link, $msg);
			}
			
			else {
				// New record
			
				echo '<h3> Thank you for your interest in Project FLAG!</h3>
	<p>Please expect to receive either an enrollment packet in the mail or a telephone call from us within 2 weeks.</p>
	
	<p>You will receive a confirmation e-mail shortly regarding your registration.</p>
	
	<p>If you have any questions in the meantime, do not hesitate to call us at 1 (800) 828-6622, option #1.</p>';
		
				// Send email notification
			
				if ($row->currentpatient == "Yes, I'm a patient at Memorial Sloan-Kettering Cancer Center") {
					$site = 'MSKCC';
				}
				else {
					$site = 'DFCI';
				}
				// Email administrators						
				$messagetext = sprintf($emailnotification['Admin'][1], $site. ' Administrator', $row->id);
				// echo 'site: ' . $row->currentpatient;
				// echo '<br>email(s): ' ;
				// print_r( $emailadmins[$site]);
		
		
				// echo $messagetext;
				foreach( $emailadmins[$site] as $emailadmin) {
					// echo '<br>notifying admin:'. $emailadmin;
					
					sendemail( $emailadmin, $emailnotification['Admin'][0], $messagetext);
				}
		
				// Email user
				$messagetext = sprintf($emailnotification['User'][1], $row->firstname, $row->id);
				sendemail( $row->email, $emailnotification['User'][0], $messagetext);
			}
	}
}

?>
