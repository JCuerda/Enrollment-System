<?php

  include('admin_session.php');
  include('functions.php');
  $alertMessage = "";

/*set an alert message to the user if it successfully updated its profile
  or some setting*/

  if(isset( $_GET['alert'] )){

     if( $_GET['alert'] == 'success' ){

         $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>successfully Updating Student Information <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
                          
     } else if ( $_GET['alert'] == 'error' ) {
        $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                              <strong> Error Occurred! <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     }

  }

  // if( isset($_GET['year']) ){
  //     $the_year_level = $_GET['year'];
  // } else {
  //   header('Location: ../admin/enrolled_choose_branch.php');
  // }

if( isset($_GET['branch_id']) && isset($_GET['course_id']) && isset($_GET['year_level']) ){

        $the_branch_id = validateFormData($_GET['branch_id']);
        $the_course_id = validateFormData($_GET['course_id']);
        $the_year_level = validateFormData($_GET['year_level']);
  } else {

    header('Location:enrolled_choose_branch.php');

  }


  require('includes/connection.php');
  include('includes/header.php');
  include('../admin/navigation_admin2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">
                <?php echo $alertMessage; ?>
                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="../admin/administration.php">Administration</a></li>
                          <li><a href="../admin/enrolled_choose_branch.php">Choose Branch</a></li>
                          <li><a href="../admin/enrolled_choose_branch.php">Enrolled : Manila</a></li>
                          <li><a href="../admin/enrolled_year_manila.php">Enrolled Student</a></li>
                        
                      </ol>
                    </div>
                </div>
     
                    <div class="col-md-12">
                       <?php include('admin_nav2.php'); ?>
                       
                        <!--profile content here-->
                        <div class="container-fluid">

      

                            <div class="row">
                               <div class="col-sm-12">
                                   <table class="table table-responsive table-bordered">
                                        <tr>
                                          <th class="text-center">
                                            #
                                          </th>
                                          <th class="text-center">
                                            Student Number
                                          </th>
                                          <th class="text-center">
                                            Student Name
                                          </th>
                                          <th class="text-center">
                                            Student Course
                                          </th>
                                          <th class="text-center">
                                            Student Year
                                          </th>
                                          <th class="text-center">
                                            Status
                                          </th>

                                        </tr>

                                        <tr>

                                          <?php 

                              /* query to display first year student which currently enrolled */

                              $query = "SELECT studInfo.studentNo, 
                                        studInfo.first_name ,
                                        studInfo.last_name, 
                                        studInfo.course_id, 
                                        studInfo.year_level,
                                        studInfo.semester_num , 
                                        studInfo.status 
                                        FROM tbl_studentinfo_manila studInfo
                                        WHERE studInfo.year_level = '$the_year_level' 
                                        AND studInfo.status = 'Enrolled'
                                        AND studInfo.course_id = '$the_course_id' 
                                        ORDER BY studInfo.year_level , studInfo.semester_num";


                              $result = mysqli_query($conn,$query);
                              $i=1;
                              while( $row = mysqli_fetch_assoc($result)){

                                      $student_number = $row['studentNo'];
                                      $student_fname = $row['first_name'];
                                      $student_lastName = $row['last_name'];
                                      $student_course = $row['course_id'];
                                      $student_yrLevel = $row['year_level'];
                                      $student_semNumber = $row['semester_num'];
                                      $student_status = $row['status'];
                                
                                  
                           ?>
                                         <td class="text-center">
                                           <?php echo $i++; ?>
                                         </td>
                                          <td class="text-center">
                                          <?php echo $student_number; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                           <?php {echo $student_fname ,' ', $student_lastName;} ?>
                                          </td>
                                         
                                          <td class="text-center">
                                          <?php echo $student_course; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                            <?php {echo $student_yrLevel , '-' , $student_semNumber;} ?>
                                          </td>
                                          
                                          <td class="text-center"> 
                                            <?php echo $student_status; ?>
                                          </td>

                                      </tr>

                                      <?php } ?>
                                    </table>
                                 </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
 