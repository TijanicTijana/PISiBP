<html>
	<head>
	    <title>Novine | Chose your sign up</title>
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
			height: 500px; 
			margin: auto; 
			margin-top: 50px;
			padding-top: 50px;
			padding: 10px;
			text-align: center;
			font-weight: bold;
			font-size: 20px;
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

		#chose_button
		{
			height: 400px;
			border-radius: 4px;
			font-weight: bold;
			border: none;
			background-color: #DAF7A6;
			color: #0B5345;
			margin:auto;
			text-align: center;
			margin-left: 20px;
			margin-right: 20px;
			margin-top: -5px;
			font-size: 15px;
		}

	</style>


	<body style="font-family: tahoma; background-color: #E8F6F3; ">
	    <div id="bar"> 
	        <div style="font-size: 40px; padding: 20px;" >Novine</div> 
	        <div>
	       		<input id = "GoBack_button" type="button" value="Go back" onClick="Javascript:window.location.href = 'http://localhost/kodovi/main for readers only.php'">	
			</div>
	       	<input id = "signup_button" type="button" value="Log in" onClick="Javascript:window.location.href = 'http://localhost/kodovi/chose your log in.php'">
	    	
	    </div>

	    <div id="login_bar">

	    	<br>
	    	Chose your Sign up <br><br>
	    	
	    	<div style="display: flex;">

				<!-- sa strane-->
				
				<input id="chose_button" style="flex: 1" type="button" value="Sign up as Korisnik" onClick="Javascript:window.location.href = 'http://localhost/kodovi/signup.php'">

				<input id="chose_button" style="flex: 1" type="button" value="Sign up as Novinar" onClick="Javascript:window.location.href = 'http://localhost/kodovi/signup novinar.php'">

				<input id="chose_button" style="flex: 1" type="button" value="Sign up as Urednik" onClick="Javascript:window.location.href = 'http://localhost/kodovi/signup urednik.php'">	
					
	    </div>
	</body>
</html>
