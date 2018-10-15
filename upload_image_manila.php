<?php



  include('session.php');
   $blankInputErr="";

    if ( $loggedUser_branch != 'manila' ) {
      header('Location: profile.php');

  }

     require('includes/connection.php');
     include('functions.php');
        
    if( isset($_POST['btn_upload']) ){


        $newImage = $_FILES['uploadImage']['name'];
        $newImageLocation = $_FILES['uploadImage']['tmp_name'];

        move_uploaded_file($newImageLocation,"uploads/$newImage");

        $update_setting_query = "UPDATE tbl_studentinfo_manila 
                                SET student_photo = '$newImage'
                                WHERE studentNo ='$loggedUser'";

        $update_result = mysqli_query($conn, $update_setting_query);

        if(!$update_result){
            echo "no rows updated";
        } else {
            header('Location: profile.php?alert=success');
        }

    } /*update end script*/

    if( isset($_POST['btn_cancel']) ){
      header('Location:profile.php');
    }

    include('includes/header.php');
    include('navigation_2.php');
    
?>
                             
       <div class="container" id="mainContainer">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12"> 
                        <ol class="breadcrumb">
                            <li><a href="profile_manila.php">Home</a></li>
                            <li class="active"><a href="profile_manila.php">Profile</a></li>
                            <li class="active"><a href="editprofile_manila.php">Edit Basic Profile</a></li>
                        </ol> 
                    </div>
                </div>

                <div class="col-md-12">
                    <?php include('profile_nav2.php'); ?>
                        
                        <!--profile content here-->
                        <div class="container-fluid">
                        <div class="panel panel-success">
                        <div class="panel-heading">Basic Settings : Upload Image</div>
                            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
 
                        <br/> <br/>
                        <div class="panel-content">

                            <div class="form-group">
 
                              <label class="col-md-4 control-label">Account Picture:</label>  
                             
                              <div class="col-md-4">
                                  <input  name="uploadImage" type="file">
                              </div>

                            </div> 

                            </div> <!--end of panel content-->

                            <div class="panel-footer">
                            <!-- Button (Double) -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="btn_submit"></label>
                              <div class="col-md-8">
                                <input type="submit" name="btn_upload" class="btn btn-success" style="margin-left: 185px;">
                                <button type="submit" id="btn_cancel" name="btn_cancel" class="btn btn-default">Cancel</button>
                              </div>
                            </div>
                            </div> <!--end of panel footer-->

                            </form>
                        </div>
                    
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>