<?php
include_once("conf.php");
include_once("models/Orders.class.php");
include_once("views/Orders.view.php");

class OrdersController {
  private $orders;

  function __construct(){
    $this->orders = new Orders(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->orders->open();
    $this->orders-> getordersJoin();
    $data = array();
    while($row = $this->orders->getResult()){
      array_push($data, $row);
    }

    $this->orders->close();

    $view = new OrdersView();
    $view->render($data);
  }

  function delete($id){
    $this->orders->open();
    $this->orders->delete($id);
    $this->orders->close();
    
    header("location:orders.php");
  }


}