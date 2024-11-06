<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5 border border-gray-300 border-5 bg-light rounded-3">
            <div class="container">
                <h1 class="fw-bold mt-3 mb-3">Criar Tarefa</h1>
                <form action="add_tarefaExec.php" method="POST">
                    <div class="mb-3">
                        <label for="nomeCriarTarefa" class="form-label mt-3 mb-1 fs-4">Nome da Tarefa</label>
                        <input type="text" class="form-control" id="nomeCriarTarefa" name="nomeCriarTarefa" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="statusCriarTarefa" class="form-label mt-3 mb-1 fs-4">Status da Tarefa</label>
                        <input type="text" class="form-control" id="statusCriarTarefa" name="statusCriarTarefa">
                    </div>
                    <div class="row">
                        <div class="btn-group mb-3 gap-3 d-md-flex">
                            <button type="submit" class="btn btn-primary fw-bold fs-4">Enviar</button>
                            <a class="btn btn-primary fw-bold fs-4" href="index.php">Início</a>
                        </div>
                    </div>
                </form>
            </div>
    </div>



    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>