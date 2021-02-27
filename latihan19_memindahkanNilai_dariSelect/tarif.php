<?php
include 'koneksi.php';

$kurir = $_POST['kurir'];
$kota = $_POST['kota'];

$query = $koneksi->query("SELECT * FROM tarif WHERE kurir_id='$kurir' AND kota_id='$kota'");
while ($row = mysqli_fetch_array($query)) {
    echo "$row[tarif]";
}