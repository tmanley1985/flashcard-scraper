<?php

namespace App\Actions;

use App\Contracts\FlashcardStorageInterface;

final class StoreFlashcards implements FlashcardStorageInterface
{
    public function execute(array $flashcards, string $storageDestination)
    {
        dd($storageDestination);
    }
}
