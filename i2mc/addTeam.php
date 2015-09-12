<?php
$team=$_GET['t'];
$con=mysqli_connect("flax.arvixe.com","username","password","i2mc");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
}
$query="SELECT COUNT(*) AS ct FROM guts WHERE name='".$team."'";
$result=mysqli_query($con,$query);
if(mysqli_fetch_array($result)['ct']>0)
	echo "team name already in use";
else{
	$query="INSERT INTO guts (name) VALUES ('".$team."')";
	echo mysqli_query($con,$query)==1?"team added": "team not added";
}
?>