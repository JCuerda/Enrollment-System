<?php

    include('admin_session.php');
    include('functions.php');
    require('includes/connection.php');

    $alertMsg = "";

    if( isset($_POST['btn_submit']) ){

      $curriculum_id = validateFormData(mysqli_real_escape_string($conn,strtoupper($_POST['curriculum'])));
      $course_id = validateFormData(mysqli_real_escape_string($conn,strtoupper($_POST['course_id'])));
      $course_description = validateFormData(mysqli_real_escape_string($conn,$_POST['course_description']));
      

      if( !$curriculum_id || !$course_id || !$course_description ){
          header('Location:add_curriculum.php?alert=error');
      } else {

          $query = "INSERT INTO icc_prac3.tbl_course_info (
                    tbl_course_info.course_id,
                    tbl_course_info.course_description,
                    tbl_course_info.course_curriculum)
                    VALUES(
                    '$course_id',
                    '$course_description',
                    '$curriculum_id')";

          $result = mysqli_query($conn,$query);

          if( !$result ){

             $alertMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong>Error Occured! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
          } else {
            
            $alertMsg = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Successfully Added New Course! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
          }     

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
                          <li><a href="../admin/Administration.php">Administration</a></li>
                          <li><a href="../admin/create_course.php">Create New Course</a></li>
                      </ol>
                    </div>
                </div>
                    <?php include('../admin/admin_nav2.php'); ?>
                    <?php echo $alertMsg; 

                    // echo $course_id;
                    //   echo  $course_description;
                    //  echo   $curriculum_id;



                    ?>
                 <!--profile content here-->
                        <div class="container-fluid">
                        
                          <div class="row">
                              <div class="col-md-10 col-md-offset-1">
                                   <div class="panel panel-success" ">
                                      <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                     
                                     <div class="panel-heading">Create New Course</div>
                                    
                                    <div class="panel-body"> 

                  

                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="curriculum_description">Choose Curriculum:</label>
                                            <div class="col-md-4">
                                               <select id="curriculum" name="curriculum" class="form-control">

                                                  <?php 
                                                      $query_curriculum = "SELECT tbl_curriculum.curriculum_id FROM icc_prac3.tbl_curriculum";
                                                      
                                                      $curriculum_result = mysqli_query($conn,$query_curriculum);

                                                      if( mysqli_num_rows($curriculum_result)>0 ){
                                                         //we have a data for the year
                                                        while( $row = mysqli_fetch_assoc($curriculum_result) ){
                                                              $curriculum = $row['curriculum_id'];
                                                          ?>  
                                                          <option value="<?php echo $curriculum;  ?>"><?php echo $curriculum ; ?></option>

                                                       <?php }
                                                      } ?>

                                                </select>
                                            </div>
                                          </div>

      
                                    
                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="curriculum_name">Course ID:</label>
                                            <div class="col-md-4">
                                              <input name="course_id" type="text" placeholder="Course Id" class="form-control input-md text-center">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="col-md-5 control-label" for="curriculum_name">Course Description:</label>
                                            <div class="col-md-4">
                                              <input name="course_description" type="text" placeholder="Course Description" class="form-control input-md text-center">
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