<?php


  include('admin_session.php');
  include('functions.php');
  require('includes/connection.php');

  $blankInputErr="";

  if( isset($_GET['curriculum_id']) ){

     $the_curriculum = validateFormData($_GET['curriculum_id']); 
   } 

   if(isset($_GET['edit'])){
     $the_subject_code = validateFormData($_GET['edit']);

   }

                  $query = "SELECT tbl_subject.subject_code, 
                            tbl_subject.subject_description , 
                            tbl_subject.year_level , 
                            tbl_subject.semester_number , 
                            tbl_subject.course_curriculum, 
                            tbl_subject.units 
                            FROM icc_prac3.tbl_subject 
                            WHERE tbl_subject.subject_code = '$the_subject_code' 
                            AND tbl_subject.course_curriculum ='$the_curriculum'";

                      $result = mysqli_query($conn, $query);

                       while($row = mysqli_fetch_assoc($result)){

                            $subject_code = $row['subject_code'];
                            $subject_description = $row['subject_description'];
                            $year_level = $row['year_level']; 
                            $sem_number = $row['semester_number'];
                            $curriculum_code = $row['course_curriculum'];
                            $subject_units = $row['units'];

                        } 


   // $currCode = $the_curriculum;
   // $sbjCode = $the_subject_code;

    if( isset($_POST['btn_submit']) ){

      $curriculum = validateFormData($the_curriculum);
      $new_subjectCode = validateFormData($_POST['subject_code']);
      $new_subjectDescri = validateFormData($_POST['subject_description']);
      $new_subjUnits = validateFormData($_POST['units']);
      $new_yearlevel = validateFormData($_POST['year_level']);
      $new_semesterNum = validateFormData($_POST['sem_number']);


      $query = "UPDATE icc_prac3.tbl_subject
                SET  tbl_subject.subject_code = '$new_subjectCode',
                tbl_subject.subject_description = '$new_subjectDescri',
                tbl_subject.course_curriculum = '$curriculum',
                tbl_subject.units = '$new_subjUnits',  
                tbl_subject.year_level = '$new_yearlevel',
                tbl_subject.semester_number ='$new_semesterNum'
                WHERE tbl_subject.subject_code = '$the_subject_code'";

      $result = mysqli_query($conn,$query);

      if( !$result ){
        $blankInputErr = "<div class='row'><div class='col-md-12 col-md-offset-1'><div class='alert alert-danger'>
                                      <strong> NO CHANGES DONE <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
      } else {
        header('Location:curriculum_list.php?alert=success');
      }

    } /*update end script*/

    mysqli_close($conn);

    include('includes/header.php');
     include('navigation_admin2.php');
?>
                             
       <div class="container" id="mainContainer">

            <div class="container ">
                <div class="row">
                    <div class="col-md-12"> 
                        <ol class="breadcrumb">
                            <li><a href="administration.php">Administration</a></li>
                            <li class="active"><a href="curriculum_list.php">Curriculum List</a></li>
                            <li class="active"><a href="curriculum_list.php">View Curriculum</a></li>
                            <li class="active"><a href="curriculum_list.php">Edit Curriculum</a></li>
                        </ol> 
                    </div>
                </div>

                <div class="col-md-12">
                    <?php include('admin_nav2.php'); ?>
                   
                        <!--profile content here-->
                        <div class="container-fluid">
                         <?php echo $blankInputErr;?>
                            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?curriculum_id=<?php {echo $the_curriculum;}?>&edit=<?php {echo $subject_code; }?>" method="post" >
                              <div class="panel panel-success">
                                <div class="panel-heading"> Edit Subject </div>

                                <div class="panel-body">
                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="first_name" >Subject Code:</label>  
                                  <div class="col-md-4">
                                  <input  name="subject_code" type="text" placeholder="Subject Code" class="form-control input-md"  value='<?php echo $subject_code; ?>'>
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="last_name">Subject Description:</label>  
                                  <div class="col-md-6">
                                  <input  name="subject_description" type="text" placeholder="Subject Description" class="form-control input-md" value='<?php echo $subject_description; ?>'>
                                    
                                  </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="last_name">Units:</label>  
                                  <div class="col-md-4">
                                  <input  name="units" type="text" placeholder="Units" class="form-control input-md" value='<?php echo $subject_units; ?>'>
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                   
                                  <label class="col-md-4 control-label" for="year_level">Year Level :</label>  
                                  <div class="col-md-4">
                                  <input  name="year_level" type="text" placeholder="Year Level" class="form-control input-md" value='<?php echo $year_level; ?>'>
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="student_address">Semester Number:</label>  
                                  <div class="col-md-4">
                                  <input name="sem_number" type="text" placeholder="Semester Number" class="form-control input-md" value='<?php echo $sem_number; ?>'>
                                    
                                  </div>
                                </div>


                              </div> <!--panel body ending-->
                            <!-- Button (Double) -->
                                  <div class="panel-footer">
                                      <div class="form-group">
                                        <label class="col-md-4 control-label" ></label>
                                        <div class="col-md-8">
                                          <input type="submit" name="btn_submit" class="btn btn-success" style="margin-left: 185px;">
                                          <button id="btn_cancel" name="btn_cancel" class="btn btn-default">Cancel</button>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->
    
<?php include('includes/footer.php'); ?>