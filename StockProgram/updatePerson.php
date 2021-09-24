<?php


$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$first_name = htmlspecialchars(filter_input(INPUT_POST, 'first_name'));
$last_name = htmlspecialchars(filter_input(INPUT_POST, 'last_name'));
$balance = filter_input(INPUT_POST, 'balance', FILTER_VALIDATE_FLOAT);

include('topNavigation.php');
echo "</br>";

if ($id == 0 || $first_name == '' || $last_name == '') {
    echo "you must submit first and last name, try again";
} else {
    try {
        require('database.php');
        
        $query = "update person set first_name = :first_name, "
                . " last_name = :last_name, "
                . " balance = :balance "
                . " where id = :id";
        
        
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':balance', $balance);
        $statement->bindValue(':id', $id);
        
        $statement->execute();
        
        $statement->closeCursor();
        
        echo "successfully updated id : " . $id;
        
    } catch (PDOException $ex) {
        echo 'Conection error: ' . $ex->getMessage();
    }
}


