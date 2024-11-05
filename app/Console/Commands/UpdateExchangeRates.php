<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateExchangeRates extends Command
{
    protected $signature = 'currency:update-exchange-rates';
    protected $description = 'Update currency exchange rates from an API';

    public function handle()
    {
        $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');

        if ($response->successful()) {
            $rates = $response->json()['rates'];
            
            config(['currency.currencies.AED.exchange_rate' => $rates['AED']]);
            
            $this->info('Exchange rates updated successfully.');
        } else {
            $this->error('Failed to update exchange rates.');
        }
    }
}