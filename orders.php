     <?php
     //class orders for  managing orders table to keep registered and unregistered customers.
     class Orders
    {
    	var $order_id;
    	var $product_id;
    	var $customer_id;
    	var $guest_id;
    	var $order_no;
    	var $quantity;
    	var $price;
    	var $entry_date;
    	var $order_status;


    	
    	
    	
    	
    	function __construct($properties=[])
            {
                if(isset($properties["order_id"])) $this->order_id=$properties["order_id"];
                if(isset($properties["product_id"])) $this->product_id=$properties["product_id"];
                if(isset($properties["customer_id"])) $this->customer_id=$properties["customer_id"];else $this->customer_id="null";
                if(isset($properties["guest_id"])) $this->guest_id=$properties["guest_id"];else  $this->guest_id="null";
                if(isset($properties["order_no"])) $this->order_no=$properties["order_no"];
                if(isset($properties["quantity"])) $this->quantity=$properties["quantity"];
                if(isset($properties["price"])) $this->price=$properties["price"];
                if(isset($properties["entry_date"])) $this->entry_date=$properties["entry_date"]; else { $this->entry_date = date("Y-m-d");};
                if(isset($properties["order_status"])) $this->order_status=$properties["order_status"]; else {$this->order_status='I';};

            }
            
            
            function insert()
            {
                $pd= new DatabaseConnection();
                $pdo = $pd->get_dbc();

                $stmt="INSERT INTO orders(product_id, guest_id, order_no, quantity, price, entry_date, order_status) VALUES (".$this->product_id.",".$this->guest_id.",".$this->order_no.",".$this->quantity.",".$this->price.",'".$this->entry_date."','".$this->order_status."')";
                echo  $stmt;
                

                $pdo->query($stmt);
                $pdo->close();

            }








            
    }

    ?>
