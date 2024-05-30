<?php
$servername = "localhost";
$username = "u67296";
$password = "5237724";
$dbname = "u67296";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$errors = [];

// Проверка наличия данных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fio = $_POST['fio'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $languages = implode(', ', $_POST['languages']);
    $bio = $_POST['bio'];
    $agreement = isset($_POST['agreement']) ? 1 : 0;

    // Валидация данных (добавьте необходимые проверки)

    // Вставка данных в базу данных
    try {
        $stmt = $conn->prepare("INSERT INTO osnova (fio, phone, email, dob, gender, languages, bio, agreement) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fio, $phone, $email, $dob, $gender, $languages, $bio, $agreement]);
        echo "Данные успешно сохранены.";
    } catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
    }
} else {
    echo "Неверный метод запроса.";
}
?>
