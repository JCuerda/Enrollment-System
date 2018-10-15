<?php

    include('session.php');
    require('includes/connection.php');
    include('functions.php');

     if ( $loggedUser_branch != 'manila' ) {
      header('Location: profile_manila.php');
    }


    $errorMessage = "";

    if( isset($_POST['btn_submit']) ){

        $verifyPassword = validateFormData(mysqli_real_escape_string($conn, $_POST['password']));
        $pendingNewPass = validateFormData(mysqli_real_escape_string($conn,$_POST['newpass']));
        $rependingPass =   validateFormData(mysqli_real_escape_string($conn,$_POST['new_pass']));


        $verify_query = "SELECT password FROM login_manila WHERE username ='$loggedUser'";
        
        $verify_result = mysqli_query($conn, $verify_query); 

        while( $row = mysqli_fetch_assoc($verify_result) ){
              $password = $row['password'];

              if(password_verify($verifyPassword,$password)){

                 if($pendingNewPass === $rependingPass){

                  $newPass = password_hash($pendingNewPass, PASSWORD_DEFAULT);

                  $update_query = "UPDATE login_manila
                          SET login_manila.password = '$newPass'
                          WHERE login_manila.username = $loggedUser";

                  $update_result = mysqli_query($conn,$update_query);

                  if ( !$update_result ){
                       die(mysqli_error($conn));
                      $errorMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                      <strong> NO DATA! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
                  } else {

                      header('Location:profile_manila.php?alert=changepassword_success');
                  }


                } else {
                  $errorMessage = "<div class='row'><div class='col-md-12'> <div class='alert alert-danger'>
                                      <strong>Password Do not Match <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
                }

              } else {

                $errorMessage = "<div class='row'><div class='col-md-12'> <div class='alert alert-danger'>
                                      <strong>DONT LEAVE BLANK FIELDS! PLEASE <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
              }
        }
        
    }

    if( isset($_POST['btn_cancel']) ){
      header('Location:profile_manila.php');
    }

    include('includes/header.php');
    include('navigation_manila.php');


?>
                                            
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">
              <?php 


              $query = "SELECT tbl_studentinfo_manila.*, 
                        tbl_course_info.course_description, 
                        tbl_academic_sem.semester_num, 
                        tbl_academic_year.year_level
                        FROM icc_prac3.tbl_studentinfo_manila
                        LEFT JOIN icc_prac3.tbl_academic_year ON tbl_studentinfo_manila.year_level = tbl_academic_year.id 
                        LEFT JOIN icc_prac3.tbl_academic_sem ON tbl_studentinfo_manila.semester_num = tbl_academic_sem.id 
                        LEFT JOIN icc_prac3.tbl_course_info ON tbl_studentinfo_manila.course_id = tbl_course_info.course_id
                        WHERE tbl_studentinfo_manila.studentNo ='$loggedUser'";

                $result = mysqli_query($conn, $query);  

                 while($row = mysqli_fetch_assoc($result)){

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
                                <li><a href="profile_manila.php">Home</a></li>
                                <li class="active"><a href="profile_manila.php">Profile</a></li>
                                <li class="active"><a href="change_password_manila.php">Change Password</a></li>
                            </ol>
                        
                    </div>
                </div>

               
                 <div class="row"> <!--Sidebar for Image and About-->
                    <div class="col-md-3">
                       <div class="row">
                            <div class="col-md-12" id="dp">
                                <img src="uploads/<?php echo $student_image;?>" alt="photo" class="center-block img-responsive" height = "500px" width = "500px" >   
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
                                   <div class="col-md-6"><?php echo $student_email; ?></div>
                                 </div>

                                <div class="row">
                                   <div class="col-md-5">Contact Number:</div>
                                   <div class="col-md-6"><?php echo $student_contactNum; ?></div>
                                 </div>

                                 <div class="row">
                                  <div class="col-md-5">My Links:</div>
                                   <div class="col-md-2">
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                   </div>

                                   <div class="col-md-2">
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                   </div>

                                   <div class="col-md-2">
                                        <a href=""><i class="fa fa-google"></i></a>
                                   </div>

                                 </div>
                            </div>   
                       </div>
                    </div>
                    <!-- end of photo-->
                    
                        
                        <!--profile content here-->
                        <div class="container-fluid">
                          
                          <div class="row">
                              
                              <div class="col-md-9 ">
                              <?php echo $errorMessage;?>
                               <?php include('profile_nav_manila.php'); ?>

                                   <div class="panel panel-success" >
                                      <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                     
                                      <div class="panel-heading">Change Password</div>
                                     
                                     <div class="panel-body">
                                        <!-- Password input-->
                                        <div class="form-group">
                                          <label class="col-md-5 control-label" for="password">Enter Current Password</label>
                                          <div class="col-md-4">
                                            <input id="password" name="password" type="password" placeholder="" class="form-control input-md">
                                            
                                          </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group">
                                          <label class="col-md-5 control-label" for="newpass">Enter New password</label>
                                          <div class="col-md-4">
                                            <input id="repass" name="newpass" type="password" placeholder="" class="form-control input-md">
                                          </div>
                                        </div>

                                         <!-- Password input-->
                                        <div class="form-group">
                                          <label class="col-md-5 control-label" for="new_pass">Re-Enter New password</label>
                                          <div class="col-md-4">
                                            <input id="repass" name="new_pass" type="password" placeholder="" class="form-control input-md">
                                          </div>
                                        </div>
                                      </div> <!--end of panel body-->

                                      <div class="panel-footer">
                                        <!-- Buttons -->
                                        <div class="form-group">
                                          <label class="col-md-5 control-label" for="btn_submit"></label>
                                          <div class="col-md-6">
                                            <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-success" style="margin-left: 100px;">Submit</button>
                                            <button type="submit" id="btn_cancel" name="btn_cancel" class="btn btn-default">Cancel</button>
                                          </div>
                                        </div>
                                      </div> <!--end of panel footer-->


                              
                                      </form>


                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>