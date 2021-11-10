<html>
    <!-- <a href="../home.html" class="logo">
        <span class="logo-mini"><img class="img-circle" width = 50px height = 50px></span>
        <span class="logo-lg">
            <b>Koki Kelinci</b>
        </span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url() ?>ChangePass">Ubah Password</a></li>
                <li><a href="<?= base_url() ?>Login">Logout</a></li>
            </ul>
        </div>
    </nav> -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <span>
            <a href="<?= base_url() ?>changePass" class="dropdown-item">
                <i></i> change password
            </a>
        </span>
        <span>
            <a href="<?= base_url() ?>Login" class="dropdown-item">
                <i></i> Logout
            </a>
        </span>


    </ul>
</nav>
</html> 
