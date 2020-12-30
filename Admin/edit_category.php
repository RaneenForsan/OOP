<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
   
 <?php
include 'includes/Categoryclass.php';
 $categoryobject = new category(); 

  // Edit category record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $category = $categoryobject->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['edit'])) {
    $categoryobject->updateRecord($editId);
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
    <center><h1>Manage Category</h1></center>
    <br><label for="name">Category Name</label>
    <input type="text" id="name" name="name" placeholder="Category name" value="<?php echo $category['cat_name']?>">

    <br><label for="descrip">Category Description</label>
    <input type="text" id="descrip" name="descrip" placeholder="Category Description" 
    value="<?php echo $category['cate_desc']?>">

    <br><label for="imgae">Category Image</label>
    <input type="file" id="text" name="admin_image" placeholder="Category image" value="<?php echo $category['cat_img']?>" selected>
  
    <input type="submit" value="Update Category" id="submit" style="background:#15317E" name="edit">
  </form>
    <br><br>

</div>
</body>
</html>