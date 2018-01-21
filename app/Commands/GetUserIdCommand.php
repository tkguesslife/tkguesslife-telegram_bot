<?php


namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class GetUserIdCommand
 * @package App\Commands
 * @author Tiko Banyini
 */
class GetUserIdCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "getUserID";

    /**
     * @var string Command description
     */
    protected $description = "Command to get you user ID";

    /**
     * @param $arguments
     */
    public function handle($arguments)
    {

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => '1']);


    }

}