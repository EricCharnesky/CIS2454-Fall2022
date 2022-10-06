<?php

function list_transactions() {
    global $database;

    $query = 'SELECT user_id, stock_id, quantity, price, timestamp, id'
            . ' FROM transaction';

    // prepare the query please
    $statement = $database->prepare($query);

    // run the query please
    $statement->execute();

    // this might be risky if you have HUGE amounts of data
    $transactions = $statement->fetchAll();

    $statement->closeCursor();

    return $transactions;
}

function insert_transaction($user_id, $stock_id, $quantity, $price) {
    global $database;

    $query = "INSERT INTO transaction (user_id, stock_id, quantity, price ) "
            . "VALUES (:user_id, :stock_id, :quantity, :price )";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->bindValue(":stock_id", $stock_id);
    $statement->bindValue(":quantity", $quantity);
    $statement->bindValue(":price", $price);

    $statement->execute();

    $statement->closeCursor();
}

function update_transaction($user_id, $stock_id, $quantity, $price, $id) {
    global $database;

    $query = "update transaction set user_id = :user_id, "
            . " stock_id = :stock_id, "
            . " quantity = :quantity, "
            . " price = :price "
            . " where id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->bindValue(":stock_id", $stock_id);
    $statement->bindValue(":quantity", $quantity);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":id", $id);

    $statement->execute();

    $statement->closeCursor();
}

function delete_transaction($id) {
    global $database;

    $query = "delete from transaction "
            . " where id = :id";

    // value binding in PDO protects against sql injection
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $id);

    $statement->execute();

    $statement->closeCursor();
}
