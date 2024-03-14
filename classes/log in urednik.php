<?php
	

class LoginUrednik
{

	private $error="";

	public function evaluate($data)
	{

		$Urednik_Email=addslashes($data['Urednik_Email']); //ako je u email adresi neki karakter koji bi php gledao kao simbol koji nije deo teksta kao npr' automatski dodaje \ i taj simbol posmatra kao deo teksta
		$Urednik_Sifra=addslashes($data['Urednik_Sifra']);

		$query = "select * from urednik where Urednik_Email = '$Urednik_Email' limit 1";
		
		// echo $query;
		$DB=new Database();
		$result = $DB->read($query);
		// print_r($result);

		if($result)
		{
			$row = $result[0];

			if ($Urednikr_Sifra == $row['Urednik_Sifra'])
			{
				//kreiraj sesiju podataka
				$_SESSION['Urednik_ID']=$row['Urednik_ID'];
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
		$query = "select Urednik_ID from urednik where Urednik_ID = '$Urednik_ID' limit 1";
		
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
