<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\EntityService;
use App\Services\DataProcessor;
use Faker\Factory;
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        h1 { color: #2c3e50; }
        h2 { color: #34495e; border-bottom: 2px solid #ecf0f1; padding-bottom: 5px; }
        hr { border: 0; border-top: 1px solid #bdc3c7; margin: 20px 0; }
    </style>
</head>
<body>

    <h1>Лабораторна робота №3: Основи PHP</h1>
    <hr>

    <!-- Завдання 1 -->
    <h2>1. Масиви та структура даних</h2>
    <?php
    include_once __DIR__ . '/app/Models/EntityArray.php';
    echo "<strong>Категорії вагонів:</strong> " . implode(', ', $trainCategories) . "<br>";
    echo "<strong>Дані квитка пасажира:</strong> {$ticketData['passenger_name']} ({$ticketData['departure_station']} &rarr; {$ticketData['arrival_station']}, місце №{$ticketData['seat_number']})";
    ?>
    <hr>

    <!-- Завдання 2 -->
    <h2>2. Користувацькі функції та типізація</h2>
    <?php
    $service = new EntityService();
    $total = $service->calculateTicketTotal(450.50, 2);
    echo "Підсумкова вартість 2 квитків: <strong>{$total} грн</strong>";
    ?>
    <hr>

    <!-- Завдання 3 -->
    <h2>3. Faker та замикання (Closures)</h2>
    <?php
    $faker = Factory::create('uk_UA');
    $prices = [];
    for($i = 0; $i < 10; $i++) {
        $prices[] = $faker->randomFloat(2, 100, 1000);
    }
    $minThreshold = 500.0;
    $filteredPrices = array_filter($prices, fn($p) => $p > $minThreshold);
    
    echo "Згенеровані ціни: " . implode(', ', array_map(fn($p) => round($p, 2) . ' грн', $prices)) . "<br>";
    echo "Ціни дорожчі за 500 грн: " . implode(', ', array_map(fn($p) => round($p, 2) . ' грн', $filteredPrices));
    ?>
    <hr>

    <!-- Завдання 4 -->
    <h2>4. Обробка винятків (Try-Catch-Finally)</h2>
    <?php
    try {
        $discounted = $service->applyDiscount(500.0, 150.0); // Навмисна перевірка помилки
        echo "Ціна зі знижкою: {$discounted}";
    } catch (Exception $e) {
        echo "Перехоплено виняток: <span style='color: red;'><strong>" . $e->getMessage() . "</strong></span>";
    } finally {
        echo "<br><em>Блок finally: обробку спроби завершено.</em>";
    }
    ?>
    <hr>

    <!-- Завдання 5 (Варіант 10) -->
    <h2>5. Індивідуальне алгоритмічне завдання (Варіант 10)</h2>
    <?php
    $processor = new DataProcessor();

    $arrCheck = [12, 25, 8, 19];
    $resCheck = $processor->areAllElementsLessThan($arrCheck, 30);
    echo "Задача 1 (Чи всі елементи масиву [12, 25, 8, 19] менші за 30?): <strong>" . ($resCheck ? 'true' : 'false') . "</strong><br><br>";

    $sampleText = "Потяг сполученням Київ Львів прибуває на першу колію";
    $swapped = $processor->swapFirstAndLastWord($sampleText);
    echo "Задача 2 (Поміняти перше і останнє слово):<br>";
    echo "&bull; Початковий рядок: <em>{$sampleText}</em><br>";
    echo "&bull; Результат: <strong>{$swapped}</strong><br><br>";

    $wordsText = "Залізничний квиток на пасажирський потяг куплено онлайн";
    $shuffled = $processor->shuffleAllWords($wordsText);
    echo "Задача 3 (Випадкове перемішування слів):<br>";
    echo "&bull; Початковий рядок: <em>{$wordsText}</em><br>";
    echo "&bull; Результат: <strong>{$shuffled}</strong>";
    ?>

</body>
</html>
