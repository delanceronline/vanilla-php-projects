<div class="row">
    <hr>
</div>

<div class="row">
    <?php
    $link = mysql_connect($db_location, $db_login_id, $db_password);
    if ($link) {
        $db_selected = mysql_select_db($db_name, $link);
        if ($db_selected) {
            mysql_query("SET NAMES 'utf8';");
            $result = mysql_query("SELECT * from mini_banner ORDER BY RAND() LIMIT 4");
            while ($row = mysql_fetch_array($result)) {
                if ($row != null) {
                    echo '<div class="large-3 medium-6 columns"><div class="view third-effect">';
                    echo '<a href="' . $row['link'] . '"><img src="' . $uploaded_image_path . $row['image'] . '" alt="" width="100%"/></a>';
                    echo '</div></div>';
                }
            }
        }
        mysql_close($link);
    }
    ?>
</div>