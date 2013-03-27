<?php 
header("Content-disposition: attachment;filename=flagusers.txt");
// header("Content-disposition: filename=flagusers.csv");
// header("Content-disposition: filename=flagusers.xls");
header("Content-type: text/plain");
// header("Content-type: text/x-csv");
// header("Content-type: application/vnd.ms-excel");
// header("Content-type: application/download");
// header("Pragma: no-cache");
header("Expires: 0");

// Set flag that this is a parent file
define( '_JEXEC', 1 );


function dbMyConnect() {
    $bfbwDB=mysql_connect("localhost","flag","flagplease");
    mysql_select_db("flag",$bfbwDB);
    return $bfbwDB;
}
$dblink = dbMyConnect();
// Retrieve Joomla ID param
$gid = trim($_GET['gid']);
$username = trim($_GET['username']);

			if ($gid < 24) {
				if ($username == 'mskcc') {
					$where = ' WHERE currentpatient = "Yes, I\'m a patient at Memorial Sloan-Kettering Cancer Center"';
				
				}
				else if ($username == 'mdanderson') {
					$where = 'WHERE currentpatient = "Yes, I\'m a patient at MD Anderson Cancer Center"';
				}
				// IF neither, ERROR do not return any data
				else exit;
							
			}

echo "User ID\tRegistration Date\tFirst Name\t Last Name\t Email";
echo "\t Address 1\t Address 2\t City\t State\t Postal Code\t Country";
echo "\tDOB\t Phone Type\t Phone Number";
echo "\tHow Learned\t Other\t Current Patient\t Relative\t Relative Name";

$sql = "SELECT registerDate, firstname, lastname,  email,
	address, addresstwo, city, state, zip, country,
	dob, phonetype, phoneno,
	howlearned, foundusother, currentpatient, relatedyn, yesrelated, id
	FROM jos_register $where";

$result = mysql_query($sql, $dblink ) or 	die("ERROR: Unable to retrieve registered users from  the database".mysql_error());

while (	$fetch = mysql_fetch_array($result) ) {
	// $newstr= str_replace("\r\n", " ",$fetch[4]);	
	// echo "\n$fetch[0]\t$fetch[1]\t$fetch[2]\t$fetch[3]\t$newstr"; 
	echo "\n$fetch[18]\t$fetch[0]\t$fetch[1]\t$fetch[2]\t$fetch[3]"; 
	echo "\t$fetch[4]\t$fetch[5]\t$fetch[6]\t$fetch[7]\t$fetch[8]\t$fetch[9]"; // address
	echo "\t$fetch[10]\t$fetch[11]\t$fetch[12]";	// dob, phone type, number
	echo "\t$fetch[13]\t$fetch[14]\t$fetch[15]\t$fetch[16]\t$fetch[17]"; // how learned, relative
}
mysql_close( $dblink );


?>
  
  

