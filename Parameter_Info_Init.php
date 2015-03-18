<?php

# Session start must be in all pages that write / access session variables
session_start();

# Set up the arrays for the parameter information

if(!isset($_SESSION["paramsDeclared"]))
{
	# this parameter monitors this. This is also unset if the user resets the arrays
	$_SESSION["paramsDeclared"]="True";

	# Now an array to hold the details of each parameter
	$_SESSION["parameterNames"] = array();
	$_SESSION["parameterTypes"] = array();
	$_SESSION["minVals"] = array();
	$_SESSION["maxVals"] = array();
	$_SESSION["baseVals"] = array();
	$_SESSION["incVals"] = array();

}

# Now relocate to the screen to add worlds to the domain
header('Location: Parameter_Info.php') ;	






?>
