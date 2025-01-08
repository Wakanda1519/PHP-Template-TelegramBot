<?php
namespace App\Helpers;

class Message
{
    public static function Welcome($id, $name)
    {
        $msg = "Добро пожаловать, ".$name." ✋\n\n" .
        "Этот текст придумали пещерные люди для тебя.";

        return [
            'chat_id' => $id,
            'text' => $msg,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => 'Нажми на меня', 'callback_data' => '/button']]
                ]
            ])
        ];
    }
}
