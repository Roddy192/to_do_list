<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body>
    <div class="container mt-5 border border-gray-300 border-5 bg-light rounded-3">
        <div class="container">
            <h1 class="fw-bold mt-3 mb-3">Tarefas</h1>
            <div class="container bg-white rounded-3" id="exib_resultados">

            <table class="table table-striped mt-3 mb-3 fs-4">
                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Deletar</th>
                    <th>Editar</th>
                </tr>


                <?php
                    function exibirTarefas() {
    
                        $servername = "localhost:3306";
                        $username = "root";
                        $password = "";
                        $dbname = "tarefas";

                        $conn = new mysqli($servername, $username, $password, $dbname);

    
                        if ($conn->connect_error) 
                        {
                        die("Conexão falhou: " . $conn->connect_error);
                        }

    
                        $sql = "SELECT nome, status, id FROM tarefas";
                        $results = $conn->query($sql);

                        $conn->close();


                        foreach($results as $result): ?>

                            <tr>
                                <td class="fw-lighter fs-4"><?php echo $result['nome']; ?></td>
                                <td class="fw-lighter fs-4"><?php echo $result['status']; ?></td>
                                <td class="fw-lighter fs-4"><?php echo $result['id']; ?></td>
                                <td>
                                    <form action="del_tarefa.php" method="POST" class="d-inline">
                                        <button onclick="return confirm('A tarefa será excluída. Tem certeza?')" name="del_tarefa" type="submit" value="<?=$result['id']?>" class="btn btn-danger "><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="edit_tarefas.php" method="POST" class="d-inline">
                                        <button name="edit_tarefa" type="submit" value="<?=$result['id']?>" class="btn btn-secondary "><i class="bi bi-tools"></i></button>
                                    </form>
                                    
                                </td>
                                
                                
        
                            </tr>
                        <?php endforeach;
                    }

                    exibirTarefas();
                ?>

            </table>
            </div>

            <div class="row">
                <div class="btn-group mt-2 mb-2 gap-5" role="group" aria-label="Basic example">
                    <a class="btn btn-primary fw-bold fs-4" href="add_tarefa.php">Adicionar Tarefa</a>
                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>