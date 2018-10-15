<?php
    
    require('includes/connection.php');
    
    $loginError="";

    if( isset($_GET['branch']) ){

      if($_GET['branch'] == 'caloocan'){

          $the_branch = $_GET['branch'];
       
        } else if( $_GET['branch'] == 'manila') {
          $the_branch = $_GET['branch'];
       
        } else {
          header('Location:index.php');
        }

     } else {
         header('Location:index.php');
     }



    if( isset($_POST["btn_login"]) ) {
        
        $studNo = mysqli_real_escape_string($conn,$_POST['studNo']);
        $studPW = mysqli_real_escape_string($conn,$_POST['studPW']);

        $query = "SELECT username, password, role from login_manila WHERE username='$studNo'";
        
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
             
            while ($row = mysqli_fetch_assoc($result))
            {
                    $studNo = $row['username'];
                    $hashedPass = $row['password'];
                    $role = $row['role'];
            }

             if( password_verify($studPW , $hashedPass) ){

                if( $role === "admin" ){
                  header('Location:index.php');
                } else {

                   session_start();
                   $_SESSION['loggedInUser'] = $studNo;
                   $_SESSION['userRole'] = $role;
                   $_SESSION['branch'] = 'manila';
                   header('Location:profile_manila.php');
                   
                  }

              } else {
                 $loginError = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-danger'>
                              <strong>Wrong Student Number / Password <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
              }

          } else {

          $loginError = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-danger'>
                              <strong>No such user in the database <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        } 

      }

    include('includes/header.php');
    include('navigation.php');
?>

    <!--Breadrumb-->
                                              
       <div class="container" id="loginMain">
          <div class="container ">
            <div class="row">
              <div class="col-md-12">          
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="login_manila.php">Student Login</a></li>
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
                               <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?branch=<?php echo $the_branch;?>" method="post">
                                    <fieldset>
                                        <!-- Student Login -->
                                    <legend><h2>Student Login</h2></legend>

                                        <!-- Text input-->
                                        <div class="form-group">
                                           <?php echo $loginError;
                                            ?> 
                                            <label class="col-sm-5 control-label" for="studNo">Student Number:</label> 
                                               
                                            <div class="col-sm-6">
                                                <input id="studNo" name="studNo" type="text" placeholder="Student Number" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="form-group">
                                              <label class="col-md-5 control-label" for="password">Password:</label>
                                              <div class="col-md-6">
                                                <input id="passwordinput" name="studPW" type="password" placeholder="Password" class="form-control input-md">

                                              </div>
                                        </div>

                                      </fieldset>
                              </div>

                              <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                             <input type = "submit" class="btn btn-success" name="btn_login" value="Login">
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