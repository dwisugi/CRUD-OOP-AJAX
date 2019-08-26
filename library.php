<?php
class product{
 
    // properti object
    private $conn;
    public $id;
    public $nama_motor;
    public $merk_motor;
    public $harga_motor;

    //create connection
    function getConnection(){

        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=db_motor","root","");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
            die();
        }
        return $this->conn;
    }
 
    // create product
    function create(){
        $this->nama_motor = $_POST['nama_motor'];
        $this->merk_motor = $_POST['merk_motor'];
        $this->harga_motor = $_POST['harga_motor'];
        //write query
        $query = "INSERT INTO produk SET nama_motor=:nama, merk_motor=:merk, harga_motor=:harga";
 
        $stmt = $this->conn->prepare($query);
 
        // bind values 
        $stmt->bindParam(":nama", $this->nama_motor);
        $stmt->bindParam(":merk", $this->merk_motor);
        $stmt->bindParam(":harga", $this->harga_motor);
 
        $stmt->execute();
 
    }
    //read all data
    function readAll(){
 
        $query = "SELECT * FROM produk ORDER BY nama_motor ";
     
        $stmt = $this->conn->prepare( $query );
        
        $stmt->execute();
     
        return $stmt;

    }
    // count all data
    public function countAll(){
    
        $query = "SELECT id FROM produk";
    
        $stmt = $this->conn->prepare( $query );

        $stmt->execute();
    
        $num = $stmt->rowCount();
    
        return $num;
    }
    //read detail one data
    function readOne(){
 
        $query = "SELECT * FROM produk WHERE id = ?";
     
        $stmt = $this->conn->prepare( $query );

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
     
        $stmt = $this->conn->prepare($query);
     
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
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
    }
}