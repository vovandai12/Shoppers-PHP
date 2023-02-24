<?php
session_start();
include('config.php');
$dele = $_GET['dele'];
if ($dele == 'bill') {
    if(isset($_POST['delete_btn'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `bill` WHERE `id`=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header('location:bill.php');
    }
}

if ($dele == 'cart') {
    if(isset($_POST['delete_btn'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `cart` WHERE `id`=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header('location:list-cart.php');
    }
}