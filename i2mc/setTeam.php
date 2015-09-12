<?php
$team=$_GET['t'];
$scoreString=$_GET['s'];
$con=mysqli_connect("flax.arvixe.com","username","password","i2mc");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
}
$query="UPDATE guts SET score='".$scoreString."' WHERE name='".$team."';";
echo $query;
echo mysqli_query($con,$query);
?>