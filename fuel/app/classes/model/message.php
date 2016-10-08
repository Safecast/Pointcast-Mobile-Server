<?php
namespace Firebase\Message; 

class Message extends \Model {

    public static function send($subscribe, $message) {
        $headers = array(
          "Authorization: key=AIzaSyBqomSXkYu64qMTqdYvE874sUa2HgfSPao",
          "Content-Type: application/json",
        );
        $data = array(
          "to" => "/topics/all",
          "priority" => "high",
          "content_available" => true,
          "notification" => "{body: 'お知らせ', badge: '1'}",
        );

        $endpoint = "https://fcm.googleapis.com/fcm/send";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $html = curl_exec($ch);
        $html = mb_convert_encoding($html,"UTF-8","EUC-JP");
        var_dump($html);
        curl_close($ch);

        return;
    }
}