<?php

# Session start must be in all pages that write / access session variables
session_start();

include("components/interfaceSettings.php");
include("components/menu.php");

print '<HTML><HEAD>';
PrintHeader("ASPASIA: Parameter Initialisation");

# Javascript method to check the data entry on the form
print '<script type="text/javascript">
function checkRobustness() 
{
  var param = document.getElementById("parameterName").value;
  var type = document.getElementById("parameterType").value;
  var minVal = document.getElementById("minVal").value;
  var maxVal = document.getElementById("maxVal").value;
  var incVal = document.getElementById("incVal").value;
  var calibratedVal = document.getElementById("calibratedVal").value;

  if (param == "") { alert("You must enter an SBML Parameter Name"); return false; }
  else 
  { 
 	if (minVal == "") { alert("You must specify a minimum value"); return false; }
		else
		{
			if (maxVal == "") { alert("You must specify a maximum value"); return false; }
			else
			{
				if (incVal == "") { alert("You must specify a increment value"); return false; }
				else
				{
					if (calibratedVal == "") { alert("You must specify a calibrated value"); return false; }
					else
					{
						if (type == "") { alert("You must specify a parameter type"); return false; }
						else
						{
							return true; 
						}
					}
				}
			}
		}
	}
}

function checkGlobal() 
{
  var param = document.getElementById("parameterName").value;
  var minVal = document.getElementById("minVal").value;
  var maxVal = document.getElementById("maxVal").value;

  if (param == "") { alert("You must enter an SBML Parameter Name"); return false; }
  else 
  { 
 	if (minVal == "") { alert("You must specify a minimum value"); return false; }
		else
		{
			if (maxVal == "") { alert("You must specify a maximum value"); return false; }
			else
			{
				return true; 
			}
		}

  }
}


function checkNewEvent() 
{
  var param = document.getElementById("parameterName").value;
  var val = document.getElementById("value").value;

  if (param == "") { alert("You must enter an SBML Parameter Name"); return false; }
  else 
  { 
 	if (val == "") { alert("You must specify a value"); return false; }
		else
		{
				return true; 
		}

  }
}
  
</script></head>';


#### Now set up the HTML Page

	if($_SESSION['experimentType']=="Robustness")
	{
		print '<form name="AnalysisSpecificParams" action="Parameter_Info_Process.php" method="post">
		<br><div id="textheading">Robustness Analysis: Parameter Initialisation</div><br>

		<div id="formtable">
		<table width="85%"  border="0" cellspacing="0" cellpadding="0">
		<TR><TD>This analysis reveals how robust your SBML model is to an alteration in the value of a single parameter<br>
		Here you will state the SBML parameters which you are interested in understanding further, and the range of values which should be explored.<br>
		Note that no error checking is used to determine whether this parameter exists in the SBML file
		<br><br>
		For a more detailed description of what is required, hover your mouse over the data entry box</TD></TR></TABLE>
		</div>
		<BR>


		<table><TR title="Enter the name of the Parameter or Species in the SBML file to examine">
			<TD>SBML Parameter Name: </TD><TD><input type="text" size="40" id="parameterName" name="parameterName"></TD></TR>
		<TR title="Declare whether this parameter is a double or integer">
			<TD>SBML Parameter Type: </TD><TD><select name="parameterType" id="parameterType" SIZE=2>
			<option value="double">Double</option>
			<option value="int">Integer</option></select></TD></TR>
		<TR title="Enter the minimum value of the range you wish to explore">
			<TD> Minimum Value </TD> <TD><input type="text" size="5" id="minVal" name="minVal"></TD> </TR>
		<TR title="Enter the maximum value of the range you wish to explore">
			<TD> Maximum Value </TD> <TD><input type="text" size="5" id="maxVal" name="maxVal"></TD> </TR>
		<TR title="Enter the value to use as the sample increment between the maximum and minimum value">
			<TD> Increment Value </TD> <TD><input type="text" size="5" id="incVal" name="incVal"></TD> </TR>
		<TR title="Enter the value of this parameter at its normal, calibrated state">
			<TD> Calibrated Value </TD> <TD><input type="text" size="5" id="calibratedVal" name="calibratedVal"></TD> </TR></TABLE>

		<HR>
		<input type="submit" name="addAnother" value="Add Another Parameter" onclick="return checkRobustness()"><input type="submit" 			value="Next Step: Next: Aspasia Settings File">
		</form>';
	}
	else if($_SESSION['experimentType']=="LHC" || $_SESSION['experimentType']=="eFAST")
	{
		print '<form name="AnalysisSpecificParams" action="Parameter_Info_Process.php" method="post">
		<br><div id="textheading">Global Sensitivity Analysis using '.$_SESSION['experimentType'].': Parameter Initialisation</div><br>

		<div id="formtable">
		<table width="85%"  border="0" cellspacing="0" cellpadding="0">
		<TR><TD>This analysis will perturb the value of a number of parameters or initial concentrations of species simultaneously.<br>
		By using this process, you can begin to understand the influential pathways in your SBML Model File<br><br>
		Here you will state the SBML parameters which you are interested in understanding further, and the range of values which should be explored.<br>
		Note that no error checking is used to determine whether this parameter exists in the SBML file
		<br><br>
		For a more detailed description of what is required, hover your mouse over the data entry box</TD></TR></TABLE>
		</div>
		<BR>

		<table><TR title="Enter the name of the Parameter or Species in the SBML file to examine">
		<TD>SBML Parameter Name: </TD><TD><input type="text" size="40" id="parameterName" name="parameterName"></TD></TR>
		<TR title="Enter the minimum value of the range you wish to explore">
		<TD>Minimum Value </TD> <TD><input type="text" size="5" name="minVal" id="minVal"></TD></TR>
		<TR title="Enter the maximum value of the range you wish to explore">
		<TD> Maximum Value </TD> <TD><input type="text" size="5" id="maxVal" name="maxVal"></TD></TR></TABLE>

		<HR>
		<input type="submit" name="addAnother" value="Add Another Parameter" onclick="return checkGlobal()"><input type="submit" 			value="Next Step: Analysis Specific Parameters">
</form>';

	}
	else if($_SESSION['experimentType']=="NewEvent")
	{
		print '<form name="AnalysisSpecificParams" action="Parameter_Info_Process.php" method="post">
		<br><div id="textheading">Simulate an Intervention: Initialisation</div><br>

		<div id="formtable">
		<table width="85%"  border="0" cellspacing="0" cellpadding="0">
		<TR><TD>Using this technique, you can introduce an intervention once an SBML Model has reached a steady state<br><br>
		This intervention may be by changing the value of a parameter, or the initial concentration of a species.<br>
		ASPASIA does this by reading in the output from an SBML solver. The final line of that results file is then set as the initial state of an SBML model. The intervention should change aspects of that results line, and is specified here.<br><br>
		Note that no error checking is used to determine whether this parameter exists in the SBML file
		<br><br>
		For a more detailed description of what is required, hover your mouse over the data entry box</TD></TR></TABLE>
		</div>
		<BR>

		<table><TR title="Enter the name, as it appears in the SBML file, of the parameter or species whose value or initial concentration you want to change after the steady state">
		<TD>SBML Parameter / Species Name: </TD><TD><input type="text" size="40" id="parameterName" name="parameterName"></TD></TR>
		<TR title="Enter the value to set this parameter or initial species to">
		<TD> Value To Set this Parameter / Initial Concentration </TD> <TD><input type="text" size="5" id="value" name="value"></TD></TR>
		</TABLE>
		<HR>
		<input type="submit" name="addAnother" value="Add Another Parameter" onclick="return checkNewEvent()"><input type="submit" 			value="Next Step: Analysis Specific Parameters">
		</form>';
	}

# See if any parameters have been declared as yet - if so we need to display these details
if(count($_SESSION["parameterNames"])>0)
{
	print '<br><div id="textheading">Parameters Previously Declared:</div><br>
	<TABLE cellpadding=5>';

	if($_SESSION['experimentType']=="Robustness")
	{
		print '<TD align="center"><b>Parameter Name</b></TD>';
		print '<TD align="center"><b>Type</b></TD>';
		print '<TD align="center"><b>Minimum Value</b></TD>';
		print '<TD align="center"><b>Maximum Value</b></TD>';
		print '<TD align="center"><b>Increment Value</b></TD>';
		print '<TD align="center"><b>Calibrated Value</b></TD></TR>';
	}
	else if($_SESSION['experimentType']=="LHC" || $_SESSION['experimentType']=="eFAST")
	{
		print '<TD align="center"><b>Parameter Name</b></TD>';
		print '<TD align="center"><b>Minimum Value</b></TD>';
		print '<TD align="center"><b>Maximum Value</b></TD>';
	}
	else if($_SESSION['experimentType']=="NewEvent")
	{
		print '<TD align="center"><b>Parameter Name</b></TD>';
		print '<TD align="center"><b>Value</b></TD>';
	}

	$p=0;
	while($p<count($_SESSION['parameterNames']))
	{
		print '<TR><TD align="center">'.$_SESSION["parameterNames"][$p].'</TD>';

		if($_SESSION['experimentType']=="Robustness")
		{
			print '<TD align="center">'.$_SESSION["parameterTypes"][$p].'</TD>';
			print '<TD align="center">'.$_SESSION["minVals"][$p].'</TD>';
			print '<TD align="center">'.$_SESSION["maxVals"][$p].'</TD>';
			print '<TD align="center">'.$_SESSION["incVals"][$p].'</TD>';
			print '<TD align="center">'.$_SESSION["baseVals"][$p].'</TD></TR>';
		}
		else if($_SESSION['experimentType']=="LHC" || $_SESSION['experimentType']=="eFAST")
		{
			print '<TD align="center"><b>'.$_SESSION["minVals"][$p].'</b></TD>';
			print '<TD align="center"><b>'.$_SESSION["maxVals"][$p].'</b></TD></TR>';
		}
		else if($_SESSION['experimentType']=="NewEvent")
		{

		}

		$p=$p+1;
	}

		# Reset Button
		print '</table><form method="post" action="Parameter_Info_Reset.php">
		<INPUT type="submit" value="Reset All Parameters" name="Reset">
		</form>';



}



?>
