<?php
$team=$_GET['t'];
$con=mysqli_connect("flax.arvixe.com","username","password","i2mc");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
}
$query="SELECT score FROM guts WHERE name='".$team."';";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
echo $row['score'];
?>