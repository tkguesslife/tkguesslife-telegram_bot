<?php

namespace App\Commands;

use App\Services\CoinDeskService;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class BPICommand
 * @package App\Commands
 * @author Tiko Banyini
 */
class BPICommand extends Command
{

    /**
     * @var string Command Name
     */
    protected $name = "getBTCEquivalent";

    /**
     * @var string Command description
     */
    protected $description = "Command to get you bit coin equivalent Currency value";

    /**
     * @var CoinDeskService
     */
    protected $coinDeskService;

    /**
     * BPICommand constructor.
     */
    public function __construct()
    {
        $container = app();
        $this->coinDeskService =  $container->make(CoinDeskService::class);
    }

    /**
     * @param $arguments
     */
    public function handle($arguments)
    {

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $currency = 'USD';
        if(is_array($arrArgs = $this->validateArgs($arguments))){
            $this->replyWithMessage(['text' => 'Determining bit coin equivalent value ']);
            $response =  $this->coinDeskService ->convertToCurrency($arrArgs['amount'], $arrArgs['currency']);
            // Reply with the commands list
            $this->replyWithMessage(['text' => $response]);
        }else{
            $this->replyWithMessage(['text' => "Invalid request. Please try again with correct format e.g: "]);
            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithMessage(['text' => '/'.$this->name. ' 300 USD']);
        }

    }

    /**
     * Validate user input and return array on success
     * @param $arguments
     * @return array|bool
     */
    private function validateArgs($arguments){
        $arrArgs = explode(' ',$arguments);
        if(count($arrArgs) <1 || !is_numeric($arrArgs[0])){
            return false; //amount not provided
        }

        if(isset($arrArgs[1]) && !in_array(strtoupper($arrArgs[1]), array('USD', 'GBP', 'EUR'))){
            return false; //unrecognised currency
        }

        return array(
            'amount' => $arrArgs[0],
            'currency' => (isset($arrArgs[1]) ? $arrArgs[1] : 'USD')
        );
    }
}