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

function addRequest($customer_id, $admin_id, $request_text)
{
    global $db;
    $request_id = rand();
    $query = "INSERT INTO request VALUES (:customer_id, :admin_id, :request_id, :request_text)"; 
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':admin_id', $admin_id);
        $statement->bindValue(':request_id', $request_id);
        $statement->bindValue(':request_text', $request_text);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if ($statement->rowCount() == 0) {
            echo "Failed to submit request <br/>";
            echo $customer_id;
            echo $admin_id;
            echo $request_id;
            echo $request_text;
        }
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

?>