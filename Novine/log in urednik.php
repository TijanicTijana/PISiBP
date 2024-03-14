<?php
	
	session_start();
	include("classes/connect.php");
	include("classes/log in urednik.php");

	$Urednik_Sifra="";
	$Urednik_Email="";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$login = new LoginUrednik();
		$result = $login->evaluate($_POST);

		if ($result != "")
		{
			echo"<div style='text-align: center; font-size:12px; color:white; background-color:grey;'>";
			echo "Doslo je do greske <br>";
			echo $result;
			echo"</div>";
		}
		else
		{
// *********************************************************************************************************************************************************************************************************************************************
			header("Location: profile.php");
			die;
		}

		$Urednik_Sifra= $_POST['Urednik_Sifra'];
		$Urednik_Email= $_POST['Urednik_Email'];
	}



?>

<html>
	<head>
	    <title>Novine | Log in as Urednik</title>
	</head>
	<style>
		#bar{
			height: 100px;
			background-color: #0B5345; 
			color: #E9F7EF; 
			margin: auto;
		}

		#signup_button
		{
			background-color: #DAF7A6 ;
			color: #0B5345;
			width: 90px;
			text-align: center;
			border-radius: 4px;
			float: right;
			padding: 10px;
			margin-top: -60px;
			margin-right: 130px;
			height: 40px;
			border: none;
			font-size: 15px;

		}

		#GoBack_button
		{
			background-color: #DAF7A6 ;
			color: #0B5345;
			width: 90px;
			height: 40px;
			text-align: center;
			border-radius: 4px;
			border: none;
			float: right;
			padding: 10px;
			margin-top: -60px;
			margin-right: 20px;
			font-size: 15px;
		}



		#login_bar
		{
			background-color: white; 
			width: 800px; 
			margin: auto; 
			margin-top: 50px;
			padding-top: 50px;
			padding: 10px;
			text-align: center;
		}

		#text
		{ 
			height: 40px;
			width: 300px;
			border-radius: 4px;
			border: solid 1px #ccc;
			padding: 4px;
			font-size: 14px;

		}

		#button
		{
			width: 300px;
			height: 40px;
			border-radius: 4px;
			font-weight: bold;
			border: none;
			background-color: #DAF7A6;
			color: #0B5345;

		}

	</style>


	<body style="font-family: tahoma; background-color: #E8F6F3; ">
		<div id="bar"> 
	       	<div style="font-size: 40px; padding: 20px" >Novine</div> 
	       	<div>
	       		<input id = "GoBack_button" type="button" value="Go back" onClick="Javascript:window.location.href = 'http://localhost/kodovi/chose your log in.php'">	
			</div>
	       	<input id = "signup_button" type="button" value="Sign up" onClick="Javascript:window.location.href = 'http://localhost/kodovi/chose your sign up.php'">
	    	
	    </div>

	    <div id="login_bar">

	    	<form method="post" action="log in.php">

	    		Log in as Urednik <br><br>
		    	<input name="Urednik_Email" value="<?php echo $Urednik_Email ?>" type="text" id="text" placeholder="Email"><br><br>
				<input name="Urednik_Sifra" value="<?php echo $Urednik_Email ?>" type="Password" id="text" placeholder="Password"><br><br>
				<input type="submit" id="button" value= "Log in" > <br><br><br>
			</form>
	    </div>
	</body>
</html>