<?php 

  include('session.php');
  require('includes/connection.php');
  include('enrollment_session.php');

  $alertMessage = "";

  if( isset($_POST['btn_proceed']) ){

      header('Location: payment.php');
  }


  include('includes/header.php');
  include('navigation_2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="profile.php">Home</a></li>
                          <li><a href="enrollment.php">Enrollment </a></li>

                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage; ?>
     
                    <div class="col-md-12">
                       <?php include('profile_nav2.php'); ?>
                       
                        <!--profile content here-->
                        <div class="container-fluid">

                          <?php 

                              $query = "SELECT studInfo.studentNo, studInfo.first_name , studInfo.last_name, studInfo.course_id, studInfo.year_level,studInfo.semester_num , studInfo.status FROM tbl_studentinfo studInfo WHERE studInfo.studentNo = '$loggedUser'";

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

                                       <!--    <th class="text-center">
                                            Action
                                          </th> -->
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
                                         

                                        </tr>
                                  </table>

                                  <table class="table table-responsive table-bordered">
                                  <tr>
                                      <th colspan="3" class="text-center">List of Subjects Available for Enrollment :</th>
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
                                       Units
                                      </th>
                                    </tr>
                                  

                                     <?php 



                                     $yr_query = "SELECT tbl_studentinfo.year_level , 
                                                  tbl_studentinfo.semester_num 
                                                  FROM icc_prac3.tbl_studentinfo
                                                  WHERE tbl_studentinfo.studentNo = '$loggedUser'";

                                            $result = mysqli_query($conn,$query);

                                            while( $row = mysqli_fetch_assoc($result) ){
                                                $year = $row['year_level'];
                                                $sem = $row['semester_num'];
                                            }

                                          if( $sem == 2 ){
                                            $enrollment_year = $year + 1;
                                          } else {
                                            $enrollment_year = $year;
                                          }
                                          
                                    $flag = "Completed";
        
                                    $query = "SELECT tbl_subject.subject_code,
                                              tbl_subject.subject_description,
                                              tbl_grades.remarks , tbl_subject.units, 
                                              tbl_studentinfo.studentNo 
                                              FROM icc_prac3.tbl_subject , 
                                              icc_prac3.tbl_studentinfo, 
                                              icc_prac3.tbl_grades 
                                              WHERE tbl_subject.year_level = '$enrollment_year'
                                              AND tbl_subject.semester_number != tbl_studentinfo.semester_num 
                                              AND tbl_grades.studentNo = tbl_studentinfo.studentNo
                                              AND tbl_studentinfo.studentNo = '$loggedUser' 
                                              AND tbl_subject.subject_code = tbl_grades.subject_code 
                                             -- AND tbl_grades.remarks != 'Completed'
                                              ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

                                    $result = mysqli_query($conn,$query);

                                    while( $row = mysqli_fetch_assoc($result) ){
                                        $subject_code = $row['subject_code'];
                                        $subject_description = $row['subject_description']; 
                                        $subject_units = $row['units'];
                                    ?>
                                     <tr>  

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
                                       <?php  }

                                       mysqli_close($conn);
                                   ?>

                                  </table>

                               </div>
                               </div> <!--end of row-->

                                    <div class="row">
                                        <div class="col-md-11"></div>
                                          
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                              <input type="submit" name="btn_proceed" class="btn btn-success btn-md" value="Proceed">
                                            </form>

                                    </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of main container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
 