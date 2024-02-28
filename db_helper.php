<?php

include "constants.php";

function get_category_list($page)
{
    include "db/db.php";
    $offset = ($page - 1) * LIMIT;
    $limit = LIMIT;
    $sql = "SELECT * FROM category limit $offset, $limit";
    $state = $pdo->prepare($sql);
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function add_category($title)
{
    include "db/db.php";
    $sql = "INSERT INTO `category` (`title`) VALUES ('$title')";
    $state = $pdo->prepare($sql);
    $state->execute();
}

function get_pagination()
{
    include "db/db.php";
    $sql = "SELECT * FROM category";
    $state = $pdo->prepare($sql);
    $state->execute();
    $total_rows = $state->rowCount();
    return  ceil($total_rows / LIMIT);
}

function get_category_by_id($id)
{
    include "db/db.php";
    $sql = "SELECT * FROM `category` WHERE id = $id";
    $state = $pdo->prepare($sql);
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function update_category($id, $title)
{
    include "db/db.php";
    $sql = "UPDATE `category` SET title = '$title' WHERE id = $id";
    $state = $pdo->prepare($sql);
    $state->execute();
}

function delete_category($id)
{
    include "db/db.php";
    $sql = "DELETE from `category` WHERE id = $id";
    $state = $pdo->prepare($sql);
    $state->execute();
}
