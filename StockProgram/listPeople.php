<?php


include('topNavigation.php'); 
echo "</br>"; 


try {
    require('database.php');

    $query = 'select * from person';
    $statement = $db->prepare($query);
    $statement->execute();

    $people = $statement->fetchAll();

    $statement->closeCursor();

    foreach ($people as $person) {
        echo 'id: ' . $person['id'] .
        ' first name: ' . $person['first_name'] .
        ' last name: ' . $person['last_name'] .
        ' balance: $' . $person['balance'] . '</br>';
    }
} catch (PDOException $ex) {
    echo 'Conection error: ' . $ex->getMessage();
}
?>
