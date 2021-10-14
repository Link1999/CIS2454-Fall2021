
<?php
session_start();
$action = filter_input(INPUT_POST, 'action');

if ($action == "") {
    
    $_SESSION = array();
    session_destroy();
    header("Location: .");
}

if ($action == 'login') {
    $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
    $password = filter_input(INPUT_POST, 'password');

    if ($username == "" || $password == "") {
        $error = "You must include username, and password to login";
        include("views/error.php");
    } else {
        include('models/person.php');

        $user = find_person_by_username($username);

        $is_valid_password = password_verify($password, $user->getPasswordhash());

        if ($is_valid_password) {
            $_SESSION['username'] = $username;
            header("Location: .");
        } else {
            $error = "invalid password!";
            include("views/error.php");
        }
    }
}

if ($action == 'create_account') {

    $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
    $first_name = htmlspecialchars(filter_input(INPUT_POST, 'first_name'));
    $last_name = htmlspecialchars(filter_input(INPUT_POST, 'last_name'));
    $password = filter_input(INPUT_POST, 'password');

    if ($username == "" || $first_name == '' || $last_name == '' || $password == "") {
        $error = "You must include username, First Name, Last Name, and password to create an account";
        include("views/error.php");
    } else {

        $passwordhash = password_hash($password, PASSWORD_BCRYPT);

        include('models/person.php');

        $person = new Person($first_name, $last_name, 0, 0, $username, $passwordhash);

        add_person($person);

        echo "Acoount created!";

        include('index.php');
    }
}
    
    
    
