<?php
 
  include('session.php');
  
  $alertMessage = "";
  if(isset( $_GET['alert'] )){

     if( $_GET['alert'] == 'success' ){

         $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Well Done! Successfully Enrolled <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } 
  }

  require('includes/connection.php');
  include('includes/header.php');
  include('navigation_2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

        

                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="profile.php">Home</a></li>
                          <li class="active"><a href="profile.php">Profile</a></li>
                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage; ?>
                    <?php include('profile_navigation.php'); ?>
                    <div class="col-md-8 col-md-offset-2">
                          
                        
                        <div class="panel panel-success">
                            <div class="panel-heading">Confirmation</div>
                            <div class ="panel-content" style="padding: 20px;"> 

                          <h3 class="text-center"><strong>Enrollment Successful!</strong></h3>
                          <h4 class="text-center">Please wait for the Confirmation of the Administrator</h4> 
                          <h6 class="text-center">Click here to go <a href="profile.php">back</a></h6>
                          </div>
                        </div>
                    </div>
                
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
  <?php include('includes/footer.php'); ?>
