<?php

    /* Reset Student Password that would be based with the students
     Student Number */

    include('admin_session.php');
    require('includes/connection.php');

     if( isset($_GET['id']) ){
      $the_student_id = $_GET['id'];
    } else {
      header('../admin/reset_pass_choose_branch.php');
    }

    $newPass = password_hash($the_student_id,PASSWORD_DEFAULT);

    $query = "UPDATE icc_prac3.login 
              SET login.password = '$newPass'
              WHERE login.username = $the_student_id";

    $result = mysqli_query($conn,$query);

    if( !$result ){
        header('Location:administration.php?alert=error');
    } else {
      header('Location:administration.php?alert=success');
    }


?>