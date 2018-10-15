<?php 

  include('session.php');
  require('includes/connection.php');

  $alertMessage = "";

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
                       <?php include('profile_navigation.php'); ?>
                       
                        <!--profile content here-->
                        <div class="container-fluid">

                          <?php 

                              $query = "SELECT studInfo.studentNo, 
                              studInfo.first_name , 
                              studInfo.last_name, 
                              studInfo.course_id, 
                              studInfo.year_level,
                              studInfo.semester_num , 
                              studInfo.status 
                              FROM tbl_studentinfo studInfo 
                              WHERE studInfo.studentNo = '$loggedUser'";

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

                                          <th class="text-center">
                                            Action
                                          </th>
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
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $loggedUser;?>" method="post">
                                              <input type="submit" name="btn_enroll" class="btn btn-success btn-xs" value="Enroll">
                                            </form>
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

                                     //subject for changes when curriculum received
                                    $query = "SELECT tbl_subject.subject_code, tbl_subject.subject_description , tbl_subject.year_level , tbl_subject.semester_number , tbl_subject.units FROM tbl_subject , tbl_curriculum , tbl_studentinfo WHERE tbl_curriculum.course_id = tbl_studentinfo.course_id AND tbl_studentinfo.studentNo = '$loggedUser' AND tbl_studentinfo.year_level < tbl_subject.year_level AND tbl_studentinfo.semester_num != tbl_subject.semester_number";

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
                                       <?php  }
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
 