<?php
namespace App\BotCommands;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 25.05.2016
 * Time: 01:07
 */

class TestCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "test";

    /**
     * @var string Command Description
     */
    protected $description = "Argumente";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $argument_array = explode(' ',$arguments);

        foreach ($argument_array as $key => $value) {
            $this->replyWithMessage(['text' => 'Argument '.$key.': '.$value]);

        }
        $update = $this->getUpdate()->getMessage();

        \Log::error("Telegram" . $update);
        // Trigger another command dynamically from within this command
        // When you want to chain multiple commands within one or process the request further.
        // The method supports second parameter arguments which you can optionally pass, By default
        // it'll pass the same arguments that are received for this command originally.
        //$this->triggerCommand('subscribe');
    }
}