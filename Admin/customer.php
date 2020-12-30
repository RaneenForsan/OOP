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
    if(isset($_POST['submit'])){
    $customerObj->insertData($_POST);
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
  <br><br><br><br><form action="customer.php" method="post">
    <center><h1>Manage Customer</h1></center>
    <br><label for="text">Customer Name</label>
    <input type="text" id="text" name="text" placeholder="Customer name">

    <br><label for="email">Customer Email</label>
    <input type="email" id="email" name="email" placeholder="Customer Email">
    
    
    <br><label for="password">Customer Password</label>
    <input type="password" id="password" name="password" placeholder="Customer Password">


    <br><label for="tel">Customer Phone</label>
    <input type="text" id="tel" name="tel" placeholder="079/1678554">
    
    <br><label for="text">Customer Adress</label>
    <input type="text" id="text" name="address" placeholder="Customer name">
    
    
    <input type="submit" value="Add Customer" id="submit" style="background:#15317E" name="submit">
  </form>
    <br><br>
<center><table cellpadding="3">
   <tr>
    <th>Customer name</th>
    <th>Customer Email</th>
    <th>Customer Phone</th>
    <th>Customer Adress</th>
    <th>Delete</th>
    <th>Update</th>
    </tr> 
    <?php
    $customers = $customerObj->displayData(); 
    foreach ($customers as $customer) {
       echo "<tr>";
       echo "<td>{$customer['cust_name']}</td>";
       echo "<td>{$customer['cust_email']}</td>";
       echo "<td>{$customer['cust_mobile']}</td>";
       echo "<td>{$customer['cust_address']}</td>";
       echo "<td><a href='edit_customer.php ?editId={$customer['cust_id']}' class='edit'>Edit</a></td>";
       echo "<td><a href='delete_customer.php?deleteId={$customer['cust_id']}'>Delete</a></td>";
   }
     ?>
</table>
</center>
</div>
</body>
</html>