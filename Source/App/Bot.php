<?php
namespace App;

use App\Models\TelegramAPI;
use App\Models\CRUD;
use App\Helpers\Message;

class Bot
{
    public $data;
    private $api;
    private $crud;

    public function __construct()
    {
        $this->api = new TelegramAPI();
        $this->crud = new CRUD();
    }

    public function Controller()
    {
        $id = $this->data['id']; // ID чата/пользователя
        $msg_id = $this->data['message_id']; // ID сообщения
        $msg = $this->data['message']; // Cообщение
        $name = $this->data['first_name']; // Имя пользователя

        switch ($msg)
        {
            case '/start':

                // Удаляет отправленное сообщение
                $this->api->DeleteMessage([
                    'chat_id' => $id,
                    'message_id' => $msg_id
                ]);

                // Регистрация пользователя
                if (!$search_user) 
                {
                    $array = [
                        'id' => $id,
                        'first_name' => $name
                    ];

                    $this->crud->Add($array, 'Database/Users.json');
                }

                // Отправляет заготовленное сообщение
                $this->api->SendMessage(array_merge(Message::Welcome($id, $name)));

                break;

            case '/button':

                // Отправляем сообщение, указав данные в массиве
                $this->api->EditMessage(array_merge([
                    'chat_id' => $id,
                    'text' => 'Вы нажали на кнопочку и текст красиво изменился 🥹'
                ], 
                [
                    'message_id' => $msg_id
                ]));

                break;

            default:

                // Удаляет сообщения, если они не равны кейсам
                $this->api->DeleteMessage([
                    'chat_id' => $id,
                    'message_id' => $msg_id
                ]);

                break;
                
        }

        return;
    }
}
