<?php
  class MembersView{
    public function render($data){
      
      $no = 1;
      $dataMembers = null;
      $NO = "No";
      $Nama = "NAMA";
      $Email = "EMAIL";
      $Phone = "Telepon";
      $Join = "Join Date";
      $Act = "Action";
      $dataMembers .= '<div class="col-1 my-3">
      <a
        type="button"
        class="btn btn-primary nav-link active"
        href="create.php"
        >Add New</a
      >
    </div>';
      $dataMembers .="<thead>
      <tr>
              <th>".$NO." </th>
              <th>".$Nama." </th>
              <th>".$Email." </th>
              <th>".$Phone." </th>
              <th>".$Join." </th>
              <th>".$Act." </th>
              </tr></thead>";
      foreach($data as $val){
        list($id, $name, $email, $phone, $join_date) = $val;
            $dataMembers .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $name . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>
                    <a href='edit.php?id=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                    </td>
                    </tr>";
        
      }

      $tpl = new Template("templates/tampilan.html");
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write();
    }
  }