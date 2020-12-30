<?php
include("Adminclass.php");

 class category extends Admin 
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
			$name = $this->con->real_escape_string($_POST['name']);
			$descr = $this->con->real_escape_string($_POST['descrip']);
			 $admin_image = $_FILES['admin_image']['name'];
             $tmp_name = $_FILES['admin_image']['tmp_name'];
             $path = 'images/';
              move_uploaded_file($tmp_name,$path.$admin_image);
		      $query="insert into category(cat_name,cate_desc,cat_img)
                       values('$name','$descr','$admin_image')";
			  $sql = $this->con->query($query);
			if ($sql==true) {
             header("location:categorize.php");
            }
            else{
			    echo "Registration failed try again!";
			   }
		       }
        
        public function displayData()
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
            $query="delete from category where cat_id='$deleteId'";
		    $sql = $this->con->query($query);
		    if ($sql==true) {
            header("location:categorize.php");
		}else{
			echo "Record does not delete try again";
		    }
		}
     
        function displyaRecordById($id)
		{
		    $query = "SELECT * FROM category WHERE cat_id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update customer data into customer table
		 function updateRecord($editId)
		{
		    $name = $this->con->real_escape_string($_POST['name']);
			$descr = $this->con->real_escape_string($_POST['descrip']);
			 $admin_image = $_FILES['admin_image']['name'];
             $tmp_name = $_FILES['admin_image']['tmp_name'];
             $path = 'images/';
              move_uploaded_file($tmp_name,$path.$admin_image); 
 $query="update category set cat_name='$name',cate_desc='$descr',cat_img='$admin_image' where cat_id ='$editId'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:categorize.php");
			}else{
			    echo "try again!";
			}
		    }
		       }


?>