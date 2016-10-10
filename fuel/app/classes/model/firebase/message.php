<?php
namespace Model\Firebase; 

class Message extends \Model {

    public static function send($subscribe, $message) {
        $headers = array(
            "Content-Type: application/json",
             "Authorization: key=AIzaSyBqomSXkYu64qMTqdYvE874sUa2HgfSPao",
        );
        $data = array(
            'to' => $subscribe,
            'priority' =>  'high',
            'content_available' => true,
            'notification' => array(
               'body' => $message,
               'badge' => '1'
            ),
        );

        $endpoint = "https://fcm.googleapis.com/fcm/send";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$endpoint); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 

        $html = curl_exec($ch);
        $html = mb_convert_encoding($html,"UTF-8","EUC-JP");
        var_dump(curl_getinfo($ch));
        var_dump($html);
        curl_close($ch);

        return;
    }
}
