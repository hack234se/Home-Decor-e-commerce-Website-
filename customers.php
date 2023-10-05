      <?php
      require_once('dbconnection.php');
     class Customers
    {
    	var $customer_id;
    	var $customer_name;
    	var $customer_phone;
    	var $customer_address;
    	var $customer_email;
    	var $customer_username;
    	var $customer_password;
    	var $customer_pincode;


    	
    	
    	function __construct($properties=[])
            {
                if(isset($properties["customer_id"])) $this->customer_id=$properties["customer_id"];
                if(isset($properties["customer_name"])) $this->customer_name=$properties["customer_name"];
                if(isset($properties["customer_phone"])) $this->customer_phone=$properties["customer_phone"];
                if(isset($properties["customer_address"])) $this->customer_address=$properties["customer_address"];
                if(isset($properties["customer_email"])) $this->customer_email=$properties["customer_email"];
                if(isset($properties["customer_username"])) $this->customer_username=$properties["customer_username"];
                if(isset($properties["customer_password"])) $this->customer_password=$properties["customer_password"];
                if(isset($properties["customer_pincode"])) $this->customer_pincode=$properties["customer_pincode"];

            }
      function insert()
            {
                  $pd= new DatabaseConnection();
                  $pdo = $pd->get_dbc();
  
                  $query="insert into customers (customer_name,customer_phone,customer_address,customer_email,customer_username,customer_password,customer_pincode)
                  values (?,?,?,?,?,?,?)";
                    $stmt=mysqli_prepare($pdo, $query);
                    mysqli_stmt_bind_param(
                          $stmt,
                          'sssssss',
                          $this->customer_name,
                          $this->customer_phone,
                          $this->customer_address,
                          $this->customer_email,
                          $this->customer_username,
                          $this->customer_password,
                          $this->customer_pincode
                    );
                    $result=mysqli_stmt_execute($stmt);
              //      echo $stmt;
                    $pdo->close();

            }









    }
    ?>
