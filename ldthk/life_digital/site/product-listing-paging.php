<?php

if (isset($_POST['dataArray'])) {
    $cid = $_POST['dataArray'][0];
    $bid = $_POST['dataArray'][1];
    $page_no = $_POST['dataArray'][2];
    include_once ('config.inc.php');
}else{
    $page_no = 1;
}

$link = mysql_connect($db_location, $db_login_id, $db_password);
if ($link) {
    $total = 0;
    $db_selected = mysql_select_db($db_name, $link);
    if ($db_selected) {
        mysql_query("SET NAMES 'utf8';");
        $check = mysql_query("SELECT * from `product` WHERE category_id = '$cid' AND brand_id = '$bid' ORDER BY `sort` DESC");
        for ($i = 0; $i < mysql_num_rows($check); $i++) {
            $row = mysql_fetch_assoc($check);
            $time_now = new DateTime(date('Y-m-d', strtotime('+6HOUR')));
            $show_time = new DateTime(date('Y-m-d', strtotime($row['show'])));
            $since_start = $show_time->diff($time_now);
            if ($since_start->invert == 0) {
                if ($total >= $page_no * $product_show_list_num - $product_show_list_num && $total < $page_no * $product_show_list_num) {
                    echo '<div class="large-3 small-6 columns"><div class="clientcontainer">';
                    if ($row['new_product']) {
                        echo '<div class="news-prod">新產品</div>';
                    }
                    echo '<a href="product-detail.php?id=' . $row['id'] . '"><img src="' . $uploaded_image_path . $row['image'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '"><p>' . $row['title'] . '</p></a>';
                    echo '</div></div>';
                }
                $total++;
            }
        }
    }

    echo '<div class="clearfix"></div>';

    echo '<div class="pagination-mm right">';
    echo '<ul class="pagination right">';
    echo '<li class="arrow"><a href="#" id="prev_page">&laquo;</a></li>';
    echo '<li id="page-1" class="page_no"><a href="#" class="page_num" page-num="1">1</a></li>';
    for ($i = 1; $i < $total / $product_show_list_num; $i++) {
        echo '<li id = "page-' . ($i + 1) . '" class="page_no"><a href = "#" class="page_num" page-num = "' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
    }
    echo '<li class="arrow"><a href="#" id="next_page">&raquo;</a></li>';
    echo '</ul>';
    echo '<div class="clearfix"></div></div>';
    mysql_close($link);
}
?>