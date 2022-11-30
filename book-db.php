<?php
function addBook($title, $author, $genre, $avg_rating, $quantity, $in_stock)
{
    global $db;
    $query = "INSERT INTO books_info VALUES (:title, :author, :genre, :avg_rating, :quantity, :in_stock)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':genre', $genre);
        $statement->bindValue(':avg_rating', $avg_rating);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':in_stock', $in_stock);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0)
            echo "Failed to add a book <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

function getAllBooks()
{
    global $db;
    $query = "SELECT * FROM books_info";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getBookByTitleAuthor($title, $author)
{
    global $db;
    $query = "SELECT * FROM books_info WHERE title = :title AND author = :author";

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':author', $author);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
    }
    catch (PDOException $e)
    {
        if ($statement->rowCount() == 0) {
            echo $title . "by" . $author . "is not found <br/>";
        } else {
            var_dump($result);
        }
    }
    return $result;
}

function updateBook($title, $author, $genre, $avg_rating, $quantity, $in_stock)
{
    // get instance of PDO
    // prepare statement
    // 1) prepare
    // 2) bindValue, execute
    global $db;
    $query = "UPDATE books_info SET genre=:genre, avg_rating=:avg_rating, quantity=:quantity, in_stock=:in_stock WHERE title=:title AND author=:author";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':author', $author);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':avg_rating', $avg_rating);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':in_stock', $in_stock);
    $statement->execute();
    $statement->closeCursor();
}

function deleteBook($title, $author)
{
    global $db;
    $query = "DELETE FROM books_info WHERE title=:title AND author=:author";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':author', $author);
    $statement->execute();
    $statement->closeCursor();
}

function addRating($title, $author, $user_id)
{
    global $db;
    $rating_id = rand();
    $query = "INSERT INTO rating VALUES (:rating_id, :user_id, :title, :author)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':rating_id', $rating_id);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':author', $author);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0)
            echo "Failed to add rating <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

function addRatingDetail($user_id, $title, $author, $stars)
{
    global $db;
    echo $user_id . " ";
    echo $title . " ";
    echo $author . " ";
    echo $stars;
    $query = "INSERT INTO rating VALUES (:user_id, :title, :author, :stars)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':stars', $stars);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0)
            echo "Failed to add rating detail <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}
?>