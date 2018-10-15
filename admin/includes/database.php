<?php 

// class Database{

// 	private $connection;


// 	function __construct(){
// 		$this->open_db_connection();
// 	}

// 	public function open_db_connection(){

// 		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// 		if( $this->connection->connect_errorno ){
// 			die();
// 		}
// 	}

// 	public function get_connection(){
// 		return $this->connection;
// 	}

// 	public function query($sql){

// 		$result = mysqli_query($this->connection,$sql);
// 		return $result;
// 	}

// 	public function escape_string($string){
		
// 		$escaped_string = mysqli_real_escape_string($this->connection,$string);
// 		return $escaped_string;
// 	}

// 	private function verify_query($result){
// 		if(!$result){
// 			die();
// 		}
// 		return $result;
// 	}

// 	public function close_db_connection(){
// 		mysqli_close($this->connection);
// 	}

// 	public function the_insert_id(){
// 		return mysqli_insert_id();
// 	}



// } // end of Database Class

// $database = new Database();



 ?>