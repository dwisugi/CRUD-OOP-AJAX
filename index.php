<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jual Motor</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/sweetalert2.css">
</head>
<body>
    <!-- container -->
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <h2>Jual Motor</h2>
                <!-- <button onclick="sweet()" type="button" class="w3-button w3-blue">coba</button> -->
                <div class="pull-right">
                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Tambah Baru</button>
                    <!-- Bootstrap Modal - To Add New Record -->
                    <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Motor</h4>
                                </div>
                                <div class="modal-body">
                        
                                    <div class="form-group">
                                        <label for="nama_motor">Nama Motor</label>
                                        <input type="text" id="nama_motor" placeholder="Nama Motor" class="form-control" required/>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="merk_motor">Merk Motor</label>
                                        <input type="text" id="merk_motor" placeholder="Merk Motor" class="form-control" required/>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="harga_motor">Harga Motor</label>
                                        <input type="number" id="harga_motor" placeholder="Harga Motor" class="form-control" required/>
                                    </div>
                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" onclick="addRecord()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Add -->
                    <!-- Modal - Update User details -->
                    <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                                </div>
                                <div class="modal-body">
 
                                    <div class="form-group">
                                        <label for="update_nama_motor">Nama Motor</label>
                                        <input type="text" id="update_nama_motor" placeholder="Nama Motor" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="update_merk_motor">Merk Motor</label>
                                        <input type="text" id="update_merk_motor" placeholder="Merk Motor" class="form-control"/>
                                    </div>
 
                                    <div class="form-group">
                                        <label for="update_harga_motor">Harga Motor</label>
                                        <input type="text" id="update_harga_motor" placeholder="Harga Motor" class="form-control"/>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Simpan Edit</button>
                                    <input type="hidden" id="hidden_user_id">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Update -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Data Motor:</h4>
                <div class="records_content">

                </div>
            </div>
        </div>
    </div>
<!-- /container -->
 
    <!-- jquery js file -->
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- bootstrap js file -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- custom js file -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <!-- sweetalert js file -->
    <script type="text/javascript" src="assets/sweetalert2.min.js"></script>
</body>
</html>