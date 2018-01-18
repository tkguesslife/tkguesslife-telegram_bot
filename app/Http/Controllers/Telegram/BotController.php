<?php

namespace App\Http\Controllers\Telegram;

use App\Services\CoinDeskService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotController extends Controller
{

    /**
     * @var CoinDeskService
     */
    protected $coinDeskService;

    public function __construct(CoinDeskService $coinDeskService)
    {
        $this->coinDeskService = $coinDeskService;
        $this->middleware('auth');
    }

    public function config(){


        $response = Telegram::setWebhook(['url' => 'https://76b32f91.ngrok.io/<token>/webhook']);

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        Log::info("RESPONSE $response");

        return view('telegram.bot-config', array(
            'bpi' => 'Testing'
        ));
    }

    public function testBPI(){

    }
}
