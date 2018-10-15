<?php 

session_start();
global $conn;
 if( !$_SESSION['loggedInUser'] ) {
      header('Location:index.php');
  } else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'user' && $_SESSION['branch'] === 'caloocan'){
  	 $loggedUser = $_SESSION['loggedInUser'];
  	 $loggedUser_branch = 'caloocan';
  	 
  } else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'user' && $_SESSION['branch'] === 'manila'){
  	  $loggedUser = mysqli_real_escape_string($conn,$_SESSION['loggedInUser']);
  	  $loggedUser_branch = 'manila';
  	   
  } else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'admin') {
      $loggedUser = mysqli_real_escape_string($conn,$_SESSION['loggedInUser']);
       header('Location: ../icc/admin/administration.php'); 
  } 

 ?>