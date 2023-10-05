<?php
require_once('dbconnection.php');
class products
{
	var $product_id;
	var $product_name;
	var $product_price;
	var $product_stock;
	var $product_image;
	var $product_entrydate;
   

	

function __construct($properties=[])
        {
            if(isset($properties["product_id"])) $this->product_id=$properties["product_id"];
            if(isset($properties["product_name"])) $this->product_name=$properties["product_name"];
            if(isset($properties["product_price"])) $this->product_price=$properties["product_price"];
            if(isset($properties["product_stock"])) $this->product_stock=$properties["product_stock"];
            if(isset($properties["product_image"])) $this->product_image=$properties["product_image"];
            if(isset($properties["product_entrydate"])) $this->product_entrydate=$properties["product_entrydate"];

        }


}

?>
