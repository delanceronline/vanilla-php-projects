<?php

    include_once 'setting.inc.php';

    $email = '';
    if (isset($_REQUEST['email']))
        $email = $_REQUEST['email'];

    header('Content-Type: application/json');
    $output = [];
    $output['result'] = false;
    $output['code'] = 'undefined';

    if ($email != '') {
        require_once './vendor/autoload.php';
        require_once './generated-conf/config.php';

        $user = \TAT\Backend\MembersQuery::create()->findOneByEmail($email);
        if ($user) {
            $existingToken = \TAT\Backend\ForgetpasstokenQuery::create()->filterByCreationtime(array('min' => time() - 60))->findOneByMemberid($user->getId());
            if ($existingToken) {
                $output['code'] = 'pr-e3';
            } else {
                $hash = md5(time() . $email);

                // send email
                $url = $globalForgetPasswordURL . $hash;
                $body = '<p>Dear member,</p><p>Please click <a href="' . $url . '">here</a> to reset your password. It will be valid within 30 minutes.</p><p>Thanks for using and supports!</p><p>TAT Team</p>';
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = $globalSMTPHost;

                $mail->Port = $globalSMTPPort;

                $mail->Username = $globalSMTPUser;
                $mail->Password = $globalSMTPPassword;

                $webmaster_email = $globalWebMasterEmail;
                $mail->From = $webmaster_email;

                $mail->FromName = $globalEmailFromName;
                $mail->addAddress($email, $globalEmailFromName);
                $mail->addReplyTo($webmaster_email, $globalEmailFromName);
                $mail->WordWrap = 50;
                $mail->isHTML(true);
                $mail->Subject = "Reset Your TAT app password.";
                $mail->Body = $body;
                $mail->AltBody = $body;
                if (!$mail->send()) {
                    $output['code'] = 'pr-e4';
                } else {
                    $output['result'] = true;

                    $token = new \TAT\Backend\Forgetpasstoken();

                    $token->setMemberid($user->getId());
                    $token->setToken($hash);
                    $token->save();
                }
            }
        } else
            $output['code'] = 'pr-e2';
    } else
        $output['code'] = 'pr-e1';

    /*
     * pr-e1: email field is empty
     * pr-e2: email provided is not associated with any accounts
     * pr-e3: request too frequent
     * pr-e4: email sending issue
     */

    echo json_encode($output);