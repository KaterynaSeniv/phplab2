<?php
namespace App\Models;

$trainCategories = ['Platscart', 'Coupe', 'Lux', 'Intercity', 'Sleeping Car'];
sort($trainCategories);

$ticketData = [
    'id' => 1042,
    'passenger_name' => 'Катерина Сенів',
    'train_number' => '043К',
    'departure_station' => 'Івано-Франківськ',
    'arrival_station' => 'Київ-Пасажирський',
    'car_number' => 5,
    'seat_number' => 12,
    'price' => 450.50,
    'is_paid' => true,
];