<?php 

function getAdminNameRole()
{
    global $db;
    $query = "SELECT admin_info.user_id AS admin_id, first_name, last_name, admin_role FROM user_info, admin_info 
                WHERE admin_info.user_id = user_info.user_id";

    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
    }
    catch (PDOException $e)
    {
        if ($statement->rowCount() == 0) {
            echo "user is not found <br/>";
        } else {
            var_dump($result);
        }
    }
    return $result;
}

function addRequest($admin_id, $customer_id, $request)
{
    global $db;
    $query = "INSERT INTO request VALUES (:admin_id, :customer_id, :request)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':admin_id', $admin_id);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':request', $request);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0)
            echo "Failed to submit request <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

?>