<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    //Timer for how long the user hasn't been active
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) { //set to 1 hour
    	    session_unset();
    	    session_destroy();
    	}
    	$_SESSION['LAST_ACTIVITY'] = time(); //checks when the time since last activity
}
