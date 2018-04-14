<?php
session_start();
session_unset(); 
session_destroy(); 
//echo"cerrando..";
//Header('../index.php');
header("Location: ../index.php");
?>
