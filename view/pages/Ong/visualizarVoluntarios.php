<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-h1 texto-gradient">
        <h1>Validação de ONGs</h1>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome da ONG</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Dados estáticos simulando as informações da tabela
                $dados = [
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado'],
                    ['data' => 'XX/XX/XXXX', 'nome' => 'XXXXXXXXXX', 'status' => 'Aprovado']
                ];

                // Loop para exibir cada linha da tabela
                foreach ($dados as $dado) {
                    echo "<tr>";
                    echo "<td>{$dado['data']}</td>";
                    echo "<td>{$dado['nome']}</td>";
                    echo "<td><span>{$dado['status']}</span></td>";
                    echo "<td>
                            <form>
                                <button class='icon-btn'>
                                    <img class='icon' src='eye.png' alt='icone editar'>
                                </button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
