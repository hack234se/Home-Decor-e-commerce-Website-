	<?php include 'header.php';
		  include 'productCart.php';

		  // To search products by category
	     if(isset($_POST['search']))
	{
		if($_POST['search']!="all") // To search products by category if not selected the option all
	     		$productListStr = "SELECT * FROM products where category_id= ".$_POST['search'];
	        else
			$productListStr = "SELECT * FROM products"; // To select all products if not category is selected expect option all
	}
	     if(!isset($_POST['search']))  // To select all products if category is selected 
	     	$productListStr = "SELECT * FROM products";
	     $pd= new DatabaseConnection();
	     $mysqli = $pd->get_dbc();
	     $productCart = new ProductCart();

	     $categoryListStr = "SELECT DISTINCT c.category_name,c.category_id FROM products p JOIN category c on c.category_id=p.category_id;";
	 ?>

		<section>
			<div>
				<form action="shop.php" method="post">
			<h2>Shop By Category</h2>
			<select name="search">
				<option value="all">All</option>
				<?php if ($categoryList = $mysqli->query($categoryListStr)) { ?>
				<?php  while ($category = $categoryList->fetch_assoc()) { ?> 
				<?php if(isset($_POST['search'])) { ?>
				<?php if($_POST['search']==$category['category_id']){ ?>
				<option selected value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?> </option>
				<?php }?>
				<?php if($_POST['search']!=$category['category_id']){ ?>
					<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?> </option>
				<?php } ?>
				<?php } ?>
				<?php if(!isset($_POST['search'])) { ?>
					<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?> </option>
				<?php } ?>	
			<?php }} ?>

			</select>
			<button style="height: 32px; font-size: 12px;" class="add-to-cart" type="submit"><i title="Search" class="fas fa-search" aria-hidden="true"></i></button>
	</form>
		</div>
			<div class="products">
				
		 	<?php if ($productList = $mysqli->query($productListStr)) {  ?>
			<?php    while ($product = $productList->fetch_assoc()) {    ?>
				<div class="product">
					<form action="orders_save.php">
	         <img src="images/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>" class="product-image">
	         <h3><?php echo $product['product_name']; ?></h3>
					<p>$<?php echo $product['product_price']; ?></p>
					<?php  $cart = $productCart->getCartDetails($product['product_id']); ?>
				<p>	<label for="quantity">Quantity:</label>
	<input type="number" id="quantity" required="" min=1 name="quantity" value="<?php echo $cart->quantity; ?>" max="<?php echo $product['product_stock']; ?>">
	<input type="hidden"  name="product_id"  value="<?php echo $product['product_id']; ?>">  </p>
				<?php if(is_null($cart->product_id)){ ?>
	          <button class="add-to-cart" type="submit">Add to Cart</button>
	      <?php } else {?>
			<button  class="add-to-cart" type="submit">Update Cart</button>
	      <?php } ?>
	          </div>
		      </form>
	           <?php }  } ?>
			</div>

		</section>
		 <?php include 'footer.php';  ?>
	</body>
	</html>

