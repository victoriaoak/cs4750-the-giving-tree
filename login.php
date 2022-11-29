<?php
require("connect-db.php");      // include("connect-db.php");
require("account-db.php");

$list_user_info = null;
$user_to_update = null;      
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Sign_in') 
  {
      //addBook();
      $list_user_info = getUserByID($_POST['username'], $_POST['pwd']);
      $customer_rank = getCustomerRank($_POST['username'], $_POST['password']);
      echo $list_user_info['user_id']; 
      echo $list_user_info['username']; 
      echo $list_user_info['pwd'];  
  }
}

function authenticate()
{
   global $mainpage;
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
      // htmlspecialchars() stops script tags from being able to be executed and renders them as plaintext
      $pwd = htmlspecialchars(trim($_POST['password'])); 
      // successfully login, redirect a user to the main page
      $user = trim($_POST['username']);

      setcookie('random', "testing1");
      setcookie('user', $user);
              
      setcookie('pwd', $_POST['password']);    // password_hash() requires at least PHP5.5
    
      if (password_verify($pwd, $hash))
      {  
        $list_user_info = getUserByID($_COOKIE['user'], $_COOKIE['pwd']);
        $customer_rank = getCustomerRank($_COOKIE['user'], $_COOKIE['pwd']);                   
        // Redirect the browser to another page using the header() function to specify the target URL
        header("Location: ".$mainpage);
         
      }
      else       
         echo "<span class='msg'>Username and password do not match our record</span> <br/>";
   }	
}
?>

<!DOCTYPE html>
<html>
    <body>
        <?php include('header.php') ?> 


        <div class="container">
            <h1>Sign In</h1>  
            <h3>Don't have an account? Create one <a href="createAccount.php" style="color:dodgerblue">here</a>.</h3>

            <form name="loginForm" action="login.php" method="post">   
                <div class="row mb-3 mx-3">
                    Username*
                    <input type="text" class="form-control" name="username" required/>            
                </div>  
                <div class="row mb-3 mx-3">
                    Password*
                    <input type="password" class="form-control" name="password" required />            
                </div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" 
                   value="Sign_in" name="btnAction" title="Sign-In">Sign in</button>
            </form>   
        </div>    

    </body>

<?php
$mainpage = "accountInfo.php";   
authenticate();
?>

<?php include('footer.html') ?> 

</html>