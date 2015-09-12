<!--jquery link-->
<html>
<head>
	<title>Guts</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>I2MC</title>

    <!-- Bootstrap Core CSS -->
    <!--<link href="./css/bootstrap.min.css" rel="stylesheet">-->

    <!-- Custom CSS -->
    <link href="./css/guts.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>    
</head>
<body>
<script>
$(function() {
            $(".meter > span").each(function() {
                $(this)
                    .data("origWidth", $(this).width())
                    .width(0)
                    .animate({
                        width: $(this).data("origWidth")
                    }, 1200);
            });
        });

var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		$(".container").html(xmlhttp.responseText);
	}
}
setInterval(
	function refresh()
	{
		xmlhttp.open("GET","./gutsTable.php");
		xmlhttp.send();
	},
	1000);
</script>
<br>
<div class="container" style="padding-left:50px; padding:right:50px;">
</div>
</body>
</html>