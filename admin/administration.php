<?php

  include('admin_session.php');
  $alertMessage = "";
  if(isset( $_GET['alert'] )){

     if( $_GET['alert'] == 'success' ){

         $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Successfully Updated Information <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";

     } else if ( $_GET['alert'] == 'changepassword_success' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> PASSWORD CHANGED SUCCESSFULLY! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";

     } else if ( $_GET['alert'] == 'enrollment_success' ){
         
          $alertMessage="<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Successfully Approved Student Pending Enrollment <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";

     } else if( $_GET['alert'] == 'enrollment_failed' ){

           $alertMessage ="<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> Successfully Rejected Student Pending Enrollment <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if( $_GET['alert'] == 'grant_error' ){

           $alertMessage ="<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Error Changing Scholarship Grant <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if( $_GET['alert'] == 'grant_success' ){

           $alertMessage ="<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> Successfully Changed Scholarship Grant <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'new_student_success'){
           $alertMessage ="<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> Successfully Enrolled New Student and Ready to be Finalized! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'edit_success'){
           $alertMessage ="<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> Successfully Updated Student Information! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'already_backup'){
           $alertMessage ="<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Already Have a backup for today! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } else if ( $_GET['alert'] == 'backup_success'){
           $alertMessage ="<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong> Backup Successfully done! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     }

  }

  require('includes/connection.php');
  include('includes/header.php');
  include('../admin/navigation_admin2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="../admin/Administration.php">Administration</a></li>
                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage; ?>
     
                    <div class="col-md-12 ">
                    
                       <?php  include('admin_nav2.php');  ?>
                       
                        <!--profile content here-->
                        <div class="container-fluid">
                            <div class="row">
                               <div class="col-md-12">

                               <img src="../admin/images/ewan.png" class="img-responsive">
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
 