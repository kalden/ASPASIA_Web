<?php

# Session start must be in all pages that write / access session variables
session_start();

#### Now set up the HTML Page

if(isset($_POST['addAnother']))
{
	# Get the parameter name
	array_push($_SESSION["parameterNames"],$_POST['parameterName']);

	# Then do per the analysis
	if($_SESSION['experimentType']=="Robustness")
	{
		array_push($_SESSION["parameterTypes"],$_POST['parameterType']);	
		array_push($_SESSION["minVals"],$_POST['minVal']);		
		array_push($_SESSION["maxVals"],$_POST['maxVal']);		
		array_push($_SESSION["baseVals"],$_POST['calibratedVal']);		
		array_push($_SESSION["incVals"],$_POST['incVal']);		
	}
	else if($_SESSION['experimentType']=="LHC" || $_SESSION['experimentType']=="eFAST")
	{
		array_push($_SESSION["minVals"],$_POST['minVal']);		
		array_push($_SESSION["maxVals"],$_POST['maxVal']);
	}
	else if($_SESSION['experimentType']=="NewEvent")
	{
		# To Do
	}

	# Redirect back so more parameters can be added
	header('Location: Parameter_Info.php') ;

}
else
{
	# If Robustness, we can skip this page altogether
	if($_SESSION['experimentType']=="Robustness")
	{
		header( 'Location: GenerateSettingsFile.php' );
	}
	else
	{
		# Redirect to the next pages of the interface form
		header( 'Location: Analysis_Specific_Parameters.php' );
	}
}

?>
