<?php

class Person{
    private $id;
    private $first_name;
    private $last_name;
    private $balance;
    
    public function __construct($first_name, $last_name, $balance, $id = 0) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->balance = $balance;
        $this->id = $id;
    }

    
    public function setId($id): void {
        $this->id = $id;
    }

    public function setFirstName($first_name): void {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name): void {
        $this->last_name = $last_name;
    }

    public function setBalance($balance): void {
        $this->balance = $balance;
    }

        
    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function addMoney($money){
        $this->balance += $money;
    }

}

function convert_from_db_to_object($person_row){
    $person = new Person(
            $person_row['first_name'], 
            $person_row['last_name'],
            $person_row['balance'],
            $person_row['id']
            );
    return $person;
}


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

    $person_list = array();
    
    foreach($people as $person_row){
        $person = convert_from_db_to_object($person_row);
        array_push( $person_list, $person);
    }
    
    $statement->closeCursor();

    return $person_list;
}

function find_person($id) {
    require('database.php');

    $query = 'select * from person where id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $person = convert_from_db_to_object($statement->fetch());
    
    $statement->closeCursor();

    return $person;
}

function update_person($person) {
    require('database.php');

    $query = "update person set first_name = :first_name, "
            . " last_name = :last_name, "
            . " balance = :balance "
            . " where id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $person->getFirstName());
    $statement->bindValue(':last_name', $person->getLastName());
    $statement->bindValue(':balance', $person->getBalance());
    $statement->bindValue(':id', $person->getId());

    $statement->execute();

    $statement->closeCursor();
}

function delete_person($person) {
    require('database.php');

    $query = "delete from person "
            . " where id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $person->getId());

    $statement->execute();

    $statement->closeCursor();
}

function add_person($person) {
    require('database.php');

    $query = "insert into person (first_name, last_name, balance )"
            . " values ( :first_name, :last_name, :balance)";

    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $person->getFirstName());
    $statement->bindValue(':last_name', $person->getLastName());
    $statement->bindValue(':balance', $person->getBalance());

    $statement->execute();

    $statement->closeCursor();
}