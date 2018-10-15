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
                          <li><a href="../admin/add_curriculum.php">Create New Curriculum</a></li>
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
                                     
                                     <div class="panel-heading">Create New Curriculum</div>
                                    
                                    <div class="panel-body"> 

                                          <!-- Password input-->
                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="curriculum_id">Curriculum ID:</label>
                                            <div class="col-md-4">
                                              <input name="curriculum_id" type="text" placeholder="Curriculum ID" class="form-control text-center">
                                              </div>
                                            </div>

                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="curriculum_description">Curriculum Description:</label>
                                            <div class="col-md-4">
                                              <input name="curriculum_description" type="text" placeholder="Curriculum Description" class="form-control input-md text-center">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="curriculum_description">For the Course:</label>
                                            <div class="col-md-4">
                                              <input name="course_id" type="text" placeholder="Course ID" class="form-control input-md text-center">
                                            </div>
                                          </div>

                                           <div class="form-group">
                                             <label class="col-md-5 control-label" for="time_to_complete">Year to Complete:</label>
                                                <div class="col-md-4">
                                                <select id="time_to_complete" name="time_to_complete" class="form-control">
                                                
                                                      <option value="2">2 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                
                                                </select>
                                              </div>
                                          </div>


                                           
                                       </div><!--end of panel content-->


                                        <div class="panel-footer">
                                          <!-- Buttons -->
                                          <div class="form-group">
                                            <label class="col-md-6 control-label" for="btn_submit"></label>
                                            <div class="col-md-4" >
                                              <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-success" style="margin-left: 40px;">Submit</button>
                                              <button type="submit" id="btn_cancel" name="btn_cancel" class="btn btn-default">Cancel</button>
                                            </div>
                                          </div>
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