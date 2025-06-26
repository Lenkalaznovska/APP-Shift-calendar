<?php
$host = "sql6.webzdarma.cz";
$username = "smenywzcz0563";
$password = "._LLhU8_%&R52ONuT57B";
$dbname = "smenywzcz0563";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['delete'])) {
    $name = $_POST['name'] ?? '';
    $shift_date = $_POST['shift_date'] ?? '';
    $note = $_POST['note'] ?? '';
    $color = $_POST['color'] ?? '#000000';

    if ($name && $shift_date) {
        $stmt = $conn->prepare("INSERT INTO shifts (name, shift_date, note, color) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $shift_date, $note, $color);
        $stmt->execute();
        $stmt->close();
        echo "OK";
    } else {
        echo "Chybí data";
    }
    $conn->close();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['delete'])) {
    $name = $_POST['name'] ?? '';
    $shift_date = $_POST['shift_date'] ?? '';
    if ($name && $shift_date) {
        $stmt = $conn->prepare("DELETE FROM shifts WHERE name = ? AND shift_date = ?");
        $stmt->bind_param("ss", $name, $shift_date);
        $stmt->execute();
        $stmt->close();
        echo "Smazáno";
    } else {
        echo "Chybí data pro smazání";
    }
    $conn->close();
    exit;
}

$shifts = [];
$result = $conn->query("SELECT * FROM shifts");
while ($row = $result->fetch_assoc()) {
    $shifts[] = $row;
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($shifts);
?>