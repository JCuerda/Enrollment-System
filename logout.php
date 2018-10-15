<?php 

    if( isset( $_COOKIE[ session_name() ] ) ){
            setcookie( session_name(), '', time()-86400, '/'  );
            header('Location: index.php');
    }

    $_SESSION['loggedUser'] = null;
    $_SESSION['loggedUser_branch'] = null;
    $_SESSION['role'] = null;
    //clear all session varialbe
    session_unset();

    //destroy the session
    session_destroy();

 ?> 