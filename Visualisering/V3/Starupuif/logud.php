<?php
    /* We start session */
    session_start();
    /* Free all variables in session */
    session_unset();
    /* Destroy all data associated with session */
    session_destroy();
    /* Set sessio to empty arrat */
    $_SESSION = array();
    /* Redirect to landing if session is set, which we did in the beginning */
    if(isset($_SESSION)){
    header("Location: index.php");
    }
?>