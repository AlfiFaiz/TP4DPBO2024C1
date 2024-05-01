<?php

class Orders extends DB
{
    function getOrders()
    {
        $query = "SELECT * FROM orders";
        return $this->execute($query);
    }

    public function getOrdersJoin()
    {
        $query = "SELECT orders.id, members.name, orders.order_date, orders.total_amount FROM orders JOIN members ON orders.id_members=members.id";
        return $this->execute($query);
    }
    

    function delete($id)
    {

        $query = "delete FROM orders WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

}
