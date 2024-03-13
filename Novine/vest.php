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
			margin-bottom: 40px;
			background-color: white;
		}
		#tekst
		{
			font-size: 15px;
		}


	</style>
	

	<body style="font-family: tahoma; background-color: #F7F9F9;">
		<div id="bar">
			<div style="width: 1250px; margin: auto; font-size: 40px; padding-top: 5px; padding-bottom: 5px;">
				&nbsp Novine &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<input type="text" id="search_box" placeholder="Search">
				<img src="logo.png" style="height: 60px; float: left;">
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
				<div style="min-height: 400px; flex: 3; padding-left: 20px;">

					<div id="post_bar">
						<!--Post 1 ****************************************************************  -->
						<div id="post">
							<div>
								<div style="font-weight: bold; color: #0B5345; font-size: 30px;">
									NOVAK PRIVLAČI MEGAZVEZDE Đoković objavio PRESKUPU FOTOGRAFIJU, o ovome se priča u Holivudu (FOTO) <br><br>
								</div>
								<a href="">Like</a>. 
								<a href="">Dislajk</a> . 
								<a href="">Comment</a> . 
								<span style="color: #999">Broj lajkova</span> . 
								<span style="color: #999">Broj dislajkova</span> . 
								<span style="color: #999">Datum</span>
								<br><br><br>

								<div style="font-size: 25px;">
									Velike zvezde na jednoj fotografiji. <br><br>
								</div>

								<div>
								<img src="Novak.png" style="width: 100%; margin-right: 4px;">
								</div>
							</div>
						</div>
						<div id="post">
							<div id="tekst">
								<br><br>
								Novak Đoković se trenutno nalazi u Kaliforniji gde se priprema za nastup na turniru u Indijan Velsu. U međuvremenu pokušava da što kvalitetnije iskoristi slobodno vreme, a u subotu je otišao na događaj koji se zove "Apfront samit".
								<br><br>
								ĐOKOVIĆA SU SVI RAZAPINJALI, SADA JE NA TAPETU RUS, ALI ONI NISU JEDINI Ovo je spisak svih tenisera koji su dobili diskvalifikaciiju
								<br><br>
								Na njemu se našlo mnogo javnih ličnosti, a uz popularnog Noleta posebno je privukla pažnju Kejti Peri, svetska megazvezda iz sveta muzike. S obzirom na to da su se dve slavne ličnosti našle na istom mestu, iskoristile su priliku da se zajedno fotografišu, a Srbin je ovekovečeni trenutak objavio na svom Instagram profilu.
							</div>
							
						</div>
						<div id="post">
							<div>
								<img src="Novak sa zenom.png" style="width: 1000px;">
							</div>

						</div>
					</div>

				</div>

			</div>
		</div>

	</body>
</html>