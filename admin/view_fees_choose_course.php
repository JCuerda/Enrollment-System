<?php

    include('includes/connection.php');
    include('admin_session.php');
    include('functions.php');

    $errorMsg = "";

    if( isset($_GET['alert']) ){

        if( $_GET['alert'] == 'success' ){

         $errorMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Successfully Updated Information <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        }
    }

    if( isset($_POST['btnSubmit']) ){

        $course_id = validateFormData($_POST['course']);

        header('Location: view_fees.php?course_id='.$course_id);
        
    } 

    if( isset($_POST['btnCancel']) ){
      header('Location: administration.php');
    }

     include('includes/header.php');
     include('navigation_admin2.php');

?>        
     <div class="container" id="mainContainer">
        <div class="row">
            <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="../admin/administration.php">Administration</a></li>
                        <li class="active"><a href="../admin/manage_fees_choose_course.php">Manage Fees : Choose Course</a></li>
                    </ol> 
            </div>
        </div>

              <?php echo  $errorMsg;  ?>
        
        <?php include('admin_nav2.php'); ?>

        <div class="panel panel-success">
        <div class="panel-heading">Choose Course : View</div>
  
        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
           <div class="panel-content">
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="branch">Course : </label>
              <div class="col-md-4">
                <select id="" name="course" class="form-control">
                
                <?php 
                      $query = "SELECT tbl_tuition_fee.course_id FROM icc_prac3.tbl_tuition_fee";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc( $result ) ) {
                        
                        $course_id = $row['course_id'];
                       

                      ?>                     
                         <option value="<?php echo $course_id  ?>"><?php echo  $course_id; ?> </option>

                     <?php }

                    ?>
                
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

<?php include ('includes/footer.php');  ?>