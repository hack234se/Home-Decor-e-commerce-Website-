   <?php include 'header.php';
   ?>
    <!DOCTYPE html>
  <html>
    <head>
      <title>Registration</title>
      <link rel="stylesheet" type="text/css" href="registration.css">
    </head>
    <body>
    	<section>
      <form action="register.php" method="post">
        <h2>Registration</h2> <!-- Marking as sucess if no validation errors in registration form -->
        <?php if(isset($_GET['status'])){ ?> <label style="color:green"><?php echo $_GET['status']; ?></label><br><?php } ?>
  <?php if(isset($_GET['errorMsg'])){ ?> <label style="color:red"><?php echo $_GET['errorMsg']; ?></label><br><?php } ?>
        <label for="name">Name<span id="clr"; style="color:red";>*</span></label>
        <input type="text" id="customer_name"  name="customer_name" >
        <label for="phone">phone<span id="clr"; style="color:red";>*</span></label>
        <input type="phone" id="customer_phone" name="customer_phone" >
        <label for="address">Address<span id="clr"; style="color:red";>*</span></label>
        <input type="address" id="customer_address" name="customer_address" >
         <label for="email">Email<span id="clr"; style="color:red";>*</span></label>
        <input type="text" id="customer_email" name="customer_email" >
        <label for="pincode">Pincode<span id="clr"; style="color:red";>*</span></label>
        <input type="pincode" id="customer_pincode" name="customer_pincode" >
        <label for="username">Username<span id="clr"; style="color:red";>*</span></label>
        <input type="user_name" id="customer_username" name="customer_username" >
        <label for="password">Password<span id="clr"; style="color:red";>*</span></label>
        <input type="pass" id="customer_password" name="customer_password">
        <div style="text-align:right">
        <input type="submit" value="Register">
        </div>

      </form>
           </section>
    </body>
  </html>
