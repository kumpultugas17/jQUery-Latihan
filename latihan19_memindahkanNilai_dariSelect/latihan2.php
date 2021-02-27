<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamis Select Box Menggunakan jQuery dan Ajax</title>
    <style>
        *{
            font-family: 'quicksand';
        }

        .custom-select, #tarif {
            background: transparent;
            padding: 5px;
            font-size: 14px;
            line-height: 1;
            border:  1px solid #ccc;
            height: 34px;
            -webkit-appearance: none;
            border-radius: 3px;
        }

        .custom-select {
            width: 220px;
        }

        #tarif {
            width: 150px;
        }

        #konten {
            width: 400px;
            padding: 19px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -mox-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div id="konten">
        <h3>Dinamis Select Box Menggunakan jQuery dan Ajax</h3>
        <table>
            <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td>
                    <select name="provinsi" id="provinsi" class="custom-select">
                        <option disabled selected>Pilih Provinsi</option>
                        <?php $prov=$koneksi->query("SELECT * FROM provinsi"); ?>
                        <?php foreach ($prov as $row) { ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nama_provinsi']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kota Tujuan</td>
                <td>:</td>
                <td>
                    <select name="kota" id="kota" class="custom-select">
                        <option selected>Pilih Kota</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jasa Pengiriman</td>
                <td>:</td>
                <td>
                    <select name="kurir" id="kurir" class="custom-select">
                        <option selected>Pilih Jasa Pengiriman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tarif</td>
                <td>:</td>
                <td>
                    <input type="text" name="tarif" id="tarif" placeholder="Tarif Pengiriman">
                </td>
            </tr>
        </table>
    </div>

    <script src="jQuery.js"></script>
    <script>
        $(document).ready(function(){
            $('#provinsi').on('change', function(){ // Jika select box dipilih
                let provinsi = $(this).val(); // Menyimpan value ke variabel provinsi
                $.ajax({
                    type: 'POST', // Metode pengiriman data
                    url: 'kota.php', //File yang akan memproses data
                    data: 'nama_provinsi=' + provinsi, // Data yang akan dikirim ke file proses
                    success: function(response) { // Jika berhasil
                        $('#kota').html(response); // Berikan hasil ke id Kota
                    } 
                });
            });

            $('#kota').on('change', function(){
                let kota = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'kurir.php',
                    data: 'nama_kota=' + kota,
                    success: function(response) {
                        $('#kurir').html(response);
                    }
                });
            });

            $('#kurir').on('change', function(){
                let kurir = $(this).val();
                let kota = $('#kota').val();
                $.ajax({
                    type: 'POST',
                    url: 'tarif.php',
                    data: 'kurir=' + kurir + '&kota=' + kota,
                    success: function(response) {
                        $('#tarif').val(response);
                    }
                });
            });
        });
    </script>
</body>
</html>