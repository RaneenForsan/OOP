<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>

   <?php
   include 'includes/ProductClass.php';
   $productobject = new Product(); 
   include 'includes/header.php';
    /*include 'includes/connect.php';*/
    if(isset($_POST['submit'])){
    $productobject->insertData($_POST);

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
  <br><br><br><br>
    <form  method="POST" action="" enctype="multipart/form-data">
    <center><h1>Manage Products</h1></center>
    <br><label for="name">Product Name</label>
    <input type="text" id="email" name="name" placeholder="Product Name">

    <br><label for="des">Product description</label>
    <input type="text" id="password" name="des" placeholder="Product Description">

    <br><label for="price">product_Price</label>
    <input type="text" id="text" name="price" placeholder="product Price">
  
    <br><label for="text">Product image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image">
    
    
    <br><label for="category">Category name</label><br>
    <select name="category" id="category"  placeholder="Select Category">
      <?php  
    $products = $productobject->displaycategoryData(); 
    foreach ($products as $product) {        
        $i=$product['cat_id'];
       echo "<option value='$i'>{$product['cat_name']}</option>";}
        ?>
       </select><br>
    
     <br><label for="image">Quantity</label>
    <input type="text" id="number" name="number" placeholder="product Quantity">
    
    
<input type="submit" value="Add Product" id="submit"  name="submit">
  </form>
    <br><br>
<center><table cellpadding="3">
   <tr>
    <th> pro-Name</th>
    <th> Describtion</th>
    <th> Price</th>
    <th> image</th>
    <th> Quantity</th>
    <th> ID</th>
    <th>cat-name</th>
    <th>Update</th>
    <th>Delete</th>
    </tr> 
    <?php
    $products = $productobject->displayData(); 
    foreach ($products as $product) {
       echo "<tr>";
       echo "<td>{$product['product_name']}</td>";
       echo "<td>{$product['product_des']}</td>";
       echo "<td>{$product['product_Price']}</td>";
       echo "<td><img src='images/{$product['pro_image']}' width='150' height='150'></td>";
       echo "<td>{$product['qty']}</td>";
       echo "<td>{$product['cat_id']}</td>";  
       echo "<td>{$product['cat_name']}</td>";  
             echo "<td><a href='edit product.php?editId={$product['product_id']}' class='edit'>Edit</a></td>";

       echo "<td><a href='delete product.php?deleteId={$product['product_id']}'>Delete</a></td>";
   }
     
 

       
     
  
     ?>
</table>
</center>
</div>

</body>
</html>