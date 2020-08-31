<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= esc($title) ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

    <!-- Owlcarousel -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/owl/owl.theme.default.min.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/yahir.css" rel="stylesheet">

</head>

<body id="page-top">

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark peach-gradient scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="/img/logo-grosirbajuku.png" alt="logo grosirbajuku" height="30px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dotted-scrollspy" aria-controls="dotted-scrollspy" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse dotted-scrollspy" id="dotted-scrollspy">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kelebihan">Kelebihan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#paket">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <footer class="page-footer font-small indigo">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="/"> Grosirbajuku.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <!-- Owlcarousel -->
    <script src="<?= base_url() ?>/js/owl/owl.carousel.js"></script>
    <script src="<?= base_url() ?>/js/owl/owl.carousel.min.js"></script>

    <!-- yahir script -->
    <script src="<?= base_url() ?>/js/yahir.js"></script>
</body>

</html>