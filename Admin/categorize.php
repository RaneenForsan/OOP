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
   include 'includes/header.php';
    /*include 'includes/connect.php';*/
    if(isset($_POST['submit'])){
    $categoryobject->insertData($_POST);

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
    <input type="text" id="name" name="name" placeholder="Category name">

    <br><label for="descrip">Category Description</label>
    <input type="text" id="descrip" name="descrip" placeholder="Category Description">

    <br><label for="text">Category image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image">
  
    <input type="submit" value="Add Category" id="submit" style="background:#15317E" name="submit">
  </form>
    <br><br>
<center><table cellpadding="3">
   <tr>
    <th>Category ID</th>
    <th>Category Name</th>
    <th>Category description</th>
    <th>Category image</th>
    <th>Delete</th>
    <th>Update</th>
    </tr> 
    <?php
    $Categories = $categoryobject->displayData(); 
    foreach ($Categories as $category) {
       echo "<tr>";
       echo "<td>{$category['cat_id']}</td>";
       echo "<td>{$category['cat_name']}</td>";
       echo "<td>{$category['cate_desc']}</td>";
       echo "<td><img src='images/{$category['cat_img']}' width='200' height='200'></td>";
       echo "<td><a href='edit_category.php?editId={$category['cat_id']}' class='edit'>Edit</a></td>";
       echo "<td><a href='delete_category.php?deleteId={$category['cat_id']}'>Delete</a></td>";
   }
     ?>
</table>
</center>
</div>

</body>
</html>