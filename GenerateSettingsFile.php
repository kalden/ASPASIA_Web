<?php

/*
Page to state that the setup process is complete, and generate the settings file
*/

# Session start must be in all pages that write / access session variables
session_start();

# Import the layout and menu
include("components/interfaceSettings.php");
include("components/menu.php");

PrintHeader("ASPASIA: Download Settings File");

#### Now set up the HTML Page

print '
<br>
<div id="textheading">Download ASPASIA Settings File</div>
<br>
<div id="formtable">
<table width="85%"  border="0" cellspacing="0" cellpadding="0">
<TR><TD>That is all we need to generate the ASPASIA Settings File. Press the button below</TD></TR></TABLE>
</div>
<BR>

<form name="ExpSetup" action="WriteSettingsFile.php" method="post">
	
<input type="submit" value="Generate ASPASIA Settings File" ></p>
</form>';

?>
