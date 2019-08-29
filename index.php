<?php  

    // Lampirkan dbconfig 
    include_once 'library.php';
        $user = new product();
        $db = $user->getConnection();

    // Ambil data user saat ini 

    $currentUser = $user->getUser(); 
    $error = $user->getLastError();


?> 

<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jual Motor</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/sweetalert2.css">

    <!-- jquery js file -->
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- bootstrap js file -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- custom js file -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <!-- sweetalert js file -->
    <script type="text/javascript" src="assets/sweetalert2.min.js"></script>
</head>
<body>
    <!-- container -->
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
            <?php   
                if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){
                    echo "<script type='text/javascript'>
                    gagal();
            
                    </script>";
                    }
            }
             ?> 
                <h2>Jual Motor</h2>
                <div class="pull-right">
                    
                    <?php if($user->isLoggedIn()){ ?>
                        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Tambah Baru</button>
                        <button class="btn btn-info text-uppercase"><?=  $currentUser['nama'] ?></button>
                        <button class="btn btn-danger" onclick="log()" >Logout</button>
                    <?php } else{ ?>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#login">Login</button>
                        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_user">Register</button>
                    <?php } ?>
                                <!-- Bootstrap Modal - To Login -->
                                <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Login</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="extend.php?aksi=login1" method="POST">
                                        <div class="form-group">
                                            <label for="merk_motor">Email</label>
                                            <input type="email" name="email" placeholder="Jarwo@qodr.id" class="form-control" autocomplete="off" autofocus="on"/>
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="harga_motor">Password</label>
                                            <input type="Password" name="password" placeholder="" class="form-control"/>
                                        </div>
                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login -->
                     <!-- Bootstrap Modal - To Add New User -->
                     <div class="modal fade" id="add_new_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Registrasi User</h4>
                                </div>
                                <div class="modal-body">
                        
                                    <div class="form-group">
                                        <label for="new_nama">Nama</label>
                                        <input type="text" id="new_nama" placeholder="Jarwo" class="form-control"/>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="new_email">Email</label>
                                        <input type="email" id="new_email" placeholder="Jarwo@qodr.id" class="form-control" autocomplete="off" autofocus="on"/>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="new_password">Password</label>
                                        <input type="Password" id="new_password" placeholder="" class="form-control"/>
                                    </div>
                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" onclick="addUser()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Add New User -->
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
                                        <input type="number" id="update_harga_motor" placeholder="Harga Motor" class="form-control"/>
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
                <?php
                if($user->isLoggedIn()){ 
                    ?>
                        <div class="records_content">
                    <?php }else{?>
                        <div class="no_records_content">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<!-- /container -->
</body>
</html>