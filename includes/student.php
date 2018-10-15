<?php 

class Student{

	protected static $db_table = "tbl_studentinfo";
	protected static $db_table_fields = array('course_id','first_name','last_name','middle_name','branch_id','address','age','gender','contact_number','email_address','grant_id','year_level','semester_num','student_type','status','new_old');

	public $student_number;
	public $student_number;
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


	public static function instantiate( $record ){
		
	}




}


 ?>