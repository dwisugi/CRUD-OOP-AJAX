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

function addUser() {
    //get values
    var new_nama = $('#new_nama').val();
    var new_email = $('#new_email').val();
    var new_password = $('#new_password').val();

    //membuat record
    $.post('extend.php?aksi=adduser', {
        nama: new_nama,
        email: new_email,
        password: new_password
    }, function (data, status) {
        //menutup modal record
        $('#add_new_user').modal('hide');
        //membaca record
        readNoLog();
        sweet('Ditambahkan');
        //untuk mmbersihkan isi form di modal
        $('#new_nama').val('');
        $('#new_email').val('');
        $('#new_password').val('');

    })
}
function login() {
    //get values
    // var nama = $('#nama').val();
    var email = $('#email').val();
    var password = $('#password').val();

    //membuat record
    $.post('extend.php?aksi=login', {
        // nama: nama,
        email: email,
        password: password
    }, function (data, status) {
        //menutup modal record
        $('#login').modal('hide');
        //membaca record
        location.href = "index.php";
        // readRecords();
        // sweet('Ditambahkan');
        //untuk mmbersihkan isi form di modal
        // $('#nama').val('');
        $('#email').val('');
        $('#password').val('');

    })
}
//untuk melihat record
function readRecords(){
        $.get('extend.php?aksi=readlogin',{

        }, function (data, status) {
                $('.records_content').html(data);
        });
    }

function readNoLog(){
    $.get('extend.php?aksi=read',{

    }, function (data, status) {
            $('.no_records_content').html(data);
    });
}


$(document).ready(function () {
    // menampilkan record saat semua  fungsi sudah siap
    readRecords(); // memanggil function
    readNoLog();
});

function DeleteUser(id) {

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

function logout() {
    $.get('extend.php?aksi=logout',{

    }, function (data, status) {
        location.href = "index.php";
            // $('.no_records_content').html(data);
    });
}

function sweet(ad) {
    Swal.fire(
        'Berhasil!',
        'Data Berhasil '+ ad,
        'success'
      )
}
function gagal() {
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Password Atau Sandi Mungkin Salah!'
      })
}
function del(id) {
    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Kamu ingin menghapus data ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data Ini!'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            DeleteUser(id)
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
          )
        }
      })
}
function log() {
    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Kamu Ingin Keluar!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            logout()
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
          )
        }
      })
}
