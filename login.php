    <?php
    include 'functions.php';

    $username=$_POST['username'];
    $password=$_POST['password'];
    if(validateLogin($username,$password))
    {
        header("location:shop.php");
    }else
    {
        header("location:login_page.php?msg=Invalid+username+or+password");
    }
    ?>