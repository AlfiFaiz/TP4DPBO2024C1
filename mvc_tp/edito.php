<?php
include "conf.php";

// Establish database connection
$conn = new mysqli(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan ID anggota dari URL
$id = $_GET['id'];

// Mendapatkan data anggota berdasarkan ID
$query = "SELECT * FROM orders WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

// Mengisi variabel dengan data dari database
$id_members = $row['id_members'];
$total_amount = $row['total_amount'];

if(isset($_POST['submit'])){
    // Mendapatkan nilai baru dari form
    $new_id_members = $_POST['id_members'];
    $new_total_amount = $_POST['total_amount'];
    
    // Update data anggota di database
    $sql = "UPDATE orders SET id_members='$new_id_members', total_amount='$new_total_amount' WHERE id='$id'";
    $result = $conn->query($sql);
    
    // Redirect ke halaman index setelah proses update selesai
    header("Location: orders.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-lg-6 m-auto">
    <form method="post">
        <br><br><div class="card">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center">Edit Order</h1>
            </div><br>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Menyimpan ID order yang sedang di-edit -->

            <label> Select Member: </label>
            <select name="id_members" class="form-control">
                <?php
                // Ambil data anggota dari database untuk dijadikan opsi dropdown
                $query = "SELECT members.id AS member_id, members.name AS member_name FROM members"; 
                $result = $conn->query($query);

                // Periksa apakah ada data yang ditemukan
                if ($result->num_rows > 0) {
                    // Loop melalui setiap baris data
                    while ($row = $result->fetch_assoc()) {
                        // Tampilkan setiap nama sebagai opsi dropdown, dan tandai yang sedang dipilih
                        if ($row['member_id'] == $id_members) {
                            echo '<option value="' . $row['member_id'] . '" selected>' . $row['member_name'] . '</option>';
                        } else {
                            echo '<option value="' . $row['member_id'] . '">' . $row['member_name'] . '</option>';
                        }
                    }
                }
                ?>
            </select><br>

            <label>Total Amount: </label>
            <input type="text" name="total_amount" class="form-control" value="<?php echo $total_amount; ?>"><br>

            <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
            <a class="btn btn-info" href="index.php">Cancel</a><br>

        </div>
    </form>
</div>
</body>
</html>
