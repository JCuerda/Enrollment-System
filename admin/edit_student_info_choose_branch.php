<?php

    include('includes/connection.php');
    include('admin_session.php');
    include('functions.php');

    $errorMsg = "";

    if( isset($_POST['btnSubmit']) ){

        $branch_id = validateFormData($_POST['branch']);
        $year_id = validateFormData($_POST['year']);
        $course_id = validateFormData($_POST['course']);

        if( $branch_id == 1 ){
            header('Location:edit_student_list.php?branch_id='.$branch_id.'&course_id='.$course_id.'&year_level='.$year_id);
        } else {
            header('Location:edit_student_list_manila.php?branch_id='.$branch_id.'&course_id='.$course_id.'&year_level='.$year_id);
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
                        <li class="active"><a href="../admin/edit_student_info_choose_branch.php">Choose Branch</a></li>
                    </ol> 
            </div>
        </div>
              <?php echo  $errorMsg;  ?>
        
        <?php include('admin_nav2.php'); ?>

        <div class="panel panel-success">
        <div class="panel-heading">Edit Student Information : Choose Branch and Year Level</div>
  
        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
           <div class="panel-content">
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="branch">Branch : </label>
              <div class="col-md-4">
                <select id="branch" name="branch" class="form-control">
                
                <?php 
                      $query = "SELECT * FROM icc_prac3.tbl_branches";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc( $result ) ) {
                        
                        $branch_name = $row['branch_name'];
                        $branch_id = $row['branch_id'];

                      ?>                     
                         <option value="<?php echo $branch_id;  ?>"><?php echo  $branch_name; ?> </option>

                     <?php }

                    ?>
                
                </select>
              </div>
            </div>


           <div class="form-group">
            <label class="col-md-4 control-label" for="branch">Course : </label>
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

            <div class="form-group">
              <label class="col-md-4 control-label" for="year">Year Level : </label>
              <div class="col-md-4">
                <select id="year" name="year" class="form-control">
                
                <?php 
                      $query = "SELECT * FROM icc_prac3.tbl_academic_year";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc( $result ) ) {
                        
                        $year_level = $row['year_level'];
                        $year_id = $row['id'];

                      ?>                     
                         <option value="<?php echo $year_id;  ?>"><?php echo  $year_level; ?> </option>

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