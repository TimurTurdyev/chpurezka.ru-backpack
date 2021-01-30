<?php

namespace App\Providers;

use App\Models\Attribute;
use App\Models\Detail;
use App\Models\Filter;
use App\Observers\AttributeObserver;
use App\Observers\DetailObserver;
use App\Observers\FilterObserve;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Detail::observe(DetailObserver::class);
        Filter::observe(FilterObserve::class);
        Attribute::observe(AttributeObserver::class);
    }
}
