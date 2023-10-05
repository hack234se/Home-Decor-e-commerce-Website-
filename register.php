    <?php

      include('customers.php');
      
      // Customer registration validations
       function validateCustomerForm()
            {
                
                if(trim($_POST["customer_name"])=="")
                    return "Please enter Customer name";
                if(trim($_POST["customer_phone"])=="")
                    return  "Please enter Phone number";
                 if(trim($_POST["customer_address"])=="")
                     return  "Please enter Address";

                if(trim($_POST["customer_email"])=="")
                     return  "Please email Address";
                 if(trim($_POST["customer_pincode"])=="")
                     return  "Please enter pincode";

                 if(trim($_POST["customer_username"])=="")
                     return  "Please enter username";
      
                 if(trim($_POST["customer_password"])=="")
                     return  "Please enter password";


                 if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["customer_email"])){
                         return  "Please enter valid email address";
                 }

                 if(strlen($_POST["customer_phone"])!=10)
                     return  "Please enter valid mobile Number";
      
                return "";
            }

//Function to remove all script tag to avoid cross site scripting 
    function validateXSS()
    {
      foreach($_POST as $key => $value)
    {
       $_POST[$key] = strip_tags($_POST[$key]);
       
    }
      
    }
    validateXSS();
    $errorMsg = validateCustomerForm();
    if(trim($errorMsg)==""){
      $customers=new Customers(array_merge(
            [
                "customer_id" => "",
                "customer_name" => "",
                "customer_phone" => "",
                "customer_address" => "" ,
                "customer_email" => "",
                "customer_username"=>"",
                "customer_password"=>"",
                 "customer_pincode"=>""
            ], $_POST));
           echo $_POST['customer_name'];
  
        $customers->insert();
       header("Location: login.php?status=Saved Successfully");


    }else
    {

    header("location:registration.php?errorMsg=".$errorMsg);
    }

     ?>


