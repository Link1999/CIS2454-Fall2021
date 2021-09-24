<?php

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

include('topNavigation.php');
echo "</br>";

if ($id == 0) {
    echo "you must submit a valid user id";
} else {
    try {
        require('database.php');
        
        $query = "delete from person "
                . " where id = :id";
        
        
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        
        $statement->execute();
        
        $statement->closeCursor();
        
        echo "successfully deleted user id " . $id;
        
    } catch (PDOException $ex) {
        echo 'Conection error: ' . $ex->getMessage();
    }
}


