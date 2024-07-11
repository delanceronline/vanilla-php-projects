<?php

    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';

    $db_coupons = \TAT\Backend\Base\CouponsQuery::create()->find();
    foreach ($db_coupons as $db_coupon) {
        $db_devices = \TAT\Backend\DevicesQuery::create()->find();
        foreach ($db_devices as $db_device) {
            $devices[] = new \TAT\Backend\PushNotification\Device($db_device->getRegistrationId());
        }
        $notification = new \TAT\Backend\PushNotification\Notification($devices, ['type' => 'coupon']);
        $notification->notification->title = $db_coupon->getTitle();
        $notification->notification->body = $db_coupon->getDetail();
        $result = (new \TAT\Backend\PushNotification\Client())->sendNotification($notification);

        echo ($result) ? "Successfully " : "Failed to ";
        echo "sent notification " . $db_coupon->getTitle() . " to " . count($devices) . " devices.";
    }