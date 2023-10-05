    <?php
    require_once('dbconnection.php');

    class ProductCart
    {
    	var $product_id;
    	var $quantity;
    	var $total_price;
       
//checking active session to capture cart information by registered customer_id
    	
     
    function getCartDetails($product_id)
    {
         $productCart = new  ProductCart();
         $id="";
         
         if(isset($_SESSION['user']))
            $id=$_SESSION['user'];
        else if(isset($_COOKIE['user']))
            $id=$_COOKIE['user'];
         $orderCart = "SELECT * FROM orders where guest_id='".$id."' and order_status='I' and product_id=".$product_id;
         $pdCart= new DatabaseConnection();
         $mysqli = $pdCart->get_dbc();
        if ($resultCart = $mysqli->query($orderCart)) {
            if($row = mysqli_fetch_assoc($resultCart))
                 {
                   
                    $productCart->product_id=$row['product_id'];
                    $productCart->quantity=$row['quantity'];
                    $productCart->total_price=$row['price']; 
                    return $productCart;
                 }
        
        }
        return new $productCart();
    }


    }

    ?>
