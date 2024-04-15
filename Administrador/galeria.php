<?php
    require_once 'Classes/Produtos.php';

    $p = new Produtos();

    if (isset($_GET['id']) && !empty($_GET['id']) ) {
        $id = addslashes($_GET['id']);
        $produto = $p->buscarProdutoPorId($id);
        $img     = $p->galeria($id);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clube das Promoções - Editar</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16"  href="favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!--Topbar-->
                <?php include './topbar.php'; ?>
                <!--End of Topbar-->

                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <nav class="mt-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./produtos.php">Produtos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galeria</li>
                        </ol>
                    </nav>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 mt-2"><?php echo $produto['nome'];?></h1>
                    <div class="card shadow">
                        <div class="card-body">
                        <form class="row g-3"  method="POST" enctype="multipart/form-data">
                
                            <?php
                            foreach($img as $v){
                            ?>
                            <div class="col-md-4">
                                <img class="img-thumbnail"  alt="..." src="imagens/<?php echo $v['nomeImg']; ?>">
                                <div class="text-center mt-3">
                                    <a href="editar_galeria.php?id=<?php echo $v['idImg']; ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-upload"></i></a>
                                    <a href="excluir_galeria.php?id=<?php echo $v['idImg']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Deseja Excluir a Imagem?')"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './footer.php'; ?>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>