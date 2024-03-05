<?php
	
	session_start();
	include("classes/connect.php");
	include("classes/log in.php");

	$Korisnik_Sifra="";
	$Korisnik_Email="";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$login = new Login();
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

		$Korisnik_Sifra= $_POST['Korisnik_Sifra'];
		$Korisnik_Email= $_POST['Korisnik_Email'];
	}



?>

<html>
	<head>
	    <title>Novine | Log in</title>
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
			margin-right: 20px;
			height: 40px;
			border: none;
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
	       	<input id = "signup_button" type="button" value="Sign up" onClick="Javascript:window.location.href = 'http://localhost/kodovi/signup.php'">
	    	
	    </div>

	    <div id="login_bar">

	    	<form method="post" action="log in.php">

	    		Log in <br><br>
		    	<input name="Korisnik_Email" value="<?php echo $Korisnik_Email ?>" type="text" id="text" placeholder="Email"><br><br>
				<input name="Korisnik_Sifra" value="<?php echo $Korisnik_Email ?>" type="Password" id="text" placeholder="Password"><br><br>
				<input type="submit" id="button" value= "Log in" > <br><br><br>
			</form>
	    </div>
	</body>
</html>
