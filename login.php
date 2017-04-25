<?php
include("db.php");

//Assign the data passed from Flex to variables
$username = $_GET["username"];
$password = $_GET["password"];

//Query the database to see if the given username/password combination is valid.
$query = "SELECT * FROM tlogin WHERE name = '$username' AND pass = '$password'";
$result = mysql_query($query);

//Open XML
echo "<?xml version=\"1.0\"?>\n";
echo"<mydata>\n";
//Create the XML
while($row = mysql_fetch_assoc($result)){
echo"<loginid>". $row['primeid'] ."</loginid>\n";
echo"<label>". $row['name'] ."</label>\n";
}
//Write XML
//$output.=$info;
//Close XML
echo"</mydata>";

//echo $output;
//Close the db
mysql_close();

?>