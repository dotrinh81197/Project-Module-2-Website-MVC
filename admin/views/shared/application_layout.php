<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/admin/assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/admin/assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="/admin/assets/css/grasp_mobile_progress_circle-1.0.0.min.css">

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/admin/assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/admin/assets/css/custom.css">
    <link rel="stylesheet" href="/admin/assets/css/menu.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> <!-- Tweaks for older IEs-->
    <!--font arima madurai-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@400;700&family=Charm:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>

    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="?controller=home&action=welcome" class="navbar-brand">
                                <div class="brand-text d-none d-md-inline-block"><strong class="strong">Dashboard</strong></div>
                            </a></div>

                        <!-- Log out-->
                        <?php
                        if (isset($_SESSION["username"])) {

                            echo '<li class="nav-item"> <span>Hi ' . $_SESSION["username"] . ' </span><a href="?controller=auth&action=logout" class="nav-link logout"> <span class="d-sm-none d-xl-inline-block ">Logout</span><i class="fa fa-sign-out"></i></a></li>
                        ';
                        } else {
                            echo '<li class="nav-item"><a href="?controller=auth&action=login" class="nav-link login"> <span class="d-none d-sm-inline-block">Login </span><i class="fa fa-sign-in"></i></a></li>
                        ';
                        }
                        ?>



                    </div>
                </div>
            </nav>
        </header>


        <div class="container">
            <?php if (isset($content)) echo $content; ?>
        </div>
    </div>
    <!-- Side bar -->
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- User Info-->
                <div class="sidenav-header-inner text-center" style="color: #8dc26f;">
                    <?php

                    if (isset($_SESSION["username"])) {
                        echo '<h4 class="d-none d-sm-inline-block"><?php echo' . ' <span>Hi ' . $_SESSION["username"] . ' </span>';
                        ' ?></h4></a>
                    ';
                    }
                    ?>
                    <h2 class="h5">Admin</h2>
                    <span>Website Manager</span>
                </div>
                <!-- Small Brand information, appears on minimized sidebar-->
                <!-- <div class="sidenav-header-logo">
                    <a href="?controller=home&action=welcome" class="brand-small text-center">
                        <strong>B</strong><strong style="color:#8dc26f">D</strong></a>
                </div> -->
            </div>
            <!-- Sidebar Navigation Menus-->
            <div class="main-menu">
                <h5 class="sidenav-heading">Main</h5>
                <ul id="side-main-menu" class="side-menu list-unstyled">
                    <li>
                        <a href="?controller=home&action=welcome"> <i class="icon-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="?controller=product&action=index"> <i class="icon-form"></i>Products </a>
                    </li>
                    <li>
                        <a href="?controller=categories&action=index"> <i class="fas fa-store"></i> Categories </a>
                    </li>
                    <li>
                        <a href="?controller=bill&action=index"> <i class="fas fa-file-invoice-dollar"></i></i> Bills </a>
                    </li>

                </ul>
            </div>
            <!--Phan quyen Admin quan ly thanh vien-->
            <div class="admin-menu">
                <h5 class="sidenav-heading">Second menu</h5>
                <ul id="side-admin-menu" class="side-menu list-unstyled">
                    <li>
                        <a href="#"> <i class="far fa-user"></i>Employee </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>