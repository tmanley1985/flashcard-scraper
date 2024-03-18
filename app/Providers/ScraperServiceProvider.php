<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ScrapeableInterface;
use App\Services\Scrapers\FileScraper;

class ScraperServiceProvider extends ServiceProvider
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
        $this->app->bind(ScrapeableInterface::class, function ($app) {
            // Fetch the custom scraper class from the application's configuration
            // Default to FileScraper if none is specified
            $scraperClass = config('scraping.driver', FileScraper::class);

            // Make sure the custom scraper class implements the ScrapeableInterface interface
            if (!in_array(ScrapeableInterface::class, class_implements($scraperClass))) {
                throw new \Exception("The custom scraper class must implement the Scrapeable interface.");
            }

            return new $scraperClass();
        });
    }
}
