<?php

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
            $output['member'] = $member->toArray();
        } else
            $output['code'] = 'gmd-e2';
    } else
        $output['code'] = 'gmd-e1';

    /*
     * gmd-e1: parameter missed
     * gmd-e2: invalid login
     */

    echo json_encode($output);

