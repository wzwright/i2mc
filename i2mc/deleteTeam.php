<?php
$team=$_GET['t'];
$con=mysqli_connect("flax.arvixe.com","username","password","i2mc");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
}
$query="DELETE FROM guts WHERE name='".$team."';";
echo mysqli_query($con,$query)==1?"team deleted": "team not deleted";
?>