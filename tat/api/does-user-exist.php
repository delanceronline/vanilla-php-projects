<?php

    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';

    $email = '';
    if (isset($_REQUEST['email']))
        $email = strtolower($_REQUEST['email']);

    header('Content-Type: application/json');

    $result = [];
    $result['exist'] = false;
    $output['code'] = 'undefined';

    if ($email != '') {
        $member = \TAT\Backend\MembersQuery::create()->filterByEmail($email)->findOne();
        if ($member) {
            $result['exist'] = true;
        }
    }

    echo json_encode($result);
