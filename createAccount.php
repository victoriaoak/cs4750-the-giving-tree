<!DOCTYPE html>
<html>
    <style>
        .container {
            display: flex;
            justify-content: center;
        }
    </style>

    <body>
        <?php include('header.html') ?> 

        <div class="container">

            <form name="AccountForm" action="homepage.php" method="post"> 
                <h1>Create an account</h1>  
                <div>  
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control"required/> 
                    </br>   

                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control"required/> 
                    </br>    

                    <div style="float:left;">
                        <label for="DOB">Date of Birth</label>
                        <input type="text" placeholder="mm/dd/yyy"class="form-control"required/> 
                    </div>

                    <div style="float:left;">
                        <label for="age">Age</label>
                        <input type="text" class="form-control"required/> 
                    </div>

                    <div style:cela>
                    <label for="email">Email</label>
                    <input type="text" placeholder="ex.someone@gmail.com"class="form-control"required/> 
    </div>
                    </br>  

                    <label for="phone">Phone Number</label>
                    <input type="text" placeholder="XXX-XXX-XXXX"class="form-control"required/> 
                    </br>  

                    <label for="street">Street Address</label>
                    <input type="text" class="form-control"required/> 
                    </br>  

                    <label for="city">City</label>
                    <input type="text" class="form-control"required/> 
                    </br>  

                    <div style="float:left;">
                        <label for="state">State</label>
                        <input type="text" class="form-control"required/> 
                    </div>

                    <div style="float:left;">
                        <label for="zip">Zip Code</label>
                        <input type="text" class="form-control"required/>
                    </div>

                    <label for="createuser">Create Username</label>
                    <input type="text" class="form-control"required/> 
                    </br>  

                    <label for="createpassword">Create Password</label>
                    <input type="text" class="form-control"required/> 
                    </br></br>  

                    <label>
                        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> 
                        Click to agree to the <a href="#" style="color:dodgerblue">Terms & Conditions</a>.
                    </label>
                </div>
                
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Create Account</button>
            </form>   
        </div>    

        <?php include('footer.html') ?> 

    </body>

</html>