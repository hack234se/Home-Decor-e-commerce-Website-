     <?php
     require_once('dbconnection.php');
     include 'orders.php';
     include 'header.php';

     //set cookie value
    $rand = generateOrderNumber();
    $cookie_name = "user";
    $guest_id = null;
    $customer_id=null;

    $id = '';
    if(isset($_SESSION['user']))
    {
    $user=$_SESSION[$cookie_name];
    }else{
    if(isset($_COOKIE[$cookie_name]))
    {
        $user=$_COOKIE[$cookie_name];
    }

    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie not set";
    setcookie($cookie_name, $rand, time() + (86400 * 30)); // 86400 = 1 day
         $order_no=$rand;
         $user= $rand;
    }

    }


    if(isset($order_no))
    {
        $order_no= $rand;
    }

     echo '      Order Number '.$rand;
        $products = getProductById($_GET['product_id']);
        echo $products->product_price;

      $orders=new Orders(
            [
    	 "product_id"=>$_GET['product_id'],
    	 "guest_id"=>$user,
    	 "order_no"=>$order_no,
    	 "quantity"=>$_GET['quantity'],
    	 "price"=>(intval($_GET['quantity'])*intval($products->product_price)),
    	 "order_status"=>'I'
            ]);
    echo 'cart check'.checkCart($user,$_GET['product_id']);
      if(checkCart($user,$_GET['product_id'])==0){
         $orders->insert();
        
    }else
    {
        updateCart($user,$_GET['product_id'],$_GET['quantity'],(intval($_GET['quantity'])*intval($products->product_price)));
    }

     header("location:shop.php");

     ?>
