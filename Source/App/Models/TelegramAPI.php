<?php
namespace App\Models;

class TelegramAPI
{
    public function SendMessage($data, $headers = [])
    {
        // $data = [
        //     'chat_id' => ...,
        //     'text' => ...,
        //     'reply_markup' => json_encode([
        //         'inline_keyboard' => [
        //             [['text' => 'Button 1', 'callback_data' => 'data1']],
        //             [['text' => 'Button 2', 'callback_data' => 'data2']]
        //         ]
        //     ])
        // ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMessage',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers),
        ]);

        $result = curl_exec($curl);
        curl_close($curl);

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }

    public function DeleteMessage($data, $headers = [])
    {
        // $data = [
        //     'chat_id' => ...,
        //     'message_id' => ...
        // ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.telegram.org/bot' . BOT_TOKEN . '/deleteMessage',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers),
        ]);

        $result = curl_exec($curl);
        curl_close($curl);

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }

    public function EditMessage($data, $headers = [])
    {
        // $data = [
        //     'chat_id' => ...,
        //     'message_id' => ...,
        //     'text' => ...,
        //     'reply_markup' => json_encode([
        //         'inline_keyboard' => [
        //             [['text' => 'Button 1', 'callback_data' => 'data1']],
        //             [['text' => 'Button 2', 'callback_data' => 'data2']]
        //         ]
        //     ])
        // ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.telegram.org/bot' . BOT_TOKEN . '/editMessageText',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers),
        ]);

        $result = curl_exec($curl);
        curl_close($curl);

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }

}
