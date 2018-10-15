<?php
 
  include('session.php');
  include('functions.php');
  require('includes/connection.php');
  include('enrollment_session.php');

  if( $loggedUser_branch != 'caloocan'){
      header('Location: profile.php');
  }


  $icc_accountNumber = "3989131556";
  $icc_accountName = "Interface Computer College";

  $alertMessage = "";

    if( isset($_POST['btnSubmit']) ){

      $lenght = 8; 
      $icc_accountNumber = "3989131556";
      $icc_accountName = "Interface Computer College";
     
      /*
      Sanitizing the user input by wrapping it up with mysqli_real_escape_string just to avoid SQL Injection
      And for additional protecttion, i wrapped it up by my own funtion "validateFormData" , 
      I also used htmlspecialchars($_SEVER['PHP_SELF']) <-- basic measure to sanitize the form before sending it
      to another page.
      */

      $icc_accountNumber = validateFormData(mysqli_real_escape_string($conn,$icc_accountNumber));
      $icc_accountName = validateFormData(mysqli_real_escape_string($conn,$icc_accountName));
      $student_number = validateFormData(mysqli_real_escape_string($conn,$loggedUser));
      $depositor_fname = validateFormData(mysqli_real_escape_string($conn,$_POST['fName']));
      $depositor_Lname = validateFormData(mysqli_real_escape_string($conn,$_POST['lastName']));
      $bank_referenceCode = validateFormData(mysqli_real_escape_string($conn,$_POST['referenceCode']));
      $payment_amount = validateFormData(mysqli_real_escape_string($conn,$_POST['payment_amount']));
      $date = validateFormData(mysqli_real_escape_string($conn,$_POST['date']));
      $bdo_branch = validateFormData(mysqli_real_escape_string($conn,$_POST['bdoBranch']));


       if( !$depositor_fname  ||  !$depositor_Lname  || !$bank_referenceCode  || !$date ||  !$bdo_branch || !$payment_amount) {
          $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                <strong> DONT LEAVE ANY FIELDS BLANK  <a class='close' data-dismiss='alert'>&times</a> </strong> 
                             </div></div></div>";
       }  else if ( strlen($bank_referenceCode) != 8 ){
           $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                <strong> INVALID REFERENCE CODE <a class='close' data-dismiss='alert'>&times</a> </strong> 
                             </div></div></div>";
       } else {

      $status_update = "UPDATE icc_prac3.tbl_payment
                        SET tbl_payment.status = 'old'
                        WHERE tbl_payment.status = 'new'
                        AND tbl_payment.studentNo = '$loggedUser'";

      $status_update_result = mysqli_query($conn,$status_update);

      $payment_query = "INSERT INTO icc_prac3.tbl_payment (
                        tbl_payment.studentNo, 
                        tbl_payment.account_name,
                        tbl_payment.account_number,
                        tbl_payment.depositor_fname,
                        tbl_payment.depositor_Lname,
                        tbl_payment.reference_code,
                        tbl_payment.payment_amount,
                        tbl_payment.date,
                        tbl_payment.bdo_branch)
                        VALUES (
                        '$student_number',
                        '$icc_accountName',
                        '$icc_accountNumber',
                        '$depositor_fname',
                        '$depositor_Lname',
                        '$bank_referenceCode',
                        '$payment_amount',
                        '$date', 
                        '$bdo_branch')";

      $payment_result = mysqli_query($conn,$payment_query);
      
      if( !$payment_result ){
           $alertMessage = "<div class='row'><div class='col-md-11'><div class='alert alert-danger'>
                              <strong>Error Occured! Please check your inputs <a class='close' data-dismiss='alert'>&times</a> </strong> 
                           </div></div></div>";
      } else {

         $flag = 'Completed';

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
                  tbl_grades.remarks , tbl_subject.units, 
                  tbl_subject.year_level , 
                  tbl_subject.semester_number,
                  tbl_studentinfo.studentNo 
                  FROM icc_prac3.tbl_subject , 
                  icc_prac3.tbl_studentinfo, 
                  icc_prac3.tbl_grades 
                  WHERE tbl_subject.year_level = '$enrollment_year'
                  AND tbl_subject.semester_number = '$sem' 
                  AND tbl_grades.studentNo = tbl_studentinfo.studentNo
                  AND tbl_studentinfo.studentNo = '$loggedUser' 
                  AND tbl_subject.subject_code = tbl_grades.subject_code 
                  ORDER BY tbl_subject.year_level , tbl_subject.semester_number";

        $result = mysqli_query($conn,$query);

        if( !$result ){
            die("ERROR OCCURED");
            header('Location: payment.php');
        } 

        // $subject_yrLevel ="";
        // $subject_semLevel ="";
        while( $row = mysqli_fetch_assoc($result) ){
          $subject_code = $row['subject_code'];
          $subject_remark = $row['remarks'];
          $student_number = $row['studentNo'];
          $subject_yrLevel = $row['year_level'];
          $subject_semLevel = $row['semester_number'];
          $pointer = 'pending';

          $update_query = "UPDATE icc_prac3.tbl_grades
                           SET tbl_grades.remarks = '$pointer'
                           WHERE tbl_grades.subject_code = '$subject_code' 
                           AND tbl_grades.studentNo = '$student_number'";
                          

          $update_result = mysqli_query($conn,$update_query);

          if( !$update_result ){
              die("ERROR OCCURED IN B");
          } 
        }

         $student_flag = "pending";

         $studentInfoUpdate_query = "UPDATE icc_prac3.tbl_studentinfo
                                    SET tbl_studentinfo.status = '$student_flag',
                                    tbl_studentinfo.year_level = '$subject_yrLevel',
                                    tbl_studentinfo.semester_num = '$subject_semLevel'
                                    WHERE tbl_studentinfo.studentNo = '$loggedUser'";
        
        $studentInfo_result = mysqli_query($conn,$studentInfoUpdate_query);

        if(!$studentInfo_result){
              $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                <strong> ERROR ENROLLING STUDENT. Please Contact the Administrator.  <a class='close' data-dismiss='alert'>&times</a> </strong> 
                             </div></div></div>";
       } else {

         unset($_SESSION['enrollment']);
         header('Location: enrollment_done.php?alert=success');
         
       }
  }

}
    mysqli_close($conn);

}

  include('includes/header.php');
  include('navigation_2.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

              

                    <div class="col-md-12">
                    <?php echo $alertMessage; ?>
                    <?php include('profile_nav2.php'); ?>

                       <div class="panel panel-success">
                          <div class="panel-heading">BDO PAYMENT FORM</div>
          
                            <br><br>

                         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                             <div class="panel-content">


                                <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="studentNumber">ICC Account Number : </label>  
                                <div class="col-md-4">
                                <input type="text" name="accountNumber" disabled placeholder="Account Number" class="form-control input-md" value="<?php echo $icc_accountNumber?>">
                                </div>
                              </div>

                               <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" >Account Name : </label>  
                                <div class="col-md-4">
                                <input name="accountName" type="text" disabled placeholder="Account Name" class="form-control input-md" value="<?php echo $icc_accountName?>">
                                </div>
                              </div>
                    
                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="fName">Depositor's First Name : </label>  
                                <div class="col-md-4">
                                <input id="fName" name="fName" type="text" placeholder="First Name" class="form-control input-md">
                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="lastName">Depositor's Last Name : </label>  
                                <div class="col-md-4">
                                <input id="lastName" name="lastName" type="text" placeholder="Last Name" class="form-control input-md">

                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" >Reference Code : </label>  
                                <div class="col-md-4">
                                <input name="referenceCode" type="text" placeholder="Reference Code" class="form-control input-md">
                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" >Amount : </label>  
                                <div class="col-md-4">
                                <input name="payment_amount" type="text" placeholder="Amount" class="form-control input-md">
                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label">Deposited Date : </label>  
                                <div class="col-md-4">
                                <input name="date" type="text" placeholder="Month / Date / Year" class="form-control input-md">
                                </div>
                              </div>

                                           <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label">BDO Branch : </label>  
                                <div class="col-md-4">
                                <input name="bdoBranch" type="text" placeholder="Branch Location" class="form-control input-md">
                                </div>
                              </div>

                              <br><br>
                          </div> <!--end of panel content-->

                          <div class="panel-footer">
                              <!-- Button (Double) -->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="btnSubmit"></label>
                                <div class="col-md-8">
                                  <button id="btnSubmit" name="btnSubmit" class="btn btn-success" style="margin-left: 180px;">Submit</button>
                                  <button id="btnCancel" name="btnCancel" class="btn btn-default">Cancel</button>
                                </div>
                              </div>
                          </div>
                          </form>

                          </div> <!--end of panel-->
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->


  <?php include('includes/footer.php'); ?>
