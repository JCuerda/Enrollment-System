<?php 

 include('admin_session.php');
 include('functions.php');
 require('includes/connection.php');

  $alertMessage = "";

  if( isset($_GET['alert']) ){

        if( $_GET['alert'] == 'success' ){

         $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> Successfully Created An Account! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";

        } else if ( $_GET['alert'] == 'error' ){

          $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Error Creating Account! Account Already Created <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } 
  } 

  if( isset($_GET['emailAdd']) ){
      $the_student_email = $_GET['emailAdd'];
    } else {
      header('../admin/administration.php');
    }

   if( isset($_GET['student_number']) ){
      $the_student_number = $_GET['student_number'];
   }


    if( isset($_POST['btn_create']) ){

        $password = password_hash($the_student_number, PASSWORD_DEFAULT);

        $query = "INSERT INTO icc_prac3.login(
                  login.username,
                  login.password,
                  login.role)
                  VALUES(
                  '$the_student_number',
                  '$password',
                  'user')";

        $result = mysqli_query($conn,$query);
        if( !$result ){
            header('Location: view_student_shs.php?student_number='.$the_student_number .'&emailAdd='.$the_student_email.'&alert=error');
        } else {
               header('Location: view_student_shs.php?student_number='.$the_student_number .'&emailAdd='.$the_student_email.'&alert=success');
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
                          <li><a href="#">Student Enrollment View: Caloocan</a></li>

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
                                        studInfo.status,
                                        studInfo.email_address
                                        FROM tbl_studentinfo studInfo 
                                        WHERE studInfo.email_address = '$the_student_email'";

                              $result = mysqli_query($conn,$query);

                              while( $row = mysqli_fetch_assoc($result)){

                                      $student_number = $row['studentNo'];
                                      $student_fname = $row['first_name'];
                                      $student_lastName = $row['last_name'];
                                      $student_course = $row['course_id'];
                                      $student_yrLevel = $row['year_level'];
                                      $student_semNumber = $row['semester_num'];
                                      $student_status = $row['status'];
                                      $student_email = $row['email_address'];

                              }

                              $the_student_id = $student_number;  
                              $the_student_email = $student_email;  
                             
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

                                          <th class="text-center">Create New Account</th>
                                        </tr>
                                        <tr>
                                         
                                          <td class="text-center">
                                          <?php echo $student_number; 
                                                
                                          ?>
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
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?student_number=<?php {echo $student_number.'&emailAdd='.$the_student_email; }?>" method="post">
                                              <button type="submit" name="btn_create" class="btn btn-success btn-xs"><i class="fa fa-check"></i>&nbsp;Create Account</button>
                                            </form>
                                          </td>
                                        </tr>
                                        
                                  </table>

                                  <table class="table table-responsive table-bordered">
                                  <tr>
                                      <th colspan="4" class="text-center">List of Subjects to be Enrolled by the Student :</th>
                                  </tr>
                                    <tr><td colspan="3"></td></tr>

                                    <tr>
                                      <th class="text-center">
                                        Subject Code
                                      </th>
                                      <th class="text-center">
                                        Subject Description
                                      </th>

                                    </tr>

                                     <?php 

                                       $query = "SELECT tbl_subject.subject_code,
                                                      tbl_subject.subject_description,
                                                      tbl_grades.remarks , 
                                                      tbl_studentinfo.studentNo 
                                                      FROM icc_prac3.tbl_subject , 
                                                      icc_prac3.tbl_studentinfo, 
                                                      icc_prac3.tbl_grades 
                                                      WHERE tbl_subject.year_level = tbl_studentinfo.year_level 
                                                      AND tbl_subject.semester_number = tbl_studentinfo.semester_num 
                                                      AND tbl_studentinfo.studentNo = '$the_student_id' 
                                                      AND tbl_subject.subject_code = tbl_grades.subject_code 
                                                      AND tbl_grades.studentNo = tbl_studentinfo.studentNo
                                                      ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

                                        $result = mysqli_query($conn,$query);
                                        if( mysqli_num_rows($result) == 0 ){
                                          echo " <tr>  
                                                    <td class='text-center' colspan = '2'>
                                                    No Subject Available
                                                    </td >   
                                                </tr>";
                                        } else {

                                          while( $row = mysqli_fetch_assoc($result) ){
                                            $subject_code = $row['subject_code'];
                                            $subject_description = $row['subject_description']; 
                                        
                                        
                                    ?>

                                     <tr>  

                                      <td class="text-center">
                                      <?php echo $subject_code; ?>
                                      </td >
                                     
                                      <td class="text-center">
                                       <?php echo $subject_description; ?>
                                      </td>
                                     
                                    </tr>
                                       <?php }
                                        }
                                   ?>

                                  </table>

                               </div>

                               </div> <!--end of row-->

                                    <div class="row">
                                        <div class="col-md-11"></div>
                                            <!--   <input type="submit" name="btn_proceed" class="btn btn-success btn-md" value=""> -->
                                           
                                            <div class="col-md-1">
                                                <a href="../admin/administration.php?alert=new_student_success" class="btn btn-success btn-md" role="button" style="margin-left: -20px;">Proceed</a>
                                            </div>
                                    </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of main container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
 