<?php
  include('functions.php'); 
  include('session.php');
  require('includes/connection.php');
  

  if( $loggedUser_branch != 'caloocan' && $loggedUser_branch != null){
      header('Location: profile_manila.php');
  } else if ( $loggedUser_branch == null ) {
    header('Location:index.php');
  }

 

  $count = 0;
  $alertMessage = "";
  if(isset( $_GET['alert'] )){

     if( $_GET['alert'] == 'success' ){

         $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Successfully Updated Information <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'changepassword_success' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> PASSWORD CHANGED! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'rejected' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Request Rejected! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'update_error' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Error Updating Payment! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'update_success' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> Successfully Updating your Payment Information! Please wait for Administration Confirmation <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'no_records' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> No Current Pending Payment Record in our Database! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
      }  else if ( $_GET['alert'] == 'no_forms' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Sorry there is no Forms to Print! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
      }
  } 

  if( isset($_POST['btn_print']) ){


    $query = "SELECT tbl_payment.payment_status
              FROM icc_prac3.tbl_payment
              WHERE tbl_payment.studentNo = '$loggedUser'
              AND tbl_payment.status = 'new'";

    $result = mysqli_query($conn,$query);
    while( $row = mysqli_fetch_assoc($result) ){
        $payment_status = $row['payment_status'];
        if( $payment_status == 'Not Approve' ) {
          header('Location: profile.php?alert=no_forms');
        } else {
          header('Location:enrollment_form.php');
        }
    }
   
  }

  if( isset($_POST['btn_upload']) ){

    if( $loggedUser_branch == 'caloocan' ){
        header('Location: upload_image.php');
    } else if( $loggedUser_branch == 'manila' ){
        header('Location: upload_image_manila.php');
    }
  }

  if( isset($_POST['btn_enroll']) ){

      $flag = "Completed";
      
      $query = "SELECT tbl_grades.studentNo , 
                COUNT(tbl_grades.remarks),
                tbl_studentinfo.year_level,
                tbl_studentinfo.semester_num,
                tbl_subject.subject_code
                FROM icc_prac3.tbl_grades,
                icc_prac3.tbl_studentinfo,
                icc_prac3.tbl_subject
                WHERE tbl_subject.subject_code = tbl_grades.subject_code
                AND tbl_subject.semester_number = tbl_studentinfo.semester_num
                AND tbl_studentinfo.year_level = tbl_subject.year_level
                AND tbl_studentinfo.studentNo = '$loggedUser'
                AND tbl_grades.remarks != '$flag'
                AND tbl_studentinfo.studentNo = tbl_grades.studentNo";

      $result = mysqli_query($conn,$query);

      if( !$result ){
          $alertMessage = "ERROR";
      } 

      while( $row = mysqli_fetch_array($result) ){
        
        $count = $row['COUNT(tbl_grades.remarks)'];

      }

      // echo $count;

      if( $count == 0 ){
          $_SESSION['enrollment'] = "passed";
          if( $yr_level == 11 || $yr_level == 12 ){
              header('Location: assessment_form_shs.php');
          } else {
              header('Location: assessment_form.php');
          }
         
        } else {

          $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong>".'  <?php echo $count; ?> '."Cannot Enroll at this moment due to Qualification Problem. Please Contact Administrator <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        }

  }

  if( isset($_POST['btn_update']) ){
      header('Location: update_payment.php');
  }

  include('includes/header.php');
  include('navigation_2.php');

?>                            
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

              <?php 
              $query = "SELECT tbl_studentinfo.*, 
                        tbl_course_info.course_description, 
                        tbl_academic_sem.semester_num, 
                        tbl_academic_year.year_level
                        FROM icc_prac3.tbl_studentinfo
                        LEFT JOIN icc_prac3.tbl_academic_year ON tbl_studentinfo.year_level = tbl_academic_year.id 
                        LEFT JOIN icc_prac3.tbl_academic_sem ON tbl_studentinfo.semester_num = tbl_academic_sem.id 
                        LEFT JOIN icc_prac3.tbl_course_info ON tbl_studentinfo.course_id = tbl_course_info.course_id
                        WHERE tbl_studentinfo.studentNo ='$loggedUser'";


                $result = mysqli_query($conn, $query);  

                 while($row = mysqli_fetch_assoc($result)) {

                      $studNo = $row['studentNo'];
                      $fname = $row['first_name'];
                      $Lname = $row['last_name']; 
                      $course_description = $row['course_description'];
                      $yr_level = $row['year_level'];
                      $semester_number = $row['semester_num'];
                      $student_type = $row['student_type'];
                      $student_age = $row['age'];
                      $student_gender = $row['gender'];
                      $student_address = $row['address'];
                      $student_contactNum = $row['contact_number'];
                      $student_email = $row['email_address'];
                      $student_image = $row['student_photo'];
                 } 

               ?>

                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="profile.php">Home</a></li>
                          <li class="active"><a href="profile.php">Profile</a></li>
                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage; 
                ?>
                 <div class="row"> <!--Sidebar for Image and About-->
                    <div class="col-md-3">
                       <div class="row">
                            <div class="col-md-12" id="dp">
                                <img src="uploads/<?php echo $student_image; ?>" class="img-responsive" alt="photo" height = "500px" width = "500px" >   
                            </div>   
                       </div>

                       <div class="row"><br></div>

                       <div class="row">
                            <div class="col-md-12" id="dp">
                                 <div class="row">
                                   <div class="col-md-5">Name:</div>
                                   <div class="col-md-6"><?php echo $fname ." " . $Lname; ?></div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-5">Age:</div>
                                   <div class="col-md-6"><?php echo $student_age; ?></div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-5">Address:</div>
                                   <div class="col-md-6"><?php echo $student_address; ?></div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-5">E-Address:</div>
                                   
                                 </div>

                                 <div class="row">
                                  <div class="col-md-6"><?php echo $student_email; ?></div>
                                 </div>

                                <div class="row">
                                   <div class="col-md-5">Contact Number:</div>
                                   <div class="col-md-6"><?php echo $student_contactNum; ?></div>
                                 </div>

                                 <div class="row">
                                  <div class="col-md-5">My Links:</div>
                                   <div class="col-md-2">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                   </div>

                                   <div class="col-md-2">
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                   </div>

                                   <div class="col-md-2">
                                        <a href="#"><i class="fa fa-google"></i></a>
                                   </div>

                                 </div>
                            </div>   
                       </div>
                    </div>
                    <!-- end of photo-->
                    
                    <div class="col-md-9">
                          <?php include('profile_navigation.php'); ?>
                        
                        <!--profile content here-->
                        <div class="container-fluid">

                        
                            <div class="row">
                                <div class="col-md-3">
                                    <label for=""><strong>Student Number:</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <label for=""><?php echo $studNo; ?></label>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Academic Year:</label>
                                </div>
                                <div class="col-md-3">
                                    <label for=""><?php echo $yr_level; ?> <?php echo $semester_number; ?></label>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-3">
                                    <label for="">Student Name:</label>
                                </div>
                                <div class="col-md-3">
                                    <label for=""><?php echo $fname . " " . $Lname; ?></label>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Student Type:</label>
                                </div>
                                <div class="col-md-3">
                                    <label for=""><?php echo strtoupper($student_type); ?></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Course Name:</label>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><?php echo $course_description; ?></label>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for=""></label>
                                </div>
                            </div>

                            <br>

                            <table class="table table-responsive table-bordered">

                                   <tr>
                                      <th colspan="3" class="text-center">Subjects Currently Enrolled:</th>
                                  </tr>
                                  
                                    <tr><td colspan="3"></td></tr>
                                    
                                    <tr>
                                      <th class="text-center">
                                        Subject Code
                                      </th>
                                      <th class="text-center">
                                        Subject Description
                                      </th>
                                      <th class="text-center">
                                        Remarks
                                      </th>
                                    </tr>

                                    <?php 

                                    $subject_query = "SELECT tbl_subject.subject_code,
                                                      tbl_subject.subject_description,
                                                      tbl_grades.remarks , 
                                                      tbl_studentinfo.studentNo 
                                                      FROM icc_prac3.tbl_subject , 
                                                      icc_prac3.tbl_studentinfo, 
                                                      icc_prac3.tbl_grades 
                                                      WHERE tbl_subject.year_level = tbl_studentinfo.year_level 
                                                      AND tbl_subject.semester_number = tbl_studentinfo.semester_num 
                                                      AND tbl_studentinfo.studentNo = '$loggedUser' 
                                                      AND tbl_subject.subject_code = tbl_grades.subject_code 
                                                      AND tbl_grades.studentNo = tbl_studentinfo.studentNo
                                                      ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

                                     $subject_result = mysqli_query($conn, $subject_query);

                                     if( mysqli_num_rows($subject_result) > 0 ){

                                        while( $row = mysqli_fetch_assoc($subject_result) ){

                                          $sbjCode = $row['subject_code'];
                                          $subject_description = $row['subject_description'];
                                          $subject_remarks = $row['remarks'];

                                          ?>

                                          <tr>
                                            <td class="text-center">
                                              <?php echo $sbjCode; ?>
                                            </td >
                                            <td class="text-center">
                                              <?php echo $subject_description; ?>
                                            </td>
                                            <td class="text-center">
                                              <?php echo $subject_remarks; ?>
                                            </td>

                                          </tr>

                                          <?php
                                        }
                                     }
                              
                                      mysqli_close($conn);
                                     ?>

                            </table>

                        </div>
                    
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
  <?php include('includes/footer.php'); ?>
