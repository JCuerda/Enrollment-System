<?php 

 if( !$_SESSION['enrollment']){
      header('Location:profile_manila.php?alert=rejected');
  } 

 ?>