enroll_now.php<?php
    session_start();
    include('includes/connection.php');

    $errorMsg="";
    
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
        } else if ($_GET['alert'] == 'enrollment_success'){
             $errorMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                        <strong>Enrollment Success! Please Please Proceed to the Cashier to Complete the Enrollment Process. Thank You<a class='close' data-dismiss='alert'>&times</a> </strong> 
                    </div></div></div>";
        }
       
    }

    if( isset($_POST['btnSubmit']) ){

        $student_type = $_POST['student_type'];

        if( $student_type == 'college' ){
            header('Location: enroll_now.php?branch='.$the_branch);
        } else if( $student_type == 'shs' ){
             header('Location: enroll_now_shs.php?branch='.$the_branch);
        }

    }


    include('includes/header.php');

    include('navigation.php');
    // include('carousel.php');
?>

       <div class="container" id="admissionMain">
             <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="index.php">Home</a></li>
                          <li><a href="#">Enrollment </a></li>

                      </ol>
                    </div>
                </div>

     <?php echo $errorMsg; ?>
     <div class="panel panel-success">
        <div class="panel-heading"><strong>Student Type</strong></div>
  


        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?branch=<?php echo $the_branch; ?>" method="post">
           <div class="panel-content">
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="branch">Enroll For:</label>
              <div class="col-md-4">
                <select id="student_type" name="student_type" class="form-control">
                
                  <option value="college">College</option>
                   <option value="shs">Senior High School</option>  
                
                </select>
              </div>
            </div>

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


   
 <?php 
    include('includes/footer.php');
  ?>


