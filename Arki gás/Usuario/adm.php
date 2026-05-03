<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

include_once '../index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { width: 90%; margin: auto; }
        .cards { display: flex; gap: 20px; margin-top: 20px; }
        .card {
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #333;
            color: #fff;
        }
        #sair{
            padding:10px;
            background-color: red;
            color: #fff;
            margin-left: 90%;
            border-radius: 2px;
            margin-top: -4%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <button id = "sair" onclick="sair()">Terminar Sessão</button>
        <?php
        // TOTAL DE PEDIDOS
        $sql_total = "SELECT COUNT(*) as total FROM solicitar";
        $res_total = $connect->query($sql_total);
        $total = $res_total->fetch_assoc()['total'];

        ?>

        <div class="cards">
            <div class="card">
                <h3>Total de pedidos</h3>
                <p><?php echo $total; ?></p>
            </div>
        </div>

        <!-- TABELA DE PEDIDOS -->
        <?php
        $sql = "SELECT * FROM solicitar";
        $resultado = $connect->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            foreach ($resultado->fetch_fields() as $campo) {
                echo "<th>" . htmlspecialchars($campo->name) . "</th>";
            }
            echo "</tr>";

            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                foreach ($linha as $valor) {
                    echo "<td>" . htmlspecialchars($valor) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum pedido encontrado.";
        }
        ?>
    </div>
    <script>
        function sair()
        {
            confirm('Sua Sessão foi terminada')
            window.location.href = '../ADM/index.html'
        }
    </script>
</body>
</html>
