<?php
require("connect-db.php");      // include("connect-db.php");
require("account-db.php");
require("vars.php");

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
      $logged_in = true;
      echo $list_user_info['user_id']; 
      echo $list_user_info['username']; 
      echo $list_user_info['pwd'];  
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

            <form name="loginForm" action="accountInfo.php" method="post">   
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

        <?php include('footer.html') ?> 

    </body>

</html>