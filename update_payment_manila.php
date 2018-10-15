<?php
 
  include('session.php');
  include('functions.php');
  require('includes/connection.php');

   if ( $loggedUser_branch != 'manila' ) {
      header('Location: profile.php');
  }


  $icc_accountNumber = "3989131556";
  $icc_accountName = "Interface Computer College";

  $alertMessage = "";

  if( isset($_POST['btnUpdate']) ){



        $fName = validateFormData(mysqli_real_escape_string($conn,$_POST['fName']));
        $lastName = validateFormData(mysqli_real_escape_string($conn,$_POST['lastName']));
        $referenceCode = validateFormData(mysqli_real_escape_string($conn,$_POST['referenceCode']));
        $payment_amount = validateFormData(mysqli_real_escape_string($conn,$_POST['payment_amount']));
        $date = validateFormData(mysqli_real_escape_string($conn,$_POST['date']));
        $bdoBranch = validateFormData(mysqli_real_escape_string($conn,$_POST['bdoBranch']));


    if( $fName == '' ||  $lastName  == '' || $referenceCode == '' || $date== '' ||  $bdoBranch == ''|| $payment_amount == '') {
          $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                <strong> DONT LEAVE ANY FIELDS BLANK  <a class='close' data-dismiss='alert'>&times</a> </strong> 
                             </div></div></div>";
       } else if (strlen($referenceCode) != 8) {
          $alertMessage = "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                <strong> INVALID REFERENCE CODE  <a class='close' data-dismiss='alert'>&times</a> </strong> 
                             </div></div></div>";
       } else {


      $query = "UPDATE icc_prac3.tbl_payment_manila
                SET tbl_payment_manila.depositor_fname = '$fName',
                tbl_payment_manila.depositor_Lname = '$lastName',
                tbl_payment_manila.reference_code = '$referenceCode',
                tbl_payment_manila.payment_amount = '$payment_amount',
                tbl_payment_manila.date = '$date',
                tbl_payment_manila.bdo_branch = '$bdoBranch'
                WHERE tbl_payment_manila.studentNo = '$loggedUser'
                AND tbl_payment_manila.payment_status !='Approved'";

      $result = mysqli_query($conn,$query);

      if(!$result){
          header('Location: profile_manila.php?alert=update_error');
      } else {
        header('Location: profile_manila.php?alert=update_success');
      }

    }

}

      $lenght = 8; 
      $icc_accountNumber = "3989131556";
      $icc_accountName = "Interface Computer College";
     
      $query ="SELECT * FROM icc_prac3.tbl_payment_manila 
              WHERE tbl_payment_manila.studentNo = '$loggedUser' 
              AND tbl_payment_manila.payment_status = 'Rejected' 
              OR tbl_payment_manila.studentNo = '$loggedUser' 
              AND tbl_payment_manila.payment_status = 'Not Approve'";

      $result = mysqli_query($conn,$query);

      if( mysqli_num_rows($result) == 0 ){
          header('Location: profile_manila.php?alert=no_records');
      } else {

        while( $row = mysqli_fetch_assoc($result) ){
            $studentNumber = $row['studentNo'];
            $account_name = $row['account_name'];
            $account_number = $row['account_number'];
            $depositor_fname = $row['depositor_fname'];
            $depositor_Lname = $row['depositor_Lname'];
            $refCode = $row['reference_code'];
            $payment_amount = $row['payment_amount']; 
            $date = $row['date'];
            $bdo_branch = $row['bdo_branch'];
            $payment_status = $row['payment_status'];
        }
      }

    


  include('includes/header.php');
  include('navigation_manila.php');

?>
                                
       <div class="container" id="mainContainer">
            
            <div class="container-fluid">

              

                    <div class="col-md-12">
                    <?php echo $alertMessage; ?>
                     <?php include('profile_nav_manila.php'); ?>

                       <div class="panel panel-success">
                          <div class="panel-heading">BDO PAYMENT FORM</div>
          
                            <br><br>

                         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                             <div class="panel-content">

                              <div class="form-group">
                                <label class="col-md-4 control-label" for="studentNumber">STATUS:</label>  
                                <div class="col-md-4">
                                <input type="text" name="accountNumber" disabled placeholder="Account Number" class="form-control input-md" value="<?php echo $payment_status?>">
                                </div>
                              </div>


                                <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="studentNumber">ICC Account Number:</label>  
                                <div class="col-md-4">
                                <input type="text" name="accountNumber" disabled placeholder="Account Number" class="form-control input-md" value="<?php echo $account_number?>">
                                </div>
                              </div>

                               <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" >Account Name:</label>  
                                <div class="col-md-4">
                                <input name="accountName" type="text" disabled placeholder="Account Name" class="form-control input-md" value="<?php echo $account_name;?>">
                                </div>
                              </div>
                    
                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="fName">Depositor's First Name:</label>  
                                <div class="col-md-4">
                                <input id="fName" name="fName" type="text" placeholder="First Name" class="form-control input-md " value="<?php echo $depositor_fname;?>">
                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="lastName">Depositor's Last Name:</label>  
                                <div class="col-md-4">
                                <input id="lastName" name="lastName" type="text" placeholder="Last Name" class="form-control input-md" value="<?php echo $depositor_Lname;?>">

                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" >Reference Code</label>  
                                <div class="col-md-4">
                                <input name="referenceCode" type="text" placeholder="Reference Code" class="form-control input-md" value="<?php echo $refCode;?>">
                                </div>
                              </div>

                               <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" >Amount : </label>  
                                <div class="col-md-4">
                                <input name="payment_amount" type="text" placeholder="Amount" class="form-control input-md" value="<?php echo $payment_amount;?>">
                                </div>
                              </div>


                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label">Deposited Date:</label>  
                                <div class="col-md-5">
                                <input name="date" type="text" placeholder="Month / Date / Year" class="form-control input-md" value="<?php echo $date;?>">
                                </div>
                              </div>

                                           <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label">BDO Branch:</label>  
                                <div class="col-md-4">
                                <input name="bdoBranch" type="text" placeholder="Branch Location" class="form-control input-md" value="<?php echo $bdo_branch;?>">
                                </div>
                              </div>

                              <br><br>
                          </div> <!--end of panel content-->

                          <div class="panel-footer">
                              <!-- Button (Double) -->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="btnSubmit"></label>
                                <div class="col-md-8">
                                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                        <input type="submit" name="btnUpdate" class="btn btn-success" style="margin-left: 100px;" value="Update Payment">
                                  </form>
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
