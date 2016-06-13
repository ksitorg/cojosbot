<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




$prefix = '/cojosbot';

Route::get($prefix.'/', function () {
    return view('welcome');
});



// Example of POST Route:
Route::post($prefix.'/'.'226204927:AAGI6oInXqlJKbQO2E5-KBODHgcl2lbEvhI'.'/webhook', function () {
	
 	Log::error("Webhook");
    Telegram::addCommands([
        Telegram\Bot\Commands\HelpCommand::class,
        App\BotCommands\StartCommand::class
    ]);

    $update = Telegram::commandsHandler(true);

    // Commands handler method returns an Update object.
    // So you can further process $update object
    // to however you want.



    $updates = Telegram::getWebhookUpdates();

    return 'ok';
});


Route::get($prefix.'/'.'getme', function () {
    $response = Telegram::getMe();

    $botId = $response->getId();
    $firstName = $response->getFirstName();
    $username = $response->getUsername();

    return view('vendor.getme');
});

Route::get($prefix.'/'.'sethook', function () {

    // Or if you are supplying a self-signed-certificate
    $response = Telegram::setWebhook([

        'url' => 'https://h2576776.stratoserver.net/cojosbot/'.'226204927:AAGI6oInXqlJKbQO2E5-KBODHgcl2lbEvhI'.'/webhook',
    ]);

    return $response->getHttpStatusCode().$response->getBody();
});

Route::get($prefix.'/'.'deletehook', function () {

    // Or if you are supplying a self-signed-certificate
    $response = Telegram::removeWebhook();

    return $response->getBody();
});

Route::get($prefix.'/'.'updates', function () {

    Telegram::addCommands([
        Telegram\Bot\Commands\HelpCommand::class,
        App\BotCommands\StartCommand::class,
        App\BotCommands\PenisCommand::class,
    ]);

    $update = Telegram::commandsHandler(true);

    $response = Telegram::getUpdates();
    return $response;
});