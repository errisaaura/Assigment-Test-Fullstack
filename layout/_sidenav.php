<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link" href="../dashboard/dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Pages</div>

                <?php
                if ($_SESSION['role'] === "admin") {
                ?>

                    <a class="nav-link" href="../user/daftar_user.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        User
                    </a>
                    <a class="nav-link" href="../book/daftar_book_admin.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Book
                    </a>

                <?php
                } elseif ($_SESSION['role'] === "member") {
                    echo '<a class="nav-link" href="../book/daftar_book_member.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Book
                </a>';
                }
                ?>
            </div>
        </div>
    </nav>
</div>