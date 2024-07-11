<?php

    require_once './vendor/autoload.php';
    require_once './generated-conf/config.php';


    $db_devices = \TAT\Backend\DevicesQuery::create()->find();
    foreach ($db_devices as $db_device) {
        $devices[] = new \TAT\Backend\PushNotification\Device($db_device->getRegistrationId(), $db_device->getDeviceType());
    }

    $id   = $_POST['id'];
    $type = $_POST['type'];

    $news = json_decode(file_get_contents("http://" . $_SERVER['SERVER_NAME'] . "/api/get-news.php"), true);

    for ($i = 0; $i < count($news); $i++) {
        $new = $news[ $i ];
        if ($new["type"] == $type && $new["id"] == $id) {
            break;
        }
    }

    unset($new['description']);

    //$notification = new \TAT\Backend\PushNotification\Notification($devices, ["id" => $new["id"], "type" => $new["type"]]);
    $notification                      = new \TAT\Backend\PushNotification\Notification($devices, $new);
    $notification->notification->title = $_POST['title'];
    $notification->notification->body  = $new['body'];
    $result                            = (new \TAT\Backend\PushNotification\Client())->sendNotification($notification);

    echo json_encode(['result' => $result]);
