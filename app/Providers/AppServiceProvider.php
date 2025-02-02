<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination');
        View::share('year', date('Y'));
         // Store user_id in sessions table when a user logs in
    Event::listen(Login::class, function ($event) {
        DB::table('sessions')
            ->where('id', Session::getId()) // Get the current session ID
            ->update(['user_id' => $event->user->id]); // Store user_id
    });
    }
}
