<?php

    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';

    $email = '';
    if (isset($_REQUEST['email']))
        $email = strtolower($_REQUEST['email']);

    $password = '';
    if (isset($_REQUEST['password']))
        $password = $_REQUEST['password'];

    header('Content-Type: application/json');
    $output = [];
    $output['result'] = false;
    $output['code'] = 'undefined';

    if ($email != '' && $password != '') {
        require_once './vendor/autoload.php';
        require_once './generated-conf/config.php';

        $member = \TAT\Backend\MembersQuery::create()->filterByEmail($email)->where('md5(members.password) = ?', $password, PDO::PARAM_STR)->findOne();
        if ($member) {
            $output['result'] = true;
            $coupons = \TAT\Backend\CouponsQuery::create()->find();
            $output['coupons'] = $coupons->toArray();
        } else
            $output['code'] = 'gc-e2';
    } else
        $output['code'] = 'gc-e1';

    /*
     * gc-e1: parameter missed
     * gc-e2: invalid login
     */

    echo json_encode($output);
