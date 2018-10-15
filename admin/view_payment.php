<?php

  include('admin_session.php');
  require('includes/connection.php');
  include('functions.php');

  $alertMessage = "";

 if( isset($_GET['id']) ){
      $the_student_id = validateFormData(mysqli_real_escape_string($conn,$_GET['id']));
  } 

  if( isset($_GET['reference_code']) ){
      $the_reference_code = validateFormData(mysqli_real_escape_string($conn,$_GET['reference_code']));
  }

$payment_query = "SELECT * FROM icc_prac3.tbl_payment 
                WHERE tbl_payment.studentNo = '$the_student_id' 
                AND tbl_payment.payment_status != 'Approved'";

  $payment_result = mysqli_query($conn,$payment_query);

  if( !$payment_result ){
    die("ERROR OCCURED HERE! LINE 22 OF VIEW PAYMENT");
  }

  while( $row = mysqli_fetch_assoc($payment_result) ){

      $student_number = $row['studentNo'];
      $account_name = $row['account_name'];
      $account_number = $row['account_number'];
      $depositor_fname = $row['depositor_fname'];
      $depositor_Lname = $row['depositor_Lname'];
      $reference_code = $row['reference_code'];
      $payment_amount = $row['payment_amount'];
      $date = $row['date'];
      $bdo_branch = $row['bdo_branch'];



  }



  
  include('includes/header.php');
  
  include('../admin/navigation_admin2.php');

?>
               
       <div class="container" id="mainContainer">
   
            <div class="container ">
                <div class="row">
                    <div class="col-md-12"> 
                        <ol class="breadcrumb">
                            <li><a href="administration.php">Administration</a></li>
                            <li class="active"><a href="pendingEnrollment.php">Pending Enrollment</a></li>
                            <li class="active"><a href="view_payment.php?id=<?php echo $the_student_id?>">View Payment</a></li>
                        </ol> 
                    </div>
                </div>

                <div class="col-md-12">
                       <?php include('admin_nav2.php'); ?>
                        <!--profile content here-->
                        <div class="container-fluid">
                        <div class="panel panel-success">
                        <div class="panel-heading"> Submitted Payment Form </div>
                            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
                        

                        <br/> <br/>
                        <div class="panel-content" id="div-id-name">
                          <div class="col-md-10 col-md-offset-1">
                             <table class="table table-responsive table-bordered" id="div-id-name">
                                        <tr>
                                          <th class="text-center" colspan="2">
                                            Payment Receipt
                                          </th>
                                        </tr>

                                        <tr>  
                                          <td class="text-center">
                                                Student Number :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $student_number; ?>
                                          </td>

                                        </tr>

                                        <tr>  
                                          <td class="text-center">
                                                Account Number :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $account_number; ?>
                                          </td>
                                          
                                        </tr>

                                          <tr>  
                                          <td class="text-center" >
                                                Account Name :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $account_name; ?>
                                          </td>
                                          
                                        </tr>

                                        <tr>  
                                          <td class="text-center">
                                                Reference Code :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $reference_code; ?>
                                          </td>
                                          
                                        </tr>

                                        <tr>
                                          <td class="text-center">
                                            Payment Amount
                                          </td>
                                          <td class="text-center">
                                            Php&nbsp;<?php echo number_format($payment_amount); ?>
                                          </td>
                                        </tr>

                                      <tr>  
                                          <td class="text-center">
                                                Depositor's Name :
                                          </td >
                                         
                                          <td class="text-center">
                                                <?php echo $depositor_fname ." ". $depositor_Lname; ?>
                                          </td>
                                          
                                        </tr>

                                         <tr>  
                                          <td class="text-center">
                                                Date Deposited :
                                          </td >
                                          <td class="text-center">
                                                <?php echo $date; ?>
                                          </td>  
                                        </tr>

                                        <tr>  
                                          <td class="text-center">
                                                Branch Deposited :
                                          </td >
                                          <td class="text-center">
                                                <?php echo $bdo_branch; ?>
                                          </td>  
                                        </tr>

                                  </table>

                              </div>
                            </div> <!--end of panel content-->

                            <div class="panel-footer">
                            <!-- Button (Double) -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="btn_submit"></label>
                              <div class="col-md-8">
                                <!-- <input type="submit" name="btn_save" class="btn btn-success" style="margin-left: 550px;" onclick="javascript:printlayer('div-id-name')" value="Print"> -->
                                <a href="#" class="btn btn-success" role="button" onclick="javascript:printlayer('div-id-name')" style="margin-left: 520px;"> <i class="fa fa-print"></i>&nbsp;Print </a>
                                <a href="view_pending.php?view=<?php echo $the_student_id; ?>" class="btn btn-default" role="button"> Cancel</a>
                              </div>
                            </div>
                            </div> <!--end of panel footer-->

                            </form>
                        </div>
                    
                    </div>
                </div>
            </div> <!-- end of admission container-->
    </div><!--end of main -->

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