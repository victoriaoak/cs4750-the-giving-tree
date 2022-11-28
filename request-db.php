<?php 

function getAdminNameRole()
{
    global $db;
    $query = "SELECT user_id, first_name, last_name, admin_role FROM user_info 
                NATURAL JOIN admin_info";

    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
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

?>