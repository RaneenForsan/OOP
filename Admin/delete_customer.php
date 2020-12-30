<?php
    include 'includes/Customerclass.php';
     $customerObj = new customer();
   // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $customerObj->deleteRecord($deleteId);
  }

?>