<?php

include "../../helper/db.php";
require_once "../../layout/_top.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="d-none d-md-block">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex h-100">
                            <div class="justify-content-center align-self-center ms-5">
                                <h2>
                                    <strong>Hello <?php echo $_SESSION['role'] ?> </strong><br /> Here's Book Management
                                    <br />
                                    <h4>You're as <?php echo $_SESSION['role'] ?> here</h4>
                                </h2>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../../image/Book.png" width="100%" />
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once '../../layout/_bottom.php';
    ?>