  <?php
    require_once('dbconnection.php');
    include 'checkout.php'; 
    include 'header.php';

  function validateXSS()
  {
    foreach($_POST as $key => $value)
  {
     $_POST[$key] = strip_tags($_POST[$key]);
     
  }

  foreach($_GET as $key => $value)
  {
     $_GET[$key] = strip_tags($_GET[$key]);
     
  }
  }


  validateXSS();

    $checkout = new Checkout(
          [
              "order_no" => $order_no,
              "total_price" => getCartTotal($user),
              "order_status" => "A" ,
              "order_date" => date("Y-m-d")
              
          ]);

    $checkout->insert();

    checkoutCart($user);
    header("location:shop.php");

    
  ?>
