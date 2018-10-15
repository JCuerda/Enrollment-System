<?php 
include('session.php');
require('includes/connection.php');


  if( isset($_POST['btn_proceed']) ){
      header('Location: payment.php');
  }


include('includes/header.php'); 
include('navigation_2.php');

?>

	<div class="container" id="mainContainer">

		<div class="container-fluid">

		<?php include('profile_nav2.php'); ?>


				<?php 

                  $query = "SELECT studInfo.studentNo, 
		                  	studInfo.first_name , 
		                  	studInfo.last_name, 
		                  	studInfo.course_id, 
		                  	studInfo.year_level,
		                  	studInfo.semester_num , 
		                  	studInfo.status 
		                 	 FROM tbl_studentinfo studInfo 
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

									 $yr_query = "SELECT tbl_studentinfo.year_level , 
                                                  tbl_studentinfo.semester_num 
                                                  FROM icc_prac3.tbl_studentinfo
                                                  WHERE tbl_studentinfo.studentNo = '$loggedUser'";

                                            $result = mysqli_query($conn,$yr_query);

                                            while( $row = mysqli_fetch_assoc($result) ){
                                                $year = $row['year_level'];
                                                $sem = $row['semester_num'];
                                            }

                                          if( $sem == 2 ){
                                            $enrollment_year = $year + 1;
                                            $sem = 1;
                                          } else {
                                            $enrollment_year = $year;
                                            $sem = 2;
                                          }

                                    $query = "SELECT tbl_subject.subject_code,
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

										} else {
											echo "<tr>
											<td class='text-center'>&nbsp;</td>
											<td class='text-center'></td>
											<td class='text-center'></td>
											<td class='text-center'></td>
											<td class='text-center'></td>
											<td class='text-center'></td>
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
											tbl_studentinfo.studentNo,
											tbl_studentinfo.course_id 
											FROM icc_prac3.tbl_tuition_fee , 
											icc_prac3.tbl_studentinfo
											WHERE tbl_studentinfo.studentNo = '$loggedUser'
											AND tbl_tuition_fee.course_id = tbl_studentinfo.course_id";
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

												$discount_query = "SELECT tbl_studentinfo.studentNo,
																   tbl_studentinfo.course_id,
																   tbl_studentinfo.grant_id,
																   tbl_grants.grant_discount,
																   tbl_tuition_fee.tuition_fee
																   FROM icc_prac3.tbl_studentinfo,
																   icc_prac3.tbl_grants,
																   icc_prac3.tbl_tuition_fee
																   WHERE tbl_studentinfo.studentNo = '$loggedUser'
																   AND tbl_studentinfo.course_id = tbl_tuition_fee.course_id
																   AND tbl_grants.grant_id = tbl_studentinfo.grant_id";

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



		 	<h5 align = center> BACK </h5>

			<h5 align = center> Important to Students </h5>
				<table class="table table-responsive table-bordered">
					<tr>
					
						<th class="text-center"></td>
						<th class="text-center" align = center>DATE</td>
						<th class="text-center" align = center>AMOUNT</td>
						<td  rowspan = 16>
							
							1.&nbsp&nbsp Present this card to the instructor for initial <br>
							<br>
							2.&nbsp&nbsp Withdrawals and Refunds:<br>
							<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2.1&nbsp&nbsp Initial Downpayment amounting to Php_______________________is<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Non-Refundable.<br>
							<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2.2&nbsp&nbsp Withdrawals must be made Officially. Withdrawals made<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbefore the start of classes or within the first week and second<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp week of classes is entitled to refundin excess of Initial<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Downpayment<br>
							<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2.3&nbsp&nbsp NO Refund shall be granted if withdrawals were made after<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp the second week of classes. Instead, student shall pay the<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp remaining balance of their fees.<br>
							<br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2.4 &nbsp&nbsp Processing of Refunds will take atleast three weeks from the <br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp time of filing . Processing fee shall be deducted from the refundable amout.<br>
							<br>
							3.&nbsp&nbsp No change of course or subjects will be permitted without proper<br>
							&nbsp&nbsp&nbsp&nbsp approval.
							<br>
							4.&nbsp&nbsp CERTIFICATE OF CLEARANCE . Before leaving<br>
							&nbsp&nbsp&nbsp&nbsp the Institution, every student should secure Transfer of Credentials from<br>
							&nbsp&nbsp&nbsp&nbsp the Registrar's Office<br>
							<br>
							5.&nbsp&nbsp Incomplete grades must be completed within six(6) months from <br>
							&nbsp&nbsp&nbsp&nbsp the date of grade distribution.<br>
						</td>
					</tr>
					<tr>
						<td class="text-center" align = center><strong>CASH</strong></td>
						<td class="text-center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp /&nbsp&nbsp&nbsp&nbsp  / &nbsp </td>
						<td class="text-center">P</td>
					</tr>
					<tr>
						
						<td class="text-center" colspan = 3></td>
					
					</tr>
					<tr>
					
						<td class="text-center" align = center>INSTALLMENT</td>
						<td class="text-center" align = center>DATE</td>
						<td class="text-center" align = center>AMOUNT</td>
					</tr>
					<tr>
						
						<td class="text-center" >DOWNPAYMENT</td>
						<td class="text-center"></td>

						<?php 


							$downpayment_query = "SELECT tbl_payment.payment_amount 
												 FROM icc_prac3.tbl_payment
												 WHERE tbl_payment.studentNo = '$loggedUser'
												 AND tbl_payment.status = 'new'
												 AND tbl_payment.payment_status = 'Approved'";

							$downpayment_result = mysqli_query($conn,$downpayment_query);

							while( $row = mysqli_fetch_assoc($downpayment_result) ){
								$downpayment = $row['payment_amount'];
							}

						 ?>

						<td class="text-center" >Php&nbsp;<?php echo number_format($downpayment); ?></td>
						

						<?php 

							$installment_amount = $discounted_amount - $downpayment;

							$per_exam_payment = $installment_amount / 4;



						 ?>


					</tr>
					
					<tr>
						<td class="text-center" align = center>ON THE</td>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center" align = center> PRELIM</td>
						<td class="text-center"></td>
						<td class="text-center" rowspan =4 align = center>Php&nbsp; <?php echo number_format($per_exam_payment); ?> (4x)</td>
					</tr>
					<tr>
						<td class="text-center" align = center>MID-TERM</td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center" align = center>PRE-FINAL</td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center" align = center>FINAL</td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
					</tr>
					<tr>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
					</tr>
					<tr>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
					</tr>
					<tr>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
					</tr>
					<tr>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
						<td class="text-center">&nbsp</td>
					</tr>
					<tr>
						<td class="text-center" colspan = 3 align = center>TOTAL AMOUT DUE  : <strong> Php&nbsp;<?php echo number_format($discounted_amount); ?></strong><br>
						&nbsp&nbsp&nbsp That I promise to pay ICC <br>
						before the end of the semester as <br>
						&nbsp&nbsp per dates and the amounts stated herein</td>
					</tr>
				</table>
		
	</div>
</div>


<?php include('includes/footer.php'); ?>