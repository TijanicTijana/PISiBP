<?php

	session_start();
	//print_r($_SESSION);

	include("classes/connect.php");
	include("classes/log in.php");
	include("classes/user.php");
	// include("classes/log out.php");
// unset($_SESSION['Korisnik_ID']);
	if(isset($_SESSION['Korisnik_ID']) && is_numeric($_SESSION['Korisnik_ID']))
	{
		$Korisnik_ID = $_SESSION['Korisnik_ID'];
		$login = new Login();
		$result = $login->check_login($Korisnik_ID);
		if($result)
		{
			//retrieve the data
			//echo "everything is fine";
			$user = new User();
			$user_data = $user->get_data($Korisnik_ID);
			if(!$user_data)
			{
				header("Location: Log in.php");
				die;
			}


		}
		else
		{
			header("Location: Log in.php");
			die;
		}
	}
	else
	{
		header("Location: Log in.php");
		die;
	}
	// print_r($user_data);


	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Novine</title>
	</head>

	<style type="text/css">
		
		#bar
		{
			height: 70px;
			width: 1250px;
			background-color:#0B5345;
			color: #D0ECE7;
			margin: auto;
		}

		#search_box
		{
			width: 400px;
			height: 20px;
			border-radius: 5px;
			border: none;
			padding: 4px;
			font-size: 15px;
			background-image: url(search.png);
			background-size: 25px;
			background-repeat: no-repeat;
			background-position: right;
		}

		#manu_battons
		{
			width: 120px;
			display: inline-block;
			color:#0B5345;
			margin: 2px;
			text-align: center; 
		}

		#left
		{
			background-color: white;
			min-height: 400px;
			margin-top: 20px;
			color: #888;
			padding: 8px;
		}

		#left_posts
		{
			clear: both;
			font-size: 12px;
			font-weight: bold;
			color: #0B5345; 
		}

		#left_post_img
		{
			width: 75px;
			float: left;
			margin-top: 8px;
		}

		textarea
		{
			width: 100%;
			height: 100px;
			border: none;
			font-family: tahoma;
			font-size:14px;
		}

		#post_button
		{
			float: right;
			background-color: #0B5345;
			color: white ;
			border: none;
			padding: 4px;
			font-size: 14px;
			border-radius: 2px;
			width: 50px;
		}

		#post_bar
		{
			margin-top: 20px;
			background-color: white;
			padding: 10px;
		}

		#post
		{
			padding: 4px;
			font-size: 13px;
			display: flex;
			height: 100px;
			margin-bottom: : 20px;
			background-color: white;
		}

		#button
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
			margin-top: -32.5px;
			margin-right: 0px;
			margin-left: 20px;
			font-size: 15px;

		}

		#form
		{
			background-color: white; 
			width: 1000px; 
			margin: auto; 
			margin-left: 600px;
			margin-top: 1000px;
			padding-top: 50px;
			padding: 10px;
			text-align: center;
			font-weight: bold;
		}

		#text
		{ 
			height: 40px;
			width: 900px;
			border-radius: 4px;
			border: solid 1px #ccc;
			padding: 50px;
			font-size: 14px;

		}
		#submit_button
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

	

	<body style="font-family: tahoma; background-color: #F7F9F9 ;">
		<div id="bar">
			<div style="width: 1250px; margin: auto; font-size: 40px; padding-top: 5px; padding-bottom: 5px;">
				&nbsp Novine &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<input type="text" id="search_box" placeholder="Search">
				<img src="logo.png" style="height: 60px; float: left; margin-left: 5px;">
				<div style="height: 60px;  margin-left: 650px; margin-top: -47.5px; color: white; font-size: 20px; text-align: center; padding: 20px;"><?php echo $user_data['Korisnik_KorisnickoIme']?>
					<div><input id = "button" type="button" value="Go back" onClick="Javascript:window.location.href = 'http://localhost/kodovi/profile.php'">	
					</div>

					<div><input id = "button" type="button" value="Log out" onClick="Javascript:window.location.href = 'http://localhost/kodovi/classes/log out.php'">	
					</div>
				</div>		
				
				
			</div>
			
	

		</div>

		<!-- cover area -->
		<div style="width: 1250px; margin: auto; min-height: 400px">
			
			<div style="background-color: white; text-align: center; color:#DAF7A6 ">
				<img src="img2.png" style="width: 100%">
				<br>
				<div id="manu_battons">
					Aktuelno
				</div>
				<div id="manu_battons">
					Arhivirano  
				</div>
				<div id="manu_battons">
					Kategorija
				</div>  
				<div id="manu_battons">
					Tag
				</div>	
				<div id="manu_battons">
					Datum
				</div>
			</div>

			<!-- below cover area-->
			<div id="form" style="margin: auto; margin-top: 30px;">
				<form method="post" action="write the news.php">
		    	
			    	<input value="" name="Vest_Naslov" type="text" id="text" placeholder="Naslov"><br><br>
					<input value=""name="Tekst 1" type="text" id="text" placeholder="Tekst 1"><br><br>
					<input value="" name="Slika 1" type="text" id="text" placeholder="Sika 1"><br><br>
			    	
			    	<input value="" name="Podnaslov" type="text" id="text" placeholder="Podnaslov"><br><br>
					<input name="Tekst 2" type="text" id="text" placeholder="Tekst 2"><br><br>
					<input  name="Slika 2" type="text" id="text" placeholder="Slika 2"><br><br>
					<input name="Tekst 3" type="text" id="text" placeholder="Tekst 3"><br><br><br>

					<span style="font-weight: normal";> Kategorija:</span><br><br>
			    	<select name="Novinar_Kategorija" id="text" style="width: 1000px;">
			    		<!--<option><?php echo $Novinar_Kategorija?></option>-->
			    		<option>Politika</option>
			    		<option>Crna hronika</option> 
			    		<option>Svet</option>
			    		<option>Sport</option>
			    		<option>Zabava</option>
			    		<option>Kultura</option>

			    	</select><br><br>
			    	<input value="" name="Tag" type="text" id="text" placeholder="Tag"><br><br>
					
					<input type="submit" id="submit_button" value= "Submit" > <br><br><br>
					<!-- <input type="submit" id="button" value= "Sign up as Novinar" > <br><br><br>
					<input type="submit" id="button" value= "Sign up as Urednik" > <br><br><br>
					-->
				</form>
			</div>
		</div>

	</body>
</html>