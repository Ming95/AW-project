<?php
session_unset(); 
session_destroy(); 
$_SESSION["logged"]=false;
echo"cerrando..";
include '../index.php';
?>
