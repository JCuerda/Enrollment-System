<?php 

 include('admin_session.php');
 include('functions.php');
 require('includes/connection.php');

  $alertMessage = "";

  if( isset($_GET['student_number']) ){
      $the_student_id = $_GET['student_number'];
    } else {
      header('../admin/manage_choose_branch.php');
    }

// Update Student Remarks to "Completed"
if( isset($_POST['btn_completed']) ){

    $student_number = validateFormData(mysqli_real_escape_string($conn,$_GET['student_number']));
    $subject = $_POST['subject'];
    while( list($key,$value) = @each($subject) ){
      // echo $value . "<br>";
      $update_query = "UPDATE icc_prac3.tbl_grades , icc_prac3.tbl_studentinfo
                      SET tbl_grades.remarks = 'Completed',
                      tbl_studentinfo.status = 'Not Enrolled'
                      WHERE tbl_studentinfo.studentNo = '$student_number' 
                      AND tbl_grades.studentNo = '$student_number' 
                      AND tbl_grades.subject_code = '$value'";
      $udpate_result = mysqli_query($conn,$update_query);
    if(!$udpate_result){
       $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                               <strong>Error Occured Updating Grade Remarks <a class='close' data-dismiss='alert'>&times</a> </strong> 
                           </div></div></div>";

    } else {
       $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                               <strong>SUccessfully Updated Student Remarks <a class='close' data-dismiss='alert'>&times</a> </strong> 
                           </div></div></div>";
    }

  }

}
// Update Student Remarks to "Failed"
  if( isset($_POST['btn_failed']) ){
    $student_number = validateFormData($_GET['student_number']);  
    $subject = $_POST['subject'];
    while( list($key,$value) = @each($subject) ){
      // echo $value . "<br>";
    $update_query = "UPDATE icc_prac3.tbl_grades , icc_prac3.tbl_studentinfo
                    SET tbl_grades.remarks = 'Failed',
                    tbl_studentinfo.status = 'Not Enrolled'
                    WHERE tbl_studentinfo.studentNo = '$student_number' 
                    AND tbl_grades.studentNo = '$student_number'
                    AND tbl_grades.subject_code = '$value'";

      $udpate_result = mysqli_query($conn,$update_query);
    if(!$udpate_result){
       $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                               <strong>Error Occured Updating Grade Remarks <a class='close' data-dismiss='alert'>&times</a> </strong> 
                           </div></div></div>";

    } else {
       $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                               <strong>SUccessfully Updated Student Remarks <a class='close' data-dismiss='alert'>&times</a> </strong> 
                           </div></div></div>";
    }

  }

}
// Update Student Remarks to "Incomplete"
  if( isset($_POST['btn_incomplete']) ){

    $student_number = validateFormData($_GET['student_number']); 
    $subject = $_POST['subject'];
    while( list($key,$value) = @each($subject) ){
      // echo $value . "<br>";
    $update_query = "UPDATE icc_prac3.tbl_grades , icc_prac3.tbl_studentinfo
                    SET tbl_grades.remarks = 'Incomplete',
                    tbl_studentinfo.status = 'Not Enrolled'
                    WHERE tbl_studentinfo.studentNo = '$student_number' 
                    AND tbl_grades.studentNo = '$student_number'
                    AND tbl_grades.subject_code = '$value'";

    $udpate_result = mysqli_query($conn,$update_query);

    if(!$udpate_result){
       $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                               <strong>Error Occured Updating Grade Remarks <a class='close' data-dismiss='alert'>&times</a> </strong> 
                           </div></div></div>";

    } else {
       $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                               <strong>SUccessfully Updated Student Remarks <a class='close' data-dismiss='alert'>&times</a> </strong> 
                           </div></div></div>";
    }

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
                          <li><a href="../admin/manage_choose_branch.php">Manage Student : Caloocan</a></li>

                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage; ?>
     
                    <div class="col-md-12">
                       <?php include('admin_nav2.php'); ?>
                       
                        <!--profile content here-->
                        <div class="container-fluid">
                        <?php $alertMessage; ?>

                          <?php 

                              $query = "SELECT studInfo.studentNo, 
                                        studInfo.first_name , 
                                        studInfo.last_name, 
                                        studInfo.course_id, 
                                        studInfo.year_level,
                                        studInfo.semester_num , 
                                        studInfo.status 
                                        FROM tbl_studentinfo studInfo 
                                        WHERE studInfo.studentNo = '$the_student_id'";

                              $result = mysqli_query($conn,$query);

                              while( $row = mysqli_fetch_assoc($result)){

                                      $student_number = $row['studentNo'];
                                      $student_fname = $row['first_name'];
                                      $student_lastName = $row['last_name'];
                                      $student_course = $row['course_id'];
                                      $student_yrLevel = $row['year_level'];
                                      $student_semNumber = $row['semester_num'];
                                      $student_status = $row['status'];

                              }  

                           ?>

                            <div class="row">
                               <div class="col-sm-12">
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
                                            Current Student Year
                                          </th>
                                          <th class="text-center">Edit Scholarship Grant</th>


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
                                             <a href="../admin/edit_scholarship_grant.php?student_number=<?php echo $student_number; ?>" role="button" ><i class="fa fa-pencil-square"></i></a> 

                                          </td>

                                       


                                        </tr>
                                        
                                  </table>

                                  <table class="table table-responsive table-bordered">
                                  <tr>
                                      <th colspan="5" class="text-center">List of Subjects Currently Enrolled by the Student :</th>
                                  </tr>
                                    <tr><td colspan="5"></td></tr>

                                    <tr>
                                      <th class="text-center"></th>
                                      <th class="text-center">
                                        Subject Code
                                      </th>
                                      <th class="text-center">
                                        Subject Description
                                      </th>
                                      <th class="text-center">
                                       Remarks
                                      </th>
<!--                                       <th class="text-center">
                                        Actions
                                      </th> -->
                                    </tr>
                                  

                                     <?php 


                                    $query = "SELECT
                                              tbl_subject.subject_code,
                                              tbl_subject.subject_description , 
                                              tbl_subject.year_level , 
                                              tbl_subject.semester_number , 
                                              tbl_subject.units,
                                              tbl_grades.remarks,
                                              tbl_studentinfo.studentNo
                                              FROM 
                                              icc_prac3.tbl_subject,
                                              icc_prac3.tbl_studentinfo,
                                              icc_prac3.tbl_grades
                                              WHERE tbl_grades.studentNo = tbl_studentinfo.studentNo
                                              AND tbl_grades.subject_code = tbl_subject.subject_code
                                              AND tbl_studentinfo.year_level = tbl_subject.year_level
                                              AND tbl_subject.semester_number = tbl_studentinfo.semester_num
                                              AND tbl_grades.studentNo = '$the_student_id'
                                              AND tbl_grades.remarks !='Completed'
                                              ORDER BY FIELD(tbl_grades.remarks, 'On-going', 'NOT ENROLLED' , 'Completed' ), 
                                              tbl_grades.subject_code ASC LIMIT 0, 10";


                                    $result = mysqli_query($conn,$query);

                                    while( $row = mysqli_fetch_assoc($result) ){
                                        $subject_code = $row['subject_code'];
                                        $subject_description = $row['subject_description']; 
                                        $subject_remarks = $row['remarks'];
                                    ?>
                                     <tr>
                                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?student_number=<?php {echo $student_number; }?>" method="post">  
                                      <td class="text-center"><input type="checkbox" name="subject[]" value="<?php echo $subject_code; ?>"></td>

                                      <td class="text-center">
                                      <?php echo $subject_code; ?>
                                      </td >
                                     
                                      <td class="text-center">
                                       <?php echo $subject_description; ?>
                                      </td>
                                     
                                     
                                      <td class="text-center">
                                        <?php echo $subject_remarks; ?>
                                      </td>
                                  
                                    </tr>
                                       <?php  }
                                   ?>
                                   <td colspan="2" class="text-center">Action</td>
                                   <td colspan="2" class="text-center">
                                        <div class="col-md-8"></div>

                                          <input type="submit" name="btn_completed" class="btn btn-success btn-xs" value="Completed">
                                          <input type="submit" name="btn_failed" class="btn btn-danger btn-xs" value="Failed">
                                          <input type="submit" name="btn_incomplete" class="btn btn-primary btn-xs" value="Incomplete">
                                        </form>
                              
                                  </table>
       
                               </div>
                               </div> <!--end of row-->

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of main container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
 