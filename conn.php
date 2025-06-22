<?php
$host = "localhost";
$dbname = "pizzeria_smeny";
$username = "root";
$password = ""; // podle XAMPP – uprav podle potřeby

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}

$name = $_POST['name'] ?? '';
$shift_date = $_POST['shift_date'] ?? '';
$note = $_POST['note'] ?? '';
$color = $_POST['color'] ?? '#000000';

if ($name && $shift_date) {
    $stmt = $conn->prepare("INSERT INTO shifts (name, shift_date, note, color) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $shift_date, $note, $color);
    if ($stmt->execute()) {
        echo "Směna uložena.";
    } else {
        echo "Chyba při ukládání směny.";
    }
    $stmt->close();
} else {
    echo "Chybí požadovaná data.";
}

$conn->close();
?>
