	<?php include 'header.php';
	include 'orders.php';


	 $pd= new DatabaseConnection();
	            $pdo = $pd->get_dbc();

	           $results =$pdo->query ("SELECT * FROM orders o JOIN products p on o.product_id=p.product_id where o.guest_id=".$user." and o.order_status='I'");
	            

	 ?>
	<link rel="stylesheet" type="text/css" href="css/table.css">

		<section>
			<div class="products" style="text-align:center">
			<center>
	   <table border="0">
		<thead>
			<tr>
				<th scope="col">Picture</th>
				<th scope="col">Product name</th>
				<th scope="col">Quantity</th>
				<th scope="col">Price</th>
				<th scope="col">Final cost</th>
				<th scope="col">Controls</th>
			</tr>
		</thead>
		<tbody>
			<?php if($results){ ?>
			<?php while($row = mysqli_fetch_assoc($results)){ ?>
			<tr>
				<td><img class="cart-image"  src="images/<?php echo $row['product_image']; ?>" alt="" /></td>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['product_price']; ?></td>
				<td><?php echo $row['price']; ?></td>
				<td style="text-align:center"><a href="#"><a href="delete.php?order_id=<?php echo $row['order_id']; ?>"><i class="fas fa-trash" style="color:red" aria-hidden="true" title="Cart"></i></a></td>
			</tr>

	<?php } } ?>
			<tr>
			<td colspan="5" style="text-align:right"><a href="login_page.php?checkout=1"><button class="checkout-btn">Checkout</button></a></td>
			<td><strong>Total $<?php echo getCartTotal($user); ?></strong></td>
		</tbody>
	</table>
	   	</center>
			</div>
		</section>

	 <?php include 'footer.php';  ?>

