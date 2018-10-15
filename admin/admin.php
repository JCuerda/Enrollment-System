<?php
    
    require('includes/connection.php');

    $loginError="";
   
    if( isset($_POST["btn_login"]) ){
        
        $adminUser = mysqli_real_escape_string($conn,$_POST['adminUser']);
        $adminPass = mysqli_real_escape_string($conn,$_POST['adminPass']);

        $query = "SELECT login_admin.account_id,
                  login_admin.password, 
                  login_admin.role 
                  FROM icc_prac3.login_admin 
                  WHERE login_admin.account_id='$adminUser'";
        
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
             
            while ($row = mysqli_fetch_assoc($result))
            {
                    $adminUsername = $row['account_id'];
                    $adminPassword = $row['password'];
                    $role = $row['role'];
            }

            if( password_verify($adminPass , $adminPassword) ){

                      session_start();
                       $_SESSION['loggedInUser'] = $adminUser;
                       $_SESSION['userRole'] = $role;
                       header('Location:../admin/administration.php');

            } else {
                $loginError = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-danger'>
                            <strong>Wrong Username / Password <a class='close' data-dismiss='alert'>&times</a> </strong> 
                        </div></div></div>";
            }

        } else {

          $loginError = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-danger'>
                              <strong>No such user in the database <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        } 

     }

   include('includes/header.php');
   include('navigation_admin.php');
?>

    <!--Breadrumb-->
                                              
       <div class="container" id="loginMain">
          <div class="container ">
            <div class="row">
              <div class="col-md-12">          
                <ol class="breadcrumb">
                    <li class="active"><a href="../admin/admin.php">Administrator Login</a></li>
                </ol>        
              </div>
            </div>

          <div class="row">   
              <div class="col-sm-6">
                  <img src="images/icclogo.png" id="logoSideBar" class="center-block img-responsive">
                  <h4 class="text-center">Contact Details:</h4>
                  <p class="text-center"><i class="fa fa-phone"></i>&nbsp;+632-736-3912</p>
                  <p class="text-center"><i class="fa fa-envelope"></i>&nbsp;interface@computercollege.com</p>
              </div>

                    <div class="col-sm-5">
                        <div class="panel panel-default" id="loginPanel">
                           <div class="panel-body">
                               <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <fieldset>
                                        <!-- Student Login -->
                                    <legend><h2>Administrator Login</h2></legend>

                                        <!-- Text input-->
                                        <div class="form-group">
                                           <?php echo $loginError;
                                            ?> 
                                            <label class="col-sm-5 control-label" for="studNo">Username:</label> 
                                               
                                            <div class="col-sm-6">
                                                <input type="text" name="adminUser" type="text" placeholder="username" class="form-control text-center">
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group">
                                              <label class="col-md-5 control-label" for="password">Password:</label>
                                              <div class="col-md-6">
                                                <input name="adminPass" type="password" placeholder="Password" class="form-control input-md text-center">

                                              </div>
                                        </div>

                                        </fieldset>
                              </div>

                              <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                             <input type = "submit" class="btn btn-success" name="btn_login">
                                             <button type = "button" class="btn btn-default" name="btn_cancel">Cancel</button>
                                        </div>
                                    </div>
                                </form>                            
                            </div>
                        </div>
                    </div>
          
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>