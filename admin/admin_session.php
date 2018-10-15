<?php 

session_start();

if( !$_SESSION['loggedInUser']){
      header('Location:../login.php');
  } else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'admin'){
  	  $loggedUser = $_SESSION['loggedInUser'];
  	  $loggedUserRole = $_SESSION['userRole'];
  	  
  } 
  // else if( $_SESSION['loggedInUser'] && $_SESSION['userRole'] === 'admin') {
  //     $loggedUser = mysql_real_escape_string($_SESSION['loggedInUser']);
  //     $loggedUserRole = mysql_real_escape_string($_SESSION['userRole']);
  // }

 ?>