#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use Longman\TelegramBot\Request;

$bot_api_key  = '1368300873:AAFfzw7Gg_dI59TAUHfPhmcW7TwWBTRyJIw';
$bot_username = 'InviteMyChatMakerBot';

$mysql_credentials = [
   'host'     => 'localhost',
   'port'     => 3306, // optional
   'user'     => 'root',
   'password' => 'root',
   'database' => 'joinchatmakerbot',
];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Enable MySQL
   $telegram->enableMySql($mysql_credentials);
   // $telegram->useGetUpdatesWithoutDatabase();
    // Handle telegram getUpdates request
    echo $telegram->handleGetUpdates();

    $result = Request::sendMessage([
      'chat_id'=>'834366230',
      'text' => 'Your utf8 text 😜 ...',
    ]);


    echo $result;

} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}

