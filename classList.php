<?php
include("dbpreschool.php");
//Assign the data passed from Flex to variables
$tID = mysql_real_escape_string($_GET["teacherID"]);

$query ="SELECT * ,COUNT(ID)FROM names WHERE teacher ='$tID'";
$result =  mysql_query($query);
while($row = mysql_fetch_assoc($result)){
$numberofstudents=$row['COUNT(ID)'];
}
if ($numberofstudents==0){
//Open XML
echo "<?xml version=\"1.0\"?>\n";
echo"<studentlistdata>\n";
echo"<studentlist>0</studentlist>\n";
echo"</studentlistdata>";
} else{
//Query the database to see if the given username/password combination is valid.
$query2 = "SELECT * FROM names WHERE teacher = '$tID'"; 
$result2 = mysql_query($query2);
//Open XML
echo "<?xml version=\"1.0\"?>\n";
echo"<studentListdata>\n";

//Create the XML
while($row = mysql_fetch_assoc($result2)){
echo"<studentlist>\n";
echo"<studentname>".$row ['name'] ."</studentname>\n";
echo"<studid>".$row['id']."</studid>\n";
echo"</studentlist>\n";
}
//Close XML
echo"</studentListdata>";
}
//Close the db

mysql_close();

?>