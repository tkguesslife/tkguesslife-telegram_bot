<?php

namespace App\Http\Controllers\Telegram;

use App\Services\CoinDeskService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

/**
 * Class BotController
 * @package App\Http\Controllers\Telegram
 * @author Tiko Banyini
 */
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

    /**
     * Display telegram bot config form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function config(){
        Log::info("BotController config()");

        if(is_object($user = Auth::user())) {
            Log::info("We have loggedin user");


            return view('telegram.bot-config', array(
                'userBotConfig' => $user->UserBotConfig()
            ));
        }
    }

    /**
     * Handle form submit and save the configurations
     */
    public function update(){
        Log::info("BotController update()");
        //TODO: Save the configurations
    }

    /**
     * Set Webhoot URL for Telegram bot
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setWebhook(){
        Log::info("BotController setWebhook()");
        $url = config('telegram.web_hook_url');

        $response = Telegram::setWebhook(['url' => $url.'/<token>/webhook']);

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        Log::info("RESPONSE $response");

        return view('telegram.set-webhook', array(
            'url' => $url
        ));
    }
}
