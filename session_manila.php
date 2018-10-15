<?php 

session_start();

 if( !$_SESSION['loggedInUser']){
      header('Location:index.php');
  } else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'user' && $_SESSION['branch'] === 'caloocan'){
  	 $loggedUser = mysqli_real_escape_string($_SESSION['loggedInUser']);
  	 
  } else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'user' && $_SESSION['branch'] === 'manila'){
  	  $loggedUser = mysqli_real_escape_string($_SESSION['loggedInUser']);
  	   
  } else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'admin') {
      $loggedUser = mysqli_real_escape_string($_SESSION['loggedInUser']);
       header('Location: ../icc/admin/administration.php'); 
  }

 ?>