<?php
namespace App\BotCommands;

use App\Entity\UserFactory;
use Illuminate\Support\Facades\Log;
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
    protected $description = "Ich sag dir wie groß dein Penis ist.";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $update = $this->getUpdate();

        $user = UserFactory::create($update->getMessage()->getFrom()->getId());

        $pinto_size = $user->getPintoSize();
        if(!$pinto_size || $arguments=='reset') {
            $pinto_size = rand(0, 10) / 10;
            $pinto_size += rand(1.0,88);
            $user->setPintoSize($pinto_size);
        }
        
        if ($update->getMessage()->getChat()->getType() == 'private') {
            $message = 'Dein Pinto ist ';
        } else {
            $message = $user->getName() . '\'s Pinto ist ';
        }

        $message .= $pinto_size.'cm groß.';

        $this->replyWithMessage(['text' => $message]);

        // Trigger another command dynamically from within this command
        // When you want to chain multiple commands within one or process the request further.
        // The method supports second parameter arguments which you can optionally pass, By default
        // it'll pass the same arguments that are received for this command originally.
        //$this->triggerCommand('subscribe');
    }
}