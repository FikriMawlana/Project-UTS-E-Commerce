<?php 
// Include file koneksi database
require_once '../dbkoneksi.php';

// Ambil data dari form
$_name = $_POST['name'];
$_gender = $_POST['gender'];
$_phone = $_POST['phone'];
$_email = $_POST['email'];
$_address = $_POST['address'];
$_card = $_POST['card_id'];



$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_name;
$ar_data[]=$_gender;
$ar_data[]=$_phone;
$ar_data[]=$_email;
$ar_data[]=$_address;
$ar_data[]=$_card;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO customer (name,gender,phone,email,address,card_id) VALUES (?,?,?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE customer SET name=?,gender=?,phone=?,email=?,address=?,card_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_customer.php');
?>
