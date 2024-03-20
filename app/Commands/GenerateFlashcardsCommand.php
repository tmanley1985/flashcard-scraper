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
    protected $signature = 'generate:flashcards
                        {--source= : The source from which to generate flashcards}
                        {--storage-dir= : The directory where flashcards should be stored}';


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
        $source = $this->option('source');
        $storageDir = $this->option('storage-dir');
    
        // We have to manually validate these optional params, but since source and storage-dir
        // are positional, I don't want someone getting confused and swap them accidentally.
        if (is_null($source) || is_null($storageDir)) {
            $this->error('The --source and --storage-dir options are required.');
            return;
        }

        // TODO: This should probably be a role that knows how to store flashcards
        // anywhere including S3, a database, etc.
        $storageFile = $storageDir . DIRECTORY_SEPARATOR . 'flashcards.php';

        $this->generateFlashcards->execute(source: $source, storageDestination: $storageFile);
        
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
