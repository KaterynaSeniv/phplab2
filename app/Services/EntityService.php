<?php
declare(strict_types=1);

namespace App\Services;

use Exception;

class EntityService 
{
    public function calculateTicketTotal(float $basePrice, int $quantity, float $serviceFee = 25.0): float 
    {
        return ($basePrice * $quantity) + $serviceFee;
    }

    public function applyDiscount(float $price, float $discount): float 
    {
        if ($discount < 0 || $discount > 100) {
            throw new Exception("Неприпустиме значення знижки!");
        }
        return $price - ($price * ($discount / 100));
    }
}