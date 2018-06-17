<?php
require 'connection.php';
if (isset($_POST['on']))
{
 $sql = "SELECT * FROM led_one";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
        
        $sqlup = "UPDATE led_one SET status = 'ON' WHERE id = 0";
        $res = $conn->query($sqlup);
    } else {
        $sqlup = "INSERT INTO led_one (status) VALUES ('ON')";
        $res = $conn->query($sqlup);
    }
}
else if (isset($_POST['off']))
{
 $sql = "SELECT * FROM led_one";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
        
        $sqlup = "UPDATE led_one SET status = 'OFF' WHERE id = 0";
        $res = $conn->query($sqlup);
    } else {
        $sqlup = "INSERT INTO led_one (status) VALUES ('OFF')";
        $res = $conn->query($sqlup);
    }
}
?>
<html>

<style type="text/css">
	//Button colour is now yellow and size has been changed
	#form{font: bold 30px/30px Georgia, serif;}
	button{
		background: #512607 ;
		width:	200px;
		height: 100px;
		border: none;
		border: 3px solid black;borderradius:20px;}
	#container{
		margin:0px; 
		width:80%;
		min-width:40%;}
</style>
<body>
<div id="container">
	<h2 align="center">Internet of Things LED Control</h2>
<center> <form id="form" method="post">
<br> <button name="on"><h1>Led ON</h1></button><br>
<button name="off"><h1>Led OFF</h1></button><br>
<!--<button name="blink"><h1>Led BLINK</h1></button>-->
</form>
</center>
</div>
</body>
</html>
