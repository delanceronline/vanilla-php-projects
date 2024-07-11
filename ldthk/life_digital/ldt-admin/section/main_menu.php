<?php
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    }
?>
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <!--<li><a href="#"><i class="glyphicon glyphicon-home"></i> 主頁</a></li>-->
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-lock"></i> 主頁
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li><a href="index.php">Main Banner</a></li>
                    <li><a href="index-mini.php">Mini Banner</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> 產品
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li><a href="product.php">產品</a></li>
                    <li><a href="product_brand.php">產品品牌</a></li>
                    <li><a href="product_cat.php">產品分類</a></li>
                </ul>
            </li>
            <li><a href="news.php"><i class="glyphicon glyphicon-book"></i> 最新消息</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-screenshot"></i> 安裝工程
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li><a href="project.php">工程</a></li>
                    <li><a href="project_cat.php">工程分類</a></li>
                </ul>
            </li>
            <li><a href="login.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            <!--<li><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
            <li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
            <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
            <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
            <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
            <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
            <li class="current"><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>-->
            <!--<li class="submenu">
                 <a href="#">
                    <i class="glyphicon glyphicon-lock"></i> Login
                    <span class="caret pull-right"></span>
                 </a>
                 <ul>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </li>-->
        </ul>
    </div>
</div>