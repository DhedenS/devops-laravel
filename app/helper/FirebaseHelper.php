<?php

namespace App\helper;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseHelper{

    public static function sendFCMNotification(){
        $notification = Notification::create('Hello There','This is a topic');
        $messaging = self::messaging();

        $message = CloudMessage::new()
        ->withNotification($notification)
        ->withData(['action'=>'open_news'])
        ->toTopic('news');

        $result = $messaging->send($message);
        return response()->json(["message"=>$result]);
    }

    private static function messaging(){
            return (new Factory)->withServiceAccount(config('services.firebase.credentials'))->createMessaging();
    }
}
