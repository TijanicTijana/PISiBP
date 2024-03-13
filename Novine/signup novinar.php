<?php
	
	include("classes/connect.php");
	// include("classes/signup.php");
	include("classes/signup as just Novinar.php");

	$Novinar_KorisnickoIme="";
	$Novinar_Sifra="";
	$Novinar_Email="";
	$Novinar_Pol="";
	$Novinar_Ime="";
	$Novinar_Prezime="";
	$Novinar_Kategorija="";
	//$Novinar_ID="";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//$signup= new Signup();
		//$result=$signup->evaluate($_POST);
		$signupNovinar = new SignupNovinar();
		$resultK = $signupNovinar->evaluate($_POST);

//$result != "" || 
		if ($resultK !="")
		{
			echo"<div style='text-align: center; font-size:12px; color:white; background-color:grey;'>";
			echo "Doslo je do greske <br>";
			echo $resultK;
			echo"</div>";
		}
		else
		{
// *********************************************************************************************************************************************************************************************************************************************
			header("Location: log in.php");
			die;
		}




		$Novinar_KorisnickoIme= $_POST['Novinar_KorisnickoIme'];
		$Novinar_Sifra= $_POST['Novinar_Sifra'];
		$Novinar_Email= $_POST['Novinar_Email'];
		$Novinar_Pol= $_POST['Novinar_Pol'];
		$Novinar_Ime= $_POST['Novinar_Ime'];
		$Novinar_Prezime= $_POST['Novinar_Prezime'];
		$Novinar_Kategorija=$_POST['Novinar_Kategorija'];

		//$Korisnik_ID= $_POST[''];

	}



?>

<html>
	<head>
	    <title>Novine | Sign up | Novinar</title>
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
			margin-right: 130px;
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
	        <div>
	       		<input id = "GoBack_button" type="button" value="Go back" onClick="Javascript:window.location.href = 'http://localhost/kodovi/chose your sign up.php'">	
			</div>
	       	<input id = "signup_button" type="button" value="Log in" onClick="Javascript:window.location.href = 'http://localhost/kodovi/log%20in.php'">
	    	
	    </div>

	    <div id="login_bar">

	    	Sign up as Novinar<br><br>

	    	<form method="post" action="signup novinar.php">
		    	<input value="<?php echo $Novinar_Ime?>" name="Novinar_Ime" type="text" id="text" placeholder="Ime"><br><br>
				<input value="<?php echo $Novinar_Prezime?>"name="Novinar_Prezime" type="text" id="text" placeholder="Prezime"><br><br>
				<input value="<?php echo $Novinar_Email?>" name="Novinar_Email" type="text" id="text" placeholder="Email"><br><br>
		    	<span style="font-weight: normal";> Pol:</span><br>
		    	<select name="Novinar_Pol" id="text">
		    		<option><?php echo $Novinar_Pol?></option>
		    		<option>Muski</option>
		    		<option>Zenski</option> 
		    	</select><br><br>
		    	<input value="<?php echo $Novinar_KorisnickoIme?>" name="Novinar_KorisnickoIme" type="text" id="text" placeholder="Korisnicko Ime"><br><br>
				<input name="Novinar_Sifra" type="Password" id="text" placeholder="Sifra"><br><br>
				<input  name="Novinar_PonoviSifru" type="Password" id="text" placeholder="Ponovi Sifru"><br><br>
				<span style="font-weight: normal";> Kategorija:</span><br>
		    	<select name="Novinar_Kategorija" id="text">
		    		<option><?php echo $Novinar_Kategorija?></option>
		    		<option>Politika</option>
		    		<option>Crna hronika</option> 
		    		<option>Svet</option>
		    		<option>Sport</option>
		    		<option>Zabava</option>
		    		<option>Kultura</option>

		    	</select><br><br>
				
				<input type="submit" id="button" value= "Sign up as Novinar" > <br><br><br>
				<!-- <input type="submit" id="button" value= "Sign up as Novinar" > <br><br><br>
				<input type="submit" id="button" value= "Sign up as Urednik" > <br><br><br>
				-->
			</form>
	    </div>
	</body>
</html>