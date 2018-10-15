<?php

    include('includes/connection.php');
    include('admin_session.php');
    include('functions.php');

    $errorMsg = "";

    if( isset($_GET['student_number']) ){
        $the_student_number = $_GET['student_number'];
    } else {
      header('Location: ../admin/administration.php');
    }



  if( isset($_POST['btnSubmit']) ){

        $grant_id = $_POST['grant'];

        $update_query = "UPDATE icc_prac3.tbl_studentinfo_manila
                        SET tbl_studentinfo_manila.grant_id = '$grant_id'
                        WHERE tbl_studentinfo_manila.studentNo = '$the_student_number'";

        $update_result = mysqli_query($conn,$update_query);

        if(!$update_result){
          header('Location: administration.php?alert=grant_error');
        } else {
          header('Location: administration.php?alert=grant_success');
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
                        <li class="active"><a href="../admin/student_update_manila.php">Edit Scholarship Grant</a></li>
                    </ol> 
            </div>
        </div>

        <?php echo  $errorMsg;  ?>
        
        <?php include('admin_nav2.php'); ?>
        <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
        <div class="panel-heading">Choose Scholarship Grant</div>
  

        <br><br>

         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?student_number=<?php echo $the_student_number;?>" method="post">
           <div class="panel-content">
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="branch">Scholarship Grants</label>
              <div class="col-md-4">
                <select id="grant" name="grant" class="form-control">
                
                <?php 
                      $query = "SELECT * FROM icc_prac3.tbl_grants";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc( $result ) ) {
                        
                        $grant_id = $row['grant_id'];
                        $grant_description = $row['grant_description'];

                      ?>        

                         <option value="<?php echo $grant_id; ?>"> <?php echo  $grant_description; ?> </option>

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
                <button id="btnSubmit" type="submit" name="btnSubmit" class="btn btn-success" style="margin-left: 135px;">Proceed</button>
                <button id="btnCancel" name="btnCancel" class="btn btn-default">Cancel</button>
              </div>
            </div>
        </div>


        </form>


        </div> <!--end of panel-->
        </div>
    </div><!--end of main -->

<?php include ('includes/footer.php');  ?>