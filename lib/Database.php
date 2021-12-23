<?php
	class Database{
		public $host    = 'localhost';
		public $user    = 'root';
		public $pass    = '';
		public $dbname  = 'tabloid_treasury';

		public $link;  
		public $error;   

		public function __construct(){
			$this->connectDB();
		}

	private function connectDB(){
		$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		if(!$this->link){
			$this->error = "Connection Error ".$this->link->connect_error;
			return false;
		}
	}

	public function select($qry){
		$result = $this->link->query($qry) or die($this->link->error.__LINE__);
		if ($result->num_rows>0) {
			return $result;
		}
		else{
			return false;
		}
	}
	public function insert($qry){
		$insert = $this->link->query($qry) or die($this->link->error.__LINE__);
		if ($insert) {
			return $insert;
		}
		else{
			return false;
		}
	}
	public function update($qry){
		$update = $this->link->query($qry) or die($this->link->error.__LINE__);
		if ($update) {
			return $update;
		}
		else{
			return false;
		}
	}
	public function delete($qry){
		$delete = $this->link->query($qry) or die($this->link->error.__LINE__);
		if ($delete) {
			return $delete;
		}
		else{
			return false;
		}
	}
}

?>