<?php

$action = filter_input(INPUT_GET, 'action');

if ($action == "") {
    $action = filter_input(INPUT_POST, 'action');
}

// default action
if ($action == "" || $action == 'list_stocks') {

    include('models/transactions.php');
    include('models/person.php');
    
    $people = list_person("");
    
    $person_id = filter_input(INPUT_GET, 'person_id', FILTER_VALIDATE_INT);

    $transactions = list_transactions($person_id);

    include('views/listTransactions.php');
} else if ($action == "add_transaction") {
    $symbol = htmlspecialchars(filter_input(INPUT_POST, 'symbol'));
    $person_id = filter_input(INPUT_POST, 'person_id', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);

    if ($symbol == "" || $person_id == 0 || $quantity <= 0) {
        $error = "You must include Symbol, person id, and quantity";
        include("views/error.php");
    } else {
        include('models/transactions.php');
        include('models/person.php');
        include('models/stocks.php');

        $person = find_person($person_id);
        $balance = $person['balance'];
        $stock = find_stock($symbol);
        $current_price = $stock['current_price'];
        $purchase_price = $current_price * $quantity;

        if ($purchase_price > $balance) {
            $error = "That person doesn't have enough balance to purchase that much stock";
            include("views/error.php");
        } else {
            add_money($person_id, $purchase_price * -1);
            add_transaction($symbol, $person_id, $quantity);
            header("Location: transaction.php");
        }
    }
} else if ($action == 'update_transaction') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $symbol = htmlspecialchars(filter_input(INPUT_POST, 'symbol'));
    $person_id = filter_input(INPUT_POST, 'person_id', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);
    $purchase_price = filter_input(INPUT_POST, 'purchase_price', FILTER_VALIDATE_FLOAT);
    $datetime = htmlspecialchars(filter_input(INPUT_POST, 'datetime'));

    if ($id <= 0 || $symbol == "" || $person_id == 0 || $quantity <= 0 || $purchase_price <= 0) {
        $error = "You must include id, Symbol, person id, quantity, and purchase price";
        include("views/error.php");
    } else {
        include('models/transactions.php');
        
        update_transaction($id, $symbol, $person_id, $quantity, $purchase_price, $datetime);
        header("Location: transaction.php");
    }
} else if ($action == 'delete_transaction') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    
    if ($id <= 0 ) {
        $error = "You must include id";
        include("views/error.php");
    } else {
        include('models/transactions.php');
        
        delete_transaction($id);
        header("Location: transaction.php");
    }
}

include('views/transactionView.php');
