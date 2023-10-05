	<?php include 'header.php';
	include 'orders.php';

//capturing cart information rather than count
	 $pd= new DatabaseConnection();
	            $pdo = $pd->get_dbc();

	           $results =$pdo->query ("SELECT * FROM orders o JOIN products p on o.product_id=p.product_id where o.guest_id=".$user." and o.order_status='I'");
	            
	 ?>
	<link rel="stylesheet" type="text/css" href="css/table.css">

		<section>
			<div class="products" style="text-align:center">
			<center>

	   <table border="1">
		<thead>
			<tr>
				<th scope="col">Product name</th>
				<th scope="col">Quantity</th>
				<th scope="col">Price</th>
				<th scope="col">Final cost</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_assoc($results)){ ?>
			<tr>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['product_price']; ?></td>
				<td><?php echo $row['price']; ?></td>	
			</tr>

	<?php } ?>
			<tr>
			<td colspan="3" style="text-align:right"><a style="text-decoration:none" href="payment.php"><button class="checkout-btn">Proceed Payment</button></a><button style="width: 183.4px;height: 40px;"  onclick="printDiv('bill')" class="checkout-btn">Print Bill &nbsp;<i class="fas fa-print" style="color:white" aria-hidden="true" title="Cart"></i></button></td>
			<td><strong>Total $<?php echo getCartTotal($user); ?></strong></td>
		</tbody>
	</table>
	   	</center>
			</div>


	<div id="bill" style="text-align: center; visibility: hidden;">

	<div class="products" style="text-align:center">

	<center><h1><strong>Home Decor</strong></h1></center>
	   <table border="1" style="width: 100%;">
		<thead>
			<tr>
				<th scope="col">Product name</th>
				<th scope="col">Quantity</th>
				<th scope="col">Price</th>
				<th scope="col">Final cost</th>
			</tr>
		</thead>
		<tbody>
			<?php mysqli_data_seek($results, 0) ; ?>
			<?php while($row = mysqli_fetch_assoc($results)){ ?>
			<tr>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['product_price']; ?></td>
				<td><?php echo $row['price']; ?></td>
				
			</tr>

	<?php } ?>
			<tr>
			<td  colspan="4" style="text-align:right"><strong>Total $<?php echo getCartTotal($user); ?></strong></td>
		</tbody>
	</table>
	   	</center>

			</div>
	</div>

		</section>
	<script type="text/javascript">
		
		function printDiv(divName) {
	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;
	     document.body.innerHTML = printContents;
	     window.print();
	     
	     document.body.innerHTML = originalContents;
	}

	</script>
	 <?php include 'footer.php';  ?>

