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
				header("Location: Chose your log in.php");
				die;
			}


		}
		else
		{
			header("Location: Chose your log in.php");
			die;
		}
	}
	else
	{
		header("Location: Chose your log in.php.php");
		die;
	}
	// print_r($user_data);
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
			font-size: 15px;

		}


	</style>
	

	<body style="font-family: tahoma; background-color: #F7F9F9 ;">
		<div id="bar">
			<div style="width: 1250px; margin: auto; font-size: 40px; padding-top: 5px; padding-bottom: 5px;">
				&nbsp Novine &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<input type="text" id="search_box" placeholder="Search">
				<img src="logo.png" style="height: 60px; float: left; margin-left: 5px;">
				<div style="height: 60px;  margin-left: 850px; margin-top: -47.5px; color: white; font-size: 20px; text-align: center; padding: 20px;"><?php echo $user_data['Korisnik_KorisnickoIme']?>
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
			<div style="display: flex;">

				<!-- sa strane-->
				<div style="min-height: 400px; flex: 1">
					
					<div id="left">
					
					Sa strane <br><br>
	
						<div id="left_posts">
							<img id="left_post_img" src="search.png">
							neki post
						</div>

						<div id="left_posts">
							<img id="left_post_img" src="search.png">
							neki post 2
						</div>

						<div id="left_posts">
							<img id="left_post_img" src="search.png">
							neki post 3
						</div>

					</div>
				</div>
				

				<!-- vesti -->
				<div style="min-height: 400px; flex: 3; padding: 20px; padding-right: 0px;">
					
					<input style="border: solid thin #aaa; padding: 10px;background-color: #DAF7A6 ;color: #0B5345; height:60px; text-align: center;	border-radius: 4px;border: none; font-size: 20px; padding-top: 12.5px; width:920px;" type="button" value="Write the news" onClick="Javascript:window.location.href = 'http://localhost/kodovi/write the news.php'">	

						<!--<textarea placeholder="Make your post"></textarea>
						<input id="post_button"type="submit" value="Post">
						<br>-->
					<div id="post_bar">
						<!--Post 1 ****************************************************************  -->
						<div id="post">
							<div>
								<img src="logo.png" style="width: 75px; margin-right: 4px;">
							</div>
							<div>
								<div style="font-weight: bold; color: #0B5345">
									Naslov <br>
								</div>
								sfeqrtd5t esrdtwts srtedwhw ssregt rsgetyhtr erstey <br><br>

								<a href="">Like</a>. 
								<a href="">Dislajk</a> . 
								<a href="">Comment</a> . 
								<span style="color: #999">Broj lajkova</span> . 
								<span style="color: #999">Broj dislajkova</span> . 
								<span style="color: #999">Datum</span>
							</div>
						</div>
						<!--Post 2 ************************************************************************-->
						<div id="post">
							<div>
								<img src="logo.png" style="width: 75px; margin-right: 4px;">
							</div>
							<div>
								<div style="font-weight: bold; color: #0B5345">
									Naslov <br>
								</div>
								sfeqrtd5t esrdtwts srtedwhw ssregt rsgetyhtr erstey <br><br>

								<a href="">Like</a>. 
								<a href="">Dislajk</a> . 
								<a href="">Comment</a> . 
								<span style="color: #999">Broj lajkova</span> . 
								<span style="color: #999">Broj dislajkova</span> . 
								<span style="color: #999">Datum</span>
							</div>
						</div>
						<!--Post 3 *******************************************************************************-->
						<div id="post">
							<div>
								<img src="logo.png" style="width: 75px; margin-right: 4px;">
							</div>
							<div>
								<div style="font-weight: bold; color: #0B5345">
									Naslov <br>
								</div>
								sfeqrtd5t esrdtwts srtedwhw ssregt rsgetyhtr erstey <br><br>

								<a href="">Like</a>. 
								<a href="">Dislajk</a> . 
								<a href="">Comment</a> . 
								<span style="color: #999">Broj lajkova</span> . 
								<span style="color: #999">Broj dislajkova</span> . 
								<span style="color: #999">Datum</span>
							</div>
						</div>


						
					</div>

				</div>

			</div>
		</div>

	</body>
</html>
