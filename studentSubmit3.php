<?php
include("dbpreschool.php");
//Assign the data passed from Flex to variables

$tID = 3;
$genderID = 1;
$studentname = $_GET['studname'];
$studentage = 4;
$query ="SELECT names.id, names.name, names.age, teachers.teachername, gender.type FROM names INNER JOIN teachers ON names.teacher=teachers.id INNER JOIN gender ON names.gender=gender.id WHERE teacher ='$tID' && name = '$studentname' && gender = '$genderID'";
$resulta =  mysql_query($query);
//Open XML
echo "<?xml version=\"1.0\"?>\n";
echo"<studentdata>\n";

//Create the XML
while($row = mysql_fetch_array($resulta)){
echo"<studentindividual>\n";
echo"<studid>".$row['id']."</studid>\n";
echo"<studentname>".$row ['name'] ."</studentname>\n";
echo"<studgend>".$row ['type']."</studgend>\n";
echo"<teacher>".$row ['teachername']."</teacher>\n";
echo"<studage>".$row ['age']."</studage>\n";
echo"</studentindividual>\n";
}
//Close XML
echo"</studentdata>";

//Close the db

mysql_close();

?>