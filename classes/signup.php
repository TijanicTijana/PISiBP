<?php

	class Signup
	{
		private $error = "";
		
		public function evaluate($data)
		{

			foreach ($data as $key => $value) {
				if (empty($value))
				{
					$this->error = $this->error . $key ." is empty! <br>";
				}

				if ($key== "Korisnik_Email")
				{
					if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
					{
						$this->error = $this->error . " Netacna email adresa <br>";
					}
				}

				if ($key== "Korisnik_Ime")
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

				if ($key== "Korisnik_Prezime")
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
				$this->create_korisnik($data);
			}
			else
			{
				return $this->error;
			}

		}

		public function create_korisnik($data)
		{
			$Korisnik_KorisnickoIme=$data['Korisnik_KorisnickoIme'];
			$Korisnik_Sifra=$data['Korisnik_Sifra'];
			$Korisnik_Email=$data['Korisnik_Email'];
			$Korisnik_Pol=$data['Korisnik_Pol'];
			$Korisnik_Ime=ucfirst($data['Korisnik_Ime']);
			$Korisnik_Prezime=ucfirst($data['Korisnik_Prezime']);

			//create this
			$Korisnik_ID=$this->create_Korisnik_ID();

			$query = "insert into korisnik(Korisnik_ID, Korisnik_KorisnickoIme, Korisnik_Sifra, Korisnik_Email, Korisnik_Pol, Korisnik_Ime, Korisnik_Prezime) values ('$Korisnik_ID', '$Korisnik_KorisnickoIme', '$Korisnik_Sifra', '$Korisnik_Email', '$Korisnik_Pol', '$Korisnik_Ime', '$Korisnik_Prezime') ";
			
			// echo $query;
			$DB=new Database();
			$DB->save($query);

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

	}

?>