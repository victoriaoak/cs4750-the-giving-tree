<!DOCTYPE html>
<html>
    <style>
            .sidenav {
                width: 230px;
                position: fixed;
                left: 30px;
                background: #eee;
                top: 110px;
                padding: 20px;
                height: auto;
            }
            .sidenav a {
                padding: 6px 8px 6px 16px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
            }
            .content {
                margin-left: 290px;
                padding: 10px;
            }
    </style>

    <body>
        <?php include('header.html') ?> 

        <div class="sidenav">
        <a href="#info">Account Information</a>
        <br/> 
        <a href="#checkout">Checkout History</a>
        <br/> 
        <a href="#rating">Rating History</a>
        <br/> 
        <a href="#settings">Account Settings</a>
        </div>

        <div class="content">
            <Row id="info">
                <h2>Account Information</h2>
                <hr>
                <h3>Name:</h3>
                <h3>Age:</h3>
                <h3>Email:</h3>
                <h3>Phone Number:</h3>
                <h3>Address:</h3>
            </Row>

            <Row id="checkout">
                <h2>Checkout Information</h2>
                <hr>
                <h3>Late Fees Due:</h3>
                <h3>Books Currently Checked Out:</h3>
            </Row>

            <Row id="rating">
                <h2>Rating History</h2>
                <hr>
                <h3>Book:</h3>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Update</button>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Delete</button>
            </Row>

            <Row id="settings">
                <h2>Account Settings</h2>
                <hr>
                <h3>Username:</h3>
                <h3>Password:</h3>
            </Row>

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Delete Account</button>
        </div>

        <?php include('footer.html') ?> 

    </body>

</html>



   