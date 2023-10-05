    <?php
      require_once('dbconnection.php');
    class Checkout
    {
    	var $checkout_id;
    	var $order_no;
    	var $total_price;
    	var $order_status;
    	var $order_date;

    	function __construct($properties=[])
            {
                if(isset($properties["checkout_id"])) $this->customer_id=$properties["checkout_id"];
                if(isset($properties["order_no"])) $this->order_no=$properties["order_no"];
                if(isset($properties["total_price"])) $this->total_price=$properties["total_price"];
                if(isset($properties["order_status"])) $this->order_status=$properties["order_status"];
                if(isset($properties["order_date"])) $this->order_date=$properties["order_date"];
             
            }


             function insert()
            {
                $pd= new DatabaseConnection();
                $pdo = $pd->get_dbc();

                $stmt="INSERT INTO checkout(order_no, total_price, order_status, order_date) VALUES ('".$this->order_no."','".$this->total_price."','".$this->order_status."','".$this->order_date."')";
                 $pdo->query($stmt);
                 echo $stmt;
                  $pdo->close();

            }
    }

    ?>
