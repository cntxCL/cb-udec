<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Log;

class LoginListener
{
    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(Login $event)
    {
        print_r($event);
        exit(1);

        $log = Log::create([
            'descripcion' => 'logged in',
            'user_id' => $event->user->id,
        ]);
    }
}
