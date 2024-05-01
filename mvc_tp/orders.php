<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Orders.controller.php");

$orders = new OrdersController();

if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $orders->delete($id);
} else{
    $orders->index();
}
