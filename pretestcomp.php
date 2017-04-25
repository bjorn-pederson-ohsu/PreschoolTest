<?php
include("dbpreschool.php");
//Assign the data passed from Flex to variables

$studentID = mysql_real_escape_string($_GET["studentID"]);
$pretestpass = mysql_real_escape_string($_GET["pretestvar"]);
$query = "SELECT names.timeoutpre FROM names WHERE names.id='$studentID'";
$check =  mysql_query($query);
$row = mysql_fetch_array($check);
$pretestcheck=$row['timeoutpre'];
if ($pretestcheck == 2){
echo "<?xml version=\"1.0\"?>\n";
echo"<info>\n";

//Create the XML
echo "<pretest>doneNoNeed</pretest>\n";
//Close XML
echo"</infom>\n";;
}else{
$query ="UPDATE names SET timeoutpre = '$pretestpass' WHERE id = '$studentID' && timeoutpre = '1'";
$result =  mysql_query($query);
//Open XML
echo "<?xml version=\"1.0\"?>\n";
echo"<infom>\n";

//Create the XML
echo "<pretest>doneUpDated</pretest>\n";
//Close XML
echo"</infom>";
}

mysql_close();

?>