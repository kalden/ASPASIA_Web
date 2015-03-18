<?php

session_start();

unset($_SESSION["paramsDeclared"]);
unset($_SESSION["parameterNames"]);
unset($_SESSION["parameterTypes"]);
unset($_SESSION["minVals"]);
unset($_SESSION["maxVals"]);
unset($_SESSION["baseVals"]);
unset($_SESSION["incVals"]);

# Reload the initialisation page
header('Location: Parameter_Info_Init.php') ;

?>	
