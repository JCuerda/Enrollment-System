<?php

    include('includes/connection.php');
    include('admin_session.php');
    include('functions.php');

    $errorMsg = "";

    if( isset($_GET['alert']) ) {
        if($_GET['alert'] == 'blank_input'){
             $errorMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                        <strong>Dont leave blank fields!<a class='close' data-dismiss='alert'>&times</a> </strong> 
                    </div></div></div>";
        } else if ($_GET['alert'] == 'invalid_name'){
             $errorMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                        <strong>Invalid Name!<a class='close' data-dismiss='alert'>&times</a> </strong> 
                    </div></div></div>";
        } else if ($_GET['alert'] == 'invalid_contact_number'){
             $errorMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                        <strong>Invalid Contact Number! Contact Number must only consist of Numbers<a class='close' data-dismiss='alert'>&times</a> </strong> 
                    </div></div></div>";
        }
       
    }

    if( isset($_GET['branch_id']) ){
        $the_branch = $_GET['branch_id'];
    }


    if( isset($_POST['btnSubmit']) ){


      $extension = $_POST['extension'];

      $newStudent_courseID = validateFormdata(mysqli_real_escape_string($conn,$_POST['course']));
      $newStudent_fName = validateFormdata(mysqli_real_escape_string($conn,$_POST['fName']));
      $newStudent_lastName = validateFormdata(mysqli_real_escape_string($conn,$_POST['lastName']));
      $newStudent_mName = validateFormdata(mysqli_real_escape_string($conn,$_POST['mName']));
      $newStudent_address = validateFormdata(mysqli_real_escape_string($conn,$_POST['address']));
      $newStudent_age = validateFormdata(mysqli_real_escape_string($conn,$_POST['age']));
      $newStudent_gender= validateFormdata(mysqli_real_escape_string($conn,$_POST['gender']));
      $newStudent_contactNumber = validateFormdata(mysqli_real_escape_string($conn,$_POST['contactNumber']));
      $newStudent_emailAdd = validateFormdata(mysqli_real_escape_string($conn,$_POST['emailAdd'])) . $extension;
      $newStudent_grant = validateFormdata(mysqli_real_escape_string($conn,$_POST['grant']));
      if( !$newStudent_courseID || !$newStudent_fName ||  !$newStudent_lastName ||  !$newStudent_mName || !$newStudent_address || !$newStudent_age || !$newStudent_gender || !$newStudent_contactNumber || !$newStudent_emailAdd){

          header('Location: enroll_student_shs.php?alert=blank_input');

      } else if( !ctype_alpha(str_replace(' ', '',$newStudent_fName)) || !ctype_alpha(str_replace(' ', '',$newStudent_lastName)) || !ctype_alpha(str_replace(' ', '',$newStudent_mName)) ){
          header('Location: enroll_student_shs.php?alert=invalid_name');
      } else if( !ctype_digit($newStudent_contactNumber) ){
          header('Location: enroll_student_shs.php?alert=invalid_contact_number');
      } else {
    
      $newStudent_branch = '1';
      $newStudentinfo_yearLevel = "11";
      $newStudentinfo_semNum = "0";
      $newStudentinfo_studentType = "regular";
      $newStudentinfo_status = "pending";

          $newStudentinfo_query = "INSERT INTO icc_prac3.tbl_studentinfo (
                                  tbl_studentinfo.studentNo, 
                                  tbl_studentinfo.course_id, 
                                  tbl_studentinfo.first_name, 
                                  tbl_studentinfo.last_name, 
                                  tbl_studentinfo.middle_name, 
                                  tbl_studentinfo.branch_id, 
                                  tbl_studentinfo.address, 
                                  tbl_studentinfo.age, 
                                  tbl_studentinfo.gender, 
                                  tbl_studentinfo.contact_number, 
                                  tbl_studentinfo.email_address,
                                  tbl_studentinfo.grant_id, 
                                  tbl_studentinfo.year_level, 
                                  tbl_studentinfo.semester_num, 
                                  tbl_studentinfo.student_type, 
                                  tbl_studentinfo.status,
                                  tbl_studentinfo.new_old) 
                                  VALUES (
                                  '', 
                                  '$newStudent_courseID',
                                   '$newStudent_fName',
                                   '$newStudent_lastName', 
                                   '$newStudent_mName', 
                                   '$newStudent_branch', 
                                   '$newStudent_address',
                                   '$newStudent_age',
                                   '$newStudent_gender',
                                   '$newStudent_contactNumber', 
                                   '$newStudent_emailAdd',
                                   '$newStudent_grant',
                                   '$newStudentinfo_yearLevel',
                                   '$newStudentinfo_semNum', 
                                   '$newStudentinfo_studentType', 
                                   '$newStudentinfo_status',
                                   'new')";


        $newStudent_result = mysqli_query($conn, $newStudentinfo_query);


        if( !$newStudent_result ){

          $errorMsg = "<div class='row'><div class='col-md-12' ><div class='alert alert-danger'>
                              <strong> NO STUDENT ENROLLED <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        } else {

           $curriculum_enrollment_query = "SELECT tbl_subject.subject_code, 
                                          tbl_studentinfo.studentNo 
                                          FROM icc_prac3.tbl_subject ,
                                          icc_prac3.tbl_curriculum , 
                                          icc_prac3.tbl_studentinfo 
                                          WHERE tbl_subject.course_curriculum  = tbl_curriculum.curriculum_id 
                                          AND tbl_studentinfo.new_old = 'new' 
                                          AND tbl_curriculum.course_id = tbl_studentinfo.course_id";

            $result = mysqli_query($conn,$curriculum_enrollment_query);

              if (mysqli_num_rows($result)){

                while( $row = mysqli_fetch_assoc($result) ){
                  
                  $subject_code = $row['subject_code'];
                  $studentNo = $row['studentNo'];

                  $enroll_query = "INSERT INTO icc_prac3.tbl_grades (
                                  tbl_grades.studentNo,
                                  tbl_grades.subject_code,
                                  tbl_grades.remarks)
                                  VALUES (
                                  '$studentNo',
                                  '$subject_code',
                                  'NOT ENROLLED')";

                  $enroll_result = mysqli_query($conn,$enroll_query);
                  if(!$enroll_result){
                    $errorMsg = "<div class='row'><div class='col-md-12' ><div class='alert alert-danger'>
                              <strong> NO STUDENT ENROLLED - ERROR OCCURED<a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
                  } 
                }

              } else {
                     $errorMsg = "<div class='row'><div class='col-md-12' ><div class='alert alert-danger'>
                        <strong> NO STUDENT ENROLLED - ERROR OCCURED<a class='close' data-dismiss='alert'>&times</a> </strong> 
                    </div></div></div>";
              }

              header('Location: ../admin/view_student_shs.php?emailAdd=' . $newStudent_emailAdd); 
        }
        
      }

 }

     include('includes/header.php');
     include('navigation_admin2.php');

?>        
     <div class="container" id="mainContainer">
        <div class="row">
            <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="../admin/administration.php">Administration</a></li>
                        <li class="active"><a href="../admin/enroll_student_shs_choose_branch.php">Choose Branch</a></li>
                         <li class="active"><a href="../admin/enroll_student_shs.php?branch_id=<?php echo $the_branch;?>">Enrollment Form : Caloocan</a></li>

                    </ol> 
            </div>
        </div>

              <?php echo  $errorMsg;  ?>
        
        <?php include('admin_nav2.php'); ?>

        <div class="panel panel-success">
        <div class="panel-heading">Enrollment Form</div>
  


        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
           <div class="panel-content">
         

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="course">Course :</label>  
              <div class="col-md-6">
              <select id="course" name="course" class="form-control" >

                    <?php 
                      $query = "SELECT * FROM icc_prac3.tbl_course_info";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc( $result ) ) {
                        
                        $course_name = $row['course_description'];
                        $course_id = $row['course_id'];

                      ?>                     
                         <option value="<?php echo $course_id; ?>"><?php echo $course_name; ?></option>

                     <?php }

                 
                     ?>

                </select>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="grant">Scholarship Grant :</label>  
              <div class="col-md-6">
              <select id="grant" name="grant" class="form-control" >

                    <?php 
                      $query = "SELECT * FROM icc_prac3.tbl_grants";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc( $result ) ) {
                         
                        $grant_id = $row['grant_id'];
                        $grant_name = $row['grant_description'];
                       
                      ?>                     
                         <option value="<?php echo $grant_id; ?>"><?php echo $grant_name; ?> </option>

                     <?php }

                      mysqli_close($conn);
                     ?>

                </select>

              </div>
            </div>


  

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="fName">First Name:</label>  
              <div class="col-md-4">
              <input id="fName" name="fName" type="text" placeholder="First Name" class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="lastName">Last Name:</label>  
              <div class="col-md-4">
              <input id="lastName" name="lastName" type="text" placeholder="Last Name" class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="mName">Middle Name</label>  
              <div class="col-md-4">
              <input id="mName" name="mName" type="text" placeholder="Middle Name:" class="form-control input-md">

              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="age">Age:</label>  
              <div class="col-md-4">
              <input id="age" name="age" type="text" placeholder="Age" class="form-control input-md">
              </div>
            </div>

            
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="gender">Gender</label>
              <div class="col-md-4">
                <select id="gender" name="gender" class="form-control">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>

                     <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="emailAdd">Email Address</label>  
              <div class="col-md-2">
              <input name="emailAdd" type="text" placeholder="Email Address" class="form-control input-md">
              </div>
              <div class="col-md-2" style="margin-left: -20px;"> 

                  <select id="extension" name="extension" class="form-control">
                         <option value="@gmail.com">@gmail.com</option>
                         <option value="@yahoo.com">@yahoo.com</option>
                </select>


              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="address">Address:</label>  
              <div class="col-md-5">
              <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md">
              </div>
            </div>

                         <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="fName">Contact Number:</label>  
              <div class="col-md-4">
              <input name="contactNumber" type="text" placeholder="Contact Number" class="form-control input-md">
              </div>
            </div>

            <br><br>
        </div> <!--end of panel content-->

        <div class="panel-footer">
            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="btnSubmit"></label>
              <div class="col-md-8">
                <button id="btnSubmit" name="btnSubmit" class="btn btn-success" style="margin-left: 200px;">Submit</button>
                <button id="btnCancel" name="btnCancel" class="btn btn-default">Cancel</button>
              </div>
            </div>
        </div>
        </form>


        </div> <!--end of panel-->

    </div><!--end of main -->

 
    
<?php include ('includes/footer.php');  ?>