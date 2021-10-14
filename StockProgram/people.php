
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
if ($action == "" || $action == 'list_people') {

    $last_name = htmlspecialchars(filter_input(INPUT_GET, 'last_name'));

    include('models/person.php');

    $people = list_person($last_name);

    include('views/listPerson.php');
} else if ($action == 'update_person') {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $first_name = htmlspecialchars(filter_input(INPUT_POST, 'first_name'));
    $last_name = htmlspecialchars(filter_input(INPUT_POST, 'last_name'));
    $balance = filter_input(INPUT_POST, 'balance', FILTER_VALIDATE_FLOAT);

    if ($id == 0 || $first_name == '' || $last_name == '') {
        $error = "You must include ID, First Name, Last Name to update";
        include("views/error.php");
    } else {
        include('models/person.php');
        $person = new Person($first_name, $last_name, $balance, $id);
        update_person($person);
        header("Location: people.php");
    }
} else if ($action == 'delete_person') {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id == 0) {
        $error = "you must submit a valid user id to delete";
        include('views/error.php');
    } else {
        include('models/person.php');
        // we don't care about first name, last name, balance, just the id
        $person = new Person("", "", 0, $id);
        delete_person($person);
        header("Location: people.php");
    }
} else if ($action == 'add_person') {

    $first_name = htmlspecialchars(filter_input(INPUT_POST, 'first_name'));
    $last_name = htmlspecialchars(filter_input(INPUT_POST, 'last_name'));
    $balance = filter_input(INPUT_POST, 'balance', FILTER_VALIDATE_FLOAT);

    if ($first_name == '' || $last_name == '') {
        $error = "you must submit first and last name, try again";
        include('views/error.php');
    } else {
        include('models/person.php');
        $person = new Person($first_name, $last_name, $balance);
        add_person($person);
        header("Location: people.php");
    }
} else if ($action == 'transfer') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
    $transfer_method = filter_input(INPUT_POST, 'transfer_method');

    if ($id == 0 || $amount <= 0 || $transfer_method == "") {
        $error = "You must specify a person, a positive amount and method to trasnfer money";
        include('views/error.php');
    } else {
        include('models/person.php');

        if ($transfer_method == "withdraw") {
            $amount *= -1;
        }

        $person = find_person($id);
        $person->addMoney($amount);

        update_person($person);

        header("Location: people.php");
    }
}

include('views/personView.php');
?>
