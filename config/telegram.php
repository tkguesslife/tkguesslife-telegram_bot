<?php

return [

    'bot_token' => '523467400:AAHZbWW4XuuZnjoC3cT6vXSPpPF2YN_ENHs',

    'web_hook_url' => env('WEB_HOOK_URL', 'https://7bb0fb68.ngrok.io'),
    'async_requests' => false,
    'commands' => [
        App\Commands\StartCommand::class,
        App\Commands\BPICommand::class,
        App\Commands\GetUserIdCommand::class
        ]
];