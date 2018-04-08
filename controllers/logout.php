<?php 
	require_once('redirect.php');

	if ( isset($_COOKIE['user']) ) {
	    setcookie('user', null, -1, '/');
	    redirect('../index.php');
	    return true;
	} else {
		redirect('../index.php');
	    return false;
	}

?>