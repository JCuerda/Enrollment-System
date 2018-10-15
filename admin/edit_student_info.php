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
        }
       
    }

    if( isset($_GET['branch_id']) ){
        $the_branch = $_GET['branch_id'];
    }

    if( isset($_GET['student_number']) ){
      $the_student_number = $_GET['student_number'];
    }


    if( isset($_POST['btnSubmit']) ){

      $extension = $_POST['extension'];
      $newStudent_fName = validateFormdata(mysqli_real_escape_string($conn,$_POST['fName']));
      $newStudent_lastName = validateFormdata(mysqli_real_escape_string($conn,$_POST['lastName']));
      $newStudent_mName = validateFormdata(mysqli_real_escape_string($conn,$_POST['mName']));
      $newStudent_address = validateFormdata(mysqli_real_escape_string($conn,$_POST['address']));
      $newStudent_age = validateFormdata(mysqli_real_escape_string($conn,$_POST['age']));
      $newStudent_gender= validateFormdata(mysqli_real_escape_string($conn,$_POST['gender']));
      $newStudent_contactNumber = validateFormdata(mysqli_real_escape_string($conn,$_POST['contactNumber']));
      $newStudent_emailAdd = validateFormdata(mysqli_real_escape_string($conn,$_POST['emailAdd'])) . $extension;
      if( !$newStudent_fName ||  !$newStudent_lastName ||  !$newStudent_mName || !$newStudent_address || !$newStudent_age || !$newStudent_gender || !$newStudent_contactNumber || !$newStudent_emailAdd){

          header('Location: edit_student_info.php?alert=blank_input');

      } else {
    
          $newStudentinfo_query = "UPDATE icc_prac3.tbl_studentinfo 
                                  SET tbl_studentinfo.first_name = '$newStudent_fName',
                                  tbl_studentinfo.last_name = '$newStudent_lastName', 
                                  tbl_studentinfo.middle_name = '$newStudent_mName',  
                                  tbl_studentinfo.address = '$newStudent_address', 
                                  tbl_studentinfo.age = '$newStudent_age',
                                  tbl_studentinfo.gender = '$newStudent_gender', 
                                  tbl_studentinfo.contact_number = '$newStudent_contactNumber',  
                                  tbl_studentinfo.email_address = '$newStudent_emailAdd'
                                  WHERE tbl_studentinfo.studentNo = '$the_student_number'";
                   
                        
            $newStudent_result = mysqli_query($conn, $newStudentinfo_query);
            if( !$newStudent_result ){
              $errorMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                            <strong>Something Went Wrong Editing Student Information!<a class='close' data-dismiss='alert'>&times</a> </strong> 
                        </div></div></div>";
            } else {
               header('Location: ../admin/administration.php?alert=edit_success'); 
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
                        <li class="active"><a href="../admin/edit_student_info_choose_branch.php">Choose Branch</a></li>

                    </ol> 
            </div>
        </div>

              <?php echo  $errorMsg;  ?>
        
        <?php include('admin_nav2.php'); ?>

        <div class="panel panel-success">
        <div class="panel-heading">Edit Student Information</div>
  


        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?student_number=<?php echo $the_student_number; ?>" method="post">
           <div class="panel-content">

           <?php 

              $query = "SELECT * FROM tbl_studentinfo
                       WHERE tbl_studentinfo.studentNo = '$the_student_number'";

              $result = mysqli_query($conn,$query);

              while( $row = mysqli_fetch_assoc($result) ){

                  $student_fname = $row['first_name'];
                  $student_Lname = $row['last_name'];
                  $student_mname = $row['middle_name'];
                  $student_age = $row['age'];
                  $student_gender = $row['gender'];
                  $student_email = $row['email_address'];
                  $student_address = $row['address'];
                  $student_contactNum = $row['contact_number'];

              }

            ?>
         

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="fName">First Name:</label>  
              <div class="col-md-4">
              <input id="fName" name="fName" type="text" placeholder="First Name" class="form-control input-md" value="<?php echo $student_fname;?>">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="lastName">Last Name:</label>  
              <div class="col-md-4">
              <input id="lastName" name="lastName" type="text" placeholder="Last Name" class="form-control input-md" value="<?php echo $student_Lname;?>">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="mName">Middle Name</label>  
              <div class="col-md-4">
              <input id="mName" name="mName" type="text" placeholder="Middle Name:" class="form-control input-md" value="<?php echo $student_mname;?>">

              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="age">Age:</label>  
              <div class="col-md-4">
              <input id="age" name="age" type="text" placeholder="Age" class="form-control input-md" value="<?php echo $student_age;?>">
              </div>
            </div>

            
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="gender">Gender</label>
              <div class="col-md-4">
                <select id="gender" name="gender" class="form-control" value="<?php echo $student_gender;?>">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>

                     <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="emailAdd">Email Address</label>  
              <div class="col-md-2">
              <input name="emailAdd" type="text" placeholder="Email Address" class="form-control input-md" >
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
              <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md" value="<?php echo $student_address;?>">
              </div>
            </div>

                         <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="fName">Contact Number:</label>  
              <div class="col-md-4">
              <input name="contactNumber" type="text" placeholder="Contact Number" class="form-control input-md" value="<?php echo $student_contactNum;?>">
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