<?php
namespace App\BotCommands;

use App\Entity\UserFactory;
use Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 25.05.2016
 * Time: 01:07
 */

class NameCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "name";

    /**
     * @var string Command Description
     */
    protected $description = "Ändere deinen Namen";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {

        $update = $this->getUpdate();

        $user = UserFactory::create($update->getMessage()->getFrom()->getId());

        $oldname = $user->getName();
        if(!$oldname) {
            $oldname = $update->getMessage()->getFrom()->getFirstName();
        }

        //TODO validate agrumentinput
        $newname = !$arguments ? $update->getMessage()->getFrom()->getFirstName() : $arguments;
        \Log::error('newname '. $newname);
        $user->setName($newname);


        if($oldname!=$newname) {
            //Name change
            $this->replyWithChatAction(['action' => Actions::TYPING]);

            if($update->getMessage()->getChat()->getType() == 'private') {
                $message = 'Du heißt jetzt ';
            } else {
                $message = $oldname.' heißt jetzt ';
            }

            $message .= $user->getName();

            // Reply with the commands list
            $this->replyWithMessage(['text' => $message]);
        }

    }
}