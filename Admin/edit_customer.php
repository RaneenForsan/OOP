<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
   
 <?php
include 'includes/Customerclass.php';

    $customerObj = new customer();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customer = $customerObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['edit'])) {
    $customerObj->updateRecord($editId);
  }

  ?>
      
<div class="sidebar">
  <a class="active" href="#home">Dashboard</a><br>
  <a href="admin.php">Manage Admins</a>
  <a href="customer.php">Manage Customers</a>
  <a href="categorize.php">Manage Categorize</a>
  <a href="product.php">Manage Product</a>
        <a href="logout.php">Logout</a>

</div>
<div class="content">
  <br><br><br><br><form action="" method="post">
    <center><h1>Update Customer</h1></center>
    <br><label for="text">Customer Name</label>
    <input type="text" id="text" name="text" placeholder="Customer name" value="<?php echo $customer['cust_name']?>">

    <br><label for="email">Customer Email</label>
    <input type="email" id="email" name="email" placeholder="Customer Email" value="<?php echo $customer['cust_email']?>">
    
    
    <br><label for="password">Customer Password</label>
    <input type="password" id="password" name="password" placeholder="Customer Password" value="<?php echo $customer['cust_pass']?>">


    <br><label for="tel">Customer Phone</label>
    <input type="text" id="tel" name="tel" placeholder="079/1678554" value="<?php echo $customer['cust_mobile']?>">
    
    <br><label for="text">Customer Adress</label>
    <input type="text" id="text" name="address" placeholder="Customer name" value="<?php echo $customer['cust_address']?>">
    
    
    <input type="submit" value="Update Customer" id="submit" style="background:#15317E" name="edit">
  </form>
    <br><br>

</div>

</body>
</html>