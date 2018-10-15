<?php

  include('admin_session.php');
  require('includes/connection.php');
  include('functions.php');

  $alertMessage = "";

 if( isset($_GET['course_id']) ){
      $the_course_id = validateFormData(mysqli_real_escape_string($conn,$_GET['course_id']));
  } 



$fees_query = "SELECT * FROM icc_prac3.tbl_tuition_fee 
                WHERE tbl_tuition_fee.course_id = '$the_course_id'";

  $fees_result = mysqli_query($conn,$fees_query);

  if( !$fees_result ){
    die("ERROR OCCURED HERE! LINE 22 OF VIEW PAYMENT");
  }

  while( $row = mysqli_fetch_assoc($fees_result) ){

      $course_id = $row['course_id'];
      $lecture_fee = $row['lecture_fee'];
      $laboratory_fee = $row['laboratory_fee'];
      $registration_fee = $row['registration_fee'];
      $tuition_fee = $row['tuition_fee'];
      $misc_fee = $row['misc_fee'];

  }


  include('includes/header.php');
  
  include('../admin/navigation_admin2.php');

?>
               
       <div class="container" id="mainContainer">
   
            <div class="container ">
                <div class="row">
                    <div class="col-md-12"> 
                        <ol class="breadcrumb">
                            <li><a href="administration.php">Administration</a></li>
                            <li class="active"><a href="pendingEnrollment.php">Pending Enrollment</a></li>
                            <li class="active"><a href="view_payment.php?id=<?php echo $the_student_id?>">View Payment</a></li>
                        </ol> 
                    </div>
                </div>

                <div class="col-md-12">
                       <?php include('admin_nav2.php'); ?>
                        <!--profile content here-->
                        <div class="container-fluid">
                        <div class="panel panel-success">
                        <div class="panel-heading"> Enrollment Fee </div>
                            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
                        

                        <br/> <br/>
                        <div class="panel-content" >
                        <div class="col-md-10 col-md-offset-1">
                             <table class="table table-responsive table-bordered">
                                        <tr>
                                          <th class="text-center " colspan="2">
                                            Enrollment Fees for <?php echo $course_id; ?>
                                          </th>
                                        </tr>

                                        <tr>  
                                          <td class="text-center">
                                              Tuition Fee :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $tuition_fee; ?>
                                          </td>

                                        </tr>

                                        <tr>  
                                          <td class="text-center">
                                                Lecture Fee :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $lecture_fee; ?>
                                          </td>
                                          
                                        </tr>

                                          <tr>  
                                          <td class="text-center" >
                                                Laboratory Fee :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $laboratory_fee; ?>
                                          </td>
                                          
                                        </tr>

                                        <tr>  
                                          <td class="text-center">
                                                Registration Fee :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $registration_fee; ?>
                                          </td>
                                          
                                        </tr>

                                      <tr>  
                                          <td class="text-center">
                                                Miscellaneous Fee :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $misc_fee; ?>
                                          </td>
                                          
                                        </tr>


                                  </table>
                                </div>
                          
                            </div> <!--end of panel content-->

                            <div class="panel-footer">
                            <!-- Button (Double) -->
                 
                                  <div class="form-group">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <a href="view_fees_choose_course.php" role="button" class="btn btn-default" value="" style="margin-left: 67px;">Go Back</a>
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