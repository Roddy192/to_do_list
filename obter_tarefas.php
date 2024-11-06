<?php

$host = 'localhost';
$dbname = 'tarefas';
$user = 'root';
$password = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}


$query = "SELECT * FROM tarefas";
$stmt = $pdo->prepare($query);
$stmt->execute();


$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($dados) > 0) {
    foreach ($dados as $row) {
        echo "<div class='border p-2 mb-2'>";
        echo "<p>Nome: " . htmlspecialchars($row['nome']) . "</p>";
        echo "<p>Status: " . htmlspecialchars($row['status']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Sem tarefas no momento.</p>";
}

?>