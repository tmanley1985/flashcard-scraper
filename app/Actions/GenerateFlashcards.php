<?php

namespace App\Actions;

use App\Contracts\FlashcardStorageInterface;
use App\Contracts\ScrapeableInterface;

final class GenerateFlashcards
{
    private ScrapeableInterface $scraper;
    private FlashcardStorageInterface $storeFlashcards;

    public function __construct(ScrapeableInterface $scraper, FlashcardStorageInterface $storeFlashcards) {
        $this->scraper = $scraper;
        $this->storeFlashcards = $storeFlashcards;
    }

    public function execute(string $source, string $storageDestination)
    {
        $flashcards = $this->scraper->execute($source);

        $this->storeFlashcards->execute(flashcards: $flashcards, storageDestination: $storageDestination);
    }
}
