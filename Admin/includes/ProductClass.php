<?php
include("Adminclass.php");

 class Product extends Admin 
	{
		


		// Database Connection 
		public function __construct()
		{
            $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }        
        }
    public function insertData($post)
		{
			 $product_name = $this->con->real_escape_string($_POST['name']);
			 $product_desc = $this->con->real_escape_string($_POST['des']);
			 $price = $this->con->real_escape_string($_POST['price']);
			 $qty = $this->con->real_escape_string($_POST['number']);
			 $category = $this->con->real_escape_string($_POST['category']);
             $admin_image = $_FILES['admin_image']['name'];
             $tmp_name = $_FILES['admin_image']['tmp_name'];
             $path = 'images/';
              move_uploaded_file($tmp_name,$path.$admin_image);
		      $query="INSERT INTO product(product_name,product_des,product_Price,pro_image,qty,cat_id)
 VALUES('$product_name','$product_desc','$price','$admin_image','$qty','$category')";
			   $sql = $this->con->query($query);
			if ($sql==true) {
             header("location:product.php");
            }
            else{
			    echo "Registration failed try again!";
			   }
		       }
     
        
        public function displayData()
		{
            $query="select * from  category,product where category.cat_id=product.cat_id";
		    $result = $this->con->query($query);
	     	if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}
        
        public function displaycategoryData()
		{
            $query="select * from category";
		    $result = $this->con->query($query);
	     	if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}
        public function deleteRecord($deleteId)
		{
            $query="delete from product where product_id ='$deleteId'";
		    $sql = $this->con->query($query);
		    if ($sql==true) {
            header("location:product.php");
		}else{
			echo "Record does not delete try again";
		    }
		}
     
           function displyaRecordById($editId)
		{
        $query="select * from product where product_id =$editId";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}
     
     


     	 function updateRecord($editId)
		{
		      $product_name = $this->con->real_escape_string($_POST['name']);
			 $product_desc = $this->con->real_escape_string($_POST['des']);
			 $price = $this->con->real_escape_string($_POST['price']);
			 $qty = $this->con->real_escape_string($_POST['number']);
			 $category = $this->con->real_escape_string($_POST['category']);
             $admin_image = $_FILES['admin_image']['name'];
             $tmp_name = $_FILES['admin_image']['tmp_name'];
             $path = 'images/';
              move_uploaded_file($tmp_name,$path.$admin_image);
		      $query="UPDATE product SET product_name='$product_name',product_des='$product_desc',product_Price='$price'
              ,pro_image='$admin_image',qty='$qty',cat_id='$category' WHERE product_id =$editId";
			   $sql = $this->con->query($query);
           
             
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("location:product.php");
			}else{
			    echo "try again!";
			}
		    }
     	 
		       }


?>