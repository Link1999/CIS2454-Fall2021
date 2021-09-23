<?php

$first_name = htmlspecialchars(filter_input(INPUT_POST, 'first_name'));
$last_name = htmlspecialchars(filter_input(INPUT_POST, 'last_name'));
$balance = filter_input(INPUT_POST, 'balance', FILTER_VALIDATE_FLOAT);

include('topNavigation.php');
echo "</br>";

if ($first_name == '' || $last_name == '') {
    echo "you must submit first and last name, try again";
} else {
    try {
        require('database.php');
        
        $query = "insert into person ('first_name', 'last_name', 'balance' )"
                . " values ( :first_name, :last_name, :balance)";
        
        
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':balance', $balance);
        
        $statement->execute();
        
        $statement->closeCursor();
        
        echo "successfully added " . $first_name . " " . $last_name;
        
    } catch (PDOException $ex) {
        echo 'Conection error: ' . $ex->getMessage();
    }
}


