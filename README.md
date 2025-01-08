# PHP Template TelegramBot
The template demonstrates the main functions of the models, you can modify it and do, for example, technical support for your business, a friend search service, and much more

## Requirements
- The PHP version is at least 7.4
- Hosting with the ability to execute PHP scripts
- Domain name

## How do I create a bot?
- `1` Open Telegram and find the bot @BotFather.
- `2` Send the /newbot command and follow the instructions to create a new bot
- `3` After creating the bot, you will receive an API token that will look something like this: 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11
- `4` Open a browser and navigate to the following URL, replacing YOUR_BOT_TOKEN and YOUR_DOMAIN_NAIM with your data
- ```https://api.telegram.org/botYOUR_BOT_TOKEN/setWebhook?url=YOUR_DOMAIN_NAIM/index.php```
- `5` Follow the path Source/Config.php and insert your YOUR_BOT_TOKEN
- `6` Check if it is available index.php on request YOUR_DOMAIN_NAIM/index.php
- `7` If you have done everything correctly, write the /start command in your bot


