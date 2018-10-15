<?php

  include('admin_session.php');
  $alertMessage = "";

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
                          <li><a href="../admin/Administration.php">Administration</a></li>
                          <li><a href="../admin/enrolled_choose_branch.php">Choose Branch</a></li>
                          <li><a href="../admin/enrolled.php">Enrolled : Caloocan</a></li>
                        
                      </ol>
                    </div>
                </div>
     
                    <div class="col-md-12">
                            <div class="row">
                               <div class="col-sm-12">
                                   <table class="table table-responsive table-bordered">
                                        <tr>

                                          <th class="text-center">
                                            Year Level
                                          </th>
                                          <th class="text-center">
                                            View
                                          </th>
                                        </tr>

                                        <?php include('admin_nav2.php'); ?>
                       
                                          <!--profile content here-->
                                          <div class="container-fluid">
                                              <tr>
                                                    <td class="text-center">First Year</td>
                                                    <td class="text-center"><a href="../admin/enrolled_year.php?year=1"><i class="fa fa-pencil-square"></i></a></td>
                                              </tr>
                                              <tr>
                                                    <td class="text-center">Second Year</td>
                                                    <td class="text-center"><a href="../admin/enrolled_year.php?year=2"><i class="fa fa-pencil-square"></i></a></td>
                                              </tr>
                                              <tr>
                                                    <td class="text-center">Third Year</td>
                                                    <td class="text-center"><a href="../admin/enrolled_year.php?year=3"><i class="fa fa-pencil-square"></i></a></td>
                                              </tr>
                                              <tr>
                                                    <td class="text-center">Fourth Year</td>
                                                    <td class="text-center"><a href="../admin/enrolled_year.php?year=4"> <i class="fa fa-pencil-square"></i></a></td> 
                                              </tr>
                                          </div>
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
 