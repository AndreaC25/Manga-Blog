<?php

namespace App\Providers;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;


class FortifyServiceProvider extends ServiceProvider  
 {
      public function register(): void
      {
          //
      }

      public function boot(): void
      {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::loginView(fn () => view("auth.login"));
        Fortify::registerView(fn () => view("auth.register"));

        RateLimiter::for("login", function(Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });
    }
}    