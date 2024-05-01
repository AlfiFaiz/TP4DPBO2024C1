<?php
class OrdersView{
  public function render($data){
    $no = 1;
    $dataOrders = null;
    $NO = "No";
    $Nama = "NAMA";
    $Email = "TANGGAL PEMESANAN";
    $Phone = "TOTAL";
    $Act = "Action";
    $dataOrders .= '<div class="col-1 my-3">
    <a
      type="button"
      class="btn btn-primary nav-link active"
      href="createo.php"
      >Add New</a
    >
  </div>';
    $dataOrders .="<thead>
    <tr>
            <th>".$NO." </th>
            <th>".$Nama." </th>
            <th>".$Email." </th>
            <th>".$Phone." </th>
            <th>".$Act." </th>
            </tr></thead>";
    foreach($data as $val){
      list($id, $name, $order_date, $total_amount) = $val;

      $dataOrders .= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $name . "</td>
        <td>" . $order_date . "</td>
        <td>" .  $total_amount . "</td>
        <td>
          <a href='edito.php?id=" . $id .  "' class='btn btn-warning'>Edit</a>
          <a href='orders.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
        </td>
      </tr>";
    }


    $tpl = new Template("templates/tampilan.html");
    $tpl->replace("DATA_TABEL", $dataOrders);
    $tpl->write();
  }
}
