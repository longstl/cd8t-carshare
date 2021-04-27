<?php

use Illuminate\Http\Request;
use LaravelFCM\Facades\FCMGroup;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\Topics;

function lib_assets($path)
{
    return asset('libs/' . $path);
}

function getDistance($start, $end)
{
    $obj = json_decode(\GoogleMaps::load('distancematrix')->setParam([
        'origins' => $start,
        'destinations' => $end,
        'key' => env('GOOGLE_MAP_API_KEY'),
        'units' => 'metric'
    ])->get(), true);
    return $obj['rows'][0]['elements'][0];
}

function getInfoGeoMap($address)
{
    return \GoogleMaps::load('geocoding')->setParam([
        'address' => $address,
        'key' => env('GOOGLE_MAP_API_KEY')
    ])->get();
}

function addMinutes($original, $added_minutes)
{
    try {
        $time = new DateTime($original);
        $time->modify('+' . ceil($added_minutes) . ' minutes');
        return $time->format('Y-m-d H:i:s');
    } catch (\Exception $e) {
    }
}

function convertToHoursMins($time)
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    if ($hours) {
        return $hours . ' hrs ' . $minutes . ' mins';
    } else {
        return $minutes . ' mins';
    }
}

function convertMetersToText($distance)
{
    if ($distance < 1000) {
        return $distance . ' m';
    } else {
        return number_format($distance / 1000, 1) . ' km';
    }
}

function getPriceRate()
{
    return 1;
}

function sendMessageToMultipleDevices($title, $content, $tokens)
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($title);
    $notificationBuilder->setBody($content)
        ->setSound('default');

    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData(['a_data' => 'my_data']);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

    $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

// return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

// return Array (key : oldToken, value : new token - you must change the token in your database)
    $downstreamResponse->tokensToModify();

// return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

// return Array (key:token, value:error) - in production you should remove from your database the tokens present in this array
    $downstreamResponse->tokensWithError();

function emailForm()
{
    $html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Safe Carz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style type="text/css">
        a[x-apple-data-detectors] {
            color: inherit !important;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border-collapse: collapse">
                <tr>
                    <td bgcolor="#ffffff" style="padding: 0 30px">
                        <div style="padding: 20px 0">
                            <img src="https://res.cloudinary.com/quando213/image/upload/co_rgb:777777,e_colorize:100/v1612322008/gatgatexpress/logo-v1_pcwylv.png"
                                 alt="Safe Carz" width="150" style="display: block;"/>
                        </div>
                        <div style="padding: 40px 0 20px">
<table border="0" cellpadding="0" cellspacing="0" width="100%"
       style="border-collapse: collapse;">
    <tr>
        <td style="color: #23366f; font-family: Arial, sans-serif;">
            <h1 style="font-size: 32px; margin: 0 0 15px; font-weight: 400;">Welcome to Safe Carz!</h1>
        </td>
    </tr>
    <tr>
        <td style="color: #23366f; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
            <p style="margin: 0;">Dear <%= user.firstName%> <%= user.lastName %>,</p>
            <p>Your email address has been registered to create a Safe Carz account. You can now sign in and start
                getting your auto insurance quotes.</p>
            <a type="button" href="http://localhost:8888/"
               style="padding: 16px 24px; margin: 10px 0; background-color: #23366f; color: white; font-size: 1rem; border: none; border-radius: 30px; text-decoration: none; display: inline-block;">Visit
                Safe Carz</a>
            <p>Sincerely,<br>Safe Carz Team</p>
        </td>
    </tr>
    <tr>
    </tr>
</table>
</div>
<hr>
<div style="padding: 20px 0">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
           style="border-collapse: collapse;">
        <tr>
            <td style="color: #777777; font-family: Arial, sans-serif; font-size: 12px;">
                <p>© Safe Carz. All rights reserved.</p>
            </td>
            <td align="right">
                <table border="0" cellpadding="0" cellspacing="0"
                       style="border-collapse: collapse;">
                    <tr>
                        <td>
                            <a href="http://www.twitter.com/">
                                <img src="https://res.cloudinary.com/quando213/image/upload/co_rgb:777777,e_colorize:100/v1613717120/safecarz/icons/twitter-brands_nyackk.png" alt="Twitter"
                                     width="15" height="15" style="display: block;" border="0"/>
                            </a>
                        </td>
                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                        <td>
                            <a href="http://www.linkedin.com/">
                                <img src="https://res.cloudinary.com/quando213/image/upload/co_rgb:777777,e_colorize:100/v1613717120/safecarz/icons/linkedin-in-brands_hhwn8v.png" alt="LinkedIn"
                                     width="15" height="15" style="display: block;" border="0"/>
                            </a>
                        </td>
                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                        <td>
                            <a href="http://www.facebook.com/">
                                <img src="https://res.cloudinary.com/quando213/image/upload/co_rgb:777777,e_colorize:100/v1613717120/safecarz/icons/facebook-f-brands_kuc1l2.png" alt="LinkedIn"
                                     width="15" height="15" style="display: block;" border="0"/>
                            </a>
                        </td>
                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                        <td>
                            <a href="http://www.instagram.com/">
                                <img src="https://res.cloudinary.com/quando213/image/upload/co_rgb:777777,e_colorize:100/v1613717120/safecarz/icons/instagram-brands_dmsnmd.png" alt="LinkedIn"
                                     width="15" height="15" style="display: block;" border="0"/>
                            </a>
                        </td>
                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                        <td>
                            <a href="http://www.youtube.com/">
                                <img src="https://res.cloudinary.com/quando213/image/upload/co_rgb:777777,e_colorize:100/v1613717120/safecarz/icons/youtube-brands_f5nuwv.png" alt="LinkedIn"
                                     width="15" height="15" style="display: block;" border="0"/>
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>';
    return $html;
}
