<?php

    namespace TAT\Backend\PushNotification;


    class Device implements \JsonSerializable {
        public $registration_id = "";
        public $device_type     = "";

        /**
         * Device constructor.
         *
         * @param string $registration_id
         * @param string $device_type android|ios
         */
        public function __construct($registration_id, $device_type) {
            $this->registration_id = $registration_id;
            $this->device_type = $device_type;
        }

        /**
         * Specify data which should be serialized to JSON
         * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return mixed data which can be serialized by <b>json_encode</b>,
         * which is a value of any type other than a resource.
         * @since 5.4.0
         */
        function jsonSerialize() {
            return $this->registration_id;
        }
    }