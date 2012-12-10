<?php
class Database
{
	private $conn; //connectie met de database
	private $res;  //resultaten van de query
	public function Database($name)
	{
		include 'config.inc.php';
		$this->conn = new mysqli($location, $inlog, $wachtwoord, $name);
		if ($this->conn->connect_errno != 0) //er gaat iets fout
		{
			die("Probleem bij het leggen van een connectie");
		}
	}
	
	public function doSQL($d)
	{
		$this->res=$this->conn->query($d)
		or die ("query faalt");
	}
	
	public function getRecord()
	{
	   return $this->res->fetch_assoc();
	}
	
	public function close()
	{
		$this->conn->close();
	}
} 
?>