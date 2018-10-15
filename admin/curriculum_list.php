<?php

  include('admin_session.php');
  $alertMessage = "";


  if(isset( $_GET['alert'] )){

     if( $_GET['alert'] == 'success' ){

         $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-success'>
                              <strong>Successfully Updated Curriculum <a class='close' data-dismiss='alert'>&times</a> </strong> 
                          </div></div></div>";
     } 

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
                          <li><a href="../admin/curriculum_list.php">Curriculum List</a></li>
                        
                      </ol>
                    </div>
                </div>
     
                      <div class="col-md-12">
                            <div class="row">
                               <div class="col-sm-12">
                                  <div class="table-responsive ">
                                   <table class="table table-bordered">

                                        <tr>
                                          <th class="text-center" colspan="3"> <h4><strong>Bachelors Degree Curriculums </strong> </h4> </th>
                                        </tr>
                                        <tr>
                                          <th class="text-center">
                                            Curriculum ID
                                          </th>
                                          <th class="text-center">
                                            Curriculum Description
                                          </th>
                                          

                                          <th class="text-center">
                                            View
                                          </th>
                                        </tr>
                                        <tr>

                                        <?php include('admin_nav2.php'); ?>
                       
                                          <!--profile content here-->
                                          <div class="container-fluid">

                                            <?php 

                                                
                                                $query = "SELECT * FROM icc_prac3.tbl_curriculum 
                                                WHERE tbl_curriculum.time_to_complete = 4 
                                                OR tbl_curriculum.time_to_complete = 5";


                                                $result = mysqli_query($conn,$query);
                                                if( mysqli_num_rows($result) > 0 ){

                                                    while( $row = mysqli_fetch_assoc($result) ){

                                                      $curriculum_id = $row['curriculum_id'];
                                                      $curriculum_description = $row['curriculum_description'];

                                                 

                                             ?>
                                         
                                          <td class="text-center">
                                          <?php echo $curriculum_id; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                           <?php echo $curriculum_description; ?>
                                          </td>
                                         
                                         
                                          <td class="text-center">
                                         <!--   <a href="../admin/view_curriculum.php?view=<?php {echo $curriculum_id;}?>" role="button" disable><i class="fa fa-pencil-square"></i></a>  -->

                                           <a href="../admin/curriculum.php?view=<?php {echo $curriculum_id;}?>" role="button" disable><i class="fa fa-pencil-square"></i></a> 
                                          </td>
                                          
                                        </tr>

                                        <?php 
                                            }
                                        }


                                        ?>

                                  </table>
                                </div>
                               </div>
                            </div>



                            <!-- 2 year course curriculum -->

                            <div class="row">
                               <div class="col-sm-12">
                                  <div class="table-responsive ">
                                   <table class="table table-bordered">

                                        <tr>
                                          <th class="text-center" colspan="3"><h4><strong>Two Years Diploma Curriculums </strong> </h4></th>
                                        </tr>
                                        <tr>
                                          <th class="text-center">
                                            Curriculum ID
                                          </th>
                                          <th class="text-center">
                                            Curriculum Description
                                          </th>
                                          

                                          <th class="text-center">
                                            View
                                          </th>
                                        </tr>
                                        <tr>
                       
                                          <!--profile content here-->
                                          <div class="container-fluid">

                                            <?php 

                                                
                                                $query = "SELECT * FROM icc_prac3.tbl_curriculum WHERE tbl_curriculum.time_to_complete = 2";


                                                $result = mysqli_query($conn,$query);
                                                if( mysqli_num_rows($result) > 0 ){

                                                    while( $row = mysqli_fetch_assoc($result) ){

                                                      $curriculum_id = $row['curriculum_id'];
                                                      $curriculum_description = $row['curriculum_description'];

                                                 

                                             ?>
                                         
                                          <td class="text-center">
                                          <?php echo $curriculum_id; ?>
                                          </td >
                                         
                                          <td class="text-center">
                                           <?php echo $curriculum_description; ?>
                                          </td>
                                         
                                         
                                          <td class="text-center">
                                         <!--   <a href="../admin/view_curriculum.php?view=<?php {echo $curriculum_id;}?>" role="button" disable><i class="fa fa-pencil-square"></i></a>  -->

                                           <a href="../admin/diploma_course_curriculum.php?view=<?php {echo $curriculum_id;}?>" role="button" disable><i class="fa fa-pencil-square"></i></a> 
                                          </td>
                                          
                                        </tr>

                                        <?php 
                                            }
                                        }

                                        mysqli_close($conn);
                                        ?>

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
 