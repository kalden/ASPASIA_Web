<?php

/*
Takes the data from the ExperimentSetup.php form and stores as session variables. This way, the data can be accessed later in the 
process without being explicitly passed between pages
*/

session_start();

$_SESSION['pathToSimulationParameterFile'] = $_POST['pathToSimulationParameterFile'];
$_SESSION['parameterFileOutputFolder'] = $_POST['parameterFileOutputFolder'];
$_SESSION['experimentType'] = $_POST["experimentType"];

# Redirect to the next pages of the interface form
if($_SESSION['experimentType']=="LHC_Provided")
{
	# Can skip the Parameter declaration if providing a Spartan sampling file
	header( 'Location: Analysis_Specific_Parameters.php' );
}
else
{
	header( 'Location: Parameter_Info_Init.php' );
}
?>
