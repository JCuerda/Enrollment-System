<?php

    /* Reset Student Password that would be based with the students
     Student Number */
     
    include('admin_session.php');
    require('includes/connection.php');

     if( isset($_GET['subject_code']) ){
      $the_subject_code = $_GET['subject_code'];
    } else {
      header('../admin/administration.php');
    }

    if( isset($_GET['studentNo']) ){
      $the_student_id = $_GET['studentNo'];
    } else {
      header('../admin/administration.php');
    }


    $query = "INSERT INTO icc_prac3.tbl_grades (
              tbl_grades.studentNo,
              tbl_grades.subject_code,
              tbl_grades.remarks)
              VALUES (
              '$the_student_id',
              '$the_subject_code',
              'On-Going');";

    $result = mysqli_query($conn,$query);

    if( !$result ){
        header('Location:finalize_enrollment.php?alert=error');
    } else {
      header('Location:finalize_enrollment.php?alert=success');
    }


?>