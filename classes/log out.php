<?php
	session_start();
	if(isset($_SESSION['Korisnik_ID']))
	{
		$_SESSION['Korisnik_ID']=NULL;
		unset($_SESSION['Korisnik_ID']);
	}
	header("Location:http://localhost/kodovi/main%20for%20readers%20only.php");
	die;
?>