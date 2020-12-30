<?php
include 'includes/Adminclass.php';
     $adminObj = new Admin();
   // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $adminObj->deleteRecord($deleteId);
  }
?>
