<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\PublishContent;

Artisan::command('content:publish', function () {
    $this->call(PublishContent::class);
})->describe('Automatically publish content based on scheduled time.');

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
