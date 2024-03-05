<?php
	
	include("classes/connect.php");
	include("classes/signup.php");

	$Korisnik_KorisnickoIme="";
	$Korisnik_Sifra="";
	$Korisnik_Email="";
	$Korisnik_Pol="";
	$Korisnik_Ime="";
	$Korisnik_Prezime="";
	//$Korisnik_ID="";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$signup = new Signup();
		$result = $signup->evaluate($_POST);

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
			header("Location: log in.php");
			die;
		}




		$Korisnik_KorisnickoIme= $_POST['Korisnik_KorisnickoIme'];
		$Korisnik_Sifra= $_POST['Korisnik_Sifra'];
		$Korisnik_Email= $_POST['Korisnik_Email'];
		$Korisnik_Pol= $_POST['Korisnik_Pol'];
		$Korisnik_Ime= $_POST['Korisnik_Ime'];
		$Korisnik_Prezime= $_POST['Korisnik_Prezime'];
		//$Korisnik_ID= $_POST[''];

	}



?>

<html>
	<head>
	    <title>Novine | Sign up</title>
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
			font-weight: bold;
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
	        <div style="font-size: 40px; padding: 20px;" >Novine</div> 
	       	<input id = "signup_button" type="button" value="Log in" onClick="Javascript:window.location.href = 'http://localhost/kodovi/log%20in.php'">
	    	
	    </div>

	    <div id="login_bar">

	    	Sign up <br><br>

	    	<form method="post" action="signup.php">
		    	<input value="<?php echo $Korisnik_Ime?>" name="Korisnik_Ime" type="text" id="text" placeholder="Ime"><br><br>
				<input value="<?php echo $Korisnik_Prezime?>"name="Korisnik_Prezime" type="text" id="text" placeholder="Prezime"><br><br>
				<input value="<?php echo $Korisnik_Email?>" name="Korisnik_Email" type="text" id="text" placeholder="Email"><br><br>
		    	<span style="font-weight: normal";> Pol:</span><br>
		    	<select name="Korisnik_Pol" id="text">
		    		<option><?php echo $Korisnik_Pol?></option>
		    		<option>Muski</option>
		    		<option>Zenski</option> 
		    	</select><br><br>
		    	<input value="<?php echo $Korisnik_KorisnickoIme?>" name="Korisnik_KorisnickoIme" type="text" id="text" placeholder="Korisnicko Ime"><br><br>
				<input name="Korisnik_Sifra" type="Password" id="text" placeholder="Sifra"><br><br>
				<input  name="Korisnik_PonoviSifru" type="Password" id="text" placeholder="Ponovi Sifru"><br><br>
				
				<input type="submit" id="button" value= "Sign up" > <br><br><br>
				<!-- <input type="submit" id="button" value= "Sign up as Novinar" > <br><br><br>
				<input type="submit" id="button" value= "Sign up as Urednik" > <br><br><br>
				-->
			</form>
	    </div>
	</body>
</html>