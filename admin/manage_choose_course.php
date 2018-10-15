<?php

    include('includes/connection.php');
    include('admin_session.php');
    include('functions.php');

    $errorMsg = "";

    if( isset($_POST['btnSubmit']) ){

        $course_id = validateFormData($_POST['btnSubmit']);
        if( $branch_id == 1 && $year_id == 1 ){
            header('Location:fist_year.php?branch_id='.$branch_id.'&year_level='.$year_id);
        } else {
            header('Location:unenrolled_manila.php?branch_id='.$branch_id);
        }
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
                        <li class="active"><a href="../admin/manage_choose_course.php">Choose Course</a></li>
                    </ol> 
            </div>
        </div>
              <?php echo  $errorMsg;  ?>
        
        <?php include('admin_nav2.php'); ?>

        <div class="panel panel-success">
        <div class="panel-heading">Manage Student : Choose Course</div>
  


        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
           <div class="panel-content">
            <!-- Select Basic -->


         <div class="form-group">
            <label class="col-md-4 control-label" for="branch">Course</label>
            <div class="col-md-4">
              <select id="course" name="course" class="form-control">
              
              <?php 
                    $query = "SELECT * FROM icc_prac3.tbl_course_info";
                    $result = mysqli_query($conn,$query);
                    while ( $row = mysqli_fetch_assoc( $result ) ) {
                      
                      $course_id = $row['course_id'];
                      $course_description = $row['course_description'];

                    ?>                     
                       <option value="<?php echo $course_id;  ?>"><?php echo  $course_description; ?> </option>

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