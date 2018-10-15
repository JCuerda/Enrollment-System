<?php
    session_start();
    include('includes/connection.php');


    
    if( isset($_GET['branch']) ){
        if($_GET['branch'] == 'caloocan'){
            $the_branch = $_GET['branch'];
        } else if( $_GET['branch'] == 'manila') {
            $the_branch = $_GET['branch'];
        } else {
            header('Location:index.php');
        }
    } else {
        header('Location:index.php');
    }


    include('includes/header.php');

    include('navigation.php');
    include('carousel.php');
?>

       <div class="container" id="admissionMain">
            <div class="container">
              <h2>Admission Requirements :</h2>
                 <div class="row">
                    <div class="col-sm-6">
                        <?php include('requirement.php'); ?>  
                    </div>
                    
                    <div class="col-sm-5">
                        <?php include('logoSideBar.php'); ?>
                    </div>
                </div>
            </div> <!-- end of admission container-->
         </div><!--end of main -->

    <script>
            $('.nav-tabs a').click(function(){
                $(this).tab('show');
            })
    </script>
   
 <?php 
    include('includes/footer.php');
  ?>