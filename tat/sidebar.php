<?php
    $menu = ["Members" => "dashboard.php", "News" => "news.php", "Coupons" => "couponList.php", "Ads" => "AdList.php"];
?>

<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <?php foreach ($menu as $title => $direction) {
            if ($current_page == $title) {
                ?>
                <li class="active"><a href="#"><?= $title ?><span class="sr-only">(current)</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="<?= $direction ?>"><?= $title ?></a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>