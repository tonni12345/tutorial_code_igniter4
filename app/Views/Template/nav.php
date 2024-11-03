<nav class="navbar navbar-expand-lg bg-gradient-primary d-flex d-row" id="nav-bar">
    <div class="container-fluid">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url() . "/" ?>">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url() . "/admin" ?>">ADMIN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url() . "/pengadaan" ?>">PENGADAAN</a>
            </li>
        </ul>
    </div>
    <?php if (session()->get("loginData") && session()->get('loginData')["isLoggedIn"]) : ?>
        <div>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . "/logout" ?>">LOGOUT</a>
                </li>
        </div>
    <?php else : ?>
        <div>
            <ul class="navbar-nav
        ">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . "/login" ?>">LOGIN</a>
                </li>
            </ul>
        </div>
    <?php endif; ?>
</nav>