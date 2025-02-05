<?php
require_once './config/db.php';

if (isset($_GET['id'])) {
    $produto_id = (int) $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id = $produto_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir produto: " . $conn->error;
    }
} else {
    echo "ID do produto inválido";
}

?>