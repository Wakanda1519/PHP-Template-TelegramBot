# PHP Template TelegramBot
The template demonstrates the main functions of the models, you can modify it and do, for example, technical support for your business, a friend search service, and much more

## Requirements
- The PHP version is at least 7.2
- Hosting with the ability to execute PHP scripts
- Domain name

## How do I create a bot?
- `1` Open Telegram and find the bot @BotFather.
- `2` Send the /newbot command and follow the instructions to create a new bot
- `3` After creating the bot, you will receive an API token that will look something like this: 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11
- `4` Open a browser and navigate to the following URL, replacing YOUR_BOT_TOKEN and YOUR_DOMAIN_NAME with your data
- ```https://api.telegram.org/botYOUR_BOT_TOKEN/setWebhook?url=https://YOUR_DOMAIN_NAME/index.php```
- `5` Follow the path Source/Config.php and insert your YOUR_BOT_TOKEN
- `6` Check if it is available index.php on request https://YOUR_DOMAIN_NAME/index.php
- `7` If you have done everything correctly, write the /start command in your bot and it will respond to you

## How do models work?

### CRUD
- The CRUD (Create, Read, Update, Delete) model for interacting with JSON files is a set of operations that allow you to manage data stored in JSON format.

### TelegramApi
- The TelegramApi model is a set of methods for interacting with the Telegram API, allowing you to send, delete, and edit messages inside a Telegram chat.

## How helpers work?

### Message
- The Message helper is designed to simplify working with text messages in bots, allowing you to avoid unnecessary code clutter.

## How to add your own Models and Helpers?
- `1` Paste the code template into a new file, you need to create it using the path Source/App/Models or Helpers

```php
namespace App\Models;

class YourClass
{
    public static function YourMethod()
    {
        return "Hello World!"
    }
}
```

- `2` Connect the class to index.php

```php
require_once __DIR__ . '/Source/App/Models/YourNameFile.php';
```

- `3` Connect the class in the bot

```php
use App\Models\YourClass;
```
- `4` How do I use the module methods in the bot?
```php
YourClass::YourMethod()
```




