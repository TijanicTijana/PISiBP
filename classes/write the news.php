<?php

	class Write
	{
		private $error = "";
		
		public function evaluate($data)
		{

			foreach ($data as $key => $value) {
				if (empty($value))
				{
					$this->error = $this->error . $key ." is empty! <br>";
				}


				if ($key== "Vest_Naslov" || $key== "Vest_Podnaslov")
				{
					if(is_numeric($value))
					{
						$this->error = $this->error . "Naslov i podnaslov ne mogu biti broj <br>";
					}

				}

				
			}
			if($this->error == "")
			{

				//no error
				$this->create_vest($data);
			}
			else
			{
				return $this->error;
			}

		}

		public function create_vest($data)
		{
			$Vest_Naslov= $data['Vest_Naslov'];
			$Vest_Tekst1= $data['Vest_Tekst1'];
			$Vest_Slika1= $data['Vest_Slika1'];
			$Vest_Podnaslov= $data['Vest_Podnaslov'];
			$Vest_Tekst2= $data['Vest_Tekst2'];
			$Vest_Slika2= $data['Vest_Slika2'];
			$Vest_Tekst3= $data['Vest_Tekst3'];
			$Vest_Kategorija= $data['Vest_Kategorija'];
			$Vest_Tag= $data['Vest_Tag'];	
			$Vest_Datum=$data("d.m.Y");


			$query = "insert into vest( Vest_Naslov, Vest_Tekst1, Vest_Slika1, Vest_Podnaslov, Vest_Tekst2, Vest_Slika2, Vest_Tekst3, Vest_Kategorija, Vest_Tag, Vest_Datum) values('$Vest_Naslov', '$Vest_Tekst1', '$Vest_Slika1', '$Vest_Podnaslov', '$Vest_Tekst2', '$Vest_Slika2', '$Vest_Tekst3', '$Vest_Kategorija', '$Vest_Tag', '$Vest_Datum')";

			
			// echo $query;
			$DB=new Database();
			$DB->save($query);

		}

	}

?>