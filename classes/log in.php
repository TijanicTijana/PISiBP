<?php
	

class Login
{

	private $error="";

	public function evaluate($data)
	{

		$Korisnik_Email=addslashes($data['Korisnik_Email']); //ako je u email adresi neki karakter koji bi php gledao kao simbol koji nije deo teksta kao npr' automatski dodaje \ i taj simbol posmatra kao deo teksta
		$Korisnik_Sifra=addslashes($data['Korisnik_Sifra']);

		$query = "select * from korisnik where Korisnik_Email = '$Korisnik_Email' limit 1";
		
		// echo $query;
		$DB=new Database();
		$result = $DB->read($query);
		// print_r($result);

		if($result)
		{
			$row = $result[0];

			if ($Korisnik_Sifra == $row['Korisnik_Sifra'])
			{
				//kreiraj sesiju podataka
				$_SESSION['Korisnik_ID']=$row['Korisnik_ID'];
			}
			else
			{
				$this->error .= "Pogresna sifra<br>";
			}
		}
		else
		{
			$this->error .= "Pogresan email<br>";
		}
		return $this->error;
	}

	public function check_login($Korisnik_ID)
	{
		$query = "select Korisnik_ID from korisnik where Korisnik_ID = '$Korisnik_ID' limit 1";
		
		// echo $query;
		$DB=new Database();
		$result = $DB->read($query);
		// print_r($result);

		if($result)
		{
			return true;
		}

		return false;

	}

}

?>
