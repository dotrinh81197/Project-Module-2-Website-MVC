<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Dashboard</strong></div>
                        </a></div>

                    <!-- Log out-->
                    <?php
                    if (isset($_SESSION['username'])) {

                        echo '<li class="nav-item"><a href="?controller=user&action=logout" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                        ';
                    } else {
                        echo '<li class="nav-item"><a href="view/login.php" class="nav-link login"> <span class="d-none d-sm-inline-block">Login </span><i class="fa fa-sign-in"></i></a></li>
                        ';
                    }
                    ?>



                </div>
            </div>
        </nav>
    </header>
</div>
<!-- Counts Section -->