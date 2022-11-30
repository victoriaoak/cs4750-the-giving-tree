<?php
require("connect-db.php");      // include("connect-db.php");
require("account-db.php");

//$list_all_user_info = getAllUserInfo();
$user_to_update = null;  
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Create') 
  {
      addUser($_POST['username'], $_POST['pwd'], $_POST['first_name'], $_POST['last_name'], $_POST['age'], $_POST['email'],  $_POST['phone_number'],  $_POST['street_address'], $_POST['city']);
      addAddress($_POST['street_address'], $_POST['city'], $_POST['state'], $_POST['zip_code']);
      $list_all_user_info = getAllUserInfo();
  }
}
?>


<!DOCTYPE html>
<html>
    <style>
        .container {
            display: flex;
            justify-content: center;
        }
    </style>


    <body>
        <?php include('header.php') ?> 

        <div class="container">

            <form name="AccountForm" action="homepage.php" method="post"> 
                <h1>Create an account</h1>  
                <div>  
                    <div class="row mb-3 mx-3">
                        First Name:
                        <input type="text" class="form-control" name="first_name" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['first_name'] ?>"
                        />            
                    </div>  

                    <div class="row mb-3 mx-3">
                        Last Name:
                        <input type="text" class="form-control" name="last_name" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['last_name'] ?>"
                        />            
                    </div>  

                    <div class="row mb-3 mx-3" style="float:left;">
                        Age:
                        <input type="text" class="form-control" name="age" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['age'] ?>"
                        />            
                    </div>  

                    <div class="row mb-3 mx-3" style="float:left;">
                        Email:
                        <input type="text" class="form-control" name="email" placeholder="ex. someone@gmail.com" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['email'] ?>"
                        />            
                    </div>  

                    <div class="row mb-3 mx-3">
                        Phone Number:
                        <input type="text" class="form-control" name="phone_number" placeholder="XXX-XXX-XXXX"
                            value="<?php if ($user_to_update!=null) echo $user_to_update['phone_number'] ?>"
                        />            
                    </div>  

                    <div class="row mb-3 mx-3">
                        Street Address:
                        <input type="text" class="form-control" name="street_address" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['street_address'] ?>"
                        />            
                    </div>   

                    <div class="row mb-3 mx-3" style="float:left;">
                        City:
                        <input type="text" class="form-control" name="city" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['city'] ?>"
                        />            
                    </div>  

                    <div class="row mb-3 mx-3" style="float:left;">
                        State:
                        <input type="text" class="form-control" name="state" placeholder="ex. VA" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['state'] ?>"
                        />            
                    </div> 
                    
                    <div class="row mb-3 mx-3">
                        Zip Code:
                        <input type="text" class="form-control" name="zip_code" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['zip_code'] ?>"
                        />            
                    </div> 

                    <div class="row mb-3 mx-3">
                        Username:
                        <input type="text" class="form-control" name="username" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['username'] ?>"
                        />            
                    </div> 
                    
                    <div class="row mb-3 mx-3">
                        Password:
                        <input type="text" class="form-control" name="pwd" required
                            value="<?php if ($user_to_update!=null) echo $user_to_update['pwd'] ?>"
                        />            
                    </div> 

                    <label>
                        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> 
                        Click to agree to the <a href="#" style="color:dodgerblue">Terms & Conditions</a>.
                    </label>

                    <div>
                        <input type="submit" value="Create" name="btnAction" class="btn btn-lg btn-success" 
                            title="Create Account" />            
                    </div>  


                </div>


            </form>   
        </div>    

        <?php include('footer.html') ?> 

    </body>

</html>