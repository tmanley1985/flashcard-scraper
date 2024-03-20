<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\FlashcardStorageInterface;
use App\Actions\StoreFlashcards;

class FlashcardStorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FlashcardStorageInterface::class, StoreFlashcards::class);
    }
}
