<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Session;

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
        $locale = Session::get('locale');
        $symbol = config("currency.currencies.$capitalizeCurrency.symbol"); 

        if ($locale === 'ar' && $capitalizeCurrency === 'AED') {
            $symbol = 'د.إ'; 
        } elseif ($locale !== 'ar' && $capitalizeCurrency === 'AED') {
            $symbol = 'AED';
        }
        return $symbol . ' ' . number_format($amount, 2);
    }
}