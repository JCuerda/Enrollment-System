<?php 

class Student {

	protected static $db_table = "tbl_studentinfo";
	protected static $db_table_fields = array('course_id','first_name','last_name','middle_name','branch_id','address','age','gender','contact_number','email_address','grant_id','year_level','semester_num','student_type','status','new_old');

	public $studentNo;
	public $course_id;
	public $first_name;
	public $last_name;
	public $middle_name;
	public $branch_id;
	public $address;
	public $age;
	public $gender;
	public $contact_number;
	public $email_address;
	public $grant_id;
	public $year_level;
	public $semester_num;
	public $student_type;
	public $status;
	public $new_old;


	public static function find_all_student(){
		return self::find_by_query("SELECT * FROM ".self::$db_table);
	} // end of find all the student query 

	public static function find_student_by_year_level($yrlevel){
		return self::find_by_query("SELECT * FROM " .self::$db_table . " WHERE year_level='$yrlevel'");
	}

	public static function find_student_by_id( $id ){
		global $database;
		$result = self::find_by_query("SELECT * FROM " .self::$db_table. " WHERE studentNo='$id'");

		return !empty($result) ? array_shift($result) : false;
	} // end of find student id Method

	public function get_property(){
		$properties = array();

		foreach ( self::$db_table_fields as $db_field) {
			if( property_exists($this, $db_field) ){
				$properties[$db_field] = $this->$db_field;
			}
		}
		return $properties;
	} // end of get_property method

	protected function clean_property(){
		global $database;
		$properties = $this->get_property();
		$cleaned_property = array();
		foreach ($properties as $key => $value) {
			$cleaned_property[$key] = $database->escape_string($value);
		}

		return $cleaned_property;

	} // end of cleaning or sanitazing property values

	public function save(){
		return isset($this->studentNo) ? $this->update() : $this->create(); 
	} // end of Save Method

	public function create(){
		global $database;
		$properties = $this->clean_property();
		$sql = "INSERT INTO ". self::$db_table ."(". implode(",", array_keys($cleaned_property)) .") ";
		$sql .= "VALUES ('" . implode("','", array_values($cleaned_property)) . "')";

		$result = $database->query($sql);

		if(!$result){
			die(mysqli_error($database->get_connection()));
		} else {
			$this->studentNo = $database->the_insert_id();
		}

	} // end of Create Method


	public function update(){

		global $database;

		$sql = "UPDATE ". self::$db_table ." SET ";
		$sql .= "first_name ='" .$database->escape_string($this->first_name) ."',";
		$sql .= "last_name ='" .$database->escape_string($this->last_name) ."',";
		$sql .= "middle_name ='" .$database->escape_string($this->middle_name) ."',";
		$sql .= "address ='" .$database->escape_string($this->address) ."',";
		$sql .= "age ='" .$database->escape_string($this->age) ."',";
		$sql .= "gender ='" .$database->escape_string($this->gender) ."',";
		$sql .= "contact_number ='" .$database->escape_string($this->contact_number) ."',";
		$sql .= "email_address ='" .$database->escape_string($this->email_address) ."',";
		$sql .= "WHERE studentNo ='" .$database->escape_string($this->studentNo) ."' LIMIT 1";

		$result = $database->query($sql);
		if(!$result){
			die(mysqli_error($database->get_connection()));
		} else {
			return mysqli_affected_rows($database->get_connection() == 1) ? true : false;
		}

	} // end of Update Method


	public function delete(){
		global $database;

		$sql = "DELETE FROM ".self::$db_table." ";
		$sql .= "WHERE studentNo='" .$database->escape_string($this->studentNo) ."'";

		$result = $database->query($sql);
		if( !$result ){
			die(mysqli_error($database->get_connection()));
		} else {
			return mysqli_affected_rows($database->get_connection() == 1) ? true : false;
		}
	} // end of the Delete Method

	public static function find_by_query( $sql ){
		global $database;

		$result = $database->query($sql);

		$the_object_array = array();
		while( $row = mysqli_fetch_array($result) ){
			$the_object_array[] = self::instantiate($row);
		}

		return $the_object_array;
	} // end of Centralize Query


	public static function instantiate( $record ){
		global $database;

		$the_object = new self;

		foreach ($record as $the_attribute => $value) {
			if( $the_object->has_the_attribute($the_attribute) ){
				$the_object->$the_attribute = $value;
			}
		}
	} // end of Instantiation Method

	private function has_the_attribute($the_attribute){
		#subject for change
		$the_object_properties = get_object_vars($this);

		return array_key_exists($the_attribute,$the_object_properties);

	} //end of Property Finder


} // end of Student Class



 ?>