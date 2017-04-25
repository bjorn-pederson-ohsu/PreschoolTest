<?php
// Report all PHP errors
error_reporting(2047); 
ini_set("display_errors",1);

//Connect to the db
//$conn = mysql_connect ('localhost', 'admin', 'gr8phunk');
//mysql_select_db ('preschool');
$conn = mysql_connect ('localhost', '<UserName>', '<password>');
mysql_select_db ('reflekti_prechool');

?>