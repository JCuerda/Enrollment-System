<?php 

 if( !$_SESSION['enrollment']){
      header('Location:profile.php?alert=rejected');
  } 

 ?>