<?php

    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';

    echo \TAT\Backend\Base\CouponsQuery::create()->findPk($_GET['id'])->toJSON();