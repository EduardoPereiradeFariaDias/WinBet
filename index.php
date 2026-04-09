<?php
session_start();

// Se não estiver logado, redireciona para o login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php?erro=acesso");
    exit;
}

$nome = htmlspecialchars($_SESSION['usuario_nome']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>WinBet Simulator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-success">
  <div class="container">
    <a class="navbar-brand text-success" href="index.php">WinBet 💰</a>
    <div class="d-flex align-items-center gap-3">
      <span class="text-light">Olá, <strong><?= $nome ?></strong>!</span>
      <a class="btn btn-outline-light btn-sm" href="apostas.php">Jogos</a>
      <a class="btn btn-success btn-sm" href="apostar.php">Apostar</a>
      <a class="btn btn-outline-danger btn-sm" href="logout.php">Sair</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="card bg-secondary text-light p-5 shadow-lg text-center">
    <h1 class="text-success">WinBet Simulator ⚽</h1>
    <p class="lead">Bem-vindo, <?= $nome ?>! Teste sua sorte com apostas simuladas.</p>
    <div class="d-flex gap-3 justify-content-center mt-3">
      <a href="apostas.php" class="btn btn-success btn-lg">Ver Jogos</a>
      <a href="lista.php"   class="btn btn-outline-light btn-lg">Minhas Apostas</a>
    </div>
    <p class="text-danger mt-4">⚠️ Este site é apenas um simulador para fins educacionais.</p>
  </div>
</div>

</body>
</html>
