<?php
    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';

    error_reporting(0);

    $news          = json_decode(file_get_contents("http://tat1.easyapp.hk/news/"), true);
    $coupons       = \TAT\Backend\CouponsQuery::create()->find()->toArray();
    $mysqli        = new mysqli("tat1.cgqmktbbkkcl.ap-southeast-1.rds.amazonaws.com", "root", "AdminPass14!", "gals_getaway");
    $news_raw_data = $mysqli->query("SELECT `id`, `updated_at` FROM `news`")->fetch_all(MYSQLI_ASSOC);

    function tagNew($item)
    {
        $item["type"]  = "new";
        $item["title"] = $item["name"];
        $item["body"]  = $item["description"];

        unset($item["name"], $item["description"]);

        $new = null;
        foreach ($GLOBALS['news_raw_data'] as $new_raw_data) {
            if ($new_raw_data['id'] == $item['id']) {
                $new = $new_raw_data;
            }
        }

        $item['updated_at'] = ($new != null) ? $new['updated_at'] : date("Y-m-d H:i:s");

        return $item;
    }

    function tagCoupon($item)
    {
        $item["type"]  = "coupon";
        $item["id"]    = $item["Id"];
        $item["title"] = $item["Title"];
        $item["body"]  = $item["Detail"];

        unset($item["Id"], $item["Title"], $item["Detail"]);

        return $item;
    }

    function getDateTime($item)
    {
        if ($item["type"] == "coupon") {
            return \DateTime::createFromFormat("Y-m-d\TH:i:sT", $item["Editiondate"]);
        } else {
            return \DateTime::createFromFormat("Y-m-d H:i:s", $item['updated_at']);
        }
    }

    function sortNews($a, $b)
    {
        $a_date = getDateTime($a);
        $b_date = getDateTime($b);

        return ($a_date < $b_date) ? 1 : -1;
    }

    $news    = array_map("tagNew", $news);
    $coupons = array_map("tagCoupon", $coupons);

    $news = array_merge($news, $coupons);

    usort($news, "sortNews");

    echo json_encode($news);