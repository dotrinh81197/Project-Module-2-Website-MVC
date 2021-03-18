<div class="container">
    <nav class="navbar navbar-expand-md ">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <i class="fas fa-paw"></i>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <a class="navbar-brand" href="#"><img class="logo" src="assets/lib/resouce/logo/logo.png" alt=""></a>
                <li class=""><a href="?controller=home&action=welcome">Trang chủ</a></li>
                <li class=""><a href="#">Giới thiệu</a></li>
                <li class=""><a href="#">Liên hệ</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right" style="display: flex;flex-direction: row-reverse;">
                <?php
                if (isset($_SESSION["username"])) {

                    echo '<li class="nav-item"> <span>Hi ' . $_SESSION["username"] . ' </span><a href="?controller=auth&action=logout" class="nav-link logout"> <span class="d-sm-none d-xl-inline-block ">Logout</span><i class="fa fa-sign-out"></i></a></li>
                        ';
                } else {
                    echo '<li><a href="?controller=auth&action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
                ?> </ul>
        </div>

    </nav>
</div>