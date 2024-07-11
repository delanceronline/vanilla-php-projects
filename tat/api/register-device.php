<?php

    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';

    $hasRegistrationId = array_key_exists('registration_id', $_REQUEST) && $_REQUEST['registration_id'] != "";
    $hasDeviceType = $_REQUEST['device_type'] == "android" || $_REQUEST['device_type'] == "ios";

    if (!$hasDeviceType) {
        $_REQUEST['device_type'] = "android";
    }

    if (!$hasRegistrationId) {
        return json_encode(['result' => false]);
    }

    // Check existence.
    {
        $devices = \TAT\Backend\DevicesQuery::create()->findByRegistrationId($_REQUEST['registration_id']);
        if (count($devices) > 0) {
            exit(json_encode(['result' => true]));
        }
    }

    $device = new \TAT\Backend\Devices();
    $device->setRegistrationId($_REQUEST['registration_id']);
    $device->setDeviceType($_REQUEST['device_type']);
    $device->save();

    echo json_encode(['result' => true]);