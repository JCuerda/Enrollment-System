<?php
include('includes/connection.php');
 include('includes/header.php');
 include('functions.php');
$emailAdd = "";
 if( isset($_POST['btnSubmit']) ){

    $extension = $_POST['extension'];
    $emailAdd = validateFormData(mysqli_real_escape_string($conn,$_POST['emailAdd'])) . $extension;

 }


?>

<div class="container" id="mainContainer">

        <?php echo $emailAdd; ?>


      <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
         <div class="form-group">
              <label class="col-md-4 control-label" for="emailAdd">Email Address</label>  
              <div class="col-md-2">
              <input name="emailAdd" type="text" placeholder="Email Address" class="form-control input-md">
              </div>
              <div class="col-md-2" style="margin-left: -20px;"> 

                  <select id="extension" name="extension" class="form-control">
                         <option value="@gmail.com">@gmail.com</option>
                         <option value="@yahoo.com">@yahoo.com</option>
                </select>


              </div>
            </div>

             <div class="form-group">
              <label class="col-md-4 control-label" for="btnSubmit"></label>
              <div class="col-md-8">
                <button id="btnSubmit" name="btnSubmit" class="btn btn-success" style="margin-left: 200px;">Submit</button>
                <button id="btnCancel" name="btnCancel" class="btn btn-default">Cancel</button>
              </div>
            </div>
    </form>
</div>




<?php include('includes/footer.php'); ?>