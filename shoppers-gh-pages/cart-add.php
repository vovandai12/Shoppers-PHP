<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['myCart'])) $_SESSION['myCart'] = [];
$act = $_GET['act'];
if ($act == 'add') {
    if (isset($_POST['add']) && ($_POST['add'])) {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $sql = "SELECT * FROM `product` WHERE `id`=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
       
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $image = htmlentities($result->image);
                $name = htmlentities($result->name);
                $price = htmlentities($result->price);
                $addCart = [$id, $image, $name, $price, $quantity];
            }
        }
        
        array_push($_SESSION['myCart'], $addCart);
    }
    header('location:cart.php');
}
if ($act == 'delete') {
    if (isset($_GET['id'])) {
        array_splice($_SESSION['myCart'],$_GET['idCart'],1);
    }else{
        $_SESSION['myCart'] = [];
    }
    header('location:cart.php');
}
if ($act == 'cart') {
    $email = $_SESSION['login'];
    $cnt = 0;
    $str = " / ";
    $str1 = "|";
    $num = "";
    $price = "";
    $quantity = "";
    $name = "";
    foreach ($_SESSION['myCart'] as $result) {
        $total = $result[3] * $result[4];
        $num .= $total.$str;
        $price .= (string)$result[3].$str;
        $quantity .= (string)$result[4].$str;
        $image .= (string)$result[1].$str1;
        $name .= (string)$result[2].$str;
        $cnt += 1;
    }
    
    $date = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO `cart`(`image`, `product`, `price`, `quantity`, `total`, `date`, `idcart`) 
    VALUES (:image, :name, :price, :quantity, :num, :date, :email)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
    $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
    $query->bindParam(':num', $num, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    header('location:checkout.php');
}
if ($act == 'checkout') {
    $email = $_SESSION['login'];
    $sql = "SELECT * FROM `user` WHERE `email`=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $lastName = htmlentities($result->username);
        $cnt = $cnt + 1; 
        } 
    }

    $nation = $_POST['nation'];
    $firstName = $_POST['firstName'];
    $companyname = $_POST['companyname'];
    $address = $_POST['address1']." / ".$_POST['address2'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $email = $_SESSION['login'];
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];
    $status = 'Being transported';
    $date = date("Y-m-d H:i:s");
    $idCart = md5($zip).rand(0, 5);

    $sql = "INSERT INTO `bill`(`nation`, `firstname`, `lastname`, `companyname`, `address`, `country`, 
    `zip`, `email`, `phone`, `note`, `status`, `date`, `idCart`) VALUES 
    (:nation, :firstName, :lastName, :companyname, :address, :country, :zip, :email, :phone, :notes,
    :status, :date, :idCart)";

    $query = $dbh->prepare($sql);

    $query->bindParam(':nation', $nation, PDO::PARAM_STR);
    $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $query->bindParam(':companyname', $companyname, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':country', $country, PDO::PARAM_STR);
    $query->bindParam(':zip', $zip, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':notes', $notes, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':idCart', $idCart, PDO::PARAM_STR);

    unset($_SESSION['myCart']);

    $query->execute();

    header('location:thankyou.php');
}

