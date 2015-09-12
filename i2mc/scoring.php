<html>
<head>
	<title>Guts Scoring</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>I2MC</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/guts.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
</head>
<body>
<script>
var checks=[];
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		var resp=xmlhttp.responseText;
		if(resp.length>5)
		{
			$('#round').val(parseInt(resp.charAt(36))+1);
			for(var x=0;x<36;x++)
			{
				if(resp.charAt(x)=='1') $(checks[x]).prop('checked',true);
				else $(checks[x]).prop('checked',false);
			}
		}
	}
}
$(document).ready(function(){
	for(var x=0;x<36;x++)
	{
		checks.push('#check'+x);
	}
	
	var data=[<?php
	$con=mysqli_connect("flax.arvixe.com","username","password","i2mc");
	//$con=mysqli_connect("localhost","root","","test");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit;
	}
	$query = "SELECT name FROM guts";
	$result=mysqli_query($con,$query);
	echo '"'.mysqli_fetch_array($result)[0].'"';
	while($row=mysqli_fetch_array($result))
		echo ',"'.$row[0].'"';
	?>];

	$("#team").autocomplete({source: data});
	$("#team").keypress(function(e) {
		if(e.keyCode == 13)
		{
			e.preventDefault();
			xmlhttp.open("GET","./getTeam.php?t="+$("#team").val(),true);
			xmlhttp.send();
			$("#team").autocomplete('close');
		}
	});
});
function edit()
{
	var scoreString="";
	for(var x=0;x<36;x++)
		scoreString+=($(checks[x]).prop('checked'))==true?1:0;
	scoreString+=$("#round").val();
	xmlhttp.open("GET","./setTeam.php?t="+$("#team").val()+"&s="+scoreString,true);
	xmlhttp.send();
}
</script>
<div id="container" class="container">
To create a new team, navigate to i2mc.co/addTeam.php?t=teamname<br>
deleteTeam.php?t=teamname deletes teams
<input id="team" type="text" class="form-control" style="margin-bottom:10px; margin-top:10px; width:30%;" placeholder="Team"></input>
<?php
for($x=0;$x<36;$x++)
{
	echo '<div style="display:inline; padding-right:6px;"><label>'.($x+1).'<input type="checkbox" id="check'.$x.'"></label></div>';
}
?>
<br>
<input id="round" type="number" class="form-control" style="width:150px;" placeholder="Round"></input><br>
<button class="btn btn-default" style="width:150px;" onClick="edit();">Submit Changes</button>
</div>
</body>
</html>