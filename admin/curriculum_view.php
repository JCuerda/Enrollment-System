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
                                            FROM tbl_subject , tbl_curriculum
                                             WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                             AND tbl_subject.course_curriculum = '$the_curriculum_id' 
                                             ORDER BY tbl_subject.year_level , 
                                             tbl_subject.semester_number 
                                             ASC LIMIT $start_from , $limit";

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
                                              <a href = "../admin/edit_curriculum.php?curriculum_id=<?php {echo $the_curriculum_id;}?>&edit=<?php {echo $subject_code; }?>" role="button"> <i class="fa fa-fw fa-edit"></i></a>
                                          </td>
                                          
                                        </tr>

                                        <?php } ?>
                                  </table>

                                      <?php 

                                        $query = "SELECT COUNT(tbl_subject.subject_code)
                                                  FROM tbl_subject , tbl_curriculum 
                                                  WHERE tbl_curriculum.curriculum_id = '$the_curriculum_id' 
                                                  AND tbl_subject.course_curriculum ='$the_curriculum_id'";

                                          $result = mysqli_query($conn,$query);

                                              $row = mysqli_fetch_row($result);
                                              $total_row = $row[0];
                                              $total_pages = ceil($total_row / $limit);

                                              $page = "<ul class='pagination pull-right' id='pagination'>
                                               <li>
                                                        <a href='#'' aria-label='Previous'>
                                                          <span aria-hidden='true'>&laquo;</span>
                                                        </a>
                                                      </li>";
                                                                                               



                                              for( $i= 1;$i<=$total_pages; $i++ ){

                                                  $page .="<li><a href='view_curriculum.php?view=".$the_curriculum_id."&page=".$i."'>".$i."</a></li>";
                                              };

                                              echo $page ."<li><a href='#'' aria-label='Next'>
                                                              <span aria-hidden='true'>&raquo;</span>
                                                            </a>
                                                          </li></ul>";
                                           
                                       ?>
                               </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->


 <?php include('includes/footer.php'); ?>
