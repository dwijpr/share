<?php

namespace ShareApp\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Logout' => [
            'ShareApp\Listeners\LogSuccessfulLogout',
        ],
        'Illuminate\Auth\Events\Attempting' => [
            'ShareApp\Listeners\LogAuthenticationAttempt',
        ],
        'Illuminate\Auth\Events\Login' => [
            'ShareApp\Listeners\LogSuccessfulLogin',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
