<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>RM Shope Fashion</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../../index.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="list_produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="list_produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Product
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Customer
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">edit</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                edit
                            </div>
                            <div class="card-body">

<?php 
require_once '../dbkoneksi.php';
?>

<?php 
    // cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
    $_id = isset($_GET['id']) ? $_GET['id'] : null;
    if(!empty($_id)){
        // ambil data produk berdasarkan id
        $sql = "SELECT * FROM product WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_id]);
        $row = $st->fetch();
    }else{
        // jika tidak ada parameter id pada URL, maka dianggap input data baru
        // inisialisasi variabel $row sebagai array kosong
        $row = [];
    }
?>

<form method="POST" action="proses_produk.php">
  <div class="form-group row mt-3">
    <label for="sku" class="col-4 col-form-label h2">sku</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          </div>
        </div> 
        <input id="sku" name="sku" type="text" class="form-control"
        value="<?php if(isset($row['sku'])) echo $row['sku']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row mt-3">
    <label for="name" class="col-4 col-form-label h2">Nama Produk</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          </div>
        </div> 
        <input id="name" name="name" type="text" class="form-control" 
        value="<?php if(isset($row['name'])) echo $row['name']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row mt-3">
    <label for="purchase_price" class="col-4 col-form-label h2">Harga Beli</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          </div>
        </div> 
        <input id="purchase_price" name="purchase_price" 
        value="<?php if(isset($row['purchase_price'])) echo $row['purchase_price']; ?>" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row mt-3">
    <label for="sell_price" class="col-4 col-form-label h2">Harga Jual</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          </div>
        </div> 
        <input id="sell_price" name="sell_price" value="<?php if(isset($row['sell_price'])) echo $row['sell_price']; ?>"
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row mt-3">
    <label for="stock" class="col-4 col-form-label h2">Stok</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          </div>
        </div> 
        <input id="stock" name="stock" 
        value="<?php if(isset($row['stock'])) echo $row['stock']; ?>"
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row mt-3">
    <label for="name" class="col-4 col-form-label h2">Nama Produk</label> 
    <div class="col-8">
    <?php
            $sqljenis = "SELECT * FROM product_type";
            $rsjenis = $dbh->query($sqljenis);
            ?>
            <select id="product_type" name="product_type" class="custom-select">
                <?php
                foreach ($rsjenis as $rowjenis) {
                ?>
                    <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['name'] ?></option>
                <?php
                }
                ?>
      </select>
  </div> 
    <label for="restock" class="col-4 col-form-label h2">restock Produk</label> 
    <div class="col-8">
    <?php
            $sqljenis = "SELECT * FROM restock";
            $rsjenis = $dbh->query($sqljenis);
            ?>
            <select id="restock_id" name="restock_id" class="custom-select">
                <?php
                foreach ($rsjenis as $rowjenis) {
                ?>
                    <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['restock_number'] ?></option>
                <?php
                }
                ?>
      </select>
  </div> 
  <div class="form-group row mt-3">
    <div class="offset-4 col-8 mt-2">
    <?php
        $button = (empty($_id)) ? "Simpan":"Update"; 
    ?>
      <input type="submit" name="proses" type="submit" 
      class="btn btn-outline-primary" value="<?=$button?>"/>
      <input type="hidden" name="id" value="<?=$_id?>"/>
    </div>
    </div>
  </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>










