<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="list_produk.php">Start Bootstrap</a>
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
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../produk/list_produk.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-earth-americas"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="../produk/list_produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Product
                            </a>
                            <a class="nav-link" href="../produk_type/list_produktype.php">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-shopify"></i></div>
                                Produk Type
                            </a>
                            <a class="nav-link" href="../order/list_order.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="../customer/list_customer.php">
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
                        <h1 class="mt-4">Customer</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                    <?php 
    // include database connection
    require_once '../dbkoneksi.php';
    // select all data from table "customer"
    $sql = "SELECT * FROM customer";
    // execute the query
    $rs = $dbh->query($sql);
?>
<a class="btn btn-outline-success mb-2" href="form_customer.php" role="button">Create Customer</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>No</th><th>Nama</th><th>Gender</th>
            <th>Phone</th><th>Email</th>
            <th>Addres</th><th>card_id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
        
            // initialize counter
            $nomor = 1;
            // loop through the result set
            foreach($rs as $row) {
        ?>
        <tr>
            <td><?=$nomor?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['gender']?></td>
            <td><?=$row['phone']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['address']?></td>
            <td><?=$row['card_id']?></td>
            <td>
                <!-- buttons to view, edit, and delete a product -->
                <a class="btn btn-outline-primary" href="view_customer.php?id=<?=$row['id']?>">View</a>
                <a class="btn btn-outline-warning" href="form_customer.php?id=<?=$row['id']?>">Edit</a>
                <a class="btn btn-outline-danger" href="delete_customer.php?id=<?=$row['id']?>"
                onclick="if(!confirm('Anda Yakin Hapus Data customer <?=$row['id']?>?')) {return false}"
                                >Delete</a>
            </td>
        </tr>
        <?php 
            // increment counter
            $nomor++;   
            } 
        ?>
    </tbody>
</table>
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
