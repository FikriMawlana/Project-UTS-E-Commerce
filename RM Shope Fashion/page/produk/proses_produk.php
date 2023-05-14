<?php 
// Include file koneksi database
require_once '../dbkoneksi.php';

// Ambil data dari form
$_sku = $_POST['sku'];
$_name = $_POST['name'];
$_purchase = $_POST['purchase_price'];
$_sell = $_POST['sell_price'];
$_stock = $_POST['stock'];
$_producttype = $_POST['product_type'];
$_restock = $_POST['restock_id'];



$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_sku;
$ar_data[]=$_name;
$ar_data[]=$_purchase;
$ar_data[]=$_sell;
$ar_data[]=$_stock;
$ar_data[]=$_producttype;
$ar_data[]=$_restock;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO product (sku,name,purchase_price,sell_price,stock,product_type_id,restock_id) VALUES (?,?,?,?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE product SET sku=?,name=?,purchase_price=?,sell_price=?,stock=?,product_type_id=?,restock_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_produk.php');
?>
