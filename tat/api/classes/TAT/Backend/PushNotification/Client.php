<?php

    namespace TAT\Backend\PushNotification;

    use Symfony\Component\Config\Definition\Exception\Exception;

    require_once __DIR__ . '/../../../../vendor/duccio/apns-php/ApnsPHP/Autoload.php';

    class Client
    {
        const FCM_SEND_URL = "https://fcm.googleapis.com/fcm/send";
        const GCM_SEND_URL = "https://gcm-http.googleapis.com/gcm/send";
        const FCM_API_KEY  = "AIzaSyB09IgSuBa0gX0E_MI4xjFzVcH9OfnADnc";

        private $client;
        private $apns_client;

        /**
         * PushNotification constructor.
         */
        public function __construct()
        {
            $this->client = new \GuzzleHttp\Client();
            //$this->apns_client = new \ApnsPHP_Push(\ApnsPHP_Abstract::ENVIRONMENT_SANDBOX, __DIR__ . '/../../../../../tat.pem');
            $this->apns_client = new \ApnsPHP_Push(\ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION, __DIR__ . '/../../../../../tat.pem');
            $this->apns_client->connect();
        }

        public function __destruct()
        {
            $this->apns_client->disconnect();
        }

        /**
         * Send notification to client.
         *
         * @param Notification $notification
         *
         * @return mixed
         */
        public function sendNotification(Notification $notification)
        {
            if ($notification->getNumberOfRecipients() == 0) {
                return true;
            }

            $notification->notification->body = mb_substr($notification->data['body'], 0, 25);
            $response                         = $this->client->post(self::GCM_SEND_URL, ['headers' => ['Authorization' => 'key=' . self::FCM_API_KEY, 'Content-Type' => 'application/json'], 'body' => json_encode($notification)]);
            print_r($response);

            // APNs
            $message = new \ApnsPHP_Message();
            foreach ($notification->getIosRecipients() as $recipient) {
                try {
                    $message->addRecipient($recipient->registration_id);
                } catch (Exception $e) {

                }
            }
            $message->setText($notification->notification->title);

            // Adapt to old data structure.
            /*if (array_key_exists("Picurl", $notification->data)) {
                if (!array_key_exists("photo", $notification->data)) {
                    $notification->data["photo"] = [];
                }

                $notification->data["photo"][] = ["pic" => $notification->data["Picurl"]];
            }*/

            $data_id   = $notification->data["id"];
            $data_type = $notification->data["type"];

            $notification->data = ["id" => $data_id, "type" => $data_type];

            $message->setCustomProperty("data", $notification->data);
            $this->apns_client->add($message);
            $this->apns_client->send();

            return $response->getStatusCode() == 200;
        }
    }
