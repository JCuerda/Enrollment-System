<?php

    include('admin_session.php');
    include('functions.php');
    require('includes/connection.php');

    $alertMessage = "";

    if(isset( $_GET['alert'] )){
      if( $_GET['alert'] == 'success' ){
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Successfully Added New User <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
      }

    } else if ( isset( $_GET['alert'])) {
        if( $_GET['alert'] == 'input_error' ){
            $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong>Dont leave blank fields!<a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        }

    }

    if( isset($_POST['btn_submit']) ){


          $newUser = validateFormData(mysqli_real_escape_string($conn,$_POST['student_number']));
          $newpass = validateFormData(mysqli_real_escape_string($conn,$_POST['newpass']));
          $new_pass = validateFormData(mysqli_real_escape_string($conn,$_POST['new_pass']));

          if( $newUser === '' || $newpass  ==='' || $new_pass ==='' ){

            $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong>Dont leave blank fields!<a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
          } 

          if( $newpass === $new_pass && !empty($newpass) && !empty($new_pass)){
              $role= 'user';
              $userpass = password_hash($newpass,PASSWORD_DEFAULT);

              $query = "INSERT INTO icc_prac3.login_manila ( 
                        login_manila.username,  
                        login_manila.password,
                        login_manila.role) 
                        VALUES(
                        '$newUser',
                        '$userpass',
                        '$role')";

              $result = mysqli_query($conn,$query);
              if( !$result ){
                $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Invalid Username! User only 6 Digits Combinations <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";

              } else {
                header('Location:create_student_login_manila.php?alert=success');
              } 

          } else {
            $alertMessage =  "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Sorry. Password Dont Match! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
          }
    }

    if( isset($_POST['btn_cancel']) ){
      header('Location: administration.php');
    }


    include('includes/header.php');
    include('../admin/navigation_admin2.php');

?>               
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

              <!-- breadcrumb -->
                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="../admin/Administration.php">Administration</a></li>
                          <li><a href="../admin/create_student_login_manila.php">Create Login Account : Manila</a></li>
                      </ol>
                    </div>
                </div>
                    <?php include('../admin/admin_nav2.php'); ?>
                 <!--profile content here-->
                        <div class="container-fluid">
                        <?php echo $alertMessage; ?>
                          <div class="row">
                              <div class="col-md-10 col-md-offset-1">
                                   <div class="panel panel-success" ">
                                      <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                     
                                     <div class="panel-heading">Create Student Login Account</div>
                                    
                                    <div class="panel-body"> 
                                    
                                            <!-- User input-->
                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="newpass">New Username:</label>
                                            <div class="col-md-4">
                                             <!--  <input name="newUser" type="text" placeholder="6 Digits" class="form-control input-md text-center"> -->
                                           
                                           <select  name="student_number" class="form-control ">
                                          <?php 

                                            $query = "SELECT tbl_studentinfo_manila.studentNo 
                                                      FROM icc_prac3.tbl_studentinfo_manila";
                                            $result = mysqli_query($conn,$query);

                                            while( $row = mysqli_fetch_assoc($result) ){

                                              $student_number = $row['studentNo'];

                                              ?>

                                            <option class="text-center" value="<?php echo  $student_number;  ?>"><?php echo  $student_number; ?></option>


                                          <?php  }  ?>

                                                </select>

                                              </div>
                                          </div>

                                  
                                          <!-- Password input-->
                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="newpass">Enter Password:</label>
                                            <div class="col-md-4">
                                              <input id="repass" name="newpass" type="password" placeholder="Enter Password" class="form-control input-md text-center">
                                            </div>
                                          </div>

                                           <!-- Password input-->
                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="new_pass">Re-Enter Password:</label>
                                            <div class="col-md-4">
                                              <input id="repass" name="new_pass" type="password" placeholder="Enter Password" class="form-control text-center">
                                            </div>
                                          </div>
                                        </div> <!--end of panel-body-->
                                       
                                        <div class="panel-footer">
                                          <!-- Buttons -->
                                          <div class="form-group">
                                            <label class="col-md-6 control-label" for="btn_submit"></label>
                                            <div class="col-md-4" >
                                              <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-success" style="margin-left: 40px;">Submit</button>
                                              <button type="submit" id="btn_cancel" name="btn_cancel" class="btn btn-default">Cancel</button>
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
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>