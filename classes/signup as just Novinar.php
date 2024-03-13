<?php

	class SignupNovinar
	{
		private $error = "";
		
		public function evaluate($data)
		{

			foreach ($data as $key => $value) {
				if (empty($value))
				{
					$this->error = $this->error . $key ." is empty! <br>";
				}

				if ($key== "Novinar_Email")
				{
					if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
					{
						$this->error = $this->error . " Netacna email adresa <br>";
					}
				}

				if ($key== "Novinar_Ime")
				{
					if(is_numeric($value))
					{
						$this->error = $this->error . " Ime ne moze biti broj <br>";
					}
					if(strstr($value, " "))
					{
						$this->error = $this->error . " Ime ne moze sadrzati razmake <br>";
					}

				}

				if ($key== "Novinar_Prezime")
				{
					if(is_numeric($value))
					{
						$this->error = $this->error . " Prezime ne moze biti broj <br>";
					}
					if(strstr($value, " "))
					{
						$this->error = $this->error . " Prezime ne moze sadrzati razmake <br>";
					}
				}

				
			}
			if($this->error == "")
			{

				//no error
				$this->create_novinar($data);
			}
			else
			{
				return $this->error;
			}

		}

		public function create_novinar($data)
		{
			$Novinar_KorisnickoIme=$data['Novinar_KorisnickoIme'];
			$Novinar_Sifra=$data['Novinar_Sifra'];
			$Novinar_Email=$data['Novinar_Email'];
			$Novinar_Pol=$data['Novinar_Pol'];
			$Novinar_Ime=ucfirst($data['Novinar_Ime']);
			$Novinar_Prezime=ucfirst($data['Novinar_Prezime']);
			$Novinar_Kategorija=$data['Novinar_Kategorija'];
			//create this
			//$Korisnik_ID=$this->create_Korisnik_ID();

			$query = "insert into novinar(Novinar_KorisnickoIme, Novinar_Sifra, Novinar_Email, Novinar_Pol, Novinar_Ime, Novinar_Prezime, Novinar_Kategorija) values ('$Novinar_KorisnickoIme', '$Novinar_Sifra', '$Novinar_Email', '$Novinar_Pol', '$Novinar_Ime', '$Novinar_Prezime', '$Novinar_Kategorija')";
			// echo $query;
			$DB1=new Database();
			$DB1->save($query);
		}
/*
		public function create_novinar($data)
		{
			$Novinar_Kategorija=$data['Novinar_Kategorija'];
			$queryNovinar = "insert into novinar(Novinar_ID, Novinar_Kategorija, Korisnik_ID) values ('$Novinar_ID', '$Novinar_Kategorija', '$Korisnik_ID')";
			$DB=new Database();
			$DB->save($queryNovinar);
		}
		private function create_Korisnik_ID()
		{
			$length = rand(4,19);
			$number = "";
			for ($i=0; $i<$length;$i++)
			{
				$new_rand = rand(0,9);
				$number=$number . $new_rand;
			}
			return $number;
		}

		private function create_Novinar_ID()
		{
			$length = rand(19,30);
			$number = "";
			for ($i=0; $i<$length;$i++)
			{
				$new_rand = rand(0,9);
				$number=$number . $new_rand;
			}
			return $number;
		}
*/
	}

?>