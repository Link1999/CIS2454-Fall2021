<?php

function list_stocks() {
    require('database.php');

    $query = 'select * from stock';
    $statement = $db->prepare($query);
    $statement->execute();

    $stocks = $statement->fetchAll();

    $statement->closeCursor();

    return $stocks;
}

function find_stock($symbol){
    require('database.php');

    $query = 'select * from stock where symbol = :symbol';
    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $symbol);
    $statement->execute();

    $stock = $statement->fetch();

    $statement->closeCursor();

    return $stock;

}

function add_stock($symbol, $name, $current_price){
    require('database.php');
    
    $query = "insert into stock (symbol, name, current_price )"
            . " values ( :symbol, :name, :current_price)";

    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $symbol);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':current_price', $current_price);

    $statement->execute();

    $statement->closeCursor();
}


function update_stock($symbol, $name, $current_price){
    require('database.php');
    
    $query = "update stock set name = :name, current_price = :current_price"
            . " where symbol = :symbol";

    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $symbol);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':current_price', $current_price);

    $statement->execute();

    $statement->closeCursor();
}

function delete_stock($symbol){
    require('database.php');
    
    $query = "delete from stock"
            . " where symbol = :symbol";

    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $symbol);

    $statement->execute();

    $statement->closeCursor();
}