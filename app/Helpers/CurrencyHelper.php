<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function convert($amount, $toCurrency = 'USD')
    {
        $currencies = config('currency.currencies');
        $defaultCurrency = config('currency.default');
        $fromRate = $currencies[$defaultCurrency]['exchange_rate'];
        $toRate = $currencies[strtoupper($toCurrency)]['exchange_rate'];

        return $amount * ($toRate / $fromRate);
    }

    public static function format($amount, $currency = 'USD')
    {
        $capitalizeCurrency = strtoupper($currency);
        $symbol = config("currency.currencies.$capitalizeCurrency.symbol");
        return $symbol . number_format($amount, 2);
    }
}