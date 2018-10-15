<?php

    include('admin_session.php');
    include('functions.php');
    require('includes/connection.php');

    $alertMsg = "";
    if( isset($_GET['alert']) ){
        if( $_GET['alert'] == 'success' ){
            $alertMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Good Job! Successfully Added New Curriculum <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        } else {
            $alertMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Dont Leave any input fields blank! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
        }

    }

    if( isset($_POST['btn_submit']) ){

      $curriculum_id = validateFormData(mysqli_real_escape_string($conn,strtoupper($_POST['curriculum_id'])));
      $curriculum_description = validateFormData(mysqli_real_escape_string($conn,$_POST['curriculum_description']));
      $course_id = validateFormData(mysqli_real_escape_string($conn,$_POST['course_id']));
      $time_to_complete = validateFormData(mysqli_real_escape_string($conn,$_POST['time_to_complete']));

      if( !$curriculum_id  || !$curriculum_description || !$course_id ){
          header('Location:add_curriculum.php?alert=error');
      } else {

          $query = "INSERT INTO icc_prac3.tbl_curriculum(
                    tbl_curriculum.curriculum_id,
                    tbl_curriculum.curriculum_description,
                    tbl_curriculum.course_id,
                    tbl_curriculum.time_to_complete)
                    VALUES(
                    '$curriculum_id',
                    '$curriculum_description',
                    '$course_id',
                    '$time_to_complete')";

          $result = mysqli_query($conn,$query);

          if( !$result ){
            die("ERROR INSERTING A NEW CURRICULUM");
          } 

          header('Location:../admin/add_curriculum.php?alert=success');
      }
      
    }

    if( isset($_POST['btn_cancel']) ){
      header('Location: administration.php');
    }




    include('includes/header.php');
    include('../admin/navigation_admin2.php');

?>               
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

              <!-- breadcrumb -->
                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="../admin/administration.php">Administration</a></li>
                          <li><a href="../admin/download_backup.php">Download Backup</a></li>
                      </ol>
                    </div>
                </div>
                    <?php include('../admin/admin_nav2.php'); ?>
                    <?php echo $alertMsg; ?>
                 <!--profile content here-->
                        <div class="container-fluid">
                        
                          <div class="row">
                              <div class="col-md-10 col-md-offset-1">
                                   <div class="panel panel-success" >
                                      <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                     
                                     <div class="panel-heading">Backup</div>
                                    
                                      <div class="panel-body"> 

                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="table-responsive">
                                            <table class="table table-bordered">
                                              <tr>
                                                <th class="text-center">Backup Name</th>
                                                <th class="text-center">Date Created</th>
                                              </tr>

                                              <tr>
                                                <?php 

                                                    $query = "SELECT * FROM tbl_backup";
                                                    $result = mysqli_query($conn,$query);

                                                    while( $row = mysqli_fetch_array($result) ){
                                                        $name = $row['name'];
                                                        $date = $row['date'];
                                                      ?>

                                                      <td class="text-center">
                                                        <a href="backup_db/<?php echo $name ?>">
                                                            <i class="fa fa-download"></i>
                                                            <?php 
                                                                $filename = explode('.', $name);
                                                                echo  $filename[0];
                                                            ?> 
                                                        </a>
                                                      </td>

                                                      <td class="text-center"><?php echo date_format(new datetime($date), "m/d/Y g:i:s a") ?></td>
                                              
                                              </tr>
                                              
                                              <?php
                                                    }
                                                 ?>
                                            </table>
                                          </div>
                                        </div>
                                      </div>


                                           
                                       </div><!--end of panel content-->


                                        <div class="panel-footer">
                                       
                                        </div>  <!--end of panel-footer-->
                              
                                      </form>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>