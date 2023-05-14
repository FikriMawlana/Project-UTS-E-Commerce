<?php 
// Include file koneksi database
require_once '../dbkoneksi.php';

// Ambil data dari form
$_order_number = $_POST['order_number'];
$_date = $_POST['date'];
$_qty = $_POST['qty'];
$_total_price = $_POST['total_price'];
$_customer_id = $_POST['customer_id'];
$_product_id = $_POST['product_id'];



$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_order_number;
$ar_data[]=$_date;
$ar_data[]=$_qty;
$ar_data[]=$_total_price;
$ar_data[]=$_customer_id;
$ar_data[]=$_product_id;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO orders (order_number,date,qty,total_price,customer_id,product_id) VALUES (?,?,?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE orders SET order_number=?,date=?,qty=?,total_price=?,customer_id=?,product_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_order.php');
?>
