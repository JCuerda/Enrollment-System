<?php

    include('includes/connection.php');
    include('admin_session.php');
    include('functions.php');

    $errorMsg = "";

    if( isset($_POST['btnSubmit']) ){

        $branch_id = validateFormData($_POST['branch']);

        if( $branch_id == 1 ){
            header('Location:finalize_enrollment.php?branch_id='.$branch_id);
        } else {
            header('Location:finalize_enrollment_manila.php?branch_id='.$branch_id);
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
                        <li class="active"><a href="../admin/choose_branch.php">Choose Branch : Finalize Freshment Enrollment</a></li>
                    </ol> 
            </div>
        </div>
              <?php echo  $errorMsg;  ?>
        
        <?php include('admin_nav2.php'); ?>

        <div class="panel panel-success">
        <div class="panel-heading">Choose Branch</div>
  


        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
           <div class="panel-content">
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="branch">Branch</label>
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