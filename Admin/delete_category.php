<?php
include 'includes/Categoryclass.php';
 $categoryobject = new category(); 
   // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $categoryobject->deleteRecord($deleteId);
  }
?>
