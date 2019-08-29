<?php
class product{
 
    // properti object
    private $conn;
    private $error;
    public $id;
    public $nama_motor;
    public $merk_motor;
    public $harga_motor;
    public $nama;
    public $email;
    public $password;
    private $db;

    //create connection
     function getConnection(){

        try{
            $this->db = new PDO("mysql:host=localhost;dbname=db_motor","root","");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
            die();
        }
        return $this->db;
        // session_start();
   
     }
     function __construct() 

     { 
   
       // Mulai session  
   
       session_start(); 
   
     }

  ### Start : Registrasi User baru ###  

  public function register(){ 
    $this->nama = $_POST['nama'];
    $this->email = $_POST['email'];
    $this->password = $_POST['password'];

    try 

    { 

      // buat hash dari password yang dimasukkan 

      $hashPasswd = password_hash($this->password, PASSWORD_DEFAULT); 

      //Masukkan user baru ke database 
     
      $stmt = $this->db->prepare("INSERT INTO tbAuth(nama, email, password) VALUES(:nama, :email, :pass)"); 

      $stmt->bindParam(":nama", $this->nama); 

      $stmt->bindParam(":email", $this->email); 

      $stmt->bindParam(":pass", $hashPasswd); 

      $stmt->execute(); 

      return true; 

    }catch(PDOException $e){ 

      // Jika terjadi error 

      if($e->errorInfo[0] == 23000){ 

        //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan 

        //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique 

        $this->error = "Email sudah digunakan!"; 
        $data = 'Email ini sudah Digunakan!';

        return false; 

      }else{ 

        echo $e->getMessage(); 

        return false; 

      } 

    } 

  } 
  //////////////////////
      // create user
      function adduser(){
        $this->nama = $_POST['nama'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $hashPassword = password_hash($this->password, PASSWORD_DEFAULT); 
        //write query
        $query = "INSERT INTO tbAuth SET nama=:nama, email=:email, password=:password";
 
        $stmt = $this->db->prepare($query);
 
        // bind values 
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $hashPassword);
 
        $stmt->execute();
 
    }

  ### End : Registrasi User baru ###  

  ### Start : fungsi login user ###  

  public function login($email, $password) 

  { 

    try 

    { 

      // Ambil data dari database 

      $stmt = $this->db->prepare("SELECT * FROM tbAuth WHERE email = :email"); 

      $stmt->bindParam(":email", $email); 

      $stmt->execute(); 

      $data = $stmt->fetch(); 

      // Jika jumlah baris > 0 

      if($stmt->rowCount() > 0){ 

        // jika password yang dimasukkan sesuai dengan yg ada di database 

        if(password_verify($password, $data['password'])){ 

          $_SESSION['statusnya'] = $data['id']; 

          return true; 

        }else{ 

          $this->error = "Email atau Password Salah"; 

          return false; 

        } 

      }else{ 

        $this->error = "Email atau Password Salah"; 

        return false; 

      } 

    } catch (PDOException $e) { 

      echo $e->getMessage(); 

      return false; 

    } 

  } 
//////////////////////////////////////////////////////////
function log(){
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

  try { 

      // Ambil data dari database 

      $stmt = $this->db->prepare("SELECT * FROM tbAuth WHERE email = :email"); 

      $stmt->bindParam(":email", $this->email); 

      $stmt->execute(); 

      $data = $stmt->fetch(); 

      // Jika jumlah baris > 0 

      if($stmt->rowCount() > 0){ 

        // jika password yang dimasukkan sesuai dengan yg ada di database 

        if(password_verify($this->password, $data['password'])){ 

          $_SESSION['statusnya'] = $data['id']; 

          return true; 

        }else{ 

          $this->error = "Email atau Password Salah"; 

          return false; 

        } 

      }else{ 

        $this->error = "Email atau Password Salah"; 

        return false; 

      } 

    } catch (PDOException $e) { 

      echo $e->getMessage(); 

      return false; 

    }
}

  ### End : fungsi login user ### 

  ### Start : fungsi cek login user ###  

  public function isLoggedIn(){ 

    // Apakah user_session sudah ada di session 

    if(isset($_SESSION['statusnya'])) 

    { 

      return true; 

    } 

  } 

  ### End : fungsi cek login user ###  

  ### Start : fungsi ambil data user yang sudah login ###   

  public function getUser(){ 

    // Cek apakah sudah login 

    if(!$this->isLoggedIn()){ 

      return false; 

    } 

    try { 

      // Ambil data user dari database 

      $stmt = $this->db->prepare("SELECT * FROM tbAuth WHERE id = :id"); 

      $stmt->bindParam(":id", $_SESSION['statusnya']); 

      $stmt->execute(); 

      return $stmt->fetch(); 

    } catch (PDOException $e) { 

      echo $e->getMessage(); 

      return false; 

    } 

  } 

  ### End : fungsi ambil data user yang sudah login ###  

  ### Start : fungsi Logout user ###  

  public function logout(){ 

    // Hapus session 

    session_destroy(); 

    // Hapus user_session 

    unset($_SESSION['statusnya']); 

    return true; 

  } 

  ### End : fungsi Logout user ###  

  ### Start : fungsi ambil error terakhir yg disimpan di variable error ###  

  public function getLastError(){ 

    return $this->error; 

  } 

  ### End : fungsi ambil error terakhir yg disimpan di variable error ###  

////////////////////////////////////////////
  
    // create product
    function create(){
        $this->nama_motor = $_POST['nama_motor'];
        $this->merk_motor = $_POST['merk_motor'];
        $this->harga_motor = $_POST['harga_motor'];
        //write query
        $query = "INSERT INTO produk SET nama_motor=:nama, merk_motor=:merk, harga_motor=:harga";
 
        $stmt = $this->db->prepare($query);
 
        // bind values 
        $stmt->bindParam(":nama", $this->nama_motor);
        $stmt->bindParam(":merk", $this->merk_motor);
        $stmt->bindParam(":harga", $this->harga_motor);
 
        $stmt->execute();
 
    }
    //read all data
    function readAll(){
 
        $query = "SELECT * FROM produk ORDER BY nama_motor ";
     
        $stmt = $this->db->prepare( $query );
        
        $stmt->execute();
     
        return $stmt;

    }
    // count all data
    function countAll(){
    
        $query = "SELECT id FROM produk";
    
        $stmt = $this->db->prepare( $query );

        $stmt->execute();
    
        $num = $stmt->rowCount();
    
        return $num;
    }
    //read detail one data
    function readOne(){
 
        $query = "SELECT * FROM produk WHERE id = ?";
     
        $stmt = $this->db->prepare( $query );

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        return $stmt;
    }
    //update data   
    function update(){
        $this->id = $_POST['id'];
        $this->nama_motor = $_POST['nama_motor'];
        $this->merk_motor = $_POST['merk_motor'];
        $this->harga_motor = $_POST['harga_motor'];
 
        $query = "UPDATE produk SET nama_motor = :nama, merk_motor = :merk, harga_motor = :harga WHERE id = :id";
     
        $stmt = $this->db->prepare($query);
     
        // bind parameters
        $stmt->bindParam(':nama', $this->nama_motor);
        $stmt->bindParam(':merk', $this->merk_motor);
        $stmt->bindParam(':harga', $this->harga_motor);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
    }
    // delete the product
    function delete($id){
    
        $query = "DELETE FROM produk WHERE id = '$id'";
        
        $stmt = $this->db->prepare($query);

        $stmt->execute();
    }

}