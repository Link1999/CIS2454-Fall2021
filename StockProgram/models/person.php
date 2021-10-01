<?php

function list_person($last_name) {
    require('database.php');

    if ($last_name == "") {
        $query = 'select * from person';
        $statement = $db->prepare($query);
    } else {
        $query = 'select * from person where last_name like :last_name';
        $statement = $db->prepare($query);
        $last_name = '%' . $last_name . '%';
        $statement->bindValue(':last_name', $last_name);
    }

    $statement->execute();

    $people = $statement->fetchAll();

    $statement->closeCursor();

    return $people;
}

function update_person($id, $last_name, $first_name, $balance) {
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
}

function delete_person($id) {
    require('database.php');

    $query = "delete from person "
            . " where id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}

function add_person($last_name, $first_name, $balance) {
    require('database.php');

    $query = "insert into person (first_name, last_name, balance )"
            . " values ( :first_name, :last_name, :balance)";

    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':balance', $balance);

    $statement->execute();

    $statement->closeCursor();
}

function add_money($id, $amount){
    require('database.php');
    
    $query = "update person set "
            . " balance = balance + :amount "
            . " where id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':amount', $amount);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}