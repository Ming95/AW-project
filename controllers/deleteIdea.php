<?php
session_start();
if(!isset($_SESSION['logged']) || !$_SESSION['logged'] || !$_SESSION['admin'])	header("Location:/views/login.php");
require '../models/idea.php';
try{
  $idea = new Idea();
  $id = $_GET['id'];
  $idea->load($id);
  $idea->delete();
}catch(Exception $e){
  error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
  $_SESSION['data_error']=$e->getMessage();
  header("Location:/errorpage.php");
}
header("Location: ../views/idealist.php");

 ?>
