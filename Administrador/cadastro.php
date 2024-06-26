<?php
    require_once 'Classes/Produtos.php';

    $p = new Produtos();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clube das Promoções - Cadastro</title>

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
                            <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                        </ol>
                    </nav>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 mt-2">Cadastrar Novo Produto</h1>
                    <div class="card shadow">
                        <div class="card-body">
                            <?php
                                if (isset($_POST['nome'])) {
                                    $fotos  = array();
                                    $nome   = $_POST['nome'];
                                    $loja   = $_POST['loja'];
                                    $link   = $_POST['link'];
                                    $preco  = $_POST['preco'];

                                    if (isset($_FILES['foto'])) {
                                        for ($i=0; $i < count($_FILES['foto']['name']); $i++) { 
                                          $nome_arquivo = md5($_FILES['foto']['name'][$i].rand(1,9999)).'.jpg';
                                          move_uploaded_file($_FILES['foto']['tmp_name'][$i], 'imagens/'.$nome_arquivo);
                    
                                          array_push($fotos, $nome_arquivo);
                                        }
                                      }

                                    if ($p->cadastrar($fotos, $nome,$loja, $link, $preco)) {
                                        echo '<script>alert(Prduto Cadastrado com sucesso!)</script>';

                                        header('location: produtos.php');
                                        die();
                                    } else {
                                        echo '<script>alert(Erro ao cadastrar! Tente novamente!)</script>';
                                    }
                                    
                                }
                            ?>
                            <form class="user" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                    <label><b>Imagens Produto</b></label>
                                    <input type="file" name="foto[]" multiple id="exampleFirstName"  class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-7 mb-3 mb-sm-0">
                                        <label><b>Nome</b></label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"                                    placeholder="Nome do Produto" name="nome">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label><b>Loja</b></label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"                                    placeholder="Nome da Loja" name="loja">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label><b>Link</b></label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"                                    placeholder="Link Loja do Produto" name="link">
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label><b>Preço</b></label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"                                    placeholder="Preço do Produto" name="preco">
                                    </div>
                                    
                                </div>
                                
                                <div class="text-center">
                                    <div class="form-group row mt-5 mb-5">
                                        <div class="col col-sm-2">
                                        <button type="submit" class="btn btn-success btn-user btn-block">Cadastrar</button>
                                        </div>
                                        <div class="col col-sm-2">
                                        <button type="reset" class="btn btn-danger btn-user btn-block">Limpar</button>
                                        </div>
                                    </div>
                                </div>
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