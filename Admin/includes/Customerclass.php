    <?php
include("Adminclass.php");

 class customer extends Admin 
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
			$name = $this->con->real_escape_string($_POST['text']);
			$email = $this->con->real_escape_string($_POST['email']);
			$password = $this->con->real_escape_string($_POST['password']);
			$mobile = $this->con->real_escape_string($_POST['tel']);
			$adress = $this->con->real_escape_string($_POST['address']);
		    
			  $query="insert into customer(cust_name,cust_email,cust_pass,cust_mobile,cust_address)
                       values('$name','$email','$password','$mobile','$adress')";
			  $sql = $this->con->query($query);
			if ($sql==true) {
             header("location:customer.php");
            }
            else{
			    echo "Registration failed try again!";
			   }
		       }
        
        public function displayData()
		{
		    $query = "SELECT * FROM customer";
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
            $query="delete from customer where cust_id='$deleteId'";
		    $sql = $this->con->query($query);
		    if ($sql==true) {
            header("location:customer.php");
		}else{
			echo "Record does not delete try again";
		    }
		}
        
		       


        function displyaRecordById($id)
		{
		    $query = "SELECT * FROM customer WHERE cust_id = '$id'";
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
		  $name = $this->con->real_escape_string($_POST['text']);
			$email = $this->con->real_escape_string($_POST['email']);
			$password = $this->con->real_escape_string($_POST['password']);
			$mobile = $this->con->real_escape_string($_POST['tel']);
			$adress = $this->con->real_escape_string($_POST['address']);
			$query="update customer set cust_name='$name',cust_email='$email',	cust_pass='$password',cust_mobile='$mobile',cust_address='$adress' 
            where cust_id ='$editId'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:customer.php");
			}else{
			    echo "try again!";
			}
		    }
 }
 


?>