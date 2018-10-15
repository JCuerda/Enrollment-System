<?php


  include('admin_session.php');
  include('functions.php');
  require('includes/connection.php');

  $blankInputErr="";

   if(isset($_GET['alert'])){
      if( $_GET['alert'] == 'success' ){
        $blankInputErr="<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                        <strong>Successfully Added Tuition Fess!<a class='close' data-dismiss='alert'>&times</a> </strong> 
                    </div></div></div>";

      }
   }

    if( isset($_POST['btn_submit']) ){

      $course_id = validateFormData($_POST['course']);
      $tuition_fee = validateFormData($_POST['tuition_fee']);
      $lecture_fee = validateFormData($_POST['lecture_fee']);
      $laboratory_fee = validateFormData($_POST['laboratory_fee']);
      $registration_fee = validateFormData($_POST['registration_fee']);
      $misc_fee = validateFormData($_POST['misc_fee']);


      $query = "INSERT INTO icc_prac3.tbl_tuition_fee(
                tbl_tuition_fee.course_id,
                tbl_tuition_fee.tuition_fee,
                tbl_tuition_fee.lecture_fee,
                tbl_tuition_fee.laboratory_fee,
                tbl_tuition_fee.registration_fee,
                tbl_tuition_fee.misc_fee)
                VALUES(
                '$course_id',
                '$tuition_fee',
                '$lecture_fee',
                '$laboratory_fee',
                '$registration_fee',
                '$misc_fee')";
      $result = mysqli_query($conn,$query);

      if( !$result ){
        $blankInputErr = "<div class='row'><div class='col-md-12 col-md-offset-1'><div class='alert alert-danger'>
                                      <strong> NO CHANGES DONE <a class='close' data-dismiss='alert'>&times</a> </strong> 
                                  </div></div></div>";
      } else {
        header('Location:add_fees.php?alert=success');
      }

    } /*end script*/



    include('includes/header.php');
    include('navigation_admin2.php');
?>
                             
       <div class="container" id="mainContainer">

            <div class="container ">
                <div class="row">
                    <div class="col-md-12"> 
                        <ol class="breadcrumb">
                            <li><a href="administration.php">Administration</a></li>
                            <li class="active"><a href="add_fees.php">Add Fees</a></li>
                        </ol> 
                    </div>
                </div>

                <div class="col-md-12">
                    <?php include('admin_nav2.php'); ?>
                   
                        <!--profile content here-->
                        <div class="container-fluid">
                         <?php echo $blankInputErr;?>
                            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
                              <div class="panel panel-success">
                                <div class="panel-heading"> Add Fees : </div>

                                <div class="panel-body">

                                
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="course">Course :</label>  
              <div class="col-md-6">
              <select id="course" name="course" class="form-control" >

                    <?php 
                      $query = "SELECT * FROM icc_prac3.tbl_course_info";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc( $result ) ) {
                        
                        $course_name = $row['course_description'];
                        $course_id = $row['course_id'];

                      ?>                     
                         <option value="<?php echo $course_id; ?>"><?php echo $course_name; ?> </option>

                     <?php }

                 
                     ?>

                </select>

              </div>
            </div>

                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="" >Tuition Fee:</label>  
                                  <div class="col-md-4">
                                  <input  name="tuition_fee" type="text" placeholder="Tuiition Fee"  class="form-control input-md"  >
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="last_name">Lecture Fee :</label>  
                                  <div class="col-md-4">
                                  <input  name="lecture_fee" type="text" placeholder="Lecture Fee" class="form-control input-md" >
                                    
                                  </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="last_name">Laboratory :</label>  
                                  <div class="col-md-4">
                                  <input  name="laboratory_fee" type="text" placeholder="Laboratory Fee" class="form-control input-md" >
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                   
                                  <label class="col-md-4 control-label" for="laboratory_fee">Registration Fee :</label>  
                                  <div class="col-md-4">
                                  <input  name="registration_fee" type="text" placeholder="Registration Fee" class="form-control input-md" >
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="student_address">Miscellaneous Fee :</label>  
                                  <div class="col-md-4">
                                  <input name="misc_fee" type="text" placeholder="Miscellaneous Fee" class="form-control input-md" >
                                    
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