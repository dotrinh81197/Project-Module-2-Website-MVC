<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<h4 class="d-none d-sm-inline-block"><?php echo' . ' <span>Hi ' . $_SESSION["username"] . '</span>';
                    ' ?></h4></a>
                    ';
                }
                ?>
                <h2 class="h5">Admin</h2>
                <span>Website Manager</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo">
                <a href="index.html" class="brand-small text-center">
                    <strong>B</strong><strong class="text-primary">D</strong></a>
            </div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li>
                    <a href="?controller=product&action=index"> <i class="icon-home"></i>Products </a>
                </li>
                <li class="active">
                    <a href="forms.html"> <i class="icon-form"></i>Categories </a>
                </li>
                <li>
                    <a href="charts.html"> <i class="fa fa-bar-chart"></i> Oders </a>
                </li>


            </ul>
        </div>
        <!--Phan quyen Admin quan ly thanh vien-->
        <div class="admin-menu">
            <h5 class="sidenav-heading">Second menu</h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li>
                    <a href="#"> <i class="icon-screen"> </i>Employee </a>
                </li>
            </ul>
        </div>
    </div>
</nav>