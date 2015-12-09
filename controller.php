<?php
// This file contains a bridge between the view and the model and redirects back to the proper page 
// with after processing whatever form this codew absorbs.  This is the C in MVC, the Controller.
//
// Original Authors: Rick Mercer and Hassanain Jamal
// Modified: Jingyu Shi
//
require './DataBaseAdaptor.php';

if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	session_start (); 
	if (isset ( $_POST ['login'] )) {
		if ($myDatabaseFunctions->verified ( $username, $password )) {
			// Store Session Data
			$_SESSION ['user'] = $username;
			header ( "Location: index.html" );
		} else {
			$_SESSION ['loginError'] = 'Invalid Account/Password';
			header ( "Location: login.php" );
		}
	} else if (isset ( $_POST ['register'] )) {
			$myDatabaseFunctions->register ( $username, $password );
	}
} 
// elseif (isset ( $_POST ['logout'] )) {
// 	session_start (); 
// 	session_destroy (); 
// 	header ( "Location: index.html" );
// } 
?>