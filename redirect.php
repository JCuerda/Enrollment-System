<?php 

 if( isset($_GET['branch']) ){
      if($_GET['branch'] == 'caloocan'){
        $the_branch = $_GET['branch'];
        header('Location: login.php?branch='.$the_branch );
      } else if( $_GET['branch'] == 'manila') {
        $the_branch = $_GET['branch'];
        header('Location: login_manila.php?branch='.$the_branch );
      } else {
        header('Location:index.php');
      }
  } else {
        header('Location:index.php');
  }


 ?>