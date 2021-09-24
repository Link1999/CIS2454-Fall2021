<?php

$last_name = htmlspecialchars(filter_input(INPUT_GET, 'last_name'));


include('topNavigation.php'); 
echo "</br>"; 


try {
    require('database.php');

    if ( $last_name == "" ){
        $query = 'select * from person';
        $statement = $db->prepare($query);
    } else
    {
        $query = 'select * from person where last_name like :last_name';
        $statement = $db->prepare($query);
        $last_name = '%' . $last_name . '%';
        $statement->bindValue(':last_name', $last_name);
    }    
    
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

<h2>Search by last name</h2>
<form action="listPeople.php" method="get">
    <div> 
        <label>Last Name</label>
        <input type="text" name="last_name"/></br> 
    </div>
    <div>
        <input type='submit' value='Search People'/></br>
    </div>
</form>
