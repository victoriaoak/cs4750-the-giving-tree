<!DOCTYPE html>
<html>
    <body>
        <?php include('header.html') ?> 


        <div class="container">
            <h1>Sign In</h1>  
            <h3>Don't have an account? Create one <a href="createAccount.php" style="color:dodgerblue">here</a>.</h3>

            <form name="loginForm" action="homepage.php" method="post">   
                <div class="row mb-3 mx-3">
                    Username/Email:
                    <input type="text" class="form-control" name="username" required/>            
                </div>  
                <div class="row mb-3 mx-3">
                    Password
                    <input type="text" class="form-control" name="password" required />            
                </div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign in</button>
            </form>   
        </div>    

        <?php include('footer.html') ?> 

    </body>

</html>