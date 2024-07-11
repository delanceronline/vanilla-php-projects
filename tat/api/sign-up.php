<?php

    $email = '';
    if (isset($_REQUEST['email']))
        $email = strtolower($_REQUEST['email']);

    $password = '';
    if (isset($_REQUEST['password']))
        $password = $_REQUEST['password'];

    $contact = '';
    if (isset($_REQUEST['contact']))
        $contact = $_REQUEST['contact'];

    $name = '';
    if (isset($_REQUEST['name']))
        $name = $_REQUEST['name'];

    $birthday = '';
    if (isset($_REQUEST['birthday']))
        $birthday = $_REQUEST['birthday'];

    header('Content-Type: application/json');
    $output = [];
    $output['result'] = false;
    $output['code'] = 'undefined';

    if ($email != '' && filter_var($email, FILTER_VALIDATE_EMAIL) && $password != '') {
        include_once 'setting.inc.php';
        require_once './vendor/autoload.php';
        require_once './generated-conf/config.php';
        require_once './S3/S3.php';

        $member = \TAT\Backend\MembersQuery::create()->filterByEmail($email)->findOne();
        if ($member) {
            $output['code'] = 'su-e2';
        } else {
            $profileImageFilename = '';
            if (isset($_FILES['profileImage']) && $_FILES['profileImage']['size'] <= $globalAWSS3FilesizeLimit) {
                $target_file = basename($_FILES["profileImage"]["name"]);
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $profileImageFilename = time() . '-' . rand(0, 9999) . '.' . $imageFileType;

                $s3 = new S3($globalAWSAccessKey, $globalAWSSecretKey);
                if (!$s3->putObject($s3->inputFile($_FILES["profileImage"]["tmp_name"], false), $globalAWSS3Bucket, 'uploaded/' . $profileImageFilename, S3::ACL_PUBLIC_READ))
                    $profileImageFilename = '';
            }

            $newMember = new \TAT\Backend\Members();
            $newMember->setEmail($email);
            $newMember->setPassword($password);
            $newMember->setName($name);
            $newMember->setContact($contact);
            $newMember->setBirthday($birthday);
            $newMember->setPicurl($profileImageFilename);

            if ($newMember->save()) {
                $output['result'] = true;
                $output['member'] = $newMember->toArray();
            } else
                $output['code'] = 'su-e3';
        }
    } else
        $output['code'] = 'su-e1';

    /*
     * su-e1: invalid parameter(s)
     * su-e2: member already exists
     * su-e3: failed to add a new user record
     */

    echo json_encode($output);