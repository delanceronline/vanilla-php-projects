<?php

    namespace TAT\Backend\PushNotification;

    /**
     * Class NotificationPayload
     * @link    https://developers.google.com/cloud-messaging/http-server-ref#notification-payload-support
     * @package App\PushNotification
     */
    class NotificationPayload {
        /**
         * @var string Indicates notification title. This field is not visible on iOS phones and tablets.
         */
        public $title = NULL;

        /**
         * @var string Indicates notification body text.
         */
        public $body = NULL;

        /**
         * @var string Indicates notification icon. On Android: sets value to myicon for drawable resource myicon.
         */
        public $icon = "noti";

        /**
         * @var string Indicates a sound to play when the device receives the notification. Supports default, or the
         *      filename of a sound resource bundled in the app. Android sound files must reside in /res/raw/, while
         *      iOS sound files can be in the main bundle of the client app or in the Library/Sounds folder of the
         *      app’s data container. See the iOS Developer Library for more information.
         */
        public $sound = "default";

        /**
         * @var string Indicates the badge on client app home icon.
         */
        public $badge = NULL;

        /**
         * @var string Indicates whether each notification message results in a new entry on the notification center on
         *      Android. If not set, each request creates a new notification. If set, and a notification with the same
         *      tag is already being shown, the new notification replaces the existing one in notification center.
         */
        public $tag = NULL;

        /**
         * @var string Indicates color of the icon, expressed in #rrggbb format
         */
        public $color = NULL;

        /**
         * @var string The action associated with a user click on the notification. On Android, if this is set, an
         *      activity with a matching intent filter is launched when user clicks the notification. If set on iOS,
         *      corresponds to category in APNS payload.
         */
        public $click_action = NULL;

        /**
         * @var string Indicates the key to the body string for localization. On iOS, this corresponds to "loc-key" in
         *      APNS payload. On Android, use the key in the app's string resources when populating this value.
         */
        public $body_loc_key = NULL;

        /**
         * @var string Indicates the string value to replace format specifiers in body string for localization. On iOS,
         *      this corresponds to "loc-args" in APNS payload. On Android, these are the format arguments for the
         *      string resource. For more information, see Formatting strings.
         */
        public $body_loc_args = NULL;

        /**
         * @var string Indicates the key to the title string for localization. On iOS, this corresponds to
         *      "title-loc-key" in APNS payload. On Android, use the key in the app's string resources when populating
         *      this value.
         */
        public $title_loc_key = NULL;

        /**
         * @var string Indicates the string value to replace format specifiers in title string for localization. On
         *      iOS, this corresponds to "title-loc-args" in APNS payload. On Android, these are the format arguments
         *      for the string resource. For more information, see Formatting strings.
         */
        public $title_loc_args = NULL;

        /**
         * NotificationPayload constructor.
         *
         * @param string $title
         * @param string $body
         */
        public function __construct() {
        }


    }