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

$nome = '';
$status = '';

if (isset($_POST['edit_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['edit_tarefa']);
    
    // Consulta para obter os dados da tarefa
    $query = "SELECT nome, status FROM tarefas WHERE id = '$tarefaId'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $status = $row['status'];
    } else {
        echo "Tarefa não encontrada.";
    }
    

}

if (isset($_POST['update_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['tarefa_id']);
    $novoNome = mysqli_real_escape_string($conn, $_POST['nome']);
    $novoStatus = mysqli_real_escape_string($conn, $_POST['status']);
    
    $query = "UPDATE tarefas SET nome = '$novoNome', status = '$novoStatus' WHERE id = '$tarefaId'";
    
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Tarefa atualizada com sucesso.');</script>";
    } else {
        echo "Erro ao atualizar a tarefa: " . $conn->error;
    }
    header('Location: index.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5 border border-gray-300 border-5 bg-light rounded-3">
        <div class="container">
                <h1 class="fw-bold mt-3 mb-3">Modificar Tarefa</h1>
                <div class="container bg-white">
                    <table class="table">
                        <tr><th class="fs-4">Nome</th></tr>
                        <tr><td class="fw-lighter fs-4"><?php echo $nome;?></td></tr>
                        <tr><th class="fs-4">Status</th></tr>
                        <tr><td class="fw-lighter fs-4"><?php echo $status;?></td></tr>
                    </table>
                    <button class="btn btn-primary fw-bold fs-4 mb-3 mt-3" onclick="openModal()">Editar Tarefa</button>
                    <a class="btn btn-primary fw-bold fs-4 mb-3 mt-3" href="index.php">Voltar</a>
                </div>
        </div>    
</div>

<div id="editModal" class="modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-4">Editar Tarefa</h5>
                <button type="button" class="btn-close mb-3" aria-label="Close" onclick="closeModal()"></button>
            </div>
            <div class="modal-body bg-light">
                <form method="POST">
                    <input type="hidden" name="tarefa_id" value="<?php echo $tarefaId; ?>">
                    <div class="mb-3">
                        <label for="nome" class="form-label fw-bold">Nome da Tarefa</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?php echo htmlspecialchars($nome); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="<?php echo htmlspecialchars($status); ?>" required>
                    </div>
                    <button type="submit" name="update_tarefa" class="btn btn-primary fw-bold">Salvar Alterações</button>
                    <button type="button" class="btn btn-primary fw-bold" onclick="closeModal()">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

function openModal() {
    document.getElementById("editModal").style.display = "block";
}


function closeModal() {
    document.getElementById("editModal").style.display = "none";
}
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
    












