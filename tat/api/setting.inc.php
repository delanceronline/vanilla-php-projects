<?php

$globalBackendLogin = 'admin';
$globalBackendPassword = 'adminpass';

$globalForgetPasswordURL = "http://tat2.easyapp.hk/rp/resetPassword.php?hash=";
$globalForgetPasswordTokenExpireTime = 1800;

$globalAWSS3FilesizeLimit = 8388608; // 8MB

$globalSMTPHost = 'smtp.sendgrid.net';
$globalSMTPUser = 'azure_3a28caf0bbdea5247ff4356ac5117e86@azure.com';
$globalSMTPPassword = '3o7K3KmARupyR20';
$globalSMTPPort = 25;
$globalWebMasterEmail = 'info@easyapp.hk';
$globalEmailFromName = 'TAT app';

$globalAWSAccessKey = 'AKIAIJHQEJK3QQU5MENA';
$globalAWSSecretKey = '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';
$globalAWSS3Bucket = 'tat-addon';

$globalUploadedImageBaseURL = 'https://d3vibt3h1fiags.cloudfront.net/uploaded/';

date_default_timezone_set('Asia/Hong_Kong');

function globalCreateThumbnail($imgSrc, $imageFilename, $imageFileType, $tmpPath)
{
    list($width, $height) = getimagesize($imgSrc);
                        
    $myImage = NULL;
    if($imageFileType == 'jpg')
        $myImage = imagecreatefromjpeg($imgSrc);
    else if($imageFileType == 'png')
        $myImage = imagecreatefrompng($imgSrc);

    if($myImage)
    {
        $biggestSide = $height;
        if($width > $height)
            $biggestSide = $width;

        $cropPercent = .5;
        $cropWidth   = $biggestSide*$cropPercent;
        $cropHeight  = $biggestSide*$cropPercent;
        $c1 = array("x"=>($width-$cropWidth)/2, "y"=>($height-$cropHeight)/2);

        $thumbSize = 256;
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
        imagecopyresampled($thumb, $myImage, 0, 0, $c1['x'], $c1['y'], $thumbSize, $thumbSize, $cropWidth, $cropHeight);

        $dest = $tmpPath.'/s-'.$imageFilename;
        if($imageFileType == 'jpg')
            imagejpeg($thumb, $dest);
        else if($imageFileType == 'png')
            imagepng($thumb, $dest);
        
        return $dest;
    }
    
    return NULL;
}