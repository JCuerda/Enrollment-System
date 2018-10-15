<?php 
    if( isset( $_COOKIE[ session_name() ] ) ){
            setcookie( session_name(), '', time()-86400, '/'  );
            header('Location: ../index.php');
    }

    //clear all session varialbe
    session_unset();

    //destroy the session
    session_destroy();

 ?>