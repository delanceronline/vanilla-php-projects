<?php
    ob_start();
    session_start();
?>
<div class="header">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.php"><img src="images/contactus-title.jpg" alt=""></a></h1>
                </div>
            </div>

            <div class="col-md-4 acc-text-m">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <?php if (isset($_SESSION['id'])) {?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="login.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>