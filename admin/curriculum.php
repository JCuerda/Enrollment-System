<?php 

  include('admin_session.php');
  require('includes/connection.php');

  $alertMessage = "";
  
  $limit = 10;
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
  $start_from = ($page-1) * $limit;

 if( isset($_GET['view']) ){
      $the_curriculum_id = $_GET['view'];
  } else {
    header('Location: ../admin/curriculum_list.php');
  }

  include('includes/header.php');
  include('../admin/navigation_admin2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                      <ol class="breadcrumb">
                          <li><a href="../admin/Administration.php">Administration</a></li>
                          <li><a href="../admin/curriculum_list.php">Curriculum List</a></li>
                          <li><a href="../admin/view_curriculum.php">View Curriculum</a></li>
                      </ol>
                    </div>
                </div>

                <?php echo $alertMessage; ?>
     
                    <div class="col-md-12">
                       <?php include('admin_nav2.php'); ?>
                       
                        <!--profile content here-->
                        <div class="container-fluid">

                            <div class="row">
                               <div class="col-sm-12">
                                   <table class="table table-responsive table-bordered">
                                        <tr>
                                            <th class ="text-center" colspan="6">
                                            <?php echo $the_curriculum_id;?> &nbsp; &nbsp;First Year - First Semester
                                              
                                            </th>
                                          </tr>

                                           <tr><td> </td></tr>

                                        <tr>

                                          <th class="text-center">
                                            Subject Code
                                          </th>
                                          <th class="text-center">
                                            Subject Description
                                          </th>
                                          <th class="text-center">
                                            Units
                                          </th>
                                          <th class="text-center">
                                            Year Level
                                          </th>
                                          <th class="text-center">
                                            Semester Number
                                          </th>
                                          <th class="text-center">
                                            Edit
                                          </th>
            
                                        </tr>

                                        <?php 

                                            $query = "SELECT tbl_subject.subject_code, 
                                                      tbl_subject.subject_description , 
                                                      tbl_subject.year_level , 
                                                      tbl_subject.semester_number , 
                                                      tbl_subject.units 
                                                      FROM tbl_subject , 
                                                      tbl_curriculum 
                                                      WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                      AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                      AND tbl_subject.year_level = 1 
                                                      AND tbl_subject.semester_number = 1";

                                            $result = mysqli_query($conn,$query);

                                            while( $row = mysqli_fetch_assoc($result)){

                                                    $subject_code = $row['subject_code'];
                                                    $subject_description = $row['subject_description'];
                                                    $yrLevel = $row['year_level'];
                                                    $semNumber = $row['semester_number'];
                                                    $subject_unit = $row['units'];
                                       
                                       ?>


                                        <tr>
                                         
                                          <td class="text-center">
                                          <?php echo $subject_code; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                           <?php echo $subject_description; ?>
                                          </td>

                                          <td class="text-center">
                                          <?php echo $subject_unit; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                          <?php echo $yrLevel; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                            <?php echo $semNumber; ?>
                                          </td>
                                          

                                          <td class="text-center">
                                              <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
                                          </td>
                                          
                                        </tr>

                                        <?php } ?>
                                  </table>

                                  </div>

                        
                               <div class="col-sm-12">
                                   <table class="table table-responsive table-bordered">
                                        <tr>
                                            <th class ="text-center" colspan="6">
                                            <?php echo $the_curriculum_id;?> &nbsp; &nbsp;First Year - Second Semester
                                              
                                            </th>
                                          </tr>

                                           <tr><td> </td></tr>
                                        <tr>

                                          <th class="text-center">
                                            Subject Code
                                          </th>
                                          <th class="text-center">
                                            Subject Description
                                          </th>
                                          <th class="text-center">
                                            Units
                                          </th>
                                          <th class="text-center">
                                            Year Level
                                          </th>
                                          <th class="text-center">
                                            Semester Number
                                          </th>
                                          <th class="text-center">
                                            Edit
                                          </th>
            
                                        </tr>

                                        <?php 

                                            $query = "SELECT tbl_subject.subject_code, 
                                                    tbl_subject.subject_description , 
                                                    tbl_subject.year_level , 
                                                    tbl_subject.semester_number , 
                                                    tbl_subject.units 
                                                    FROM tbl_subject , 
                                                    tbl_curriculum 
                                                    WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                    AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                    AND tbl_subject.year_level = 1
                                                    AND tbl_subject.semester_number = 2";
                                            $result = mysqli_query($conn,$query);

                                            while( $row = mysqli_fetch_assoc($result)){

                                                    $subject_code = $row['subject_code'];
                                                    $subject_description = $row['subject_description'];
                                                    $yrLevel = $row['year_level'];
                                                    $semNumber = $row['semester_number'];
                                                    $subject_unit = $row['units'];
                                       
                                       ?>


                                        <tr>
                                         
                                          <td class="text-center">
                                          <?php echo $subject_code; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                           <?php echo $subject_description; ?>
                                          </td>

                                          <td class="text-center">
                                          <?php echo $subject_unit; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                          <?php echo $yrLevel; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                            <?php echo $semNumber; ?>
                                          </td>
                                          

                                          <td class="text-center">
                                              <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
                                          </td>
                                          
                                        </tr>

                                        <?php } ?>
                                  </table>


                                  </div>
          
                   
                                   <div class="col-sm-12">
                                       <table class="table table-responsive table-bordered">
                                            <tr>
                                                <th class ="text-center" colspan="6">
                                                <?php echo $the_curriculum_id;?> &nbsp; &nbsp;Second Year - First Semester
                                                  
                                                </th>
                                              </tr>
                                            <tr>
                                             <tr><td> </td></tr>

                                              <th class="text-center">
                                                Subject Code
                                              </th>
                                              <th class="text-center">
                                                Subject Description
                                              </th>
                                              <th class="text-center">
                                                Units
                                              </th>
                                              <th class="text-center">
                                                Year Level
                                              </th>
                                              <th class="text-center">
                                                Semester Number
                                              </th>
                                              <th class="text-center">
                                                Edit
                                              </th>
                
                                            </tr>

                                            <?php 

                                                $query = "SELECT tbl_subject.subject_code, 
                                                          tbl_subject.subject_description , 
                                                          tbl_subject.year_level , 
                                                          tbl_subject.semester_number , 
                                                          tbl_subject.units 
                                                          FROM tbl_subject , 
                                                          tbl_curriculum
                                                           WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                           AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                           AND tbl_subject.year_level = 2 
                                                           AND tbl_subject.semester_number = 1";

                                                $result = mysqli_query($conn,$query);

                                                while( $row = mysqli_fetch_assoc($result)){

                                                        $subject_code = $row['subject_code'];
                                                        $subject_description = $row['subject_description'];
                                                        $yrLevel = $row['year_level'];
                                                        $semNumber = $row['semester_number'];
                                                        $subject_unit = $row['units'];
                                           
                                           ?>


                                            <tr>
                                             
                                              <td class="text-center">
                                              <?php echo $subject_code; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                               <?php echo $subject_description; ?>
                                              </td>

                                              <td class="text-center">
                                              <?php echo $subject_unit; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                              <?php echo $yrLevel; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                                <?php echo $semNumber; ?>
                                              </td>
                                              

                                              <td class="text-center">
                                                  <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
                                              </td>
                                              
                                            </tr>

                                            <?php } ?>
                                      </table>
                                  </div>

                             
                                   <div class="col-sm-12">
                                       <table class="table table-responsive table-bordered">
                                            <tr>
                                                <th class ="text-center" colspan="6">
                                                <?php echo $the_curriculum_id;?> &nbsp; &nbsp;Second Year - Second Semester
                                                  
                                                </th>
                                              </tr>
                                            <tr>

                                             <tr><td> </td></tr>

                                              <th class="text-center">
                                                Subject Code
                                              </th>
                                              <th class="text-center">
                                                Subject Description
                                              </th>
                                              <th class="text-center">
                                                Units
                                              </th>
                                              <th class="text-center">
                                                Year Level
                                              </th>
                                              <th class="text-center">
                                                Semester Number
                                              </th>
                                              <th class="text-center">
                                                Edit
                                              </th>
                
                                            </tr>

                                            <?php 

                                                $query = "SELECT tbl_subject.subject_code, 
                                                          tbl_subject.subject_description , 
                                                          tbl_subject.year_level , 
                                                          tbl_subject.semester_number , 
                                                          tbl_subject.units 
                                                          FROM tbl_subject , 
                                                          tbl_curriculum 
                                                          WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id'
                                                          AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                          AND tbl_subject.year_level = 2 
                                                          AND tbl_subject.semester_number = 2";

                                                $result = mysqli_query($conn,$query);

                                                while( $row = mysqli_fetch_assoc($result)){

                                                        $subject_code = $row['subject_code'];
                                                        $subject_description = $row['subject_description'];
                                                        $yrLevel = $row['year_level'];
                                                        $semNumber = $row['semester_number'];
                                                        $subject_unit = $row['units'];
                                           
                                           ?>


                                            <tr>
                                             
                                              <td class="text-center">
                                              <?php echo $subject_code; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                               <?php echo $subject_description; ?>
                                              </td>

                                              <td class="text-center">
                                              <?php echo $subject_unit; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                              <?php echo $yrLevel; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                                <?php echo $semNumber; ?>
                                              </td>
                                              

                                              <td class="text-center">
                                                  <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
                                              </td>
                                              
                                            </tr>

                                            <?php } ?>
                                      </table>
                                   </div>

                             
                                   <div class="col-sm-12">
                                       <table class="table table-responsive table-bordered">
                                            <tr>
                                                <th class ="text-center" colspan="6">
                                                <?php echo $the_curriculum_id;?> &nbsp; &nbsp;Third Year - First Semester
                                                  
                                                </th>
                                              </tr>

                                               <tr><td> </td></tr>
                                            <tr>

                                              <th class="text-center">
                                                Subject Code
                                              </th>
                                              <th class="text-center">
                                                Subject Description
                                              </th>
                                              <th class="text-center">
                                                Units
                                              </th>
                                              <th class="text-center">
                                                Year Level
                                              </th>
                                              <th class="text-center">
                                                Semester Number
                                              </th>
                                              <th class="text-center">
                                                Edit
                                              </th>
                
                                            </tr>

                                            <?php 

                                                $query = "SELECT tbl_subject.subject_code, 
                                                          tbl_subject.subject_description , 
                                                          tbl_subject.year_level , 
                                                          tbl_subject.semester_number , 
                                                          tbl_subject.units 
                                                          FROM tbl_subject , 
                                                          tbl_curriculum 
                                                          WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                          AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                          AND tbl_subject.year_level = 3 
                                                          AND tbl_subject.semester_number = 1";

                                                $result = mysqli_query($conn,$query);

                                                while( $row = mysqli_fetch_assoc($result)){

                                                        $subject_code = $row['subject_code'];
                                                        $subject_description = $row['subject_description'];
                                                        $yrLevel = $row['year_level'];
                                                        $semNumber = $row['semester_number'];
                                                        $subject_unit = $row['units'];
                                           
                                           ?>


                                            <tr>
                                             
                                              <td class="text-center">
                                              <?php echo $subject_code; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                               <?php echo $subject_description; ?>
                                              </td>

                                              <td class="text-center">
                                              <?php echo $subject_unit; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                              <?php echo $yrLevel; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                                <?php echo $semNumber; ?>
                                              </td>
                                              

                                              <td class="text-center">
                                                  <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
                                              </td>
                                              
                                            </tr>

                                            <?php } ?>
                                      </table>
                                   </div>
                               
                                  <div class="col-sm-12">
                                       <table class="table table-responsive table-bordered">
                                            <tr>
                                                <th class ="text-center" colspan="6">
                                                <?php echo $the_curriculum_id;?> &nbsp; &nbsp;Third Year - Second Semester
                                                  
                                                </th>
                                              </tr>
                                            <tr>
                                             <tr><td> </td></tr>

                                              <th class="text-center">
                                                Subject Code
                                              </th>
                                              <th class="text-center">
                                                Subject Description
                                              </th>
                                              <th class="text-center">
                                                Units
                                              </th>
                                              <th class="text-center">
                                                Year Level
                                              </th>
                                              <th class="text-center">
                                                Semester Number
                                              </th>
                                              <th class="text-center">
                                                Edit
                                              </th>
                
                                            </tr>

                                            <?php 

                                                $query = "SELECT tbl_subject.subject_code, 
                                                          tbl_subject.subject_description , 
                                                          tbl_subject.year_level , 
                                                          tbl_subject.semester_number , 
                                                          tbl_subject.units 
                                                          FROM tbl_subject , 
                                                          tbl_curriculum 
                                                          WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                          AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                          AND tbl_subject.year_level = 3 
                                                          AND tbl_subject.semester_number = 2";

                                                $result = mysqli_query($conn,$query);

                                                while( $row = mysqli_fetch_assoc($result)){

                                                        $subject_code = $row['subject_code'];
                                                        $subject_description = $row['subject_description'];
                                                        $yrLevel = $row['year_level'];
                                                        $semNumber = $row['semester_number'];
                                                        $subject_unit = $row['units'];
                                           
                                           ?>


                                            <tr>
                                             
                                              <td class="text-center">
                                              <?php echo $subject_code; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                               <?php echo $subject_description; ?>
                                              </td>

                                              <td class="text-center">
                                              <?php echo $subject_unit; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                              <?php echo $yrLevel; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                                <?php echo $semNumber; ?>
                                              </td>
                                              

                                              <td class="text-center">
                                                  <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
                                              </td>
                                              
                                            </tr>

                                            <?php } ?>
                                      </table>
                                   </div>


                                   <div class="col-sm-12">
                                       <table class="table table-responsive table-bordered">
                                            <tr>
                                                <th class ="text-center" colspan="6">
                                                <?php echo $the_curriculum_id;?> &nbsp; &nbsp;Fourth Year - First Semester
                                                  
                                                </th>
                                              </tr>
                                            <tr>
                                             <tr><td> </td></tr>

                                              <th class="text-center">
                                                Subject Code
                                              </th>
                                              <th class="text-center">
                                                Subject Description
                                              </th>
                                              <th class="text-center">
                                                Units
                                              </th>
                                              <th class="text-center">
                                                Year Level
                                              </th>
                                              <th class="text-center">
                                                Semester Number
                                              </th>
                                              <th class="text-center">
                                                Edit
                                              </th>
                
                                            </tr>

                                            <?php 

                                                $query = "SELECT tbl_subject.subject_code, 
                                                          tbl_subject.subject_description , 
                                                          tbl_subject.year_level , 
                                                          tbl_subject.semester_number , 
                                                          tbl_subject.units 
                                                          FROM tbl_subject , 
                                                          tbl_curriculum 
                                                          WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                          AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                          AND tbl_subject.year_level = 4 
                                                          AND tbl_subject.semester_number = 1";
                                                $result = mysqli_query($conn,$query);

                                                while( $row = mysqli_fetch_assoc($result)){

                                                        $subject_code = $row['subject_code'];
                                                        $subject_description = $row['subject_description'];
                                                        $yrLevel = $row['year_level'];
                                                        $semNumber = $row['semester_number'];
                                                        $subject_unit = $row['units'];
                                           
                                           ?>


                                            <tr>
                                             
                                              <td class="text-center">
                                              <?php echo $subject_code; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                               <?php echo $subject_description; ?>
                                              </td>

                                              <td class="text-center">
                                              <?php echo $subject_unit; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                              <?php echo $yrLevel; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                                <?php echo $semNumber; ?>
                                              </td>
                                              

                                              <td class="text-center">
                                                  <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
                                              </td>
                                              
                                            </tr>

                                            <?php } ?>
                                      </table>
                                   </div>


                                   <div class="col-sm-12">
                                       <table class="table table-responsive table-bordered">
                                            <tr>
                                                <th class ="text-center" colspan="6">
                                                <?php echo $the_curriculum_id;?> &nbsp; &nbsp;Fourth Year - Second Semester
                                                  
                                                </th>
                                              </tr>
                                            <tr>
                                             <tr><td> </td></tr>

                                              <th class="text-center">
                                                Subject Code
                                              </th>
                                              <th class="text-center">
                                                Subject Description
                                              </th>
                                              <th class="text-center">
                                                Units
                                              </th>
                                              <th class="text-center">
                                                Year Level
                                              </th>
                                              <th class="text-center">
                                                Semester Number
                                              </th>
                                              <th class="text-center">
                                                Edit
                                              </th>
                
                                            </tr>

                                            <?php 

                                                $query = "SELECT tbl_subject.subject_code, 
                                                          tbl_subject.subject_description , 
                                                          tbl_subject.year_level , 
                                                          tbl_subject.semester_number , 
                                                          tbl_subject.units 
                                                          FROM tbl_subject , 
                                                          tbl_curriculum 
                                                          WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                          AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                                          AND tbl_subject.year_level = 4 
                                                          AND tbl_subject.semester_number = 2";
                                                          
                                                $result = mysqli_query($conn,$query);

                                                while( $row = mysqli_fetch_assoc($result)){

                                                        $subject_code = $row['subject_code'];
                                                        $subject_description = $row['subject_description'];
                                                        $yrLevel = $row['year_level'];
                                                        $semNumber = $row['semester_number'];
                                                        $subject_unit = $row['units'];
                                           
                                           ?>


                                            <tr>
                                             
                                              <td class="text-center">
                                              <?php echo $subject_code; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                               <?php echo $subject_description; ?>
                                              </td>

                                              <td class="text-center">
                                              <?php echo $subject_unit; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                              <?php echo $yrLevel; ?>
                                              </td >
                                             
                                              <td class="text-center">
                                                <?php echo $semNumber; ?>
                                              </td>
                                              

                                              <td class="text-center">
                                                  <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-pencil-square"></i></a>
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
                </div>
            </div> <!-- end of  container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
