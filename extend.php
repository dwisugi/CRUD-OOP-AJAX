<?php
    include_once 'library.php';
    $product = new product();
    $db = $product->getConnection();
?>

<?php
    if ($_GET['aksi'] == "create" ){

            if(isset($_POST['nama_motor']) && isset($_POST['merk_motor']) && isset($_POST['harga_motor']) ){
       
                $add = $product->create();
        }
//////////////////////////////////////////////////////////////////////////////////////////////////                
        }elseif ($_GET['aksi'] == "update") {

            if(isset($_POST['id']) ){
                    // get User ID
                    $product->id = $_POST['id'];
                
                    $stmi = $product->readOne();
                    
                    // if(mysqli_num_rows($result) > 0) {
                        while ($row = $stmi->fetch(PDO::FETCH_ASSOC) ) {
                            $response = $row;
                        }
                    // display JSON data
                    echo json_encode($response);
                }
//////////////////////////////////////////////////////////////////////////////////////////////////
        }elseif ($_GET['aksi'] == "proses") {

            if(isset($_POST['id']) && isset($_POST['nama_motor']) && isset($_POST['merk_motor']) && isset($_POST['harga_motor']) ){
                    $upd = $product->update();
                }
//////////////////////////////////////////////////////////////////////////////////////////////////
        }elseif ($_GET['aksi'] == "read") {
         
            $stmti = $product->readAll();
            $num1 = $product->CountAll();
            // Desain menampilkan tabel header 
            $data = '<table class="table table-bordered table-striped">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Motor</th>
                                    <th>Merk Motor</th>
                                    <th>Harga Motor</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>';

            if($num1 > 0){

                $number = 1;
                while($row = $stmti->fetch(PDO::FETCH_ASSOC) ){ 

                    $data .= '<tr>
                        <td>'.$number.'</td>
                        <td>'.$row['nama_motor'].'</td>
                        <td>'.$row['merk_motor'].'</td>
                        <td>'.$row['harga_motor'].'</td>
                        <td>
                            <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
                        </td>
                        <td>
                            <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>';
                    $number++;
                }

            }else {
                // records now found 
                $data .= '<tr><td colspan="6">Records not found!</td></tr>';
            }

            $data .= '</table>';

            echo $data;
//////////////////////////////////////////////////////////////////////////////////////////////////
        }elseif ($_GET['aksi'] == "delete") {

                $del = $product->delete($_POST['id']);
                
//////////////////////////////////////////////////////////////////////////////////////////////////  
        } 
     
?>
