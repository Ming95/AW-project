<?php
session_start();
if(!isset($_SESSION['logged']) || !$_SESSION['logged'] || !$_SESSION['admin'])	header("Location:/views/login.php");
require '../models/usuarioIncidencia.php';
try{
  $inc = new usuarioIncidencia();
  $id = $_GET['id'];
  $inc->delete($id);
}catch(Exception $e){
  error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
  $_SESSION['data_error']=$e->getMessage();
  header("Location:/errorpage.php");
}
header("Location: ../views/reportlist.php");

 ?>
