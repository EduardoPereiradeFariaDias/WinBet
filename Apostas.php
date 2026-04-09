<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>WinBet</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #0a0a0a, #111);
      color: #fff;
    }

    .title {
      color: #00ff88;
      font-weight: bold;
    }

    .card-custom {
      background: #1a1a1a;
      border: 1px solid #00ff88;
      border-radius: 15px;
    }

    .btn-neon {
      background: #00ff88;
      color: #000;
      font-weight: bold;
    }

    .btn-neon:hover {
      box-shadow: 0 0 10px #00ff88;
    }
  </style>
</head>

<body>

<?php include 'config/navbar.php'; ?>

<div class="container mt-5">




<div class="container mt-5">
  <h2 class="mb-4">Jogos Disponíveis ⚽</h2>

  <div class="row">

    <div class="col-md-4">
      <div class="card bg-secondary p-3 mb-3">
        <h5>Brasil x Argentina</h5>
        <!-- Botões agora redirecionam para apostar.html com jogo e palpite preenchidos -->
        <a href="apostar.php?jogo=Brasil+x+Argentina&palpite=Time+1"
           class="btn btn-success w-100 mb-2">Brasil (1.8)</a>
        <a href="apostar.php?jogo=Brasil+x+Argentina&palpite=Empate"
           class="btn btn-warning w-100 mb-2">Empate (3.0)</a>
        <a href="apostar.php?jogo=Brasil+x+Argentina&palpite=Time+2"
           class="btn btn-danger w-100">Argentina (2.2)</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card bg-secondary p-3 mb-3">
        <h5>Barcelona x Real Madrid</h5>
        <a href="apostar.php?jogo=Barcelona+x+Real+Madrid&palpite=Time+1"
           class="btn btn-success w-100 mb-2">Barça (2.0)</a>
        <a href="apostar.php?jogo=Barcelona+x+Real+Madrid&palpite=Empate"
           class="btn btn-warning w-100 mb-2">Empate (3.2)</a>
        <a href="apostar.php?jogo=Barcelona+x+Real+Madrid&palpite=Time+2"
           class="btn btn-danger w-100">Real (1.9)</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card bg-secondary p-3 mb-3">
        <!-- Nome correto: Corinthians x Palmeiras -->
        <h5>Corinthians x Palmeiras</h5>
        <a href="apostar.php?jogo=Corinthians+x+Palmeiras&palpite=Time+1"
           class="btn btn-success w-100 mb-2">Corinthians (2.1)</a>
        <a href="apostar.php?jogo=Corinthians+x+Palmeiras&palpite=Empate"
           class="btn btn-warning w-100 mb-2">Empate (3.1)</a>
        <a href="apostar.php?jogo=Corinthians+x+Palmeiras&palpite=Time+2"
           class="btn btn-danger w-100">Palmeiras (2.0)</a>
      </div>
    </div>

  </div>

  <a href="apostar.php" class="btn btn-success mt-3">Ir para Aposta</a>
</div>

<!-- Preenche o formulário automaticamente se vier da página de jogos -->
<script>
  const params = new URLSearchParams(window.location.search);
  // Este script é para apostas.html, mas o preenchimento acontece em apostar.html
</script>

</body>
</html>