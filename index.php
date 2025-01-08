<?php
// Подключение комппонентов
require_once __DIR__ . '/Source/Config.php';
require_once __DIR__ . '/Source/App/Bot.php';
require_once __DIR__ . '/Source/App/Models/TelegramAPI.php';
require_once __DIR__ . '/Source/App/Models/CRUD.php';
require_once __DIR__ . '/Source/App/Helpers/Message.php';

use App\Bot;

// Получение входных данных
$msg = json_decode(file_get_contents('php://input'), true);
file_put_contents('debug.txt', print_r($msg, true), FILE_APPEND);

// Обработка входных данных
switch (true) {
    case isset($msg['callback_query']):
        $array = [
            'id' => $msg['callback_query']['from']['id'],
            'message_id' => $msg['callback_query']['message']['message_id'],
            'message' => $msg['callback_query']['data'],
            'first_name' => $msg['callback_query']['from']['first_name']
        ];
        break;

    case isset($msg['message']):
        $array = [
            'id' => $msg['message']['from']['id'],
            'message_id' => $msg['message']['message_id'],
            'message' => $msg['message']['text'],
            'first_name' => $msg['message']['from']['first_name']
        ];
        break;
        
    default:
        exit();
}

// Создание контроллера, обработка сообщения
$bot = new Bot();
$bot->data = $array;
$bot->Controller();

exit();
