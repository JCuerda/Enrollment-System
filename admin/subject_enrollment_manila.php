<?php


    include('admin_session.php');
    require('includes/connection.php');



    if( isset($_GET['id']) ){
      $the_student_id = $_GET['id'];
    } else {
      header('../admin/administration.php');
    }

$flag = 'On-going';

$query = "SELECT tbl_subject.subject_code, 
         tbl_studentinfo_manila.studentNo
         FROM icc_prac3.tbl_subject , 
         icc_prac3.tbl_curriculum , 
         icc_prac3.tbl_studentinfo_manila 
         WHERE tbl_subject.year_level = tbl_studentinfo_manila.year_level
         AND tbl_subject.semester_number = tbl_studentinfo_manila.semester_num 
         AND tbl_subject.course_curriculum  = tbl_curriculum.curriculum_id 
         AND tbl_studentinfo_manila.studentNo = '$the_student_id' 
         AND tbl_studentinfo_manila.new_old = 'new'
         AND tbl_curriculum.course_id = tbl_studentinfo_manila.course_id  
         ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result)){

  while( $row = mysqli_fetch_assoc($result) ){
    
    $subject_code = $row['subject_code'];
    $studentNo = $row['studentNo'];
    
    $enroll_query = "UPDATE icc_prac3.tbl_grades_manila
                  SET tbl_grades_manila.remarks = '$flag'
                  WHERE tbl_grades_manila.studentNo = '$studentNo' 
                  AND tbl_grades_manila.subject_code = '$subject_code'";

    $enroll_result = mysqli_query($conn,$enroll_query);
    if(!$enroll_result){
      
      echo "ENROLL QUERY FAILED";
    } else {
      
    }

  }

}

$status_update_query = "UPDATE icc_prac3.tbl_studentinfo_manila
  SET tbl_studentinfo_manila.status = 'enrolled',
  tbl_studentinfo_manila.new_old = 'old'
  WHERE tbl_studentinfo_manila.studentNo = '$the_student_id'";

$statusResult = mysqli_query($conn,$status_update_query);
  
  if( !$statusResult ){
    echo "ERROR OCCURED HERE";
  } else {
    header('Location: finalize_enrollment.php?alert=success');
  }
  


?>