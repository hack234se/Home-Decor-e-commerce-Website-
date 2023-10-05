    <?php
    require_once('dbconnection.php');
    include 'products.php';
    include 'customers.php';

    session_start();

    	function getProductById($product_id) //Get products
    	{

    	 $pd= new DatabaseConnection();
         $mysqli = $pd->get_dbc();
       	 if ($result = $mysqli->query("select * from products where product_id=".$product_id)) {
           if($row = mysqli_fetch_assoc($result))
        		return new Products($row);
        }
        return null;
    	}



    function getCart($guest_id)
            {
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();

                $results = "";
                
                $results = $mysqli->query("select count(*) as orders from orders where guest_id='".$guest_id."' and order_status='I'");
                $row = mysqli_fetch_assoc($results);
                return $row['orders']; 
            }
     


            function deleteOrder($orderId)
            {
                $pd= new DatabaseConnection();
                $pdo = $pd->get_dbc();

               $results =$pdo->query ("delete from orders where order_id=".$orderId);
               if($results==TRUE)
               {
                 $pdo->close();
                return 1;
               }
                 $pdo->close();
                 return 0;
            }


            function getCartTotal($guest_id) //Calculate cart total
            {
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();

                $results = "";
                
                $results = $mysqli->query("select sum(price) as price from orders where guest_id='".$guest_id."' and order_status='I'");
                $row = mysqli_fetch_assoc($results);
                return $row['price'];
            
                
            
            }


    function startSession($customer_id) //starting session and destroying cookie after valid login
            {
            	$_SESSION['user']=$customer_id;
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();

                $results = "";
                if(isset($_COOKIE['user'])){
                	$results = $mysqli->query("update orders set guest_id=".$customer_id."  where guest_id='".$_COOKIE['user']."' and order_status='I'");
    				unset($_COOKIE['user']); 
        			setcookie('user', null, -1);
                }

                
               
            
                
            
            }


    function validateLogin($username,$password) //VAlidating credentials of customer registration form
    {
       $pd= new DatabaseConnection();
            $pdo = $pd->get_dbc();
            $stmt = "select * from customers where customer_username='".$username."' and customer_password='".$password."'";
            $result = $pdo->query($stmt);
             if($row = mysqli_fetch_assoc($result))
             {
                startSession($row['customer_id']);
                return true;
             }else
             {
             	return false;
             }

    }
    function displayMsg($msg)
    {
    	if(isset($msg))
    		echo $msg;
    }


    function getCustomerById($customerId)
    	{

    	 $pd= new DatabaseConnection();
         $mysqli = $pd->get_dbc();
       	 if ($result = $mysqli->query("select * from customers where customer_id=".$customerId)) {
           if($row = mysqli_fetch_assoc($result))
        		return new Customers($row);
        }
        return null;
    	}




        function checkoutCart($customer_id) //Resetting orders and cart by clearing cookie data
            {
               
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();

                $results = "";
                
                $results = $mysqli->query("update orders set  order_status='A' where guest_id='".$customer_id."' and order_status='I'");
            
            }



            function getOrderNumber($guest_id)
            {
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();

                $results = "";
                
                $results = $mysqli->query("select order_no  from orders where guest_id='".$guest_id."' and order_status='I' limit 1");

                if($row = mysqli_fetch_assoc($results)){
                return $row['order_no'];
                             }else
                             return '';
                
            
            }

             function generateOrderNumber()
            {
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();

                $results = "";
                
                $results = $mysqli->query("select COALESCE(max(order_id)+100,100) as order_no from orders");
                $row = mysqli_fetch_assoc($results);
                return $row['order_no'];
            }

          



    function checkCart($guest_id,$product_id)
            {
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();

                $results = "";
                $statement = "select count(*) as orders from orders where guest_id='".$guest_id."' and product_id=".$product_id." and order_status='I'";
                echo $statement;
                $results = $mysqli->query($statement);
                $row = mysqli_fetch_assoc($results);
                return $row['orders']; 
            }

    function updateCart($customer_id,$product_id,$qty,$price)
            {
                $pdp= new DatabaseConnection();
                $mysqli = $pdp->get_dbc();
                    $results = $mysqli->query("update orders set  quantity=".$qty.",price=".$price." where guest_id='".$customer_id."' and order_status='I' and product_id='".$product_id."'");
                    
            }
        
    ?>
