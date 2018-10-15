<?php

    include('admin_session.php');
    require('includes/connection.php');

    $errorMessage = "";

    if( isset($_POST['btn_submit']) ){

        $verifyPassword = mysqli_real_escape_string($conn, $_POST['password']);
        $pendingNewPass = mysqli_real_escape_string($conn,$_POST['newpass']);
        $rependingPass =  mysqli_real_escape_string($conn,$_POST['new_pass']);


        $verify_query = "SELECT login.password FROM icc_prac3.login WHERE login.username ='$loggedUser'";
        
        $verify_result = mysqli_query($conn, $verify_query); 

        while( $row = mysqli_fetch_assoc($verify_result) ){
              $password = $row['password'];

              if(password_verify($verifyPassword,$password)){

                 if($pendingNewPass === $rependingPass){

                  $newPass = password_hash($pendingNewPass, PASSWORD_DEFAULT);

                  $update_query = "UPDATE icc_prac3.login
                          SET login.password = '$newPass'
                          WHERE login.username = $loggedUser";

                  $update_result = mysqli_query($conn,$update_query);

                  if ( !$update_result ){
                       die(mysqli_error($conn));
                      $errorMessage = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-danger'>
                                      <strong> NO DATA! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
                  } else {

                      header('Location:../admin/administration.php?alert=changepassword_success');
                  }


                } else {
                  $errorMessage = "<div class='row'><div class='col-md-10 col-md-offset-1'> <div class='alert alert-danger'>
                                      <strong>Password Did not Match <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
                }

              } else {

                $errorMessage = "<div class='row'><div class='col-md-10 col-md-offset-1'> <div class='alert alert-danger'>
                                      <strong>NO USER <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";

              } // end of password_verify() if else statement.
        }    
    }

    include('includes/header.php');
    include('navigation_admin2.php');

?>                                       
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="row">
                      <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="../admin/Administration.php">Administration</a></li>
                            <li><a href="../admin/admin_changePW.php">Change Password</a></li>
                        </ol>
                      </div>
                   </div>
                </div>
               
                 <div class="row">                          
                        <?php include('../admin/admin_nav2.php'); ?>
                        
                        <!--profile content here-->
                        <div class="container-fluid">
                           <?php echo $errorMessage;?>
                          <div class="row">
                              <div class="col-md-10 col-md-offset-1">
                                   <div class="panel panel-success" ">
                                      <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                     
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
                                              <input id="repass" name="new_pass" type="password" placeholder="" class="form-control ">
                                            </div>
                                          </div>
                                        </div> <!--end of panel-body-->
                                       
                                        <div class="panel-footer">
                                          <!-- Buttons -->
                                          <div class="form-group">
                                            <label class="col-md-6 control-label" for="btn_submit"></label>
                                            <div class="col-md-4" >
                                              <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-success" style="margin-left: 40px;">Submit</button>
                                              <button type="reset" id="btn_cancel" name="btn_calcel" class="btn btn-default">Cancel</button>
                                            </div>
                                          </div>
                                        </div>  <!--end of panel-footer-->
                              
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