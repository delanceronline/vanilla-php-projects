<?php
    namespace TAT\Backend;

    include_once '../../../setting.inc.php';
    require_once '../../../S3/S3.php';

    class S3ImageUploader {
        const FILE_SIZE_LIMIT         = 8388608;
        const AWS_ACCESS_KEY          = 'AKIAIJHQEJK3QQU5MENA';
        const AWS_SECRET_KEY          = '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';
        const AWS_S3_BUCKET           = 'tat-addon';
        const UPLOADED_IMAGE_BASE_URL = 'https://d3vibt3h1fiags.cloudfront.net/uploaded/';

        /**
         * Upload image to S3.
         *
         * @param [] $file
         * @param string $filename Specify the new file name.
         *
         * @return string Image URL including domain.
         */
        public static function upload_image($file, $filename = "") {
            if (is_null($file)) {
                return "";
            }

            if ($file['size'] > self::FILE_SIZE_LIMIT || $file['size'] <= 0) {
                return "";
            }

            $s3 = new S3(self::AWS_ACCESS_KEY, self::AWS_SECRET_KEY);

            $target_file = basename($file["name"]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($filename == "") {
                $imageFilename = sprintf("%s.%s", uniqid("", true), $imageFileType);
            } else {
                $imageFilename = $filename;
            }

            if (!$s3->putObject($s3->inputFile($file["tmp_name"], false), self::AWS_S3_BUCKET, 'uploaded/' . $imageFilename, S3::ACL_PUBLIC_READ))
                return "";

            return $imageFilename;
        }
    }