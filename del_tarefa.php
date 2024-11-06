<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "tarefas";

$conn = new mysqli($servername, $username, $password, $dbname);

    
if ($conn->connect_error) 
{
die("Conexão falhou: " . $conn->connect_error);
}

                        
if (isset($_POST['del_tarefa'])) {
    $usuarioId = mysqli_real_escape_string($conn, $_POST['del_tarefa']);
    $sql = "DELETE FROM tarefas WHERE id = '$usuarioId'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Usuário com ID {$usuarioId} excluído com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Ops! Não foi possível excluir o usuário";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}