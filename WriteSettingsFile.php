<?php

session_start();

$xml = new SimpleXMLElement("<xml/>");
$xml->addChild('sbmlFormat','true');
$xml->addChild('repastCompatible','false');

$xml->addChild('pathToSimulationParameterFile',$_SESSION["pathToSimulationParameterFile"]);
$xml->addChild('parameterFileOutputFolder',$_SESSION["parameterFileOutputFolder"]);
$xml->addChild('experimentType',$_SESSION["experimentType"]);

# Now the tags for each parameter
if(isset($_SESSION["paramsDeclared"]))
{
	$p=0;
	while($p<count($_SESSION['parameterNames']))
	{
		$parameter = $xml->addChild('parameter',$_SESSION["parameterNames"][$p]);

		if($_SESSION['experimentType']=="Robustness")
		{
			$parameter->addAttribute('type',$_SESSION["parameterTypes"][$p]);
			$parameter->addAttribute('min',$_SESSION["minVals"][$p]);
			$parameter->addAttribute('max',$_SESSION["maxVals"][$p]);
			$parameter->addAttribute('inc',$_SESSION["incVals"][$p]);
			$parameter->addAttribute('baseline',$_SESSION["baseVals"][$p]);
		}
		else if($_SESSION['experimentType']=="LHC" || $_SESSION['experimentType']=="eFAST")
		{
			$parameter->addAttribute('min',$_SESSION["minVals"][$p]);
			$parameter->addAttribute('max',$_SESSION["maxVals"][$p]);
		}
		$p=$p+1;
	}
}

# Now get the tags for the relevant analysis
if($_SESSION['experimentType']=="LHC")
{
	$xml->addChild('numberparameterSamples',$_SESSION["numberparameterSamples"]);
	$xml->addChild('algorithm',$_SESSION["algorithm"]);

}
else if($_SESSION['experimentType']=="eFAST")
{
	$xml->addChild('efastCurves',$_SESSION["efastCurves"]);
	$xml->addChild('efastCurveSamples',$_SESSION["efastCurveSamples"]);

}
else if($_SESSION['experimentType']=="NewEvent")
{
	$xml->addChild('sbmlRunResultsFile',$_SESSION['solverOutput']);
	$xml->addChild('newParamFileName',$_SESSION['interventionFileName']);
}
else if($_SESSION['experimentType']=="LHC_Provided")
{
	$xml->addChild('lhcPreGeneratedSampleFile',$_SESSION['lhcProvided']);
}



# Output the XML file for this experiment
$_SESSION["SettingsFileName"] = "Aspasia_Settings_File_".time().".XML";
header('Content-Disposition: attachment;filename='.$_SESSION["SettingsFileName"]);
echo $xml->saveXML();
#echo $xml->asXML();

?>
