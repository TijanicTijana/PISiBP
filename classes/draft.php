<?php
	class Draft
	{
		private $error = "";
		public function create_draft($Novinar_ID, $data)
		{
			if(empty($data['post']))
			{
				$draft = addsLashes($data['post'])
				$query = "insert into draft () values ()";
			}
			else
			{
				$this->error .= "Draft ne moze biti prazan"
			}

			return $this->error;
		}
	}

?>