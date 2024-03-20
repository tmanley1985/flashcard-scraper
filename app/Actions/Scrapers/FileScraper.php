<?php

namespace App\Actions\Scrapers;

use App\Contracts\ScrapeableInterface;

final class FileScraper implements ScrapeableInterface
{
    public function execute(string $source)
    {
        return [
            [
                'question' => 'What color is an apple?',
                'answer'   => 'Red',
            ],
            [
                'question' => 'What color is a banana?',
                'answer'   => 'Yellow',
            ],
        ];
    }
}
