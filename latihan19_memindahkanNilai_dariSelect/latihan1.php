<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memindahkan Nilai dari Element Select dengan jQuery</title>
</head>
<body>
    <table>
        <h3>Memindahkan Nilai dari <br>
        Element Select dengan jQuery</h3>
        <tr>
            <td>Pilih Benih</td>
            <td>:</td>
            <td>
                <select id="benih">
                    <option lama="6 Bulan" berat="1kg" harga="45000">Kacang</option>
                    <option lama="5 Bulan" berat="100kg" harga="700000">Padi</option>
                    <option lama="4 Bulan" berat="2kg" harga="10000">Semangka</option>
                    <option lama="5 Bulan" berat="3kg" harga="80000">Melon</option>
                    <option lama="3 Bulan" berat="4kg" harga="4500">Timun</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td>Lama Tanam</td>
            <td>:</td>
            <td><input type="text" id="lama"></td>
        </tr>
        <tr>
            <td>Berat</td>
            <td>:</td>
            <td><input type="text" id="berat"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="number" id="harga"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td><input type="number" id="jumlah"></td>
        </tr>
        <tr>
            <td>Total</td>
            <td>:</td>
            <td><input type="text" id="total"></td>
        </tr>
    </table>

    <script src="jQuery.js"></script>
    <script>
        $('#benih').on('change', function(){
            let lama = $('#benih option:selected').attr('lama');
            let berat = $('#benih option:selected').attr('berat');
            let harga = $('#benih option:selected').attr('harga');

            $('#lama').val(lama);
            $('#berat').val(berat);
            $('#harga').val(harga);
        });

        $('#jumlah').on('keyup', function(){
            let jumlah = $('#jumlah').val();
            let harga = $('#harga').val();

            let total = harga * jumlah;
            $('#total').val(total);
        });
    </script>
</body>
</html>