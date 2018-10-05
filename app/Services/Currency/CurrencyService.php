<?php

namespace App\Services\Currency;


class CurrencyService
{
    
    public function realFormat($value)
    {
        return number_format($value, 2, ',', '.');
    }
}