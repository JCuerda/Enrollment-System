<?php
 
  include('session.php');
  require('includes/connection.php');
  $count = 0;
  $alertMessage = "";
  
 if ( $loggedUser_branch != 'caloocan' ) {
      header('Location: profile_manila.php');
  }


  include('includes/header.php');
  include('navigation_2.php');

?>

 

       <div class="container" id="mainContainer">
                  <div class="form-group">
                        <label class="col-md-4 control-label" for="btn_submit"></label>
                        <div class="col-md-8">
                          <!-- <input type="submit" name="btn_save" class="btn btn-success" style="margin-left: 550px;" onclick="javascript:printlayer('div-id-name')" value="Print"> -->
                          <a href="javascript:window.print();" class="btn btn-success" id="printbtn" role="button" style="margin-left: 620px;"> <i class="fa fa-print"></i>&nbsp;Print </a>
                  
                        </div>
                    </div>

            <div class="container-fluid" >
            
              <?php 

              $query = "SELECT tbl_studentinfo.*, tbl_course_info.course_description, tbl_academic_sem.semester_num, tbl_academic_year.year_level
                        FROM icc_prac3.tbl_studentinfo
                        LEFT JOIN icc_prac3.tbl_academic_year ON tbl_studentinfo.year_level = tbl_academic_year.id 
                        LEFT JOIN icc_prac3.tbl_academic_sem ON tbl_studentinfo.semester_num = tbl_academic_sem.id 
                        LEFT JOIN icc_prac3.tbl_course_info ON tbl_studentinfo.course_id = tbl_course_info.course_id
                        WHERE tbl_studentinfo.studentNo = '$loggedUser'";


              $result = mysqli_query($conn, $query);  

               while($row = mysqli_fetch_assoc($result)) {

                    $studNo = $row['studentNo'];
                    $fname = $row['first_name'];
                    $Lname = $row['last_name']; 
                    $course_description = $row['course_description'];
                    $yr_level = $row['year_level'];
                    $semester_number = $row['semester_num'];
                    $student_type = $row['student_type'];
                    $student_age = $row['age'];
                    $student_gender = $row['gender'];
                    $student_address = $row['address'];
                    $student_contactNum = $row['contact_number'];
                    $student_email = $row['email_address'];
               } 

               ?>

                <div class="row">
                    <div class="col-xs-12">
                      <ol class="breadcrumb">
                          <li><a href="profile.php">Home</a></li>
                          <li class="active"><a href="profile.php">Profile</a></li>
                          <li class="active"><a href="print_form.php">Print Enrollment</a></li>
                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage;  ?>

                       <div class="row"></div>

                    
                    <div class="col-xs-12">
                          <?php include('profile_nav2.php'); ?>
                        
                        <!--profile content here-->
                        <div class="container-fluid" id="div-id-name" >

                        
                            <div class="row">
                                <div class="col-xs-3">
                                    <label for=""><strong>Student Number:</strong></label>
                                </div>
                                <div class="col-xs-3">
                                    <label for=""><?php echo $studNo; ?></label>
                                </div>
                                <div class="col-xs-3">
                                    <label for="">Academic Year:</label>
                                </div>
                                <div class="col-xs-3">
                                    <label for=""><?php echo $yr_level; ?> <?php echo $semester_number; ?></label>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-xs-3">
                                    <label for="">Student Name:</label>
                                </div>
                                <div class="col-xs-3">
                                    <label for=""><?php echo $fname . " " . $Lname; ?></label>
                                </div>
                                <div class="col-xs-3">
                                    <label for="">Student Type:</label>
                                </div>
                                <div class="col-xs-3">
                                    <label for=""><?php echo strtoupper($student_type); ?></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3">
                                    <label for="">Course Name:</label>
                                </div>
                                <div class="col-xs-6">
                                    <label for=""><?php echo $course_description; ?></label>
                                </div>
                                
                                <div class="col-xs-3">
                                    <label for=""></label>
                                </div>
                            </div>

                            <br>


                            <table class="table table-responsive table-bordered">
                                  
                                 
                                    
                                    <tr>
                                      <th class="text-center">
                                        Subjects
                                      </th>
                                   
                                      <th class="text-center">
                                        Units
                                      </th>


                                      <th class="text-center">
                                          Day
                                      </th>

                                      <th class="text-center">
                                          Time
                                      </th>

                                      <th class="text-center">
                                          Room
                                      </th>

                                      <th class="text-center">
                                         Instructor
                                      </th>

                                      <th class="text-center" colspan="5">
                                          Enrollment Fees
                                      </th>
                                    </tr>

                                    <?php 

                                    $subject_query = "SELECT tbl_subject.subject_code,
                                                      tbl_subject.subject_description,
                                                      tbl_subject.units,
                                                      tbl_grades.remarks , 
                                                      tbl_studentinfo.studentNo 
                                                      FROM icc_prac3.tbl_subject , 
                                                      icc_prac3.tbl_studentinfo, 
                                                      icc_prac3.tbl_grades 
                                                      WHERE tbl_subject.year_level = tbl_studentinfo.year_level 
                                                      AND tbl_subject.semester_number = tbl_studentinfo.semester_num 
                                                      AND tbl_studentinfo.studentNo = '$loggedUser' 
                                                      AND tbl_subject.subject_code = tbl_grades.subject_code 
                                                      AND tbl_grades.studentNo = tbl_studentinfo.studentNo
                                                      ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

               

                                     $subject_result = mysqli_query($conn, $subject_query);

                                     if( mysqli_num_rows($subject_result) > 0 ){

                                        while( $row = mysqli_fetch_assoc($subject_result) ){

                                          $sbjCode = $row['subject_code'];
                                          $subject_units = $row['units'];
                                          $subject_remarks = $row['remarks'];

                                          ?>

                                          <tr>
                                            <td class="text-center">
                                              <?php echo $sbjCode; ?>
                                            </td >
                              
                                            <td class="text-center">
                                              <?php echo $subject_units; ?>
                                            </td>

                                       
                                             <td class="text-center">
                                          
                                            </td>

                                            <td class="text-center">
                                               
                                            </td>
                                            
                                            <td class="text-center">
                                              
                                            </td>

                                             <td class="text-center">
                                              
                                            </td>
                                            
                                          

                                          </tr>

                                          <?php
                                        }
                                     }
                              
                                      mysqli_close($conn);
                                     ?>
                                     <tr>
                                        <td colspan="5"></td>
                                        <td colspan="5"></td>
                                     </tr>

                                     <tr>
                                        <td align="center" colspan="5">_____________________________ <br>STUDENT SIGNATURE</td>
                                        <td align="center" colspan="5">_____________________________ <br>REGISTAR'S SIGNATURE</td>
                                     
                                    </tr>

                            </table>

                            <table class="table table-responsive table-bordered">
                               <tr>
                                 <th class="text-center">Date</th>
                                 <th class="text-center">OR Number</th>
                                 <th class="text-center">Tuition Fee</th>
                                 <th class="text-center">Reg Fee</th>
                                 <th class="text-center">Misc Fee</th>
                                 <th class="text-center">Others</th>
                                 <th class="text-center">Remarks</th>
                               </tr>

                               <?php

                               for( $i=0;$i<9; $i++ ){

                                ?>
                                <tr>
                                  <td class="text-center">&nbsp;</td>
                                  <td class="text-center">&nbsp; </td>
                                  <td class="text-center"> &nbsp;</td>
                                  <td class="text-center">&nbsp; </td>
                                  <td class="text-center"> &nbsp;</td>
                                  <td class="text-center"> &nbsp;</td>
                                  <td class="text-center"> &nbsp;</td>
                                
                                </tr>
                             

                              <?php } ?>
                                <tr>
                                  <td class="text-center" colspan="2">Discount Granted %:</td>
                                  <td class="text-center">&nbsp; </td>
                                  <td class="text-left" colspan="4" rowspan="2"><h4>Authorized By:</h4> </td>

                               </tr>

                                <tr>
                                  <td class="text-center" colspan="2">Total Tuition:</td>
                                  <td class="text-center">&nbsp; </td>
                               </tr>
                               
                            </table>

                            <br>
                            <table class="table table-bordered table-responsive">
                              <tr>
                                  <th class="text-center">EXAMS</th>
                                  <th class="text-center">PERMIT NUMBER</th>
                                  <th class="text-center">DATE ISSUED</th>
                                  <th class="text-center">RECIEVED BY</th>
                                  <th class="text-center">APPROVED BY</th>
                                  <th class="text-center">REMARKS</th>
                              </tr>

                              <tr>
                                  <td class="text-center">PRELIM</td>
                                  <td class="text-center"></td>
                                  <td class="text-center"></td>
                                  <td class="text-center"></td>
                                  <td class="text-center"></td>
                                  <td class="text-center"></td>
                              </tr>

                               <tr>
                                  <td class="text-center">MIDTERM</td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"></td>
                              </tr>

                               <tr>
                                  <td class="text-center">PREFINAL</td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"></td>
                              </tr>

                               <tr>
                                  <td class="text-center">FINAL</td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"> </td>
                                  <td class="text-center"></td>
                              </tr>
                            

                            </table>

                        </div>
                    
                    </div>

                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->






