<?php 
session_start();
if (array_key_exists('id', $_SESSION) OR array_key_exists('userid', $_COOKIE) ) {
	
		$_SESSION = array();
		unset($_SESSION);
		setcookie('usserid','',time()-60*60);
	
		header("location:login.php");

}else{
	echo "Session does not exit";
}






 ?>