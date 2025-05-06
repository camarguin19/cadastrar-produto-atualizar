<?php
require_once './config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);


    $sql = "INSERT INTO produtos (name, description, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Erro: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Adicionar Novo Produto</h1>
    <form action="add_produto.php" method="POST">
        <input type="text" name="name" placeholder="Nome do Produto" required>
        <br>
        <textarea name="description" placeholder="Descrição"></textarea>
        <br>
        <input type="text" name="price" placeholder="Preço" required>
        <br>
        <button type="submit">Adicionar Produto</button>
    </form>
    <br>
    <a href="index.php">Voltar ao Catálogo</a>
</body>

</html>