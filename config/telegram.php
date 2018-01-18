<?php

return [

    'bot_token' => '523467400:AAHZbWW4XuuZnjoC3cT6vXSPpPF2YN_ENHs',
    'async_requests' => false,
    'commands' => [
        App\Commands\StartCommand::class,
        App\Commands\BPICommand::class
        ]
];