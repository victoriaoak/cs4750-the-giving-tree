<?php
include('header.php');
require("connect-db.php"); 
require("book-db.php");

global $db;
try
{
    if (isset($_POST['search'])){
        $search = $_POST['search'];
        $query = "SELECT * FROM books_info WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
        $statement = $db->prepare($query);
        $statement->execute();
        $book_details = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        if ($statement->rowCount() == 0) {
            echo '"'. $search . '"'." is not found <br/>";
            
        }
    }
}
catch (PDOException $e)
{
    if ($statement->rowCount() == 0) {
        echo $search . "is not found <br/>";
    } else {
        var_dump($book_details);
    }
}

?>

<body>
	<div class="container" style="padding-top:20px;">
	<h3><u>Search for a book or author</u></h3>
	<br/>
	<form class="form-horizontal" action="#" method="post">
        <div class="form-group">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="search" placeholder="Enter a book title or author">
            </div>
            <div style="float:left";>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
        </div>
    </form>
	<br/><br/>

	<h3><u>Book Information</u></h3><br/>

    <div class="row justify-content-center"> 
        <table class="w3-table w3-bordered w3-card-4 center" style="width:100%">
        <thead>
       
        <tr style="background-color:#B0B0B0">
            <th width="15%"><b>Title</b></th>
            <th width="15%"><b>Author</b></th>        
            <th width="15%"><b>Genre</b></th> 
            <th width="15%"><b>Average Rating</b></th>
            <th width="15%"><b>Quantity</b></th>
            <th width="15%"><b>In Stock?</b></th>
            <th><b>Rate?</b></th>
            <th><b>Rent?</b></th>
        </tr>
        </thead>
        <?php if (isset($_POST['search'])) foreach ($book_details as $book_info): ?>
        <tr>
            <td><?php echo $book_info['title']; ?></td>
            <td><?php echo $book_info['author']; ?></td>        
            <td><?php echo $book_info['genre']; ?></td> 
            <td><?php echo $book_info['avg_rating']; ?></td>
            <td><?php echo $book_info['quantity']; ?></td>
            <td><?php echo $book_info['in_stock']; ?></td>                     
            <td>
                <form action="book-catalogue.php" method="post">
                <input type="submit" value="Rate" name="btnAction" class="btn btn-warning" 
                        title="Click to rate this book" />
                <input type="hidden" name="book_to_rate" 
                        value="<?php echo $book_info['title'], $book_info['author']; ?>" />                
                </form>
            </td>
            <td>
                <?php if (isset($_COOKIE['user']) && isset($_COOKIE['hash'])) {?> 
                    <form action="rent-form.php" method="post">
                    <input type="submit" value="Rent" name="btnAction" class="btn btn-success" 
                            title="Click to rent out this book" />
                    <input type="hidden" name="book_title_to_rent" 
                            value="<?php echo $book_info['title']; ?>" />
                    <input type="hidden" name="book_author_to_rent" 
                            value="<?php echo $book_info['author']; ?>" />              
                    </form>
                <?php }?>
                <?php if (!isset($_COOKIE['user']) && !isset($_COOKIE['hash'])) {?> 
                    <form action="login.php">
                    <input type="submit" value="Rent" name="btnAction" class="btn btn-success" 
                            title="Click to rent out this book" />            
                    </form>
                <?php }?>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
        </div>   

    </div>    

    </div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>

<?php include('footer.html') ?>