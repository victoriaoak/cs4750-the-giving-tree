<?php 

$request_id = 103;

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

function addRequest($customer_id, $admin_id, $request)
{
    global $db;
    global $request_id;
    $query = "INSERT INTO request VALUES (:customer_id, :admin_id, :request_id, :request)"; 
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':admin_id', $admin_id);
        $statement->bindValue(':request_id', $request_id);
        $statement->bindValue(':request', $request);
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
            echo $request;
        }
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
    $request_id++; 
    echo $request_id;
}

?>