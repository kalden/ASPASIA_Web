<?php

/*
Function used by all user-visible pages of the interface - creates the menu bar that runs along the top of the screen
*/

function PrintHeader ($title,$refreshlink="") {
	if(isset($title)) {
		if($title != "") { $title = "$title"; } 
	} else {
		$title = "";
	}
	
	if($refreshlink != ""){
		$meta = "<meta http-equiv='refresh' content='30;url=$refreshlink' />";
	}
	
	print '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>'.$title.'</title>
	<link href="components/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div align="center">
	  <table width="85%"  border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td width="85%"><A HREF="ExperimentSetup.php"><img src="components/Aspasia_Logo.png" width="960" height="85" border="0"></A></td>
		</tr>
		<tr>
		    <td width="930" height="30" background="components/bar.png">
		  <div id="nav">
			<a href="index.php">&nbsp;Home&nbsp;</a> | 
			<a href="https://www.york.ac.uk/computational-immunology/software/aspasia/">&nbsp;Download ASPASIA&nbsp;</a> |
			<a href="ExperimentSetup.php">&nbsp;Create Settings File&nbsp;</a> |
			<a href="https://www.york.ac.uk/computational-immunology/software/aspasia/#tab-1">&nbsp;ASPASIA Analyses&nbsp;</a> | 
			<a href="">&nbsp;Worked Example&nbsp;</a> | 
			<a href="http://www.york.ac.uk/ycil">&nbsp;YCIL&nbsp;</a> | 
			<a href="mailto:ycil@york.ac.uk?Subject=ASPASIA" target="_top"">&nbsp;Contact&nbsp;</a> &nbsp;&nbsp;
		  </div>
		  </td>
		</tr>
	  </table>';
}

?>
