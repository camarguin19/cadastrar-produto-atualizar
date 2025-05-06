<?php
require_once './config/db.php';

if (isset($_POST['id'])) {
    $produto_id = (int) $_GET['id'];

    $sql = "UPDATE produtos SET name, description, price WHERE id = $produto_id";

    if ($conn->query($sql) === TRUE) {
        header("location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
} else {
    echo "ID do produto inválido";
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Editar Produto</h1>
    <form action="update_produto.php?id=<?php echo $produto_id; ?>" method="POST">
        <input type="text" name="name" placeholder="Nome do Produto" required>
        <br>
        <textarea name="description" placeholder="Descrição"></textarea>
        <br>
        <input type="text" name="price" placeholder="Preço" required>
        <br>
        <button type="submit">Atualizar Produto</button>
    </form>
    <br>
    <a href="index.php">Voltar ao Catálogo</a>
</body>

</html>