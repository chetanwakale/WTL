<?php 
include 'db_connect.php';

$id=$_POST['id'];
$sql = "DELETE FROM mentees WHERE mentee_id='$id'";
$conn->query($sql);

echo "Deleted Successfully";
echo "<form method='post' action='MenteeManagement.php' />";
echo "<button type='submit' name='BACK' style='padding:7px'>Home</button>";
echo "</form>";

?>