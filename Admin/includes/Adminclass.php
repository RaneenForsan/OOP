 <?php

 class Admin
	{
		public  $servername = "localhost";
		public  $username   = "root";
		public  $password   = "";
		public  $database   = "ecom6";
		public   $con;


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
			$email = $this->con->real_escape_string($_POST['email']);
			$password = $this->con->real_escape_string($_POST['password']);
			$fullname = $this->con->real_escape_string($_POST['text']);
		    $admin_image = $_FILES['admin_image']['name'];
            $tmp_name = $_FILES['admin_image']['tmp_name'];
            $path = 'images/';
            move_uploaded_file($tmp_name, $path.$admin_image);
			 $query="insert into admin(admin_email,admin_password,admin_fullname,admin_image)
             values('$email','$password','$fullname','$admin_image')";
			  $sql = $this->con->query($query);
			if ($sql==true) {
             header("location:admin.php");
            }
            else{
			    echo "Registration failed try again!";
			   }
		       }
        
        public function displayData()
		{
		    $query = "SELECT * FROM admin";
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
        
    
             function displyaRecordById($id)
		{
		    $query = "SELECT * FROM admin WHERE admin_id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}
        
        public function updateRecord($editId)
		{
		    $email = $this->con->real_escape_string($_POST['email']);
			$password = $this->con->real_escape_string($_POST['password']);
			$fullname = $this->con->real_escape_string($_POST['text']);
		    $admin_image = $_FILES['admin_image']['name'];
            $tmp_name = $_FILES['admin_image']['tmp_name'];
            $path = 'images/';
            move_uploaded_file($tmp_name, $path.$admin_image);
			 $query="update admin set admin_email='$email',admin_password='$password',admin_fullname='$fullname',admin_image='$admin_image' where admin_id ='$editId'";
             $sql = $this->con->query($query);
			if ($sql==true) {
               header("location: admin.php");
			}else{
			    echo "Registration updated failed try again!";
			
		    }
			
		}
        
        
        public function deleteRecord($deleteId)
		{
            $query="delete from admin where admin_id='$deleteId'";
		    $sql = $this->con->query($query);
		    if ($sql==true) {
            header("location:admin.php");
		}else{
			echo "Record does not delete try again";
		    }
		}
        
		       }

    ?>