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

    if (isset($_POST['nomeCriarTarefa']) && isset($_POST['statusCriarTarefa'])) {
        $nome = mysqli_real_escape_string($conn, $_POST['nomeCriarTarefa']);
        $status = mysqli_real_escape_string($conn, $_POST['statusCriarTarefa']);
        $sql = "INSERT INTO tarefas (nome, status) VALUES('$nome','$status')";

        mysqli_query($conn, $sql);
        session_start();

        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['message'] = "Usuário criado com sucesso!";
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = "Deu ruim. Usuário não criado!";
            $_SESSION['type'] = 'error';
        }

        header('Location: index.php');
        exit;
    }
    ?>

