<?php
include("dbpreschool.php");
//Assign the data passed from Flex to variables

$tID = mysql_real_escape_string($_GET["teacherID"]);
$genderID = mysql_real_escape_string($_GET["genderID"]);
$studentname = mysql_real_escape_string($_GET["studentname"]);
$studentage = mysql_real_escape_string($_GET["studentage"]);
$insert = "INSERT INTO names (name, gender, age, teacher) VALUES ('$studentname','$genderID','$studentage','$tID')";
//Insert statement
$result=mysql_query($insert);
$query ="SELECT names.id, names.name, names.age, names.timeoutpre, names.finishpic, names.finishmovie, teachers.teachername, gender.type FROM names INNER JOIN teachers ON names.teacher=teachers.id INNER JOIN gender ON names.gender=gender.id WHERE names.teacher ='$tID' && names.name = '$studentname' && names.gender = '$genderID'";
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
echo"<pretestfail>".$row ['timeoutpre']."</pretestfail>\n";
echo"<pictest>".$row['finishpic']."</pictest>\n";
echo"<movietest>".$row['finishmovie']."</movietest>\n";
echo"</studentindividual>\n";
}
//Close XML
echo"</studentdata>";

//Close the db

mysql_close();

?>