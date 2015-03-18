<?php

/*
Initial page of the interface.
Collects information on the type of experiment being run, and which baseline simulation is to be used.
Filepaths for storage of parameter files and results are also set here.
*/

# Session start must be in all pages that write / access session variables
session_start();

# Import the layout and menu
include("components/interfaceSettings.php");
include("components/menu.php");

PrintHeader("ASPASIA: Experiment Setup");

# Javascript method to check the data entry on the form
print '<script type="text/javascript">
function checkMethodSelected() 
{
  var meth = document.getElementById("experimentType").value;
  var sbmlFile = document.getElementById("pathToSimulationParameterFile").value;
  var output = document.getElementById("parameterFileOutputFolder").value;

  if (meth == "") { alert("You must choose an ASPASIA Method"); return false; }
  else 
  { 
 	if (sbmlFile == "") { alert("You must specify the location of an SBML file"); return false; }
	else
	{
		if (output == "") { alert("You must specify the location for Model File output"); return false; }
		else
		{
			return true; 
		}
	}
  } 
}
</script></head>';


#### Now set up the HTML Page

print '
<br>
<div id="textheading">ASPASIA Experiment Setup</div>
<br>
<div id="formtable">
<table width="85%"  border="0" cellspacing="0" cellpadding="0">
<TR><TD>This tool creates the XML Settings file for use with the ASPASIA package. Over the next few screens, you will state where the model you are analysing can be found, the model and reaction parameters you wish to examine, and specify settings specific to the analysis you are performing.
<br><br>
For a more detailed description of what is required, hover your mouse over the data entry box</TD></TR></TABLE>
</div>
<BR>

<form name="ExpSetup" action="ExperimentSetup_Process.php" method="post" onsubmit="return checkMethodSelected()">
	

	<table cellpadding=5>
	<TR title="Specify the location on your hard disk where the SBML Model file you are working with can be found. Make sure you specify the full path">
		<TD> Full Path to SBML Model File:</TD>
		<TD><input type="text" size="53" id="pathToSimulationParameterFile" name="pathToSimulationParameterFile"/></TD></TR>
	<TR title="Specify the location on your hard disk where you want the generated SBML Model files to be stored. Make sure you specify the full path">
		<TD> Directory to Store Generated SBML Model Files:</TD> 
		<TD><input type="text" size="53" id="parameterFileOutputFolder" name="parameterFileOutputFolder"> </TD></TR>
	<TR><TD> ASPASIA Method: </TD><TD> <select name="experimentType" id="experimentType" SIZE=5>
			<option value="NewEvent">New Intervention After Steady State</option>
			<option value="Robustness">Generate Models for Parameter Robustness Analysis (Local)</option>
			<option value="LHC">Generate Models for Latin-Hypercube Parameter Sensitivity Analysis (Global)</option>
			<option value="LHC_Provided">Generate Models from Provided Latin-Hypercube Value File (Global)</option>
			<option value="eFAST">Generate Models for eFAST Sensitivity Analysis (Global)</option>
		</select></TD></TR>
	</TABLE>

<HR>
<input type="submit" value="Next: Parameters" ></p>
</form>';

?>
