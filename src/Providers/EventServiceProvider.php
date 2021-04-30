<?php

namespace Vtlabs\PHP_ROUND_HALF_EVEN\Providers;

use Vtlabs\Payment\Events\PaymentUpdated;
use Rennokki\Plans\Listener\PaymentUpdatedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PaymentUpdated::class => [PaymentUpdatedListener::class]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
