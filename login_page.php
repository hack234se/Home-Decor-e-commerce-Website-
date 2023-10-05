    <?php include 'header.php';
        if(isset($_GET['checkout'])&& isset($_SESSION['user']))
        {
          header("location:view_bill.php");
        }
   ?>
    <!DOCTYPE html>
  <html>
    <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
    	<section>
      <form action="login.php" method="post">
        <h2>Login</h2>
        <?php if(isset($_GET['msg'])) { ?>
        <label style="color:red"></label><br><?php } ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <div style="text-align:right">
        <input type="submit" value="Login">
        </div>
        <p>Don't have an account? <a href="registration.php">Sign up</a></p>
      </form>
           </section>
    </body>
  </html>


