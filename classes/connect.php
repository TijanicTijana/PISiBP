<?php

	class Database
	{
		private $host="localhost:3308";
		private $username="root";
		private $password="";
		private $db="novine";

		private function connect()
		{
			$connection=mysqli_connect($this->host,$this->username,$this->password,$this->db);
			return $connection;
		}

		function read($query)
		{
			$conn = $this->connect();
			$result = mysqli_query($conn,$query);
			if($result ==false)
			{	
				return false;
			}
			else
			{
				$data = false;
				while($row = mysqli_fetch_assoc($result))
				{
					$data[] = $row;
				}
				return $data;
			}

		}


		function save($query)
		{
			$conn = $this->connect($query);
			$result = mysqli_query($conn,$query);

			if($result ==false)
			{	
				return false;
			}
			else
			{
				return true;
			}

		}
	}

//	$DB=new Database();
//	$DB->save();
?>