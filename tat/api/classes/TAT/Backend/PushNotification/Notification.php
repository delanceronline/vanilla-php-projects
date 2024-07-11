<?php

    namespace TAT\Backend\PushNotification;

    use JsonSerializable;

    class Notification implements JsonSerializable {
        private $recipients              = [];
        public  $collapse_key            = NULL;
        public  $priority                = "high";
        public  $content_available       = TRUE;
        public  $delay_while_idle        = FALSE;
        public  $time_to_live            = 2419200;
        public  $restricted_package_name = NULL;
        public  $dry_run                 = FALSE;
        public  $data                    = NULL;

        /**
         * @var NotificationPayload Notification payload.
         */
        public $notification = NULL;

        /**
         * Notification constructor.
         *
         * @param Device[] $recipients
         * @param null     $data
         */
        public function __construct(Array $recipients, $data) {
            foreach ($recipients as $recipient) {
                $this->addRecipient($recipient);
            }
            $this->data = $data;
            $this->notification = new NotificationPayload();
        }


        public function addRecipient(Device $device) {
            $this->recipients[] = $device;
        }

        public function getRecipients() {
            return $this->recipients;
        }

        public function getAndroidRecipients() {
            return array_filter($this->recipients, function (Device $item) {
                return $item->device_type == "android";
            });
        }

        public function getIosRecipients() {
            return array_filter($this->recipients, function (Device $item) {
                return $item->device_type == "ios";
            });
        }

        public function getNumberOfRecipients() {
            return count($this->recipients);
        }

        protected function truncate($text, $chars = 25) {
            $text = $text . " ";
            $text = substr($text, 0, $chars);
            $text = substr($text, 0, strrpos($text, ' '));
            $text = $text . "...";

            return $text;
        }

        /**
         * Specify data which should be serialized to JSON
         * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return mixed data which can be serialized by <b>json_encode</b>,
         * which is a value of any type other than a resource.
         * @since 5.4.0
         */
        function jsonSerialize() {
            $result = [];

            $recipients = array_values($this->getAndroidRecipients());
            if (count($recipients) == 1) {
                $result["to"] = $recipients[0];
            } else {
                $result["registration_ids"] = $recipients;
            }

            if ($this->collapse_key != NULL) $result["collapse_key"] = $this->collapse_key;
            if ($this->priority != NULL) $result["priority"] = $this->priority;
            $result["delay_while_idle"] = $this->delay_while_idle;
            $result["time_to_live"] = $this->time_to_live;
            if ($this->restricted_package_name != NULL) $result["restricted_package_name"] = $this->restricted_package_name;
            $result["dry_run"] = $this->dry_run;
            $result["data"] = $this->data;
            $result["data"]["content_available"] = ($this->content_available) ? "1" : "0";

            $result["notification"] = $this->notification;
            if ($this->notification != null) {
                $this->notification->body = $this->truncate($this->notification->body, 75);
            }

            return $result;
        }
    }