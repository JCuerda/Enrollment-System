<?php 
include('session.php');
require('includes/connection.php');


  if( isset($_POST['btn_proceed']) ){

      header('Location: payment_manila.php');

  }

include('includes/header.php'); 
include('navigation_2.php');

?>


	<div class="container" id="mainContainer">

		<div class="container-fluid">

		<?php include('profile_nav_manila.php'); ?>

				<?php 

                  $query = "SELECT studInfo.studentNo, 
		                  	studInfo.first_name , 
		                  	studInfo.last_name, 
		                  	studInfo.course_id, 
		                  	studInfo.year_level,
		                  	studInfo.semester_num , 
		                  	studInfo.status 
		                 	 FROM tbl_studentinfo_manila studInfo 
		                 	 WHERE studInfo.studentNo = '$loggedUser'";

                  $result = mysqli_query($conn,$query);

                  while( $row = mysqli_fetch_assoc($result)){

                          $student_number = $row['studentNo'];
                          $student_fname = $row['first_name'];
                          $student_lastName = $row['last_name'];
                          $student_course = $row['course_id'];
                          $student_yrLevel = $row['year_level'];
                          $student_semNumber = $row['semester_num'];
                          $student_status = $row['status'];

                  }  

                ?>

                            <div class="row">
                               <div class="col-sm-12">
                                   <table class="table table-responsive table-bordered">
                                        <tr>
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
                                            Current Student Year
                                          </th>
                                          <th class="text-center"> Action </th>

                                        </tr>
                                        <tr>
                                         
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
                                            <a href="javascript:window.print();" class="btn btn-success btn-xs" id="printbtn" role="button"> <i class="fa fa-print"></i>&nbsp;Print </a>
                                          </td> 

                                        </tr>
                                  </table>
                               </div>
                            </div>


					<div class="row">
						<div class="col-xs-6">		
								<table class="table table-responsive table-bordered">

									<tr>
										<th  class="text-center">SUBJECTS</td>
										<th  class="text-center">UNITS</td>
										<th  class="text-center">DAY</td>
										<th class="text-center">TIME</td>
										<th  class="text-center">INST. INITIAL</td>
										<th  class="text-center">ROOM</td>						
									</tr>

									<?php

									 $yr_query = "SELECT tbl_studentinfo_manila.year_level , 
                                                  tbl_studentinfo_manila.semester_num 
                                                  FROM icc_prac3.tbl_studentinfo_manila
                                                  WHERE tbl_studentinfo_manila.studentNo = '$loggedUser'";

                                            $result = mysqli_query($conn,$yr_query);

                                            while( $row = mysqli_fetch_assoc($result) ){
                                                $year = $row['year_level'];
                                                $sem = $row['semester_num'];
                                            }

                                          // if( $sem == 2 ){
                                          //   $enrollment_year = $year + 1;
                                          // } else {
                                          //   $enrollment_year = $year;
                                          // }

                                            $enrollment_year = $year + 1;


									 $query = "SELECT tbl_subject.subject_code,
                                              tbl_subject.subject_description,
                                              tbl_grades_manila.remarks , tbl_subject.units, 
                                              tbl_studentinfo_manila.studentNo 
                                              FROM icc_prac3.tbl_subject , 
                                              icc_prac3.tbl_studentinfo_manila, 
                                              icc_prac3.tbl_grades_manila 
                                              WHERE tbl_subject.year_level = '$enrollment_year'
                                              -- AND tbl_subject.semester_number != tbl_studentinfo_manila.semester_num 
                                              AND tbl_grades_manila.studentNo = tbl_studentinfo_manila.studentNo
                                              AND tbl_studentinfo_manila.studentNo = '$loggedUser' 
                                              AND tbl_subject.subject_code = tbl_grades_manila.subject_code 
                                             -- AND tbl_grades.remarks != 'Completed'
                                              ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

                                    $result = mysqli_query($conn,$query);
                               		$total_units = 0;
                               		$ctr = 1;
                                    while( $row = mysqli_fetch_assoc($result)){
                                        $subject_code = $row['subject_code'];
                                        $subject_description = $row['subject_description']; 
                                        $subject_units = $row['units'];
                                   		$total_units = $total_units + $subject_units;

                                   		$ctr++;
										?>
									
										<tr>
											<td class="text-center"><?php echo $subject_code ?></td>
											<td class="text-center"><?php echo $subject_units; ?></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
										</tr>

										<?php } 

										if ( $ctr == 9 ){
											echo "<tr>
											<td class='text-center'><?php echo $subject_code ?></td>
											<td class='text-center'><?php echo $subject_units; ?></td>
											<td class='text-center'></td>
											<td class='text-center'></td>
											<td class='text-center'></td>
											<td class='text-center'></td>
										</tr>";

										}  else {
											echo "<tr>
											<td class='text-center'>&nbsp;</td>
											<td class='text-center'>&nbsp;</td>
											<td class='text-center'>&nbsp;</td>
											<td class='text-center'>&nbsp;</td>
											<td class='text-center'>&nbsp;</td>
											<td class='text-center'>&nbsp;</td>
										</tr>";
										}



										?>
										<tr>
											<td class="text-center">TOTAL</td>
											<td class="text-center"><?php echo $total_units; ?></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
										</tr>
								</table>

				</div>
				

				<div class="col-xs-6">

						<?php 


							$tuition_query = "SELECT tbl_tuition_fee.*, 
											tbl_studentinfo_manila.studentNo,
											tbl_studentinfo_manila.course_id 
											FROM icc_prac3.tbl_tuition_fee , 
											icc_prac3.tbl_studentinfo_manila
											WHERE tbl_studentinfo_manila.studentNo = '$loggedUser'
											AND tbl_tuition_fee.course_id = tbl_studentinfo_manila.course_id";
							$tuition_result = mysqli_query($conn,$tuition_query);
							$total_amout_due = 0;
							while( $row = mysqli_fetch_assoc($tuition_result) ){
									$tuition_fee = $row['tuition_fee'];
									$lecture_fee = $row['lecture_fee'];
									$laboratory_fee = $row['laboratory_fee'];
									$registration_fee = $row['registration_fee'];
									$misc_fee = $row['misc_fee'];
									
							}

						 ?>

						<table class="table table-responsive table-bordered">
						<?php  $total_amout_due  = $tuition_fee + $lecture_fee + $laboratory_fee + $registration_fee + $misc_fee; ?>

											<tr><th class="text-center" colspan="2">ENROLLMENT FEES</th></tr>
											<tr>
												<td class="text-center">Tuition Fee:	</td>
												<td class="text-center">P&nbsp; <?php echo number_format($tuition_fee); ?></td>
											</tr>
											<tr>
												<td class="text-center">&nbsp&nbsp&nbsp&nbsp Lecture</td>
												<td class="text-center">P&nbsp; <?php echo number_format($lecture_fee); ?></td>
											</tr>
											<tr>
												<td class="text-center">&nbsp&nbsp&nbsp&nbsp Laboratory</td>
												<td class="text-center">P&nbsp; <?php echo number_format($laboratory_fee); ?> </td>
											</tr>
											<tr>
												<td class="text-center">&nbsp&nbsp&nbsp&nbsp NSTP / OJT Service Fee</td>
												<td class="text-center"></td>
											</tr>
											<tr>
												<td class="text-center">Registration Fee:</td>
												<td class="text-center">P&nbsp; <?php echo number_format($registration_fee); ?></td>
											</tr>
											<tr>
												<td class="text-center">Miscellaneous Fees:</td>
												<td class="text-center">P&nbsp; <?php echo number_format($misc_fee); ?></td>
											</tr>
				
											<tr>
												<td class="text-center">TOTAL AMOUT DUE </td>
												<td class="text-center">P&nbsp;
													<strong> <?php echo number_format($total_amout_due); ?></strong>
														
												</td>
											</tr>

											<tr>

											<?php 

												$discount_query = "SELECT tbl_studentinfo_manila.studentNo,
																   tbl_studentinfo_manila.course_id,
																   tbl_studentinfo_manila.grant_id,
																   tbl_grants.grant_discount,
																   tbl_tuition_fee.tuition_fee
																   FROM icc_prac3.tbl_studentinfo_manila,
																   icc_prac3.tbl_grants,
																   icc_prac3.tbl_tuition_fee
																   WHERE tbl_studentinfo_manila.studentNo = '$loggedUser'
																   AND tbl_studentinfo_manila.course_id = tbl_tuition_fee.course_id
																   AND tbl_grants.grant_id = tbl_studentinfo_manila.grant_id";

												$discount_result = mysqli_query($conn,$discount_query);

												while( $row = mysqli_fetch_assoc($discount_result) ){

													$grant_id = $row['grant_id'];
													$grant_discount = $row['grant_discount'];
												}

												$discount = $tuition_fee * $grant_discount;
												$tuition_fee = $tuition_fee - $discount;

												$discounted_amount = $tuition_fee + $lecture_fee + $laboratory_fee + $registration_fee + $misc_fee;

											 ?>


												<td class="text-center">AMOUNT DUE (Discounted)</td>
												<td class="text-center">P&nbsp; <strong><?php echo number_format($discounted_amount); ?></strong></td>
											</tr>

											<tr>
												<td class="text-center">Cash Basis</td> 
												<td class="text-center" >P __________</td>
											</tr>

											<tr><td colspan="2">&nbsp;</td></tr>
											<tr><td colspan="2">&nbsp;</td></tr>


										</table>


								</div>
							</div>

							 <div class="row">
                                        <div class="col-md-11"></div>
                                          
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                              <input type="submit" name="btn_proceed" class="btn btn-success btn-md" value="Proceed" id="btnProceed">
                                            </form>

                                    </div>
	</div>
</div>


<?php include('includes/footer.php'); ?>