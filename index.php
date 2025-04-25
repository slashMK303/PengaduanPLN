<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan PLN</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
            <a href="index.php" class="navbar-brand text-white">Pengaduan PLN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php?page=register" class="nav-link text-white">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=login" class="nav-link text-white">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'login':
                include 'login.php';
                break;
            case 'register':
                include 'register.php';
                break;
            default:
                echo "Halaman Tidak Tersedia";
                break;
        }
    } else {
        include 'home.php';
    }

    ?>

    <footer class="footer py-2 bg-light fixed-bottom">
        <div class="container">
            <p class="text-center">Pengaduan PLN</p>
        </div>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</body>

</html>