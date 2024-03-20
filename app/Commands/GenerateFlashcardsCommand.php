<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Actions\GenerateFlashcards;


class GenerateFlashcardsCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'generate:flashcards {source : The source input, such as a file path or S3 bucket where the flashcard content is stored}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Generate flashcards from the specified source';

    private $generateFlashcards;

    public function __construct(GenerateFlashcards $generateFlashcards)
    {
        parent::__construct();
        $this->generateFlashcards = $generateFlashcards;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Use ScrapeableInterface to get the contents of the file.

        // Create a new file per file you find with the questions/answers
        // this could be a php file that has an associative array in it.
        // It's possible you may allow them to specify a certain file type and
        // have a driver for that.

        // Then work on a way to show those questions/answers

        $source = $this->argument('source');
        
        //TODO: Create a strategy for this.

        $this->generateFlashcards->execute($source);
        
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
