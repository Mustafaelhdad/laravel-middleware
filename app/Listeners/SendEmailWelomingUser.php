<?php

namespace App\Listeners;

use App\Events\WelcomeUser;
use App\Mail\AnotherMarkDown;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailWelomingUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WelcomeUser $event): void
    {
        Mail::to($event->user->email)->send(new AnotherMarkDown($event->user));
    }
}
