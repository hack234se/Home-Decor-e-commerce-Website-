	<!DOCTYPE html>
	<html lang="en">

	<?php
	include 'functions.php';
	$orders = '0';
	$user = '';
	$order_no='';
	if(isset($_SESSION['user']))
	{
	$orders = getCart($_SESSION['user']);
	$user =$_SESSION['user'];
	$customer = getCustomerById($user);
	$order_no = getOrderNumber($user);
	}
	else if(isset($_COOKIE['user'])) {
	$orders = getCart($_COOKIE['user']);
	$user =$_COOKIE['user'];
	$order_no = $_COOKIE['user'];
	}
	else
	{

	}
	?>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ecommerce Site</title>
		<link rel="stylesheet" href="style.css">
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	</head>
	<body>
	 <nav>
			<h1>Home Decor</h1>
			<ul>
				<li><a href="index.php">Home</a></li>
					<li><a href="shop.php">Products</a></li>
				<li><a href="view_cart.php"><i class="fas fa-shopping-cart" aria-hidden="true" title="Cart"></i></a><span style="background:red;border-radius:10px;color:white;font-size:15px;">&nbsp;<?php echo $orders; ?>&nbsp;</span></li>
	<?php if(isset($_SESSION['user'])){ ?>
				<li><a href="view_cart.php"><i title="<?php echo $customer->customer_name; ?>" class="fas fa-user" aria-hidden="true" title="Cart"></i></a></li>
				<li><a href="logout.php">Logout</a></li>

				


			<?php } ?>

			</ul>
		</nav>
