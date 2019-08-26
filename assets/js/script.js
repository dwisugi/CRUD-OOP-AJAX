//menambahkan record
function addRecord() {
    //get values
    var nama_motor = $('#nama_motor').val();
    var merk_motor = $('#merk_motor').val();
    var harga_motor = $('#harga_motor').val();

    //membuat record
    $.post('extend.php?aksi=create', {
        nama_motor: nama_motor,
        merk_motor: merk_motor,
        harga_motor: harga_motor
    }, function (data, status) {
        //menutup modal record
        $('#add_new_record_modal').modal('hide');
        //membaca record
        readRecords();
        sweet('Ditambahkan');
        //untuk mmbersihkan isi form di modal
        $('#nama_motor').val('');
        $('#merk_motor').val('');
        $('#harga_motor').val('');
    });
}

//untuk melihat record
function readRecords(){
    $.get('extend.php?aksi=read',{

    }, function (data, status) {
            $('.records_content').html(data);
    });
}

$(document).ready(function () {
    // menampilkan record saat semua  fungsi sudah siap
    readRecords(); // memanggil function
});

function DeleteUser(id) {
    var conf = confirm("Apakah benar, kamu ingin menghapus user ini?");
    if ( conf == true) {
        $.post("extend.php?aksi=delete", {
                id: id
            }, function (data, status) {
                // reload User by using readRecords();
                readRecords();
                ///menampilkan popup berhasil dihapus
                sweet('Dihapus');
            }
        );
    }
}
 
function GetUserDetails(id) {
    // menambahkan id ke hidden user untuk digunakan nanti    
    $("#hidden_user_id").val(id);

    $.post("extend.php?aksi=update", {
            id: id
        }, function (data, status) {
            // PARSE json data / mengambil data json
            var user = JSON.parse(data);
            
            // mendapatkan data user dan menampilkannya di form edit
            $("#update_nama_motor").val(user.nama_motor);
            $("#update_merk_motor").val(user.merk_motor);
            $("#update_harga_motor").val(user.harga_motor);
        } 
    );
    // menampilkan modal popup
    $("#update_user_modal").modal("show");
}
  
function UpdateUserDetails() {
    // mendapatkan nilai yang akan diedit
    var nama_motor = $("#update_nama_motor").val();
    var merk_motor = $("#update_merk_motor").val();
    var harga_motor = $("#update_harga_motor").val();

    // mendapatkan nilai hidden user
    var id = $("#hidden_user_id").val();

    // Update data ke server menggunakan ajax 
    $.post("extend.php?aksi=proses", {
            id: id,
            nama_motor: nama_motor,
            merk_motor: merk_motor,
            harga_motor: harga_motor
        },
        function (data, status) {
            // mmenutup modal popup
            $("#update_user_modal").modal("hide");
            // menampilkan data menggunakan readRecords();
            readRecords();
            sweet('Diubah');
            
        }
    );
}

function sweet(ad) {
    Swal.fire(
        'Berhasil!',
        'Data Berhasil '+ ad,
        'success'
      )
}