<?php

    header('Content-Type: application/json');
    $output = [];

    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';

    $ad = \TAT\Backend\AdsQuery::create()->orderByCreationdate(Propel\Runtime\ActiveQuery\Criteria::DESC)->findOne();
    if ($ad)
        $output['ad'] = $ad->toArray();

    echo json_encode($output);