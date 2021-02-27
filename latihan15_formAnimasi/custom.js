$(document).ready(function(){
    // Menampilkan
    $("#nama").keyup(function(){
        $("#alamat").slideDown();
    });

    $("#alamat").keyup(function(){
        $("#pekerjaan").fadeIn();
    });

    // Menyembunyikan
    $("#nama").keyup(function(){
        const nama = $("#nama").val().length;
        if (nama === 0) {
            $("#alamat").slideUp();
        }
    });  

    $("#alamat").keyup(function(){
        const alamat = $("#alamat").val().length;
        if (alamat === 0) {
            $("#pekerjaan").fadeOut();
        }
    });                       
});