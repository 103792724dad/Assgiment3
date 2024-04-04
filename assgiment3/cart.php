<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
    header('location:home.php');
};
if(isset($_POST['delete'])){
    $cart_id = $_POST['$cart_id'];
    $delete_cart_item=$conn->prepare("DELETE FROM `cart` WHERE id = ?");
    $delete_cart_item->execute([$cart_id]);
    $message[] = 'cart item deleted!';
}
if(isset($_POST['delete all'])){
    $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ? ");
    $delete_cart_item->execute([$user_id]);
    $message[] = 'delete all from cart !';
}

if(isset($_POST['update_qty'])){
    $cart_id= $_POST['cart_id'];