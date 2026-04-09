<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php?erro=acesso");
    exit;
}

$nome    = htmlspecialchars($_GET['nome']    ?? $_SESSION['usuario_nome']);
$valor   = htmlspecialchars($_GET['valor']   ?? '0');
$palpite = htmlspecialchars($_GET['palpite'] ?? '');
$jogo    = htmlspecialchars($_GET['jogo']    ?? '');

$ganhou = (rand(0, 1) === 1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Resultado - WinBet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<nav class="navbar navbar-dark bg-black border-bottom border-success">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand text-success" href="index.php">WinBet 💰</a>
    <a href="logout.php" class="btn btn-outline-danger btn-sm">Sair</a>
  </div>
</nav>

<div class="container mt-5">
  <div class="card bg-secondary p-5 shadow-lg text-center">
    <h2>Resultado 🎲</h2>

    <p class="text-muted mb-4">
      <strong><?= $nome ?></strong> apostou R$ <?= number_format((float)$valor, 2, ',', '.') ?>
      em <strong><?= $jogo ?></strong> — palpite: <strong><?= $palpite ?></strong>
    </p>

    <?php if ($ganhou): ?>
      <div class="alert alert-success">
        <h3>🔥 VOCÊ GANHOU! 🔥</h3>
        <p>Parabéns! Você ganhou R$ <?= number_format((float)$valor * 2, 2, ',', '.') ?>!</p>
      </div>
    <?php else: ?>
      <div class="alert alert-danger">
        <h3>❌ VOCÊ PERDEU</h3>
        <p>Não foi dessa vez. Tente novamente!</p>
      </div>
    <?php endif; ?>

    <div class="mt-4 d-flex gap-3 justify-content-center">
      <a href="apostar.php" class="btn btn-success">Apostar de Novo</a>
      <a href="lista.php"   class="btn btn-outline-light">Minhas Apostas</a>
      <a href="index.php"   class="btn btn-outline-secondary">Início</a>
    </div>
  </div>
</div>

</body>
</html>
    

    



