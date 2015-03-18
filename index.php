<?php

/*
Home Page
*/

# Import the layout and menu
include("components/interfaceSettings.php");
include("components/menu.php");

PrintHeader("ASPASIA: Experiment Setup");

print '
<br>
<div id="textheading">ASPASIA</div>
<br>
<div id="formtable">
<table width="85%"  border="0" cellspacing="0" cellpadding="0">
<TR><TD>Calibrating computational models of biological systems, assigning parameter values to ensure the model reflects behaviours observed biologically, can greatly impact the strength of hypotheses the model generates. A calibrated model provides baseline behaviour upon which sensitivity analysis techniques can be used to analyse potential pathways impacting model response.
<br><br> Where a behaviour depends on an intervention, model responses may be dependent on conditions at the point when the intervention is applied, complicating the calibration process and making it difficult to assess the extent to which an alteration in behaviour can be attributed to the intervention alone. Where a model is specified in Systems Biology Markup Language (SBML), there is a key deficiency in tools for solving models dependent on interventions.
<br><br>
ASPASIA, a cross-platform, open-source (GPLv2 license) Java toolkit, addresses this problem. ASPASIA can generate and modify models using SBML solver output as an initial parameter set, allowing interventions to be applied once a steady state has been reached. Additionally, multiple SBML models can be generated where a subset of parameter values are perturbed using local and global sensitivity analysis techniques, revealing the models sensitivity to the intervention. 
<br><br>
From this site you can generate the Settings file for use with the ASPASIA package. Click "Create Settings File" to generate the file
</TD></TR></TABLE>
</div>'

?>
