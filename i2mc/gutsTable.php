<?php
echo '<div style="display:inline; width:250px; height:100px; float:left;">';
$con=mysqli_connect("flax.arvixe.com","username","password","i2mc");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
}
$query = "SELECT name, score FROM guts";
$scores=array();
$rounds=array();
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
	$score=0;
	for($x=0;$x<8;$x++)
		$score+=5*intval($row['score']{$x});
	for($x=8;$x<16;$x++)
		$score+=6*intval($row['score']{$x});
	for($x=16;$x<24;$x++)
		$score+=8*intval($row['score']{$x});	
	for($x=24;$x<32;$x++)
		$score+=10*intval($row['score']{$x});
	for($x=32;$x<36;$x++)
		$score+=12*intval($row['score']{$x});
	$scores[$row['name']]=$score;
	$rounds[$row['name']]=$row['score']{36};
}

arsort($scores);
$place=1;
foreach($scores as $key=>$value)
{
	echo $place.'. '.$key.', '.$value.' points';
	echo '<div class="meter"><span style="width:'.(intval($rounds[$key])*11).'%"></span></div>';
	echo '</div><div style="display:inline; width:250px; height:100px; float:left;">';
	$place++;
}
echo '</div>';
?>