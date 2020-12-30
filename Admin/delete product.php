<?php
     include 'includes/ProductClass.php';
   $productobject = new Product(); 
   // Delete record from table
     if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $productobject->deleteRecord($deleteId);
  }

?>