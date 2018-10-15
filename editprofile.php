<?php

/*
   -> querying and updating basic information of student
  the information that will be displayed from the outside came from
  5 different tables.

   -> used mysql aliases in querying fields
*/


  include('session.php');
   $blankInputErr="";

    if ( $loggedUser_branch != 'caloocan' ) {
      header('Location: profile_manila.php');
  }


     require('includes/connection.php');
     include('functions.php');


     $query = "SELECT studNo.studentNo, 
               studNo.first_name , 
               studNo.last_name, 
               c.course_id, 
               c.course_description,
               ay.year_level, 
               ac.semester_num, 
               studNo.contact_number, 
               studNo.student_type, 
               studNo.address, 
               studNo.age,
               studNo.gender, 
               br.branch_name, 
               studNo.email_address, 
               studNo.student_type , 
               studNo.status 
               FROM tbl_studentinfo studNo , 
               tbl_course_info c , 
               tbl_branches br ,
               tbl_academic_year ay,
               tbl_academic_sem ac 
               WHERE studNo.studentNo = '$loggedUser' 
               AND studNo.year_level = ay.id 
               AND studNo.semester_num = ac.id";


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
                 } 

                 
    if( isset($_POST['btn_save']) ){


        $newContact = mysqli_real_escape_string($conn,$_POST['student_contactNum']);
        $newAddress = mysqli_real_escape_string($conn,$_POST['student_address']);
        $newAddress = mysqli_real_escape_string($conn,$_POST['student_address']);
        $newEmail = mysqli_real_escape_string($conn,$_POST['student_email']);

        $update_setting_query = "UPDATE tbl_studentinfo 
                                SET address = '$newAddress',
                                contact_number = '$newContact',
                                email_address = '$newEmail'
                                WHERE studentNo ='$studNo'";

        $update_result = mysqli_query($conn, $update_setting_query);

        if(!$update_result){
            echo "no rows updated";
        } else {
            header('Location: profile.php?alert=success');
        }

    } /*update end script*/

    if( isset($_POST['btn_cancel']) ){
      header('Location:profile.php');
    }

    include('includes/header.php');
    include('navigation_2.php');
?>
                             
       <div class="container" id="mainContainer">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12"> 
                        <ol class="breadcrumb">
                            <li><a href="profile.php">Home</a></li>
                            <li class="active"><a href="profile.php">Profile</a></li>
                            <li class="active"><a href="editprofile.php">Edit Basic Profile</a></li>
                        </ol> 
                    </div>
                </div>

                <div class="col-md-12">
                    <?php include('profile_nav2.php'); ?>
                        
                        <!--profile content here-->
                        <div class="container-fluid">
                        <div class="panel panel-success">
                        <div class="panel-heading"><strong> Basic Settings</strong></div>
                            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                        

                        <br/> <br/>
                        <div class="panel-content">
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="first_name" >First Name:</label>  
                              <div class="col-md-4">
                              <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md" disabled value='<?php echo $fname; ?>'>
                                
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="last_name">Last Name:</label>  
                              <div class="col-md-4">
                              <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md" disabled value='<?php echo $Lname; ?>'>
                                
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <?php echo $blankInputErr; ?>
                              <label class="col-md-4 control-label" for="student_contactNum">Contact Number:</label>  
                              <div class="col-md-4">
                              <input id="student_contactNum" name="student_contactNum" type="text" placeholder="Contact Number" class="form-control input-md" value='<?php echo $student_contactNum; ?>'>
                                
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="student_address">Address:</label>  
                              <div class="col-md-4">
                              <input id="student_address" name="student_address" type="text" placeholder="Address" class="form-control input-md" value='<?php echo $student_address; ?>'>
                                
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="student_email">E-Address:</label>  
                              <div class="col-md-4">
                              <input id="student_email" name="student_email" type="text" placeholder="Emai Address" class="form-control input-md" value='<?php echo $student_email; ?>'">
                                
                              </div>
                            </div>

                            </div> <!--end of panel content-->



                            <div class="panel-footer">
                            <!-- Button (Double) -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="btn_submit"></label>
                              <div class="col-md-8">
                                <input type="submit" name="btn_save" class="btn btn-success" style="margin-left: 185px;">
                                <button type="submit" id="btn_cancel" name="btn_cancel" class="btn btn-default">Cancel</button>
                              </div>
                            </div>
                            </div> <!--end of panel footer-->

                            </form>
                        </div>
                    
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>