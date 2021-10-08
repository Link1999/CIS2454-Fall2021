<?php


function list_transactions($person_id) {
    require('database.php');
    
    if ( $person_id == 0 ){
        $query = 'select * from purchase';
        $statement = $db->prepare($query);
    } else{
        $query = 'select * from purchase where person_id = :person_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':person_id', $person_id);
    }
    
    $statement->execute();

    $transactions = $statement->fetchAll();

    $statement->closeCursor();

    return $transactions;
}

function add_transaction($symbol, $person_id, $quantity){
    require('database.php');
    
    require_once('models/stocks.php');
    
    $stock = find_stock($symbol);
    
    $purchase_price = $stock['current_price'];
    
    $query = "insert into purchase (person_id, symbol, quantity, purchase_price, datetime )"
            . " values ( :person_id, :symbol, :quantity, :purchase_price, now() )";

    $statement = $db->prepare($query);
    $statement->bindValue(':person_id', $person_id);
    $statement->bindValue(':symbol', $symbol);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':purchase_price', $purchase_price);

    $statement->execute();

    $statement->closeCursor();
}

function update_transaction($id, $symbol, $person_id, $quantity, $purchase_price, $datetime){
    require('database.php');
    
    $query = "update purchase set person_id = :person_id, symbol = :symbol"
            . ", quantity = :quantity, purchase_price = :purchase_price, "
            . " datetime = :datetime "
            . " where id = :id ";

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':person_id', $person_id);
    $statement->bindValue(':symbol', $symbol);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':purchase_price', $purchase_price);
    $statement->bindValue(':datetime', $datetime);

    $statement->execute();

    $statement->closeCursor();
}

function delete_transaction($id){
    require('database.php');
    
    $query = "delete from purchase"
            . " where id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}