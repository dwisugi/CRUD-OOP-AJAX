//add record
function addRecord() {
    //get values
    var nama_motor = $('#nama_motor').val();
    var merk_motor = $('#merk_motor').val();
    var harga_motor = $('#harga_motor').val();

    //addrecord
    $.post('extend.php?aksi=create', {
        nama_motor: nama_motor,
        merk_motor: merk_motor,
        harga_motor: harga_motor
    }, function (data, status) {
        //close records again
        $('#add_new_record_modal').modal('hide');
        //read record again
        readRecords();
        sweet('Ditambahkan');
        //clear fields from the popup
        $('#nama_motor').val('');
        $('#merk_motor').val('');
        $('#harga_motor').val('');
    });
}

//read records
function readRecords(){
    $.get('extend.php?aksi=read',{

    }, function (data, status) {
            $('.records_content').html(data);
    });
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});

function DeleteUser(id) {
    var conf = confirm("Apakah benar, kamu ingin menghapus user ini?");
    if ( conf == true) {
        $.post("extend.php?aksi=delete", {
                id: id
            }, function (data, status) {
                // reload Users by using readRecords();
                readRecords();
                // sweet('Dihapus');
            }
        );
    }
}
 
function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage    
    $("#hidden_user_id").val(id);

    $.post("extend.php?aksi=update", {
            id: id
        }, function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            
            // Assing existing values to the modal popup fields
            $("#update_nama_motor").val(user.nama_motor);
            $("#update_merk_motor").val(user.merk_motor);
            $("#update_harga_motor").val(user.harga_motor);
        } 
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}
  
function UpdateUserDetails() {
    // get values
    var nama_motor = $("#update_nama_motor").val();
    var merk_motor = $("#update_merk_motor").val();
    var harga_motor = $("#update_harga_motor").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax | ajax/updateUserDetails.php
    $.post("extend.php?aksi=proses", {
            id: id,
            nama_motor: nama_motor,
            merk_motor: merk_motor,
            harga_motor: harga_motor
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
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

