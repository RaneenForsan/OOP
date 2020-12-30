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

  // Edit category record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $product = $productobject->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['edit'])) {
    $productobject->updateRecord($editId);
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

    
    <br><br><br><br><form action="" method="post" enctype="multipart/form-data">
    <center><h1>Manage Products</h1></center>
    <br><label for="name">Product Name</label>
    <input type="text" id="email" name="name" placeholder="Product Name" value="<?php echo $product['product_name']?>">

    <br><label for="des">Product description</label>
    <input type="text" id="password" name="des" placeholder="Product Description" value="<?php echo $product['product_des']?>">

    <br><label for="price">product_Price</label>
    <input type="text" id="text" name="price" placeholder="product Price" value="<?php echo $product['product_Price']?>">
    
  <br><label for="text">Product image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image" value="<?php echo $product['pro_image']?>">
    
       <br><label for="image">Quantity</label>
    <input type="text" id="number" name="number" placeholder="product Quantity" value="<?php echo $product['qty']?>"><br>
    
    <br><label for="category">Category name</label><br>
<select name="category" id="category"  placeholder="Select Category" value="<?php echo $product['cat_id']?>">
    <option value="0">Please Select</option>
  
           
       <?php  
    $products = $productobject->displaycategoryData(); 
    foreach ($products as $product) { 
        $i=$product['cat_id'];
        echo "<option value='$i'";
        if($product['cat_id']=$product['cat_id']){
             echo "selected";
                echo">";
                echo $product['cat_name'];
                echo"</option>";
      }
    else{
               echo "<option value='$i'>";
                echo $product['cat_name'];
                 echo"</option>";
    }
    
    }
        ?>
       </select><br>
    
  
    
<input type="submit" value="updtae Product" id="submit" style="background:#15317E" name="edit" >
  </form>

</div>
</body>
</html>