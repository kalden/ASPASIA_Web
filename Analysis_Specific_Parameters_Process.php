<?php

# Session start must be in all pages that write / access session variables
session_start();

if($_SESSION['experimentType']=="LHC")
{
	$_SESSION['numberparameterSamples'] = $_POST['numberparameterSamples'];
	$_SESSION['algorithm'] = $_POST['algorithm'];
}
else if($_SESSION['experimentType']=="eFAST")
{
	$_SESSION['efastCurves'] = $_POST['efastCurves'];
	$_SESSION['efastCurveSamples'] = $_POST['efastCurveSamples'];
}
else if($_SESSION['experimentType']=="NewEvent")
{
	$_SESSION['solverOutput'] = $_POST['solverOutput'];
	$_SESSION['interventionFileName'] = $_POST['interventionFileName'];
}
else if($_SESSION['experimentType']=="LHC_Provided")
{
	$_SESSION['lhcProvided'] = $_POST['sampleFile'];
}

# Redirect to the next pages of the interface form
header( 'Location: GenerateSettingsFile.php' );


?>
