<?php

// TODO:
// insert into user_address function - Hannah
// insert into admin_info function - Hannah 
// insert into customer function - Victoria
// getUserByID - Victoria
// updateUser - Joanne
// deleteUser - Joanne

function addUser($user_id, $username, $pwd, $first_name, $last_name, $age, $email, $phone_number, $street_address, $city, $late_fee_dues)
{
    global $db;
    $query = "INSERT INTO user_info VALUES (:user_id, :username, :pwd, :first_name, :last_name, :age, :email, :phone_number, :street_address, :city, :late_fee_dues)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':pwd', $pwd);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone_number', $phone_number);
        $statement->bindValue(':street_address', $street_address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':late_fee_dues', $late_fee_dues);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0)
            echo "Failed to add user <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

// get user information
function getUserByID($title, $author)
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

// user info table only
function updateUser($user_id, $username, $pwd, $first_name, $last_name, $age, $email, $phone_number, $street_address, $city, $late_fee_dues)
{
    // get instance of PDO
    // prepare statement
    // 1) prepare
    // 2) bindValue, execute
    global $db;
    $query = "UPDATE user_info SET username=:username, pwd=:pwd, first_name=:first_name, last_name=:last_name, age=:age, email=:email, phone_number=:phone_number, street_address=:street_address, city=:city, late_fee_dues=:late_fee_dues WHERE user_id=:user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':pwd', $pwd);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone_number', $phone_number);
    $statement->bindValue(':street_address', $street_address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':late_fee_dues', $late_fee_dues);
    $statement->execute();
    $statement->closeCursor();
}

// user info table
function deleteBook($user_id, $username, $pwd, $first_name, $last_name, $age, $email, $phone_number, $street_address, $city, $late_fee_dues)
{
    global $db;
    $query = "DELETE FROM user_info WHERE user_id=:user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

function addAddress($street_address, $city, $state, $zip_code)
{
    global $db;
    $query = "INSERT INTO user_address VALUES (:street_address, :city, :state, :zip_code)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':street_address', $street_address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip_code', $zip_code);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0)
            echo "Failed to add user <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

function addAdminInfo($user_id, $role)
{
    global $db;
    $query = "INSERT INTO admin_info VALUES (:user_id, :role)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':role', $role);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0)
            echo "Failed to add user <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

?>