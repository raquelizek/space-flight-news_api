<?php

namespace App\Console\Commands;

use App\Jobs\SeedDatabase;
use Illuminate\Console\Command;

class SeedDatabaseCron extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'seed:database';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Cron para alimentar o banco de dados.';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $service = app(SeedDatabase::class);
    $service->execute();
    return 1;
  }
}
