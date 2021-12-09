<?php

function loadNavbar(){
    ?>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">RentPro</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                            aria-controls="navbarCollapse" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">Home</a>
                            </li>
                            <?php if (isset($_SESSION["id"])) { ?>
                                <li class="nav-item">
                                <a class="nav-link" href="manage.php">Manage my ads</a>
                                </li>
                                </ul>
                                <a href="/logout.php" class="btn btn-outline-danger d-flex" role="button">Logout</a>
                            <?php } else { ?>
                                </ul>
                                <a href="/register.php" class="btn btn-outline-warning d-flex me-2 mb-2 mb-md-0" role="button">Register</a>
                                <a href="/login.php" class="btn btn-outline-success d-flex" role="button">Login</a>
                            <?php } ?>
                    </div>
                </div>
            </nav>
        </header>
    <?php
}