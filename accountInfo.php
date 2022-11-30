<!DOCTYPE html>
<link rel="icon" type="image/png" href="./icon/favicon-32x32.png" />

<?php
require("connect-db.php");
require("account-db.php");

$list_user_info = getUserByID($_COOKIE['user'], $_COOKIE['hash']);
$customer_rank = getCustomerRank($_COOKIE['user'], $_COOKIE['hash']);
$admin_specifics = getAdminSpecific($_COOKIE['user'], $_COOKIE['hash']);
$books_checked_out = getBooksCheckedOut($_COOKIE['user'], $_COOKIE['hash']);
$user_id = getUserID($_COOKIE['user'], $_COOKIE['hash']);
$book_ratings = getRatings($user_id['user_id']);
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
                <?php if (isset($customer_rank['ranking'])){?> <h3><b>Rank:</b>  <?php echo $customer_rank['ranking'];}?> </h3>
                <?php if (isset($admin_specifics['admin_role'])) {?> <h3><b>Role:</b> <?php echo $admin_specifics['admin_role'];}?> </h3>
                <?php if (isset($admin_specifics['salary'])) {?> <h3><b>Salary: $</b><?php echo $admin_specifics['salary'];}?> </h3>
                 
            </Row>
            <br/>
            <Row id="checkout">
                <h2><b>Checkout Information</b></h2>
                <hr>
                <h3><b>Late Fees Due:</b> $<?php echo $list_user_info['late_fee_dues'] ?></h3>
                <h3><b>Books Currently Checked Out:</b></h3>
                <div class="row justify-content-center"> 
                <table class="w3-table w3-bordered w3-card-4 center" style="width:95%">
                <thead>
                <tr style="background-color:#B0B0B0">
                    <th width="40%"><b>Title</b></th>
                    <th width="30%"><b>Author</b></th> 
                    <th width="20%"><b>Due Date</b></th> 
                    <th width="20%"><b>Returned?</b></th>     
                    <th><b>Rate?</b></th>
                </tr>
                </thead>
                <?php foreach ($books_checked_out as $book_info): ?>
                <tr>
                    <td><?php echo $book_info['title']; ?></td>
                    <td><?php echo $book_info['author']; ?></td>
                    <td><?php echo $book_info['due_date']; ?></td>
                    <td><?php if ($book_info['is_returned']==0) {echo "No";} else {echo "Yes";} ?></td>
                    <td>
                        <form action="book-catalogue.php" method="post">
                        <input type="submit" value="Rate" name="btnAction" class="btn btn-warning" 
                                title="Click to rate this book" />
                        <input type="hidden" name="book_to_rate" 
                                value="<?php echo $book_info['title'], $book_info['author']; ?>" />                
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </table>
            </div>    
            </Row>
            <br/>
            <Row id="rating">
                <h2><b>Rating History</b></h2>
                <hr>
                <h3><b>Book:</b></h3>
                <div class="row justify-content-center"> 
                <table class="w3-table w3-bordered w3-card-4 center" style="width:95%">
                <thead>
                <tr style="background-color:#B0B0B0">
                    <th width="40%"><b>Title</b></th>
                    <th width="30%"><b>Author</b></th> 
                    <th width="20%"><b>Rating</b></th>     
                    <th><b>Update?</b></th>
                    <th><b>Delete?</b></th>
                </tr>
                </thead>
                <?php foreach ($book_ratings as $rating): ?>
                <tr>
                    <td><?php echo $rating['title']; ?></td>
                    <td><?php echo $rating['author']; ?></td>
                    <td><?php echo $rating['stars']; ?></td>
                    <td>
                        <form action="book-update-form.php" method="post">
                        <input type="submit" value="Update" name="btnAction" class="btn btn-primary" 
                                title="Click to update this book" />
                        <input type="hidden" name="book_title_to_update" 
                                value="<?php echo $book_info['title']; ?>" />
                        <input type="hidden" name="book_author_to_update" 
                                value="<?php echo $book_info['author']; ?>" />                 
                        </form>
                    </td>
                    <td>
                        <form action="book-catalogue.php" method="post" onclick="return confirm('Are you sure you want to delete this book?');">
                        <input type="submit" value="Delete" name="btnAction" class="btn btn-danger" 
                                title="Click to remove this book from the database" />
                        <input type="hidden" name="book_title_to_delete" 
                                value="<?php echo $book_info['title']; ?>" />
                        <input type="hidden" name="book_author_to_delete" 
                                value="<?php echo $book_info['author']; ?>" />                   
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </table>
            </div>
            </Row>
            <br/> <br/>
            <Row id="settings">
                <h2><b>Account Settings</b></h2>
                <hr>
                <h3><b>Username: </b><?php echo $list_user_info['username'] ?></h3>
                <h3><b>Password: </b><?php for ($x = 0; $x < strlen($_COOKIE['pwd']); $x++) { echo "*"; }?></h3>
            </Row>
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Delete Account</button>
        </div>

        <?php include('footer.html') ?> 

    </body>

</html>



   