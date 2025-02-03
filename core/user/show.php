<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Usuário</title>
</head>
<body>
    <h1>Detalhes do Usuário</h1>
    <p>Nome: <?php echo htmlspecialchars($user['name']); ?></p>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
</body>
</html>
