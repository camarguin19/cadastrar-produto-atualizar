<?php
require './config/db.php';

$sql = "SELECT * FROM produtos ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Produtos</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Catálogo de Produtos</h1>
    
    <!-- Link para adicionar um novo produto -->
    <a href="add_produto.php">[Adicionar Novo Produto]</a>
    
    <!-- Área para listagem dos produtos -->
    <ul>
        
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <strong><?php echo $row['name']; ?></strong> - R$ <?php echo $row['price']; ?>
                <br>
                <?php echo $row['description']; ?>
                <br>
                <a href="update_produto.php?id=<?php echo $row['id']; ?>">[Editar]</a>
                <a href="delete_produto.php?id=<?php echo $row['id']; ?>">[Excluir]</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
