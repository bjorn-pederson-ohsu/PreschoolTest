<?php

//Include db connection and error inititation
include("dbpreschool.php");

$query = "SELECT * FROM teachers";
$result = mysql_query($query);

//Open XML
echo "<?xml version=\"1.0\"?>\n";
echo "<teacher>\n";
//Create the XML
while($row = mysql_fetch_array($result)){
echo "<teachercomp>\n";
echo "<teachid>" . $row['id'] . "</teachid>\n";
echo "<nameid>" . $row['teachername'] . "</nameid>\n";
echo "</teachercomp>\n";
}
//Close XML
echo "</teacher>\n";
//Close dB connection
mysql_close($conn);
?>