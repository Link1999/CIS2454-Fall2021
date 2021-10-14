
<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: .");
}

$action = filter_input(INPUT_GET, 'action');

if ($action == "") {
    $action = filter_input(INPUT_POST, 'action');
}

// default action
if ($action == "" || $action == 'list_stocks') {

    include('models/stocks.php');

    $stocks = list_stocks();

    include('views/listStocks.php');
} else if ($action == "add_stock") {

    $symbol = htmlspecialchars(filter_input(INPUT_POST, 'symbol'));
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
    $current_price = filter_input(INPUT_POST, 'current_price', FILTER_VALIDATE_FLOAT);

    if ($symbol == "" || $name == "" || $current_price == 0) {
        $error = "You must include Symbol, Name, and Current Price";
        include("views/error.php");
    } else {
        include('models/stocks.php');
        add_stock($symbol, $name, $current_price);
        header("Location: stock.php");
    }
} else if ($action == "update_stock") {

    $symbol = htmlspecialchars(filter_input(INPUT_POST, 'symbol'));
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
    $current_price = filter_input(INPUT_POST, 'current_price', FILTER_VALIDATE_FLOAT);

    if ($symbol == "" || $name == "" || $current_price == 0) {
        $error = "You must include Symbol, Name, and Current Price";
        include("views/error.php");
    } else {
        include('models/stocks.php');
        update_stock($symbol, $name, $current_price);
        header("Location: stock.php");
    }
} else if ($action == "delete_stock") {

    $symbol = htmlspecialchars(filter_input(INPUT_POST, 'symbol'));

    if ($symbol == "") {
        $error = "You must include Symbol";
        include("views/error.php");
    } else {
        include('models/stocks.php');
        delete_stock($symbol);
        header("Location: stock.php");
    }
}

include('views/stockView.php');
