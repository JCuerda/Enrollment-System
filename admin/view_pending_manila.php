<?php 

  include('admin_session.php');
  require('includes/connection.php');

  $alertMessage = "";

 if( isset($_GET['view']) ){
	    $the_student_id = $_GET['view'];

      if($_GET['view'] === 'NO DATA'){
        
        header('Location:pending_enrollment_manila.php');
      }
  }

  if( isset($_POST['btn_approve']) ){

      $query = "SELECT tbl_subject.subject_code, 
                tbl_studentinfo_manila.studentNo
                FROM icc_prac3.tbl_subject , 
                icc_prac3.tbl_curriculum , 
                icc_prac3.tbl_studentinfo_manila 
                WHERE tbl_subject.year_level = tbl_studentinfo_manila.year_level
                AND tbl_subject.semester_number = tbl_studentinfo_manila.semester_num 
                AND tbl_subject.course_curriculum  = tbl_curriculum.curriculum_id 
                AND tbl_studentinfo_manila.studentNo = '$the_student_id' 
                AND tbl_curriculum.course_id = tbl_studentinfo_manila.course_id  
                ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)){

      while( $row = mysqli_fetch_assoc($result) ){
        
        $subject_code = $row['subject_code'];
        $studentNo = $row['studentNo'];
        
        $enroll_query = "UPDATE icc_prac3.tbl_grades_manila
                        SET tbl_grades_manila.remarks = 'On-going'
                        WHERE tbl_grades_manila.studentNo = '$studentNo' 
                        AND tbl_grades_manila.subject_code = '$subject_code'";

        $enroll_result = mysqli_query($conn,$enroll_query);
        if(!$enroll_result){
          echo "ENROLL QUERY FAILED";

        }

      }

    }

    $status_update_query = "UPDATE icc_prac3.tbl_studentinfo_manila
                            SET tbl_studentinfo_manila.status = 'enrolled'
                            WHERE tbl_studentinfo_manila.studentNo = '$the_student_id'";

    $statusResult = mysqli_query($conn,$status_update_query);
      
        if( !$statusResult ){
          echo "ERROR OCCURED HERE";
        } else {

            $paymentStatus_query = "UPDATE icc_prac3.tbl_payment_manila
                                  SET tbl_payment_manila.payment_status = 'Approved'
                                  WHERE tbl_payment_manila.studentNo = '$the_student_id'";

            $status_result = mysqli_query($conn , $paymentStatus_query);

            if( !$status_result ){
                $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                  <strong> Error Occurred! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                              </div></div></div>";
            } else {
              header('Location: administration.php?alert=enrollment_success');
            }

        }

  }

  if( isset($_POST['btn_reject']) ){

    $query = "UPDATE icc_prac3.tbl_payment_manila
              SET tbl_payment_manila.payment_status = 'Rejected'
              WHERE tbl_payment_manila.studentNo = '$the_student_id'
              AND tbl_payment_manila.payment_status = 'Rejected'
              OR tbl_payment_manila.studentNo = '$the_student_id'
              AND tbl_payment_manila.payment_status = 'Not Approve'";

    $result = mysqli_query($conn , $query);

        if( !$result ){
            $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Error Occurred! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        } else {
          // $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
          //                     <strong> Rejected Student  <a class='close' data-dismiss='alert'>&times</a> </strong> 
          //                 </div></div></div>";
          header('Location: administration.php?alert=enrollment_failed');
        }


          

  }



  include('includes/header.php');
  include('../admin/navigation_admin2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="../admin/administration.php">Administration</a></li>
                          <li><a href="../admin/view_pending_choose_branch.php">Choose Branch</a></li>
                          <li><a href="../admin/pending_enrollment_manila.php">Pending Enrollment : Manila</a></li>
                          <li><a href="../admin/pending_enrollment_manila.php">View</a></li>
                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage; ?>
     
                    <div class="col-md-12">
                       <?php include('admin_nav2.php'); ?>
                       
                        <!--profile content here-->
                        <div class="container-fluid">

                          <?php 

                              $query = "SELECT studInfo.studentNo, 
                                        studInfo.first_name , 
                                        studInfo.last_name, 
                                        studInfo.course_id, 
                                        studInfo.year_level,
                                        studInfo.semester_num , 
                                        studInfo.status , 
                                        tbl_payment_manila.reference_code 
                                        FROM tbl_studentinfo_manila studInfo, 
                                        icc_prac3.tbl_payment_manila 
                                        WHERE studInfo.studentNo = '$the_student_id'
                                        AND tbl_payment_manila.studentNo = studInfo.studentNo 
                                        AND tbl_payment_manila.payment_status != 'Approved'";

                              $result = mysqli_query($conn,$query);

                              while( $row = mysqli_fetch_assoc($result)){

                                      $student_number = $row['studentNo'];
                                      $student_fname = $row['first_name'];
                                      $student_lastName = $row['last_name'];
                                      $student_course = $row['course_id'];
                                      $student_yrLevel = $row['year_level'];
                                      $student_semNumber = $row['semester_num'];
                                      $student_status = $row['status'];
                                      $refCode = $row['reference_code'];

                              }  

                           ?>

                            <div class="row">
                               <div class="col-xm-12">
                                   <table class="table table-responsive table-bordered">
                                        <tr>
                                          <th class="text-center">
                                            Student Number
                                          </th>
                                          <th class="text-center">
                                            Student Name
                                          </th>
                                          <th class="text-center">
                                            Student Course
                                          </th>
                                          <th class="text-center">
                                            Student Year
                                          </th>
                                          <th class="text-center">
                                            Status
                                          </th>
                                          <th class="text-center">
                                            Reference Number
                                          </th>

                                          <th class="text-center">
                                            View Payment
                                          </th>
                                          <th>Action</th>
                                        </tr>
                                        <tr>
                                         
                                          <td class="text-center">
                                          <?php echo $student_number; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                           <?php {echo $student_fname ,' ', $student_lastName;} ?>
                                          </td>
                                         
                                          <td class="text-center">
                                          <?php echo $student_course; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                            <?php {echo $student_yrLevel , '-' , $student_semNumber;} ?>
                                          </td>


                                          
                                          <td class="text-center">
                                            <?php echo $student_status; ?>
                                          </td>

                                          <td class="text-center">
                                             <?php echo $refCode; ?>
                                          </td>
                                         
                                          <td class="text-center">
                                          	<!-- <form action="view_payment.php?id=<?php echo $the_student_id?>&reference_code=<?php echo $refCode?>" method="post">
                                          		<input type="submit" name="btn_approve" class="btn btn-success btn-xs" value="View"><i class="fa fa-search"></i>
                                          	</form> -->
                                            <a href="view_payment_manila.php?id=<?php echo $the_student_id?>&reference_code=<?php echo $refCode?>" role="button" class="btn btn-xs btn-primary"><i class="fa fa-search"></i> &nbsp;View</a>
                                          </td>
                                          <td>



                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?view=<?php {echo $student_number; }?>" method="post">
                                              <button type="submit" name="btn_approve" class="btn btn-success btn-xs"><i class="fa fa-check"></i>&nbsp;Approve</button>
                                              <button type="submit" name="btn_reject" class="btn btn-danger btn-xs" ><i class="fa fa-close"></i>&nbsp;Reject</button>
                                            </form>
                                          </td>
                                          
                                        </tr>
                                  </table>

                                  <table class="table table-responsive table-bordered">
                                    <tr>
                                      <th class="text-center">
                                        Subject Code
                                      </th>
                                      <th class="text-center">
                                        Subject Description
                                      </th>
                                      <th class="text-center">
                                       Units
                                      </th>
                                    </tr>
                                    <tr>

                                     <?php 


                                     $flag= "pending";
                                     $query = "SELECT
                                              tbl_subject.subject_code,
                                              tbl_subject.subject_description , 
                                              tbl_subject.year_level , 
                                              tbl_subject.semester_number , 
                                              tbl_subject.units,
                                              tbl_grades_manila.remarks,
                                              tbl_studentinfo_manila.studentNo
                                              FROM 
                                              icc_prac3.tbl_subject,
                                              icc_prac3.tbl_studentinfo_manila,
                                              icc_prac3.tbl_grades_manila
                                              WHERE tbl_grades_manila.studentNo = tbl_studentinfo_manila.studentNo
                                              AND tbl_grades_manila.subject_code = tbl_subject.subject_code
                                              AND tbl_grades_manila.studentNo = '$the_student_id'
                                              AND tbl_studentinfo_manila.year_level <= tbl_subject.year_level 
                                              AND tbl_subject.semester_number = tbl_studentinfo_manila.semester_num      
                                              AND tbl_grades_manila.remarks = 'pending' 
                                              ORDER BY tbl_subject.year_level,
                                              tbl_subject.semester_number 
                                              LIMIT 0, 10";

                                  	$result = mysqli_query($conn,$query);

                                  	while( $row = mysqli_fetch_assoc($result) ){
                                  			$subject_code = $row['subject_code'];
                                  			$subject_description = $row['subject_description'];	
                                        $subject_units = $row['units'];
                                  			?>
                                  

                                      <td class="text-center">
                                      <?php echo $subject_code; ?>
                                      </td >
                                     
                                      <td class="text-center">
                                       <?php echo $subject_description; ?>
                                      </td>
                                     
                                     
                                      <td class="text-center">
                                      	<?php echo $subject_units; ?>
                                      </td>
                                  
                                    </tr>
                                       <?php 	}
                                   ?>

                                  </table>
                               </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
 