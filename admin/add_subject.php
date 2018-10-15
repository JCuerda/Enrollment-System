<?php

    include('admin_session.php');
    include('functions.php');
    require('includes/connection.php');

$error_msg = "";
      $subject_code="";
      $subject_description="";
      $newSbj_yrLevel="";
      $newSbj_semLevel="";
      $update_curriculum = "";

    if( isset($_POST['btn_add']) ){

        $subject_code = validateFormData(mysqli_real_escape_string($conn,strtoupper($_POST['sbj_code'])));
        $subject_description = validateFormData(mysqli_real_escape_string($conn,$_POST['sbj_description']));
        $newSbj_yrLevel = validateFormData(mysqli_real_escape_string($conn,$_POST['year_yrOption']));
        $newSbj_semLevel = validateFormData(mysqli_real_escape_string($conn,$_POST['year_semOption']));
        $update_curriculum = validateFormData(mysqli_real_escape_string($conn,strtoupper($_POST['curriculum'])));
        $new_subjUnits = validateFormData(mysqli_real_escape_string($conn,$_POST['units']));


          if( $subject_code !== '' && $subject_description !== '' && $newSbj_semLevel !== '' && $newSbj_yrLevel !== ''){
              
             $query = "INSERT INTO icc_prac3.tbl_subject (
                    tbl_subject.subject_code,
                    tbl_subject.subject_description,
                    tbl_subject.units,
                    tbl_subject.course_curriculum,
                    tbl_subject.year_level,
                    tbl_subject.semester_number) 
                    VALUES (
                    '$subject_code',
                    '$subject_description',
                    '$new_subjUnits',
                    '$update_curriculum',
                    '$newSbj_yrLevel',
                    '$newSbj_semLevel')";

              $result = mysqli_query($conn, $query);

              if(!$result){

                  die(mysqli_error($conn));
                  $error_msg = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-danger'>
                                      <strong> NO CHANGES MADE <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
              } else {
                $error_msg = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-success'>
                                      <strong> Successfully Added a Subject <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
              }

          } else {
            $error_msg = "<div class='row'><div class='col-md-10 col-md-offset-1'><div class='alert alert-danger'>
                                      <strong> DONT LEAVE ANY FIELD BLANK <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
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
                          <li><a href="../admin/edit_curriculum.php">Add Subject</a></li>
                      </ol>
                    </div>
                </div>
     
                    <div class="col-md-12">
              
                    <?php include('admin_nav2.php'); ?>
                    <!---subject page content here-->
                        <div class="container-fluid">

                          <div class="row">
                            <?php echo $error_msg; ?>
                              <div class="col-md-10 col-md-offset-1">
                                   <div class="panel panel-success">


<!-- 
                            <?php 


                                      echo $update_curriculum;
                                      echo $subject_code;
                                      echo $subject_description;
                                      echo $newSbj_yrLevel;
                                      echo $newSbj_semLevel;


                            ?>    -->
                                     <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                       
                                     <div class="panel-heading">Update Curriculum</div>
                                        <div class="panel-body">
                                        <!-- Select Basic -->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="year_semOption">Academic Curriculum</label>
                                              <div class="col-md-6">
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

                                            <div class="panel-heading">Add subject</div> <!--inner panel heading-->
                                              <div class="panel-body">

                                                <!-- Text input-->
                                                    <div class="form-group">
                                                      <label class="col-md-4 control-label" for="sbj_code">Subject Code:</label>  
                                                      <div class="col-md-4">
                                                      <input id="sbj_code" name="sbj_code" type="text" placeholder="Subject Code" class="form-control input-md">
                                                        
                                                      </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                      <label class="col-md-4 control-label" for="sbj_description">Subject Description:</label>  
                                                      <div class="col-md-4">
                                                      <input id="sbj_description" name="sbj_description" type="text" placeholder="Subject Description" class="form-control input-md">
                                                        
                                                      </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                      <label class="col-md-4 control-label" for="sbj_description">Units:</label>  
                                                      <div class="col-md-4">
                                                      <input name="units" type="text" placeholder="Units" class="form-control input-md">
                                                        
                                                      </div>
                                                    </div>

                                              <!-- Select Basic -->
                                                <div class="form-group">
                                                  <label class="col-md-4 control-label" for="year_yrOption">Year Level</label>
                                                  <div class="col-md-4">
                                                    <select id="year_yrOption" name="year_yrOption" class="form-control">

                                                      <?php 
                                                          
                                                          $query_year_level = "SELECT * FROM tbl_academic_year";

                                                          $year_result = mysqli_query($conn,$query_year_level);

                                                          if( mysqli_num_rows($year_result)>0 ){
                                                             //we have a data for the year
                                                            while( $row = mysqli_fetch_assoc($year_result) ){
                                                                  $yrLevel = $row['year_level'];
                                                                  $yr_id = $row['id'];
                                                              ?>  
                                                              <option value="<?php echo $yr_id; ?>"><?php echo $yrLevel; ?></option>

                                                           <?php }
                                                          } ?>

                                                    </select>
                                                  </div>
                                                </div>


                                                <!-- Select Basic -->

                                                  <div class="form-group">
                                                    <label class="col-md-4 control-label" for="year_semOption">Semester Number:</label>
                                                    <div class="col-md-4">
                                                      <select id="year_semOption" name="year_semOption" class="form-control">

                                                        <?php 
                                                           
                                                            $query_year_level = "SELECT * FROM tbl_academic_sem";
                                                            $year_result = mysqli_query($conn,$query_year_level);

                                                            if( mysqli_num_rows($year_result)>0 ){
                                                               //we have a data for the year
                                                              while( $row = mysqli_fetch_assoc($year_result) ){
                                                                    $semLevel = $row['semester_num'];
                                                                    $sem_id = $row['id'];

                                                                ?>  
                                                                <option value="<?php echo $sem_id; ?>"><?php echo $semLevel; ?></option>

                                                             <?php }
                                                            } ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                              </div> <!--end of inner panel body-->

                                            </div> <!--end of body panel-->
                                               
                                                <!-- Button (Double) -->
                                                <div class="panel-footer">
                                                    <div class="form-group">
                                                      <label class="col-md-7 control-label" for="btn_go"></label>
                                                      <div class="col-md-5">
                                                        <button id="btn_go" name="btn_add" class="btn btn-success" style="margin-left: 30px;">Add <i class="fa fa-plus-circle"></i> </button>
                                                        <button id="btn_cancel" name="btn_cancel" class="btn btn-default">Cancel</button>
                                                      </div>
                                                    </div>
                                                </div> <!--end of pane-footer-->

                                            </form>
                                       </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>