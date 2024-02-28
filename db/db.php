<?php
// Параметры подключения к базе данных
$host = 'localhost';
$dbname = 'blog';
$username = 'root';
$password = '';

try {
    // Создание объекта PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Установка режима обработки ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}
