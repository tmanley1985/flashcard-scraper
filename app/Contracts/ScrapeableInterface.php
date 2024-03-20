<?php

namespace App\Contracts;


interface ScrapeableInterface {
    public function execute(string $source);
}