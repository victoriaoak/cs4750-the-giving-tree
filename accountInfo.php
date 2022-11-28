<!DOCTYPE html>

<?php
require("connect-db.php");
require("account-db.php");

$list_user_info = null;
$customer_rank = null;
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Sign_in') 
  {
      $list_user_info = getUserByID($_POST['username'], $_POST['password']);
      $customer_rank = getCustomerRank($_POST['username'], $_POST['password']);
  }
}
?>

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
        <?php include('header.php') ?> 

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
                <h2><b>Account Information</b></h2>
                <hr>
                <h3><b>Name:</b> <?php echo $list_user_info['first_name'], " ", $list_user_info['last_name'] ?> </h3>
                <h3><b>Age: </b><?php echo $list_user_info['age'] ?> </h3>
                <h3><b>Email: </b><?php echo $list_user_info['email'] ?></h3>
                <h3><b>Phone Number: </b><?php echo $list_user_info['phone_number'] ?></h3>
                <h3><b>Address: </b><?php echo $list_user_info['street_address'], " ", $list_user_info['city'], " ", 
                    $list_user_info['state'], " ", $list_user_info['zip_code'] ?> </h3>
                <br/>
                <h3><b>Rank:</b> <?php if ($customer_rank['ranking'] != null) {echo $customer_rank['ranking'];}?> </h3>
                 
            </Row>
            <br/>
            <Row id="checkout">
                <h2><b>Checkout Information</b></h2>
                <hr>
                <h3><b>Late Fees Due:</b> $<?php echo $list_user_info['late_fee_dues'] ?></h3>
                <h3><b>Books Currently Checked Out:</b></h3>
            </Row>
            <br/>
            <Row id="rating">
                <h2><b>Rating History</b></h2>
                <hr>
                <h3><b>Book:</b></h3>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Update</button>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Delete</button>
            </Row>
            <br/> <br/>
            <Row id="settings">
                <h2><b>Account Settings</b></h2>
                <hr>
                <h3><b>Username: </b><?php echo $list_user_info['username'] ?></h3>
                <h3><b>Password: </b><?php for ($x = 0; $x < strlen($list_user_info['pwd']); $x++) { echo "*"; }?></h3>
            </Row>
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Delete Account</button>
        </div>

        <?php include('footer.html') ?> 

    </body>

</html>



   