<?php
namespace App\BotCommands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 25.05.2016
 * Time: 01:07
 */

class PenisCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "penis";

    /**
     * @var string Command Description
     */
    protected $description = "Wie groß ist dein Penis?";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $pinto_sitze = rand(1,88);
        $this->replyWithMessage(['text' => 'Dein Pinto ist '.$pinto_sitze.'cm groß.']);
        
        // Trigger another command dynamically from within this command
        // When you want to chain multiple commands within one or process the request further.
        // The method supports second parameter arguments which you can optionally pass, By default
        // it'll pass the same arguments that are received for this command originally.
        $this->triggerCommand('subscribe');
    }
}