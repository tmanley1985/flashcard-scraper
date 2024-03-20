<?php

namespace App\Contracts;

interface FlashcardStorageInterface
{
    public function execute(array $flashcards, string $storageDestination);
}