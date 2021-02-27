<?php
include 'koneksi.php';
$nama_kota = $_POST['nama_kota'];

$query = $koneksi->query("SELECT kurir.id as id_kurir, kurir.ekspedisi as ekspedisi FROM kota, tarif, kurir WHERE tarif.kota_id = '$nama_kota' AND tarif.kurir_id = kurir.id AND tarif.kota_id = kota.id");
$result = mysqli_num_rows($query);
if ($result > 0) {
    echo "<option selected disabled>Pilih Jasa Pengiriman</option>";
    while ($row = mysqli_fetch_array($query)) {
        echo "<option value=$row[id]>$row[ekspedisi]</option>";
    }
} else {
    echo "<option selected disabled>Jasa pengiriman belum tersedia</option>";
}