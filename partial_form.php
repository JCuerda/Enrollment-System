<?php include('includes/header.php');
	  include('session.php');


	  include('includes/connection.php');
?>


<div class="container" id="div-id-name">
<div class="row">
<div class="col-md-12" id="mainContainer">

<h1 align = center> FRONT </h1>
	
	<table class="table table-bordered" width =100%>

		<tr>
			<td><h1 align = center><font color = green>Interface</h1></font> <h3 align=center> Computer College</h3> <h3 align = center>REGISTRATION CARD</h3></td>
			<td> <h4 align = center> STUDENT'S<br><h4 align = center> COPY </h4>
		
		<tr>

	</table>


	<table class="table table-bordered" width =100%>
		<form class="form-horizontal">

		 <?php 

              $query = "SELECT tbl_studentinfo.*, tbl_course_info.course_description, tbl_academic_sem.semester_num, tbl_academic_year.year_level
                        FROM icc_prac3.tbl_studentinfo
                        LEFT JOIN icc_prac3.tbl_academic_year ON tbl_studentinfo.year_level = tbl_academic_year.id 
                        LEFT JOIN icc_prac3.tbl_academic_sem ON tbl_studentinfo.semester_num = tbl_academic_sem.id 
                        LEFT JOIN icc_prac3.tbl_course_info ON tbl_studentinfo.course_id = tbl_course_info.course_id
                        WHERE tbl_studentinfo.studentNo ='$loggedUser'";

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
			<tr>
				<td colspan = 2>STUDENT NO. <input type = text name = "studno" value = <?php echo $studNo;?> ></td>
				<td>REG NUMBER <input class="form-group" type = text name = "regNo" value="19816" size= 50></td>
			</tr>
			<tr>
				<td colspan = 2>NAME : <input class="form-group" type = text name = "studName" value = "<?php echo $fname .' '.$Lname;?>" ></td>
				<td colspan = 2 >COURSE: <input class="form-group"  type = text name = "studCourse" value = "DIT-SD" size = 50></td>
			
			</tr>
			
			</tr>
				<td><input type = text name = "semNo" value ="<?php echo $semester_number; ?>">SUMMER/SEMESTER</td>
				<td>SY: <label class="form-control" value=""> <?php echo  $yr_level .' '. $semester_number;?></label></td>
				<td >DATE START <input type = text name = "startDate" value = "June 2016">
			</tr>
		</form>
	</table>
	
	<hr noshade>

	<table border = 3 width = 100%>
		<form class="form-group">
			<tr>
				<td align = center>SUBJECTS</td>
				<td align = center>UNITS</td>
				<td align = center>DAY</td>
				<td align = center>TIME</td>
				<td align = center>INST. INITIAL</td>
				<td align = center>ROOM</td>
				<td colspan = 2 align = center>ENROLLMENT FEES</td>
			</tr>
			
			<tr>
				<td align = center>IT21-9</td>
				<td align = center>2+1</td>
				<td align = center></td>
				<td></td>
				<td></td>
				<td></td>
				<td rowspan = 11>
					<table align = center>
						<tr>
							<td>Tuition Fee:	</td>
							<td><h5 align = center>P 8,250.00</h5></td>
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp Lecture</td>
							<td><h5 align = center>P 3,750.00</h5></td>
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp Laboratory</td>
							<td><input type = text value = ""> </td>
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp NSTP / OJT Service Fee</td>
							<td><input type = text value = ""></td>
						</tr>
						<tr>
							<td>Registration Fee:</td>
							<td><h5 align = center>P 220.00</h5></td>
						</tr>
						<tr>
							<td>Miscellaneous Fees:</td>
							<td></td>
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp Laboratory Deposits</td>
							<td rowspan = 6 align = center><h4>P 3,884.00</h4></td>
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp Medical</td>
							
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp Library</td>
					
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp Athletic</td>
							
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp I.D</td>
							
						</tr>
						<tr>
							<td>&nbsp&nbsp&nbsp&nbsp Others</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>TOTAL ANOUT DUE </td>
							<td><h4 align = center>P 16,104.00</h4></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>AMOUT DUE (Discounted)</td>
							<td><h4 align = center>P 10,104.00</h4></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Cash Basis</td> 
							<td><input type = text value = "P "></td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td align = center>IT21-10</td>
				<td align = center>2+1</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			
				<td align = center>IT21-11</td>
				<td align = center>2+1</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align = center>IT21-12</td>
				<td align = center>3</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align = center>IT21-13</td>
				<td align = center>2+1</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align = center>IT21-14</td>
				<td align = center>2+1</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align = center>IT21-15</td>
				<td align = center>3</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align = center>ENG113</td>
				<td align = center>3</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align = center>PE13</td>
				<td align = center>2</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td> &nbsp</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align = center> TOTAL UNITS</td>
				<td align = center>22+5</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</form>
	</table>
<hr noshade>
<h1 align = center> BACK </h1>
<hr noshade>
<h3 align = center> Important to Students </h3>
	<table border = 2 width = 100%>
		<tr>
		
			<td></td>
			<td align = center>DATE</td>
			<td align = center>AMOUNT</td>
			<td rowspan = 16>
				
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
			<td align = center><strong>CASH</strong></td>
			<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp /&nbsp&nbsp&nbsp&nbsp  / &nbsp </td>
			<td>P</td>
		</tr>
		<tr>
			
			<td colspan = 3></td>
		
		</tr>
		<tr>
		
			<td align = center>INSTALLMENT</td>
			<td align = center>DATE</td>
			<td align = center>AMOUNT</td>
		</tr>
		<tr>
			
			<td align = center>DOWNPAYMENT</td>
			<td></td>
			<td align = center>P 1,500 </td>
			
		</tr>
		
		<tr>
			<td align = center>ON THE</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td align = center> PRELIM</td>
			<td></td>
			<td rowspan =4 align = center>P 2,151 (4x)</td>
		</tr>
		<tr>
			<td align = center>MID-TERM</td>
			<td></td>
		</tr>
		<tr>
			<td align = center>PRE-FINAL</td>
			<td></td>
		</tr>
		<tr>
			<td align = center>FINAL</td>
			<td></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td colspan = 3 align = center>TOTAL AMOUT DUE<strong> P 10,104.00</strong><br>
			&nbsp&nbsp&nbsp That I promise to pay ICC <br>
			before the end of the semester as <br>
			&nbsp&nbsp per dates and the amounts stated herein</td>
		</tr>
	</table>
	<br >
	<hr noshade>

	<h1 align = center>STUDENT REGISTRATION FORM </h1>
	
	<hr noshade>
	
	<table border = 0 width = 100%>
		<tr>
			<td align= center><font size = 15>INTERFACE</font> <br> <font size = 8>COMPUTER COLLEGE</font></td>
			<td align = center> DONA LOLITA BLDG.<br>Rizal Avenue., Caloocan City<br> Tel. No. 366-7271
		</tr>
	</table>
	
	<h3 align = center> STUDENT REGISTRATION FORM</h3>
	<table border = 0 width = 100%>
		<forms>	
			<tr>
				<td align = right>Student No.</td>
				<td align = left><input type = text name = studentNumber value = "409661"></td>
				<td align = left>1st Semester Academic Year : 2016-2017</td>
			</tr>
			<tr>
				<td align = right>Student Name:</td>
				<td align = left><input type=text name = studentName value = "CUERDA, JESSIE AMBROCIO" size = 50></td>
				<td></td>
			</tr>
			<tr>
				<td align =right>Course:</td>
				<td align = left>Diploma in Information Technology Major in Systems Development</td>
				<td></td>
			</tr>
		</forms>
	</table>
	<table border = 3 width = 100%>
		<tr>
			<td>SECTION</td>
			<td>CODE</td>
			<td>SUBJECT DESCRIPTION</td>
			<td>LECTURE TIME</td>
			<td>DAYS</td>
			<td>ROOM</td>
			<td>LAB TIME</td>
			<td>DAYS</td>
			<td>ROOM</td>
		</tr>
		<tr>
			<td rowspan = 9>DITSD21-11</td>
			<td>IT21-9</td>
			<td>Web Page Design and Development</td>
			<td>10-11 / 11-12</td>
			<td>F / T</td>
			<td>204 / 205</td>
			<td>10 - 12</td>
			<td>TH</td>
			<td>IR</tr>
		</tr>
		<tr>
			<td>IT21-10</td>
			<td>Database Programming 1 (VB + DATABASE)</td>
			<td></td>
			<td></td>
			<td></td>
			<td>8 - 10</td>
			<td>T</td>
			<td>IR</td>
		</tr>
		<tr>
			<td>IT21-11</td>
			<td>Object Oriented Programming 2 (VB.NET)</td>
			<td></td>
			<td></td>
			<td></td>
			<td>10-11 / 8-9</td>
			<td>T/F</td>
			<td>IR</td>
		</tr>
		<tr>
			<td>IT21-12</td>
			<td>System Analysis and Design</td>
			<td>9-12</td>
			<td>S</td>
			<td>202</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>ENG113</td>
			<td>Modern Communication</td>
			<td>4-5 / 3-4</td>
			<td>M / WF</td>
			<td>404 / 203</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>IT21-13</td>
			<td>Operating System</td>
			<td>12-1 / 2-3</td>
			<td>WF</td>
			<td>205 / 407</td>
			<td>2-4</td>
			<td>TH</td>
			<td>IR</td>
		</tr>
		<tr>
			<td>IT21-14</td>
			<td>Structures of Programming Language</td>
			<td>11-1</td>
			<td>F</td>
			<td>IR</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>IT21-15</td>
			<td>Discrete Mathematics</td>
			<td>2-5</td>
			<td>S</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>PE13</td>
			<td>PE13(Individual Sports)</td>
			<td>1-3</td>
			<td>W</td>
			<td>MPH</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	</div>
	</div>
	</div>

	        <div class="form-group">
              <label class="col-md-4 control-label" for="btn_submit"></label>
              <div class="col-md-8">
                <!-- <input type="submit" name="btn_save" class="btn btn-success" style="margin-left: 550px;" onclick="javascript:printlayer('div-id-name')" value="Print"> -->
                <a href="#" class="btn btn-success" role="button" onclick="javascript:printlayer('div-id-name')" style="margin-left: 520px;"> <i class="fa fa-print"></i>&nbsp;Print </a>
                <a href="view_pending.php?view=<?php echo $the_student_id; ?>" class="btn btn-default" role="button"> Cancel</a>
              </div>
            </div>


    <script type="text/javascript">
      
        function printlayer(layer){
          var generator = window.open(",'name,");
          var layertext = document.getElementById(layer);
          generator.document.write(layertext.innerHTML.replace("Print Me"));

          generator.document.close();
          generator.print();
          generator.close();
        }
    </script>

<?php include('includes/footer.php'); ?>