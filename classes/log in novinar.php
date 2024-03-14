<?php
	

class LoginNovinar
{

	private $error="";

	public function evaluate($data)
	{

		$Novinar_Email=addslashes($data['Novinar_Email']); //ako je u email adresi neki karakter koji bi php gledao kao simbol koji nije deo teksta kao npr' automatski dodaje \ i taj simbol posmatra kao deo teksta
		$Novinar_Sifra=addslashes($data['Novinar_Sifra']);

		$query = "select * from novinar where Novinar_Email = '$Novinar_Email' limit 1";
		
		// echo $query;
		$DB=new Database();
		$result = $DB->read($query);
		// print_r($result);

		if($result)
		{
			$row = $result[0];

			if ($Novinar_Sifra == $row['Novinar_Sifra'])
			{
				//kreiraj sesiju podataka
				$_SESSION['Novinar_ID']=$row['Novinar_ID'];
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

	public function check_login($Novinar_ID)
	{
		$query = "select Novinar_ID from novinar where Novinar_ID = '$Novinar_ID' limit 1";
		
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