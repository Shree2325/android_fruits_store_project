<?php
    include("../connection.php");
    $id = 0;
    $name = "";
    $price = "";
    $description = "";
    $pic = "";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($_GET["mode"] == "delete"){
            $sql = "DELETE FROM products WHERE id = " . $id;
            $conn->query($sql);
            header('Location: products.php');
        }
        else{
            $sql = "SELECT * FROM products WHERE id = " . $id;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $price = $row["price"];
            $description = $row["description"];
            $pic = $row["pic"];
        }
    }


    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Products - Shopping Project</title>
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include("menus.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="padding-top:50px;">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="productsave.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $id ?>" />
                                <div class="row">
                                <div class="col-lg-4">
                                    Product Name
                                    <input type="text" value="<?= $name ?>" class="form-control" name="name"  required/>
                                </div>
                                <div class="col-lg-4">
                                    Price
                                    <input type="text" value="<?= $price ?>"  class="form-control" name="price"  required/>
                                </div>
                                <div class="col-lg-4">
                                    Image
                                    <input type="file"  class="form-control" name="pic"  />
                                </div>
                                <div class="col-lg-12">
                                    Description
                                    <textarea  class="form-control" name="description" rows="4" >
                                    <?= $description ?>
                                    </textarea>
                                </div>
                                </div>
                                <div class="col-lg-12">
                                    <br />
                                    <input type="submit" value="Save" class="btn btn-primary" />
                                    <a href="products.php" class="btn btn-danger">Cancel</a>
                                    <br /><br />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  style="width:150px;">Action</th>
                                            <th  style="width:80px;">No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                            $count = 0;
                                            while($row = $result->fetch_assoc()) {
                                                $count++;

                                               
                                               
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="products.php?id=<?= $row["id"] ?>&mode=edit" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="products.php?id=<?= $row["id"] ?>&mode=delete" onclick="return confirm('Sure to delete?')" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                            <td><?= $count; ?></td>
                                            <td><img src="../productpics/<?= $row['pic']?>.png" height="50" alt="pic"></td>
                                            <td><?= $row["name"] ?></td>
                                            <td><?= $row["price"] ?></td>
                                            <td><?= $row["description"] ?></td>
                                            
                                        </tr>
                                        <?php
                                            }
                                        
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Shopping Project</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>