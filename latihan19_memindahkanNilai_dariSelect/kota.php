<?php
include 'koneksi.php';
$provinsi_id = $_POST['nama_provinsi'];

$query = $koneksi->query("SELECT * FROM kota WHERE provinsi_id='$provinsi_id'");
$result = mysqli_num_rows($query);

if ($result > 0) {
    echo "<option selected disabled>Pilih Kota</option>";
    while ($row = mysqli_fetch_array($query)) {
        echo "<option value=$row[id]>$row[nama_kota]</option>";
    }
} else {
    echo "<option selected>Data wilayah tidak ada</option>";
}